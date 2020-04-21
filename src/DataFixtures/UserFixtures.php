<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\User;
// use Symfony\Component\Security\Core\User\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	 {
	     $this->passwordEncoder = $passwordEncoder;
	 }

    public function load(ObjectManager $manager)
    {
    	$user = new User();

	     $user->setEmail('shindax@mail.ru');
	     $user->setRoles(['ADMIN']);
	     $user->setPassword($this->passwordEncoder->encodePassword(
	         $user,
	         'vortex'
	     ));

        $manager->persist($user);
        $manager->flush();
    }
}
