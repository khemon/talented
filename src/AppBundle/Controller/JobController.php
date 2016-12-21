<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

use AppBundle\Entity\TJob as TJob;

class JobController extends FOSRestController
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
    public function addJobAction()
    {
        
    }

}
