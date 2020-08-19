<?php

use App\Entity\User;

interface OwnUserInterface
{

    public function setUser(?User $user): self;
}
