<?php

namespace App\Controller;

// For using annotations 
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LuckyController 
{
    /**
     * @Route("/lucky/number")
     */
    public function number(): Response
    {
        $number = random_int(0,100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );

        // return $this->render('lucky/number.html.twig', [
        //     'number' => $number,
        // ]);
    }

}