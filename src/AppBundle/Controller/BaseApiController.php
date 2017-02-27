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

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
//use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class BaseApiController extends FOSRestController
{
      protected function _checkToken(Request $request) {
         $key = $this->getParameter('secret');
         $token = $request->request->get('st');
         try {
           $decoded = JWT::decode($token, $key, array('HS256'));
         } catch (\Exception $e) {
           //Track issues
           throw new AccessDeniedException('You must be logged in order to access this functionality.');
           //throw $e;
         }
         return $decoded;
      }

      protected function _createToken($data) {
         $key = $this->getParameter('secret');
         $token = JWT::encode($data, $key);
         return $token;
      }
}
?>
