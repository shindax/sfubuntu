<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/admin")
     */
    public function admin()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
    
    /**
     * @Route("/index")
     */
    public function index()
    {
    
    $this->denyAccessUnlessGranted('ROLE_USER1', null, 'Unable to access this page!');

        return new Response('<html><body>Index page!</body></html>');
    }

    /**
     * @Route("/index2")
     */
    public function index2()
    {
        return new Response('<html><body>Index2 page!</body></html>');
    }

}