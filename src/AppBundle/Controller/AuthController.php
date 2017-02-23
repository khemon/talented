<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class AuthController extends BaseApiController
{
  /**
   * @Rest\Post("/auth/login")
   */
    public function loginAction(Request $request)
    {
        //Check authenfication parameters
        $login =  $request->request->get('login');
        $password = $request->request->get('password');

        //Store token in session
        return new View("Credentials : $login / $password", Response::HTTP_NOT_FOUND);
    }

    /**
     * @Rest\Post("/auth/logout")
     */
    public function logoutAction()
    {
        return $this->render('AppBundle:Auth:logout.html.twig', array(
            // ...
        ));

        //Kill session
    }

}
