<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-07-04 11:25:50.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Ressource
 *
 * @Entity()
 * @Table(name="ressource", indexes={@Index(name="fk_ressource_rarete1_idx", columns={"rarete_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseRessource", "extended":"Ressource"})
 */
class BaseRessource
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
    protected $label;

    /**
     * @OneToMany(targetEntity="GroupeHasRessource", mappedBy="ressource")
     * @JoinColumn(name="id", referencedColumnName="ressource_id", nullable=false)
     */
    protected $groupeHasRessources;

    /**
     * @OneToMany(targetEntity="PersonnageRessource", mappedBy="ressource")
     * @JoinColumn(name="id", referencedColumnName="ressource_id", nullable=false)
     */
    protected $personnageRessources;

    /**
     * @ManyToOne(targetEntity="Rarete", inversedBy="ressources")
     * @JoinColumn(name="rarete_id", referencedColumnName="id", nullable=false)
     */
    protected $rarete;

    public function __construct()
    {
        $this->groupeHasRessources = new ArrayCollection();
        $this->personnageRessources = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Ressource
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
     * Set the value of label.
     *
     * @param string $label
     * @return \LarpManager\Entities\Ressource
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Add GroupeHasRessource entity to collection (one to many).
     *
     * @param \LarpManager\Entities\GroupeHasRessource $groupeHasRessource
     * @return \LarpManager\Entities\Ressource
     */
    public function addGroupeHasRessource(GroupeHasRessource $groupeHasRessource)
    {
        $this->groupeHasRessources[] = $groupeHasRessource;

        return $this;
    }

    /**
     * Remove GroupeHasRessource entity from collection (one to many).
     *
     * @param \LarpManager\Entities\GroupeHasRessource $groupeHasRessource
     * @return \LarpManager\Entities\Ressource
     */
    public function removeGroupeHasRessource(GroupeHasRessource $groupeHasRessource)
    {
        $this->groupeHasRessources->removeElement($groupeHasRessource);

        return $this;
    }

    /**
     * Get GroupeHasRessource entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupeHasRessources()
    {
        return $this->groupeHasRessources;
    }

    /**
     * Add PersonnageRessource entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageRessource $personnageRessource
     * @return \LarpManager\Entities\Ressource
     */
    public function addPersonnageRessource(PersonnageRessource $personnageRessource)
    {
        $this->personnageRessources[] = $personnageRessource;

        return $this;
    }

    /**
     * Remove PersonnageRessource entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageRessource $personnageRessource
     * @return \LarpManager\Entities\Ressource
     */
    public function removePersonnageRessource(PersonnageRessource $personnageRessource)
    {
        $this->personnageRessources->removeElement($personnageRessource);

        return $this;
    }

    /**
     * Get PersonnageRessource entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnageRessources()
    {
        return $this->personnageRessources;
    }

    /**
     * Set Rarete entity (many to one).
     *
     * @param \LarpManager\Entities\Rarete $rarete
     * @return \LarpManager\Entities\Ressource
     */
    public function setRarete(Rarete $rarete = null)
    {
        $this->rarete = $rarete;

        return $this;
    }

    /**
     * Get Rarete entity (many to one).
     *
     * @return \LarpManager\Entities\Rarete
     */
    public function getRarete()
    {
        return $this->rarete;
    }

    public function __sleep()
    {
        return array('id', 'label', 'rarete_id');
    }
}