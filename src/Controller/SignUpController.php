<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SignUpController extends Controller
{
    /**
     * @Route("/signUp", name="sign_up")
     */
    public function signup(Request $request)
    {
        $this->signUpWatcher($request);

        $name = $request->request->get('name');
        $password = $request->request->get('password');
        $mail = $request->request->get('mail');

        return $this->render('sign_up/signup.html.twig', array(
            'name' => $name,
            'password' => $password,
            'mail' => $mail,
        ));
    }

    public function signUpWatcher(Request $request)
    {
        // Form sent
        if(!empty($request->request))
        {
            $errorMessages = [];
            $successMessages = [];

            $name = $request->request->get('name');
            $password = $request->request->get('password');
            $mail = $request->request->get('mail');

            if(empty($name))
            {
                $errorMessages['name'] = 'Missing name';
            }
            else if(mb_strlen($name) < 4)
            {
                $errorMessages['name'] = 'Name is too short';
            }
            
            if(empty($password)) 
            {
                $errorMessages['password'] = 'Missing password';
            }
            else if(mb_strlen($password) < 4)
            {
                $errorMessages['password'] = 'Password is too short';
            }
            
            if(empty($mail))
            {
                $errorMessages['mail'] = 'Missing mail';
            }
            else if(!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $mail))
            {
                $errorMessages['mail'] = 'Please enter a valid mail';
            }

            if(empty($errorMessages))
            {
                $data = [
                    "user_name" => $name,
                    "user_password" => password_hash($password, PASSWORD_DEFAULT),
                    "user_mail" => $mail,
                ];

                $this->user->addUser($data);

                $successMessages = 'Inscription successful';

                $request->request->set('name', '');
                $request->request->set('password', '');
                $request->request->set('mail', '');

                //Change to sign_in once the route exist
                redirectToRoute('home');
            }
        }

        // Form not sent
        else
        {
            $request->request->set('name', '');
            $request->request->set('password', '');
            $request->request->set('mail', '');
        }
    }
}
