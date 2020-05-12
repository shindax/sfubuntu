<?php
// src/Controller/AdminController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminController extends EasyAdminController
{

	/**
	 * @IsGranted("ROLE_ADMIN")
	 */
     /**
     * @Route("/dashboard", name="admin_dashboard")
     */

    public function dashboardAction()
    {
        return $this->render('bundles/EasyAdminBundle/dashboard.html.twig');
    }

    /**
     * @Route("/", name="easyadmin")
     *
     * @param Request $request
     *
     * @return RedirectResponse|Response
     *
     * @throws ForbiddenActionException
     */

    public function indexAction(Request $request)
    {
    	$this->initialize($request);
        if (null === $request->query->get('entity')) {
            return $this->redirectToBackendHomepage();
        }

		$userHasPermission = false;
    	$user = $this->get('security.token_storage')->getToken()->getUser();
        $action = $request->query->get('action');

        if (\in_array($action, ['show', 'edit', 'new', 'list'])) {
            $requiredPermission = $this->entity[$action]['item_permission'];

            if( $requiredPermission == null )
           		$userHasPermission = true;
           		else
                {
		            foreach( $user -> getRcollection() AS $value ){
                        if( gettype( $requiredPermission ) == 'string' )
                        {
                            if( $value -> getName() == $requiredPermission )
                                $userHasPermission = true;
                        }
                            else
                                if( in_array( $value -> getName(), $requiredPermission ) )
		            		    $userHasPermission = true;
                    }
                }
        }


        dump( $userHasPermission );
        if( $userHasPermission )
    		$result = parent::indexAction($request);
    		else
                $result = $this->redirectToBackendHomepage();

        return $result ;
    }
}
