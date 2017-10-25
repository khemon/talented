<?php

namespace AppBundle\Controller;

use Firebase\JWT\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

use Symfony\Component\HttpFoundation\JsonResponse;

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
            $data = array('messageErreur' => "Login inexistant !", 'statut' => 0);
            return new JsonResponse($data);
        }

        //If password incorrect
        if($user->getPassword() != $password) {
            $data = array('messageErreur' => "Mot de passe incorrect !", 'statut' => 0);
            return new JsonResponse($data);
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
        $data = array('token' => $token, 'statut' => 1);
        return new JsonResponse($data);
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
