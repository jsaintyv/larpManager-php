<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-03-14 16:05:44.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\PersonnagesReligions
 *
 * @Entity()
 * @Table(name="personnages_religions", indexes={@Index(name="fk_personnage_religion_religion1_idx", columns={"religion_id"}), @Index(name="fk_personnage_religion_religion_level1_idx", columns={"religion_level_id"}), @Index(name="fk_personnages_religions_personnage1_idx", columns={"personnage_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePersonnagesReligions", "extended":"PersonnagesReligions"})
 */
class BasePersonnagesReligions
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Religion", inversedBy="personnagesReligions")
     * @JoinColumn(name="religion_id", referencedColumnName="id", nullable=false)
     */
    protected $religion;

    /**
     * @ManyToOne(targetEntity="ReligionLevel", inversedBy="personnagesReligions")
     * @JoinColumn(name="religion_level_id", referencedColumnName="id", nullable=false)
     */
    protected $religionLevel;

    /**
     * @ManyToOne(targetEntity="Personnage", inversedBy="personnagesReligions")
     * @JoinColumn(name="personnage_id", referencedColumnName="id", nullable=false)
     */
    protected $personnage;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\PersonnagesReligions
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
     * Set Religion entity (many to one).
     *
     * @param \LarpManager\Entities\Religion $religion
     * @return \LarpManager\Entities\PersonnagesReligions
     */
    public function setReligion(Religion $religion = null)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * Get Religion entity (many to one).
     *
     * @return \LarpManager\Entities\Religion
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * Set ReligionLevel entity (many to one).
     *
     * @param \LarpManager\Entities\ReligionLevel $religionLevel
     * @return \LarpManager\Entities\PersonnagesReligions
     */
    public function setReligionLevel(ReligionLevel $religionLevel = null)
    {
        $this->religionLevel = $religionLevel;

        return $this;
    }

    /**
     * Get ReligionLevel entity (many to one).
     *
     * @return \LarpManager\Entities\ReligionLevel
     */
    public function getReligionLevel()
    {
        return $this->religionLevel;
    }

    /**
     * Set Personnage entity (many to one).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\PersonnagesReligions
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
        return array('id', 'religion_id', 'religion_level_id', 'personnage_id');
    }
}