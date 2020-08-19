<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\AuthorInterface;
use OwnUserInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;


/*
 * Used to add author from token when post article or comment, because they implement both 
 * AuthorInterface
 *  
*/

class SetUserSubscriber implements EventSubscriberInterface
{

    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    public function addUser(ViewEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$entity instanceof OwnUserInterface  || !in_array($method, [Request::METHOD_POST])) {
            return;
        }

        $entity->setUser($this->tokenStorage->getToken()->getUser());
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.view' =>  ['addUser', EventPriorities::PRE_WRITE],
        ];
    }
}
