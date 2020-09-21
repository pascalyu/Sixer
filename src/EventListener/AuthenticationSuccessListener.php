<?php

namespace App\EventListener;

use App\Entity\User;
use App\Util\VonageVerifyUtil;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

use OpenTok\MediaMode;
use OpenTok\ArchiveMode;
use OpenTok\OpenTok;

class AuthenticationSuccessListener
{
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {

        $data = $event->getData();
        $user = $event->getUser();



        $opentok = new OpenTok($_ENV['VONAGE_API_KEY'], $_ENV['VONAGE_API_SECRET']);
/*
        // Create a session that attempts to use peer-to-peer streaming:
        $session = $opentok->createSession();

        // A session that uses the OpenTok Media Router, which is required for archiving:
        $session = $opentok->createSession(array('mediaMode' => MediaMode::ROUTED));

        // A session with a location hint:
        $session = $opentok->createSession(array('location' => '12.34.56.78'));

        // An automatically archived session:
        $sessionOptions = array(
            'archiveMode' => ArchiveMode::ALWAYS,
            'mediaMode' => MediaMode::ROUTED
        );
        $session = $opentok->createSession($sessionOptions);


        // Store this sessionId in the database for later use
        $sessionId = $session->getSessionId();*/
        if (!$user instanceof User) {
            return;
        }


        $event->setData($data);
    }
}
