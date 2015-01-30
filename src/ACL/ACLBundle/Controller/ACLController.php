<?php

namespace ACL\ACLBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use ACL\ACLBundle;

class ACLController extends Controller
{
  public function indexAction($name)
  {
    return $this->render('ACLBundle:Default:index.html.twig', array('name' => $name));
  }

  public function newAction()
  {
    $user = new User();

    $user->setUsername("cristianangulonova");

    $factory = $this->get('security.encoder_factory');
    $encoder = $factory->getEncoder($user);

    $user->setPassword($encoder->encodePassword('foo', $user->getSalt()));
    $user->setEmail("cristianangulonova@gmail.com");
    $user->setIsActive(1);

    $em = $this->getDoctrine()->getManager();
    $em->persist($user);
    $em->flush();

    return new Response('Se ha creado el usuario id: '.$user->getId());
  }

  public function perfilAction()
  {
    $user = $this->get('security.context')->getToken()->getUser();

    return $this->render('ACLBundle:ACL:perfil.html.twig');
  }

  public function loginAction(Request $request)
  {
    $session = $request->getSession();

    // get the login error if there is one
    if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
      $error = $request->attributes->get(
      SecurityContext::AUTHENTICATION_ERROR
    );
  } else {
    $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
    $session->remove(SecurityContext::AUTHENTICATION_ERROR);
  }

  return $this->render(
  'ACLBundle:ACL:login.html.twig',
  array(
    // last username entered by the user
    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
    'error'         => $error,
    )
  );
}
}
