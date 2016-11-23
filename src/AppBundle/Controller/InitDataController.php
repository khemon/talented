<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Faker\Factory;
use Faker\ORM\Doctrine\Populator;

use AppBundle\Entity\TUser as TUser;

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
        $populator->addEntity(TUser::class, 10,
          array(
            'password' => function() use ($generator) { return $generator->regexify('[A-Za-z0-9_@%!]{8}'); },
            'createTime' => null
          )
        );
        $insertedPk = $populator->execute();

        return new JsonResponse(
          array(
            'message'       => 'Db populated.',
            'primary_keys'  => $insertedPk
          )
        );
    }
}
