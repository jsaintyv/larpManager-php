<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-02-09 11:20:18.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\IntrigueHasObjectif
 *
 * @Entity()
 * @Table(name="intrigue_has_objectif", indexes={@Index(name="fk_intrigue_has_objectif_objectif1_idx", columns={"objectif_id"}), @Index(name="fk_intrigue_has_objectif_intrigue1_idx", columns={"intrigue_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseIntrigueHasObjectif", "extended":"IntrigueHasObjectif"})
 */
class BaseIntrigueHasObjectif
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned":true})
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Intrigue", inversedBy="intrigueHasObjectifs", cascade={"persist", "remove"})
     * @JoinColumn(name="intrigue_id", referencedColumnName="id", nullable=false)
     */
    protected $intrigue;

    /**
     * @ManyToOne(targetEntity="Objectif", inversedBy="intrigueHasObjectifs", cascade={"persist", "remove"})
     * @JoinColumn(name="objectif_id", referencedColumnName="id", nullable=false)
     */
    protected $objectif;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\IntrigueHasObjectif
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
     * Set Intrigue entity (many to one).
     *
     * @param \LarpManager\Entities\Intrigue $intrigue
     * @return \LarpManager\Entities\IntrigueHasObjectif
     */
    public function setIntrigue(Intrigue $intrigue = null)
    {
        $this->intrigue = $intrigue;

        return $this;
    }

    /**
     * Get Intrigue entity (many to one).
     *
     * @return \LarpManager\Entities\Intrigue
     */
    public function getIntrigue()
    {
        return $this->intrigue;
    }

    /**
     * Set Objectif entity (many to one).
     *
     * @param \LarpManager\Entities\Objectif $objectif
     * @return \LarpManager\Entities\IntrigueHasObjectif
     */
    public function setObjectif(Objectif $objectif = null)
    {
        $this->objectif = $objectif;

        return $this;
    }

    /**
     * Get Objectif entity (many to one).
     *
     * @return \LarpManager\Entities\Objectif
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    public function __sleep()
    {
        return array('id', 'intrigue_id', 'objectif_id');
    }
}