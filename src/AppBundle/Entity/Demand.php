<?php

namespace AppBundle\Entity;

/**
 * Demand
 */
class Demand
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $message;

    /**
     * @var \AppBundle\Entity\DemandType
     */
    private $demandType;


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
     * Set message
     *
     * @param string $message
     *
     * @return Demand
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set demandType
     *
     * @param \AppBundle\Entity\DemandType $demandType
     *
     * @return Demand
     */
    public function setDemandType(\AppBundle\Entity\DemandType $demandType = null)
    {
        $this->demandType = $demandType;

        return $this;
    }

    /**
     * Get demandType
     *
     * @return \AppBundle\Entity\DemandType
     */
    public function getDemandType()
    {
        return $this->demandType;
    }
}
