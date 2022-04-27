<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\CreatePostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/post', name: 'app_post.')]
class PostController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(PostRepository $postRepository): Response
    {
        // $posts = ['post1,','post2'];
        $posts = $postRepository->findAll();

        return $this->render('post/index.html.twig', [
            'controller_name' => $posts,
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(Request $request, ManagerRegistry $doctrine)
    {
        $post = new Post();

        $form = $this->createForm(CreatePostType::class, $post);

        $form->handleRequest($request);

        // $form->getErrors(); // requires Validation

        if($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl('app_post.index'));
        }

        return $this->render('post/create.html.twig', [
            'form' => $form->createView()
        ]);
    
    }

    #[Route('/create/post', name: 'post')]
    public function post(Request $request, ManagerRegistry $doctrine)
    {
        // dump($request);
        // die();
        $post = new Post();

        $post->setTitle('This is my title');

        // entity manager
        $em = $doctrine->getManager();
        $em->persist($post);
        // execute the query
        $em->flush();
    
        return new Response('success, saved new post with id '. $post->getId() );
    }

    #[Route('/show/{id}', name: 'show')]
    public function show($id, PostRepository $postRepository)
    {
        $post = $postRepository->find($id);
        // dump($post->id);
        // die();
        return $this->render('post/show.html.twig', [
            'post' => $post,
            'user' => 'master'
        ]);

        // return new Response('Your item master ');
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function remove(Post $post, ManagerRegistry $doctrine )
    {
        $em = $doctrine->getManager();

        $em->remove($post);
        $em->flush();
        
        // redirect back to index page
        return $this->redirect($this->generateUrl('app_post.index'));
        // Send some confirmation
        // return new Response('success deleted '. $post->getId());
    }
}
