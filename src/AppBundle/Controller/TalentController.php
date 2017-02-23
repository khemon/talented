<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

use AppBundle\Entity\TUser as TUser;
use AppBundle\Entity\TTalent as TTalent;

class TalentController extends BaseApiController
{
   /**
    * @Rest\Get("/talents")
    */
    public function getTalentsAction()
    {
        $listTalents = $this->getDoctrine()
                          ->getRepository('AppBundle:TTalent')
                          ->findAll();

        if ($listTalents === null) {
          return new View("Aucun talent en base de donnees.", Response::HTTP_NOT_FOUND);
        }

        return array("data" => $listTalents);
    }

    /**
     * @Rest\Get("/talents/{talentId}/users")
     */
    public function getTalentUsersAction($talentId)
    {
        $talent = $this->getDoctrine()
                      ->getRepository('AppBundle:TTalent')
                      ->find($talentId);

        if ($talent === null) {
          return new View("Aucun talent trouve avec l'id $talentId.", Response::HTTP_NOT_FOUND);
        }

        return array("data" => $talent->getUser());
    }
}
