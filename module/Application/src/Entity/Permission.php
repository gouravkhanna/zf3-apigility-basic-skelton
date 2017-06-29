<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Application\Entity\Resource;

/**
 * Permission
 *
 * @ORM\Table(name="permission", indexes={@ORM\Index(name="resource_id", columns={"resource_id"})})
 * @ORM\Entity
 */
class Permission {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="permission_name", type="string", length=45, nullable=false)
     */
    private $permissionName;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;
    
    /**
     * @var Resource
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Resource", inversedBy="permission" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resource_id", referencedColumnName="id")
     * })
     */
    private $resource;

    /**
     * @ManyToMany(targetEntity="Role")
     * @JoinTable(name="role_permission",
     *      joinColumns={@JoinColumn(name="permission_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="role_id", referencedColumnName="rid", unique=true)}
     *      )
     * 
     */
    private $role;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set permissionName
     *
     * @param string $permissionName
     *
     * @return Permission
     */
    public function setPermissionName($permissionName) {
        $this->permissionName = $permissionName;

        return $this;
    }

    /**
     * Get permissionName
     *
     * @return string
     */
    public function getPermissionName() {
        return $this->permissionName;
    }

    /**
     * Set resource
     *
     * @param Resource $resource
     *
     * @return Permission
     */
    public function setResource(Resource $resource = null) {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Get resource
     *
     * @return Resource
     */
    public function getResource() {
        return $this->resource;
    }
    
    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return permission
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get $status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
