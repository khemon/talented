<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Faker\Factory;
use Faker\ORM\Doctrine\Populator;

use AppBundle\Entity\TUser;

class InitDataController extends Controller
{
    /**
     * @Route("/test/init_testing_data", name="creating_testing_data")
     */
    public function createTestingDataAction()
    {
        //Init Faker en Francais
        $generator = Factory::create('fr_FR');
        $entityManager = $this->getDoctrine()->getManager();
        //Mapping it to Doctrine
        $populator = new Populator($generator, $entityManager);
        $populator->addEntity('AppBundle\Entity\TUser', 10);
        $insertedPk = $populator->execute();

        return new JsonResponse(
          array(
            'message'       => 'Db populated.',
            'primary_keys'  => $insertedPk
          )
        );
    }
}
