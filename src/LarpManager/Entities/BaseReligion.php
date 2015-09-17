<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-09-14 09:22:58.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Religion
 *
 * @Entity()
 * @Table(name="religion", indexes={@Index(name="fk_religion_topic1_idx", columns={"topic_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseReligion", "extended":"Religion"})
 */
class BaseReligion
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=45)
     */
    protected $label;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @OneToMany(targetEntity="PersonnageReligion", mappedBy="religion")
     * @JoinColumn(name="id", referencedColumnName="religion_id")
     */
    protected $personnageReligions;

    /**
     * @ManyToOne(targetEntity="Topic", inversedBy="religions")
     * @JoinColumn(name="topic_id", referencedColumnName="id")
     */
    protected $topic;

    public function __construct()
    {
        $this->personnageReligions = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Religion
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
     * @return \LarpManager\Entities\Religion
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
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Religion
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add PersonnageReligion entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageReligion $personnageReligion
     * @return \LarpManager\Entities\Religion
     */
    public function addPersonnageReligion(PersonnageReligion $personnageReligion)
    {
        $this->personnageReligions[] = $personnageReligion;

        return $this;
    }

    /**
     * Remove PersonnageReligion entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageReligion $personnageReligion
     * @return \LarpManager\Entities\Religion
     */
    public function removePersonnageReligion(PersonnageReligion $personnageReligion)
    {
        $this->personnageReligions->removeElement($personnageReligion);

        return $this;
    }

    /**
     * Get PersonnageReligion entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnageReligions()
    {
        return $this->personnageReligions;
    }

    /**
     * Set Topic entity (many to one).
     *
     * @param \LarpManager\Entities\Topic $topic
     * @return \LarpManager\Entities\Religion
     */
    public function setTopic(Topic $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get Topic entity (many to one).
     *
     * @return \LarpManager\Entities\Topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    public function __sleep()
    {
        return array('id', 'label', 'description', 'topic_id');
    }
}