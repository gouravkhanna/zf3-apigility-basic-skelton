<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * State
 *
 * @ORM\Table(name="state")
 * @ORM\Entity
 */
class State
{
    /**
     * @var integer
     *
     * @ORM\Column(name="state_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stateId;

    /**
     * @var string
     *
     * @ORM\Column(name="state_name", type="string", length=255, nullable=false)
     */
    private $stateName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="state_code", type="string", length=2, nullable=true)
     */
    private $stateCode;



    /**
     * Get stateId
     *
     * @return integer
     */
    public function getStateId()
    {
        return $this->stateId;
    }

    /**
     * Set stateName
     *
     * @param string $stateName
     *
     * @return State
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;

        return $this;
    }

    /**
     * Get stateName
     *
     * @return string
     */
    public function getStateName()
    {
        return $this->stateName;
    }
    
    /**
     * Set stateCode
     *
     * @param string $stateCode
     *
     * @return State
     */
    public function setStateCode($stateCode)
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    /**
     * Get stateCode
     *
     * @return string
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }
}
