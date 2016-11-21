<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Faker\Factory;
use Faker\ORM\Doctrine\Populator;

class InitDataController extends Controller
{
    /**
     * @Route("/init_testing_data", name="creating_testingData")
     */
    public function createTestingDataAction(Request $request)
    {
        //Init Faker
        $generator = Factory::create();
        //Mapping it to Doctrine
        $populator = new Populator($generator);

    }
}
