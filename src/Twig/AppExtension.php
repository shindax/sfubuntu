<?php

namespace App\Twig;

use App\Entity\User;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    private $authorizationChecker;

    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function getFilters()
    {
        return [
            // new \Twig_SimpleFilter(
            new TwigFilter(
                'filter_admin_actions',
                [$this, 'filterActions']
            )
        ];
    }

    public function filterActions(array $itemActions, $item)
    {

        if ($item instanceof User){
            if( !$this->authorizationChecker->isGranted('ROLE_USER2')) {
                unset($itemActions['edit']);
                unset($itemActions['delete']);
            }
            if( !$this->authorizationChecker->isGranted('ROLE_SUPERADMIN')) {
                unset($itemActions['delete']);
            }            
        }

        // export action is rendered by us manually
        unset($itemActions['export']);

        return $itemActions;
    }
}
