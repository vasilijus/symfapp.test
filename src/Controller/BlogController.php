<?php

use App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * This route has a greedy pattern and is defined first.
     * ("/blog/{page<\d+>?1}", name="blog_list")
     * 
     * @Route("/blog/{page}", name="blog_list", requirements={"page"="\d+"})
     */
    public function list(int $page = 1): Response
    {
        // show blogs
    }

    /**
     * This route could not be matched without defining a higher priority than 0.
     * 
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function show(int $slug): Response
    {
        // slug == the dinamic part of the url ( model->bind )

    }

}