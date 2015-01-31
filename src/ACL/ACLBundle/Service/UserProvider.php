<?php

namespace ACL\ACLBundle\Service;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use ACL\ACLBundle\Service;

class UserProvider extends Controller implements UserProviderInterface
{
  public function loadUserByUsername($username)
  {

    $em = $this->getDoctrine()->getManager()->getRepository("ACLBundle:User");
    $usuario = $em->findOneByUsername($username);

    if ($usuario) {
      $password = $usuario->getPassword();
      $salt = $usuario->getSalt();
      $roles = array("ROLE_ADMIN");

      return new Service\UserEntityService($username, $password, $salt, $roles);
    }

    throw new UsernameNotFoundException(
    sprintf('Username "%s" does not exist.', $username)
  );
}

public function refreshUser(UserInterface $user)
{

  // echo "<pre>";print_r($user);
  // exit();
  if (!$user instanceof Service\UserEntityService) {
    throw new UnsupportedUserException(
    sprintf('Instances of "%s" are not supported.', get_class($user))
    );
  }

return $this->loadUserByUsername($user->getUsername());
}

public function supportsClass($class)
{
  return $class === 'ACL\ACLBundle\Service\UserEntityService';
}
}

?>
