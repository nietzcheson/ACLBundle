<?php

namespace ACL\ACLBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ACL\ACLBundle\Entity\Roles;
/**
 * Permisos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ACL\ACLBundle\Entity\PermisosRepository")
 */
class Permisos
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
     * @ORM\Column(name="permiso", type="string", length=255)
     */
    private $permiso;

    /**
     * @var string
     *
     * @ORM\Column(name="llave", type="string", length=255)
     */
    private $llave;


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
     * Set permiso
     *
     * @param string $permiso
     * @return Permisos
     */
    public function setPermiso($permiso)
    {
        $this->permiso = $permiso;

        return $this;
    }

    /**
     * Get permiso
     *
     * @return string
     */
    public function getPermiso()
    {
        return $this->permiso;
    }

    /**
     * Set llave
     *
     * @param string $llave
     * @return Permisos
     */
    public function setLlave($llave)
    {
        $this->llave = $llave;

        return $this;
    }

    /**
     * Get llave
     *
     * @return string
     */
    public function getLlave()
    {
        return $this->llave;
    }

}
