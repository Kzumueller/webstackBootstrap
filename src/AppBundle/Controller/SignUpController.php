<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2018-03-12
 * Time: 10:25 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Account;
use AppBundle\Form\AccountType;
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
     * @Route("/sign-up")
     */
    public function signUp(Request $request): Response {
        $form = $this
            ->createForm(AccountType::class, new Account())
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $account = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($account);
            $entityManager->flush();

            return $this->redirectToRoute('thank-you');
        }

        return $this->render('SignUp/signUp.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/thank-you")
     */
    public function expressGratitude(Request $request): Response {
        return $this->render('SignUp/gratitude.html.twig');
    }
}