<?php

namespace App\Controller;
// For using annotations 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
    }

}