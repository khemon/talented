<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

use AppBundle\Entity\TUser as TUser;

class UserController extends BaseApiController
{
    /**
     * @Rest\Get("/users")
     */
    public function getUsersAction()
    {
        $listUsers = $this->getDoctrine()
                          ->getRepository('AppBundle:TUser')
                          ->findAll();

        if ($listUsers === null) {
          return new View("Aucun user en base de donnees.", Response::HTTP_NOT_FOUND);
        }

        return array("data" => $listUsers);
    }

    /**
     * @Rest\Get("/users/{userId}")
     */
    public function getUserAction($userId)
    {
        $user = $this->getDoctrine()
                     ->getRepository('AppBundle:TUser')
                     ->find($userId);

        if ($user === null) {
          return new View("Aucun user existant pour l'id $userId.", Response::HTTP_NOT_FOUND);
        }
        return array("data" => $user);
    }

    public function notifyUser(TUser $user) {
    }
}
