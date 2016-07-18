<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-07-17 22:01:08.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\PersonnageLangues
 *
 * @Entity()
 * @Table(name="personnage_langues", indexes={@Index(name="fk_personnage_langues_personnage1_idx", columns={"personnage_id"}), @Index(name="fk_personnage_langues_langue1_idx", columns={"langue_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePersonnageLangues", "extended":"PersonnageLangues"})
 */
class BasePersonnageLangues
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="`source`", type="string", length=45)
     */
    protected $source;

    /**
     * @ManyToOne(targetEntity="Personnage", inversedBy="personnageLangues")
     * @JoinColumn(name="personnage_id", referencedColumnName="id", nullable=false)
     */
    protected $personnage;

    /**
     * @ManyToOne(targetEntity="Langue", inversedBy="personnageLangues")
     * @JoinColumn(name="langue_id", referencedColumnName="id", nullable=false)
     */
    protected $langue;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\PersonnageLangues
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
     * Set the value of source.
     *
     * @param string $source
     * @return \LarpManager\Entities\PersonnageLangues
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get the value of source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set Personnage entity (many to one).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\PersonnageLangues
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

    /**
     * Set Langue entity (many to one).
     *
     * @param \LarpManager\Entities\Langue $langue
     * @return \LarpManager\Entities\PersonnageLangues
     */
    public function setLangue(Langue $langue = null)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get Langue entity (many to one).
     *
     * @return \LarpManager\Entities\Langue
     */
    public function getLangue()
    {
        return $this->langue;
    }

    public function __sleep()
    {
        return array('id', 'personnage_id', 'langue_id', 'source');
    }
}