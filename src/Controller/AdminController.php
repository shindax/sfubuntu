<?php
// src/Controller/AdminController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

// src/Controller/AdminController.php
class AdminController extends EasyAdminController
{

    public function __construct()
    {
    	// echo 123;
    }

     protected function listAction(){
        $user = $this->getUser();

        if( $user )
          dump( $user -> getRoles() );

         return parent::listAction();
     }

     protected function showAction(){
     	return [];
     }

}
