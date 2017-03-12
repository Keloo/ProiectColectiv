<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseModel;

/**
 * User
 */
class User extends BaseModel
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $workLogs;

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
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add workLog
     *
     * @param \AppBundle\Entity\WorkLog $workLog
     *
     * @return User
     */
    public function addWorkLog(\AppBundle\Entity\WorkLog $workLog)
    {
        $this->workLogs[] = $workLog;

        return $this;
    }

    /**
     * Remove workLog
     *
     * @param \AppBundle\Entity\WorkLog $workLog
     */
    public function removeWorkLog(\AppBundle\Entity\WorkLog $workLog)
    {
        $this->workLogs->removeElement($workLog);
    }

    /**
     * Get workLogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorkLogs()
    {
        return $this->workLogs;
    }
    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $phone;


    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $demands;


    /**
     * Add demand
     *
     * @param \AppBundle\Entity\Demand $demand
     *
     * @return User
     */
    public function addDemand(\AppBundle\Entity\Demand $demand)
    {
        $this->demands[] = $demand;

        return $this;
    }

    /**
     * Remove demand
     *
     * @param \AppBundle\Entity\Demand $demand
     */
    public function removeDemand(\AppBundle\Entity\Demand $demand)
    {
        $this->demands->removeElement($demand);
    }

    /**
     * Get demands
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDemands()
    {
        return $this->demands;
    }
}
