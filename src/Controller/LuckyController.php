<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LuckyController extends Controller
{
    /**
     * @Route({
     *      "en": "/lucky/number",
     *      "fr": "/chanceux/nombre",
    *  }, name="lucky")
     */
    public function number()
    {
        $number = random_int(0, 100);

        $this->get('session')->set('lucky_number', $number);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }
}
