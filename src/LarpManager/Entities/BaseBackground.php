<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-10-01 07:20:04.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Background
 *
 * @Entity()
 * @Table(name="background")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseBackground", "extended":"Background"})
 */
class BaseBackground
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="`public`", type="text", nullable=true)
     */
    protected $public;

    /**
     * @Column(name="`owner`", type="text", nullable=true)
     */
    protected $owner;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $private;

    /**
     * @OneToMany(targetEntity="Personnage", mappedBy="background")
     * @JoinColumn(name="id", referencedColumnName="background_id")
     */
    protected $personnages;

    /**
     * @OneToMany(targetEntity="Territoire", mappedBy="background")
     * @JoinColumn(name="id", referencedColumnName="background_id")
     */
    protected $territoires;

    public function __construct()
    {
        $this->personnages = new ArrayCollection();
        $this->territoires = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Background
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
     * Set the value of public.
     *
     * @param string $public
     * @return \LarpManager\Entities\Background
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get the value of public.
     *
     * @return string
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set the value of owner.
     *
     * @param string $owner
     * @return \LarpManager\Entities\Background
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get the value of owner.
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set the value of private.
     *
     * @param string $private
     * @return \LarpManager\Entities\Background
     */
    public function setPrivate($private)
    {
        $this->private = $private;

        return $this;
    }

    /**
     * Get the value of private.
     *
     * @return string
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * Add Personnage entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Background
     */
    public function addPersonnage(Personnage $personnage)
    {
        $this->personnages[] = $personnage;

        return $this;
    }

    /**
     * Remove Personnage entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Background
     */
    public function removePersonnage(Personnage $personnage)
    {
        $this->personnages->removeElement($personnage);

        return $this;
    }

    /**
     * Get Personnage entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnages()
    {
        return $this->personnages;
    }

    /**
     * Add Territoire entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Territoire $territoire
     * @return \LarpManager\Entities\Background
     */
    public function addTerritoire(Territoire $territoire)
    {
        $this->territoires[] = $territoire;

        return $this;
    }

    /**
     * Remove Territoire entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Territoire $territoire
     * @return \LarpManager\Entities\Background
     */
    public function removeTerritoire(Territoire $territoire)
    {
        $this->territoires->removeElement($territoire);

        return $this;
    }

    /**
     * Get Territoire entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTerritoires()
    {
        return $this->territoires;
    }

    public function __sleep()
    {
        return array('id', 'public', 'owner', 'private');
    }
}