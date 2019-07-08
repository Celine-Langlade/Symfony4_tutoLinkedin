<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Service\Greeter;

class HelloController extends AbstractController {


  /**
  * @Route("hello")
  */
  function hello(Greeter $greeter)
  {
      $message = $greeter->greet();
      return new Response($message);
  }


}
