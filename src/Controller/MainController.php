<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public $class_Name = __CLASS__;

    #[Route('/main', name: 'main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => $this->class_Name,
        ]);
        // return $this->json([
        //    'controller_name' => $this->class_Name 
        // ]);
    }

    #[Route('/main-2', name: 'main2')]
    public function main2(): Response
    {
        return new Response('main 2');
    }
    #[Route('/main-name3/{name?}', name: 'main3')]
    public function main3( Request $request )
    {
        $greet = '';
        if ( $test =$request->get('name') ) {
            $greet = $test;
        }
        // return new Response("<h1>Welcome $test.</h1>");
        return $this->render('main/index3.html.twig', [
            'pass_data' => $greet
        ]);
    }
}
