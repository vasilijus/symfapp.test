<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_registration')]
    public function register(Request $request, UserPasswordHasherInterface $pe ,ManagerRegistry $doctrine): Response
    {
        $form = $this->createFormBuilder()
                ->add('username')
                ->add('password', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'required' => true,
                    'first_options'  => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password'),
                ])
                ->add('roles', )
                ->add('save', SubmitType::class, [
                ])
                ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $data = $form->getData();
            $user = new User();
            $user->setUsername('admin');
            $user->setPassword(
                $pe->hashPassword($user, $data['password'] )
            );

            // dump($data);

            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->redirectToRoute('app_login'));
        }

        return $this->render('registration/index.html.twig', [
            // 'controller_name' => 'RegistrationController',
            'form' => $form->createView()
        ]);
    }
}
