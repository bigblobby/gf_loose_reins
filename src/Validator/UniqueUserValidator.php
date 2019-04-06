<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 06/04/2019
 * Time: 13:29
 */

namespace App\Validator;


use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueUserValidator extends ConstraintValidator
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint App\Validator\UniqueUser */

        $existingUser = $this->userRepository->findOneBy([
            'username' => $value
        ]);

        if(!$existingUser){
            return;
        }

        $this->context->buildViolation($constraint->message)
            ->addViolation();
    }
}