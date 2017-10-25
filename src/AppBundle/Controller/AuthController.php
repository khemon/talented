<?php

namespace AppBundle\Controller;

use Firebase\JWT\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

use AppBundle\Entity\TUser as TUser;
use Symfony\Component\Validator\Constraints\Date;

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
            return new View("Password incorrect !");
        }

        //Create token
        $tokenData = array(
            "username" => $user->getUsername(),
            "id" => $user->getID(),
            "exp" => time() + 60 * 60, //1 minute pour test
            "role" => "user"
        );

        $token = $this->_createToken($tokenData);

        //Return token
        return $token;
    }

    /**
     * @Rest\Post("/auth/checkToken")
     */
    public function checkToken(Request $request) {
        $token = $request->request->get('st');
        if($token == null) {
            return new View("Token manquant pour tester sa validité (Paramètre st)");
        } else {
            return $this->_checkToken($request);
        }
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
