<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Resource
 *
 * @ORM\Table(name="resource")
 * @ORM\Entity
 */
class Resource
{
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
     * @ORM\Column(name="resource_name", type="string", length=50, nullable=false)
     */
    private $resourceName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

   /**
     * @OneToMany(targetEntity="Permission", mappedBy="resource")
     **/
    private $permission;


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
     * Set resourceName
     *
     * @param string $resourceName
     *
     * @return Resource
     */
    public function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;

        return $this;
    }

    /**
     * Get resourceName
     *
     * @return string
     */
    public function getResourceName()
    {
        return $this->resourceName;
    }
    
    /**
     * Set status
     *
     * @param string $status
     *
     * @return Resource
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
