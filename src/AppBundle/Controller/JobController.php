<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

use AppBundle\Entity\TJob as TJob;
use AppBundle\Entity\TTalent as TTalent;
use AppBundle\Entity\TUser as TUser;

class JobController extends BaseApiController
{
    /**
     * @Rest\Get("/jobs/active")
     */
    public function getActiveJobsAction()
    {
        $listJobs = $this->getDoctrine()
                         ->getRepository('AppBundle:TJob')
                         ->findActiveJobs();

        if ($listJobs === null) {
          return new View("Aucun job actif en base de donnees.", Response::HTTP_NOT_FOUND);
        }

        return array("data" => $listJobs);
    }

    /**
     * @Rest\Get("/jobs")
     */
    public function getJobsAction() {
        $listJobs = $this->getDoctrine()
                         ->getRepository('AppBundle:TJob')
                         ->findAll();

        if ($listJobs === null) {
          return new View("Aucun job en base de donnees.", Response::HTTP_NOT_FOUND);
        }

        return array("data" => $listJobs);
    }

    /**
     * @Rest\Post("/job")
     */
    public function addJobAction(Request $request)
    {
      $jobData = $request->getContent();

      $serializer = $this->get('serializer');
      $jobEntity = $serializer->deserialize($jobData, 'AppBundle\Entity\TJob','json');

      //Récupération du Talent
      $talentId = $request->request->get('talent_id');
      $talent = $this->getDoctrine()
                     ->getRepository('AppBundle:TTalent')
                     ->find($talentId);

      //Récupération du User (Owner du job)
      $ownerId =  $request->request->get('owner_id');
      $owner = $this->getDoctrine()
                   ->getRepository('AppBundle:TUser')
                   ->find($ownerId);

      //Ajout des entites au job
      $jobEntity->setTalent($talent);
      $jobEntity->setOwner($owner);

      // tells Doctrine you want to (eventually) save the Job (no queries yet)
      $this->getDoctrine()->getEntityManager()->persist($jobEntity);

      // actually executes the queries (i.e. the INSERT query)
      $this->getDoctrine()->getEntityManager()->flush();
    }

}
