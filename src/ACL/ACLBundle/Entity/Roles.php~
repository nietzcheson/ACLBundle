<?php

namespace ACL\ACLBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Roles
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ACL\ACLBundle\Entity\RolesRepository")
 */
class Roles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;


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
     * Set role
     *
     * @param string $role
     * @return Roles
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
    * @ORM\ManyToMany(targetEntity="Permisos", cascade={"persist"})
    * @ORM\JoinTable(name="roles_permisos",
    *      joinColumns={@ORM\JoinColumn(name="permiso_id", referencedColumnName="id")},
    *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
    *      )
    **/
    private $permisos;

    /**
    * @ORM\OneToMany(targetEntity="User", mappedBy="role")
    */
    protected $users;

    public function __construct()
    {
      $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
      $this->users = new ArrayCollection();
    }

    /**
     * Add permisos
     *
     * @param \ACL\ACLBundle\Entity\Permisos $permisos
     * @return Roles
     */
    public function addPermiso(\ACL\ACLBundle\Entity\Permisos $permisos)
    {
        $this->permisos[] = $permisos;

        return $this;
    }

    /**
     * Remove permisos
     *
     * @param \ACL\ACLBundle\Entity\Permisos $permisos
     */
    public function removePermiso(\ACL\ACLBundle\Entity\Permisos $permisos)
    {
        $this->permisos->removeElement($permisos);
    }

    /**
     * Get permisos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Add users
     *
     * @param \ACL\ACLBundle\Entity\User $users
     * @return Roles
     */
    public function addUser(\ACL\ACLBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \ACL\ACLBundle\Entity\User $users
     */
    public function removeUser(\ACL\ACLBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
