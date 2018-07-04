<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PagesController extends Controller
{
    /**
     * @Route("/pages/{page?1}", name="page", requirements={"page"="\d+"})
     */
    public function page($page)
    {
        $luckyNumber = $this->get('@')->get('lucky_number');

        return $this->render('pages/page.html.twig', array(
            'page' => $page,
            'luckyNumber' => $luckyNumber,
        ));
    }
}
