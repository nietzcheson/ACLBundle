<?php

namespace ACL\ACLBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    * Constructor
    */
    public function __construct()
    {
      $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
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
}
