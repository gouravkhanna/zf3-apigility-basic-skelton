<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity
 */
class Role
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rid;

    /**
     * @var string
     *
     * @ORM\Column(name="role_name", type="string", length=45, nullable=false)
     */
    private $roleName;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=100, nullable=false)
     */
    private $status = 'Active';


   /**
     * @ManyToMany(targetEntity="Permission")
     * @JoinTable(name="role_permission",
     *      joinColumns={@JoinColumn(name="role_id", referencedColumnName="rid")},
     *      inverseJoinColumns={@JoinColumn(name="permission_id", referencedColumnName="id", unique=true)}
     *      )
     * */
    private $permission;

    /**
     * Get rid
     *
     * @return integer
     */
    public function getRid()
    {
        return $this->rid;
    }

    /**
     * Set roleName
     *
     * @param string $roleName
     *
     * @return Role
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;

        return $this;
    }

    /**
     * Get roleName
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->roleName;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Role
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    public function getPermission() {
        return $this->permission;
    }

    public function setPermission($permission) {
        $this->permission = $permission;
    }


}
