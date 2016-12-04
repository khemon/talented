<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * @Route("/users/getAllUsers", name="user_find_all")
     */
    public function getAllUsersAction()
    {
        $listUsers = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('AppBundle:TUser')
                    ->findAll();

        $finalListUsers = array();

        foreach($listUsers as $user) {
            $finalListUsers[$user->getId()] = $user->getUserAsTable();
        }

        return new JsonResponse(
            array(
                'data' => $finalListUsers
            )
        );

        /*dump($listUsers);

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);*/
    }

    /**
     * @Route("/users/getUserById/{idUser}", name="user_find_id" , requirements={"idUser": "\d+"})
     */
    public function getUserByIdAction($idUser)
    {
        $user = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('AppBundle:TUser')
                     ->find($idUser);

        return new JsonResponse(
            array(
                'data' => $user->getUserAsTable()
            )
        );

        /*dump($user);

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);*/
    }
}