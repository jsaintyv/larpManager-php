<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-09-08 21:09:51.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\ExperienceGain
 *
 * @Entity()
 * @Table(name="experience_gain", indexes={@Index(name="fk_experience_gain_personnage1_idx", columns={"personnage_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseExperienceGain", "extended":"ExperienceGain"})
 */
class BaseExperienceGain
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=100)
     */
    protected $explanation;

    /**
     * @Column(type="datetime")
     */
    protected $operation_date;

    /**
     * @Column(type="integer")
     */
    protected $xp_gain;

    /**
     * @ManyToOne(targetEntity="Personnage", inversedBy="experienceGains")
     * @JoinColumn(name="personnage_id", referencedColumnName="id")
     */
    protected $personnage;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\ExperienceGain
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of explanation.
     *
     * @param string $explanation
     * @return \LarpManager\Entities\ExperienceGain
     */
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;

        return $this;
    }

    /**
     * Get the value of explanation.
     *
     * @return string
     */
    public function getExplanation()
    {
        return $this->explanation;
    }

    /**
     * Set the value of operation_date.
     *
     * @param \DateTime $operation_date
     * @return \LarpManager\Entities\ExperienceGain
     */
    public function setOperationDate($operation_date)
    {
        $this->operation_date = $operation_date;

        return $this;
    }

    /**
     * Get the value of operation_date.
     *
     * @return \DateTime
     */
    public function getOperationDate()
    {
        return $this->operation_date;
    }

    /**
     * Set the value of xp_gain.
     *
     * @param integer $xp_gain
     * @return \LarpManager\Entities\ExperienceGain
     */
    public function setXpGain($xp_gain)
    {
        $this->xp_gain = $xp_gain;

        return $this;
    }

    /**
     * Get the value of xp_gain.
     *
     * @return integer
     */
    public function getXpGain()
    {
        return $this->xp_gain;
    }

    /**
     * Set Personnage entity (many to one).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\ExperienceGain
     */
    public function setPersonnage(Personnage $personnage = null)
    {
        $this->personnage = $personnage;

        return $this;
    }

    /**
     * Get Personnage entity (many to one).
     *
     * @return \LarpManager\Entities\Personnage
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }

    public function __sleep()
    {
        return array('id', 'explanation', 'operation_date', 'xp_gain', 'personnage_id');
    }
}