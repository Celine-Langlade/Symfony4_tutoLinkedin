<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Form\UserType;


/**
 *
 */
class UserController extends AbstractController
{

  /**
  * @Route("/user")
  */
  function createUserForm(Request $request)
  {
      $user = new User();
      $form = $this->createForm(UserType::class, $user);

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {
        $userInfo = $form->getData();
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($userInfo);
        $entityManager->flush();

        return new Response('Formulaire Valié.');
      }
      return $this->render('form.html.twig', ['form' => $form->createview()]);

  }
}
