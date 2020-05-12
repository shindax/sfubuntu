<?php
// src/Controller/StartController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\SecurityController;

use Symfony\Component\HttpFoundation\Request;
use App\Service\Autologin;

class StartController extends AbstractController
{
    public function __construct()
    {
    	// parent::__construct();
    	dd( 123 );
    }
        // Autologin::autologin( $_SERVER['AUTH_USER'], $request, $this );
}
