<?php
// api/src/Validator/Constraints/MinimalProperties.php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class test extends Constraint
{
    public $message = 'The product must have the minimal properties required ("description", "price")';
}