<?php
// src/Controller/AdminController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;

// src/Controller/AdminController.php
class AdminController extends EasyAdminController
{
     /**
     * @Route("/dashboard", name="admin_dashboard")
     */
    public function dashboardAction()
    {
        return $this->render('bundles/EasyAdminBundle/dashboard.html.twig');
    }

}
