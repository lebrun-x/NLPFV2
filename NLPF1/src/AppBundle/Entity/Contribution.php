<?php
/**
 * Created by PhpStorm.
 * User: supercanard
 * Date: 08/01/17
 * Time: 10:07
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contribution")
 */
class Contribution
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $contribution_id;

    /**
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * Many Contributions have One Compensation.
     * @ORM\ManyToOne(targetEntity="Compensation")
     * @ORM\JoinColumn(name="compensation_id", referencedColumnName="id")
     */
    private $ref_compensation_id;

    /**
     * Many Contributions have One User.
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $ref_user_id;

    /**
     * Get contributionId
     *
     * @return integer
     */
    public function getContributionId()
    {
        return $this->contribution_id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Contribution
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
     * Set refCompensationId
     *
     * @param \AppBundle\Entity\Compensation $refCompensationId
     *
     * @return Contribution
     */
    public function setRefCompensationId(\AppBundle\Entity\Compensation $refCompensationId = null)
    {
        $this->ref_compensation_id = $refCompensationId;

        return $this;
    }

    /**
     * Get refCompensationId
     *
     * @return \AppBundle\Entity\Compensation
     */
    public function getRefCompensationId()
    {
        return $this->ref_compensation_id;
    }

    /**
     * Set refUserId
     *
     * @param \AppBundle\Entity\User $refUserId
     *
     * @return Contribution
     */
    public function setRefUserId(\AppBundle\Entity\User $refUserId = null)
    {
        $this->ref_user_id = $refUserId;

        return $this;
    }

    /**
     * Get refUserId
     *
     * @return \AppBundle\Entity\User
     */
    public function getRefUserId()
    {
        return $this->ref_user_id;
    }
}
