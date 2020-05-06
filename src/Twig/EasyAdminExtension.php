<?php
// src/Twig/AppExtension.php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class EasyAdminExtension extends AbstractExtension
{
    private $authorizationChecker;
    private $entity;


    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function getFilters()
    {

        return [
            new TwigFilter('filter_admin_actions', [$this, 'filterActions']),
        ];
    }

        public function filterActions(array $itemActions, $item)
    {
        $canEdit = false;
        $canDelete = false;

        $editPermission = $itemActions['edit']['permission'];
        $deletePermission = $itemActions['delete']['permission'];

        foreach ($editPermission as $value) {
            if( $this->authorizationChecker -> isGranted( $value ) )
                $canEdit = true ;
        }

        foreach ($deletePermission as $value) {
            if( $this->authorizationChecker -> isGranted( $value ) )
                $canDelete = true ;
        }

        if( !$canEdit )
            unset( $itemActions['edit'] );

        if( !$canDelete )
            unset( $itemActions['delete'] );

        return $itemActions;
    }
}
