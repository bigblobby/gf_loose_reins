<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 06/04/2019
 * Time: 12:10
 */

namespace App\Form\Model;


use App\Validator\UniqueUser;
use Symfony\Component\Validator\Constraints as Assert;

class UserRegistrationFormModel
{
    /**
     * @Assert\NotBlank(message="Please enter a username")
     * @UniqueUser()
     */
    public $username;

    /**
     * @Assert\NotBlank(message="Choose a password")
     */
    public $plainPassword;
}