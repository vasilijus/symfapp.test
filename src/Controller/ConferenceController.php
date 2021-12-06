<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    // #[Route('/conference', name: 'conference')]
    /**
     * @Route("/conference", name="conference")
     */
    public function index(Request $request): Response
    {
        // return $this->render('conference/index.html.twig', [
        //     'controller_name' => 'ConferenceController',
        // ]); 
        $greet = '';

        if ($name = $request->query->get('hello') ) {
            $greet = sprintf("<h1>Hello %s</h1>", htmlspecialchars($name));
            $request->query->set('goodbye', 'Goodbye '.$name);
        } 
        
        return new Response(
            <<<EOF
            <html>
            <h1>Conference</h1>
            $greet
            </html>
            EOF
        );
    }
}
