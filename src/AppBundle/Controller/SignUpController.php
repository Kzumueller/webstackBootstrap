<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2018-03-12
 * Time: 10:25 PM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller handling sign up process
 * @package AppBundle\Controller
 */
class SignUpController extends Controller {

    /**
     * @param Request $request
     * @return Response
     * @Route("/sign-up", name="test")
     */
    public function signUpAction(Request $request): Response {
        return $this->render('SignUp/signUp.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/thank-you")
     */
    public function expressGratitude(Request $request): Response {

    }
}