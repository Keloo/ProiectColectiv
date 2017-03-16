<?php

namespace AppBundle\Entity;

/**
 * DemandType
 */
class DemandType
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;


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
     * @return DemandType
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
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
    /**
     * @var \AppBundle\Entity\Pdf
     */
    private $pdf;


    /**
     * Set pdf
     *
     * @param \AppBundle\Entity\Pdf $pdf
     *
     * @return DemandType
     */
    public function setPdf(\AppBundle\Entity\Pdf $pdf = null)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get pdf
     *
     * @return \AppBundle\Entity\Pdf
     */
    public function getPdf()
    {
        return $this->pdf;
    }
}
