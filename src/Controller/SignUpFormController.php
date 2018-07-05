<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SignUpFormController extends Controller 
{
    public function newForm(Request $request) 
    {
        $user = new User();
        
        $form = $this->createFormBuilder($task)
            ->add('name', TextType::class)
            ->add('password', PasswordType::class)
            ->add('mail', EmailType::class)
            ->add('create', SubmitType::class)
        ;
    }
}