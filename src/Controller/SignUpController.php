<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SignUpController extends Controller
{
    /**
     * @Route("/signUp", name="sign_up")
     */
    public function signup()
    {
        return $this->render('sign_up/signup.html.twig', array());
    }
}
