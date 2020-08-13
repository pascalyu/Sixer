<?php

use App\Entity\User;

interface UserInterface
{

    public function setUser(?User $user): self;
}
