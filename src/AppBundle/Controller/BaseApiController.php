<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use Firebase\JWT\JWT;

abstract class BaseApiController extends FOSRestController
{
      protected function _checkToken($token) {
         $key = $this->getParameter('key');
         $decoded = JWT::decode($token, $key, array('HS256'));
      }

      protected function _createToken($data) {
         $key = $this->getParameter('key');
         $token = JWT::encode($data, $key);
      }
}
?>
