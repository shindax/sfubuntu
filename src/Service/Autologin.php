<?php
// src/Service/MenuPuller.php
namespace App\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\SecurityController;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;


class Autologin extends AbstractController
{
    public function autologin( String $email, Request $request, AbstractController $ac )
    {
        $dispatcher = new EventDispatcher();
        $user = $ac->getDoctrine()->getManager()->getRepository("App\Entity\User")->findOneBy(['email' => $email ]);
        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
        $ac->get('security.token_storage')->setToken($token);
        $ac->get('session')->set('_security_main', serialize($token));
        $event = new InteractiveLoginEvent($request, $token);
        $dispatcher->dispatch($event);
    }
}