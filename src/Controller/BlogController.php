<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{

    public function list(): Response
    {
        $listItem = 'testItem';
        return new Response($listItem);
    }
}