<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HashPasswordSubscriber implements EventSubscriberInterface
{

    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function hashPassword(ViewEvent $event)
    {
        $user = $event->getControllerResult();
        $request = $event->getRequest();
        if (!($user instanceof User) || !in_array($request->getMethod(), [Request::METHOD_POST])) {
            return;
        }

        $hashedPassword = $this->passwordEncoder->encodePassword($user, $user->getPassword());
        $user->setPassword($hashedPassword);
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.view' => ['hashPassword', EventPriorities::PRE_WRITE],
        ];
    }
}
