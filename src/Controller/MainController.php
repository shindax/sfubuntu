<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\SecurityController;

class MainController extends AbstractController
{
  	/**
      * @Route("/", name="app_homepage")
      */
    public function index()
    {
        $number = random_int(0, 100);
        return $this->render('base.html.twig', [
            'number' => $number,]);
    }

  	/**
      * @Route("/lucky/number", name="lucky")
      */
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,]);
    }
}
