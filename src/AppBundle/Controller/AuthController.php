<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

use AppBundle\Entity\TUser as TUser;

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

        //Get associated user :
        $user = $this->getDoctrine()
                     ->getRepository('AppBundle:TUser')
                     ->getUserByLogin($login);

        //If login not found
        if(!$user) {
          return new View("Login inexistant !");
        }

        //If password incorrect
        if($user->getPassword() != $password) {
          return new View("Password incorect !");
        }

        //Create token
        $tokenData = array(
          'username' => $user->getUsername(),
          'id' => $user->getID(),
        );

        $token = $this->_createToken($tokenData);

        //Return token
        return $token;
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
