<?php

namespace ACL\ACLBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;


/**
* ACL\ACLBundle\Entity\Usuarios
*
* @ORM\Table(name="Usuarios")
* @ORM\Entity(repositoryClass="ACL\ACLBundle\Entity\UsuariosRepository")
*/
class Usuarios implements UserInterface
{
  /**
  * @ORM\Column(type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=25, unique=true)
  */
  private $username;

  /**
  * @ORM\Column(type="string", length=32)
  */
  private $salt;

  /**
  * @ORM\Column(type="string", length=40)
  */
  private $password;

  /**
  * @ORM\Column(type="string", length=60, unique=true)
  */
  private $email;

  /**
  * @ORM\Column(name="is_active", type="boolean")
  */
  private $isActive;

  /**
  * @ORM\ManyToMany(targetEntity="Roles", inversedBy="usuarios")
  *
  */
  private $roles;

  public function __construct()
  {
    $this->isActive = true;
    $this->salt = md5(uniqid(null, true));
    $this->roles = new ArrayCollection();
  }

  /**
  * @inheritDoc
  */
  public function getUsername()
  {
    return $this->username;
  }

  /**
  * @inheritDoc
  */
  public function getSalt()
  {
    return $this->salt;
  }

  /**
  * @inheritDoc
  */
  public function getPassword()
  {
    return $this->password;
  }

  /**
  * @inheritDoc
  */
  public function getRoles()
  {
    return $this->roles->toArray();
  }

  /**
  * @inheritDoc
  */
  public function eraseCredentials()
  {
  }

  public function isEqualTo(UserInterface $user)
  {
    return $this->username === $user->getUsername();
  }

  public function isAccountNonExpired()
  {
    return true;
  }

  public function isAccountNonLocked()
  {
    return true;
  }

  public function isCredentialsNonExpired()
  {
    return true;
  }

  public function isEnabled()
  {
    return $this->isActive;
  }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuarios
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuarios
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuarios
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuarios
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Usuarios
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add roles
     *
     * @param \ACL\ACLBundle\Entity\Roles $roles
     * @return Usuarios
     */
    public function addRole(\ACL\ACLBundle\Entity\Roles $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \ACL\ACLBundle\Entity\Roles $roles
     */
    public function removeRole(\ACL\ACLBundle\Entity\Roles $roles)
    {
        $this->roles->removeElement($roles);
    }
}
