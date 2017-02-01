<?php
namespace AppBundle\Controller;
use CrEOF\Spatial\PHP\Types\Geometry\Point;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;
use Faker\ORM\Doctrine\Populator;
use AppBundle\Entity\TUser as TUser;
use AppBundle\Entity\TTalent as TTalent;
use AppBundle\Entity\TJob as TJob;
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
        $populator->addEntity(TTalent::class,5,
            array('name' => function() use ($generator) { return $generator->randomElement($array = array ('Ménage',
                'Déménagement','Bricolage','Livraison','Baby-Sitting')); },
                'description' => function() use ($generator) { return $generator->text ; }
            )
        );
        //Insertion des Users
        $populator->addEntity(TUser::class, 20,
          array(
              'password' => function() use ($generator) { return $generator->regexify('[A-Za-z0-9_@%!]{8}');},
              'location' => function() use ($generator) { return new Point(array( 'x' => $generator->longitude(48.800001,48.900001),'y' => $generator->latitude(2.240001,2.4199999)));}
          )
        );
        //Insertion des Jobs
        $populator->addEntity(TJob::class, 20, array(
            'address1' => function() use ($generator) { return $generator->streetAddress();},
            'address2' => null,
            'address3' => function() use ($generator) { return $generator->city();},
            'postalCode' => function() use ($generator) { return $generator->postcode();},
            'location' => function() use ($generator) { return new Point(array( 'x' => $generator->longitude(48.800001,48.900001),'y' => $generator->latitude(2.240001,2.4199999)));}
        ));
        $insertedPk = $populator->execute();
        $data =
            array(  'data' =>
                array(  'message'       => 'Db populated.',
                        'primary_keys'  => $insertedPk)
            );
        return new JsonResponse($data);
    }
}
