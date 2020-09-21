<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use OpenTok\MediaMode;
use OpenTok\ArchiveMode;
use OpenTok\OpenTok;

class EditProfilAction extends AbstractController
{

    public function __invoke(User $user)
    {

        return $user;
    }
}
