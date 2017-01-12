<?php
/**
 * Created by PhpStorm.
 * User: supercanard
 * Date: 08/01/17
 * Time: 10:05
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="compensation")
 */
class Compensation
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $compensation_id;

    /**
     * @ORM\Column(name="name", type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\Column(name="amount", type="decimal", scale=2)
     */
    private $amount;

    /**
     * Many Compensations have One Project.
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $ref_project_id;

    /**
     * Get compensationId
     *
     * @return integer
     */
    public function getCompensationId()
    {
        return $this->compensation_id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Compensation
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
     * Set description
     *
     * @param string $description
     *
     * @return Compensation
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
     * Set amount
     *
     * @param string $amount
     *
     * @return Compensation
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set refProjectId
     *
     * @param \AppBundle\Entity\Project $refProjectId
     *
     * @return Compensation
     */
    public function setRefProjectId(\AppBundle\Entity\Project $refProjectId = null)
    {
        $this->ref_project_id = $refProjectId;

        return $this;
    }

    /**
     * Get refProjectId
     *
     * @return \AppBundle\Entity\Project
     */
    public function getRefProjectId()
    {
        return $this->ref_project_id;
    }
}
