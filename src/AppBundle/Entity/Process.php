<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Process
 *
 * @ORM\Table(name="process")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProcessRepository")
 */
class Process
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=8)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="city", type="integer", nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="quotation", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $quotation;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return Process
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Process
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Process
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set city
     *
     * @param integer $city
     *
     * @return Process
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set quotation
     *
     * @param string $quotation
     *
     * @return Process
     */
    public function setQuotation($quotation)
    {
        $this->quotation = $quotation;

        return $this;
    }

    /**
     * Get quotation
     *
     * @return string
     */
    public function getQuotation()
    {
        return $this->quotation;
    }
}

