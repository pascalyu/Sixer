<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use OpenTok\MediaMode;
use OpenTok\ArchiveMode;
use OpenTok\OpenTok;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        /*
        $opentok = new OpenTok($_ENV['VONAGE_API_KEY'], $_ENV['VONAGE_API_SECRET']);

        // Create a session that attempts to use peer-to-peer streaming:
        $sessionOptions = array(
            'archiveMode' => ArchiveMode::ALWAYS,
            'mediaMode' => MediaMode::ROUTED
        );
        //$session = $opentok->createSession();
        // Store this sessionId in the database for later use
        $sessionId = "e";
        */

        return $this->render('home/index.html.twig', [
            'controller_name' => "sessionId",
        ]);
    }
}
