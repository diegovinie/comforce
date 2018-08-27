<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="cities")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CityRepository")
 */
class City
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
     * @ORM\Column(name="name", type="string", length=32)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Process", mappedBy="city")
     */
    private $processes;


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
     * Set name
     *
     * @param string $name
     *
     * @return City
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
     * Constructor
     */
    public function __construct()
    {
        $this->processes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add process
     *
     * @param \AppBundle\Entity\Process $process
     *
     * @return City
     */
    public function addProcess(\AppBundle\Entity\Process $process)
    {
        $this->processes[] = $process;

        return $this;
    }

    /**
     * Remove process
     *
     * @param \AppBundle\Entity\Process $process
     */
    public function removeProcess(\AppBundle\Entity\Process $process)
    {
        $this->processes->removeElement($process);
    }

    /**
     * Get processes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProcesses()
    {
        return $this->processes;
    }

    /**
     * Devuelve el nombre de la entidad
     */
    public function __toString()
    {
        return $this->getName();
    }
}
