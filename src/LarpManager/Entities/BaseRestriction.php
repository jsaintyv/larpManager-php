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
 * LarpManager\Entities\Restriction
 *
 * @Entity()
 * @Table(name="restriction", indexes={@Index(name="fk_restriction_user1_idx", columns={"auteur_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseRestriction", "extended":"Restriction"})
 */
class BaseRestriction
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=90)
     */
    protected $label;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $creation_date;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $update_date;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="restrictionRelatedByAuteurIds")
     * @JoinColumn(name="auteur_id", referencedColumnName="id", nullable=false)
     */
    protected $userRelatedByAuteurId;

    /**
     * @ManyToMany(targetEntity="User", mappedBy="restrictions")
     */
    protected $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Restriction
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
     * @return \LarpManager\Entities\Restriction
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
     * Set the value of creation_date.
     *
     * @param \DateTime $creation_date
     * @return \LarpManager\Entities\Restriction
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the value of creation_date.
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set the value of update_date.
     *
     * @param \DateTime $update_date
     * @return \LarpManager\Entities\Restriction
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }

    /**
     * Get the value of update_date.
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * Set User entity related by `auteur_id` (many to one).
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Restriction
     */
    public function setUserRelatedByAuteurId(User $user = null)
    {
        $this->userRelatedByAuteurId = $user;

        return $this;
    }

    /**
     * Get User entity related by `auteur_id` (many to one).
     *
     * @return \LarpManager\Entities\User
     */
    public function getUserRelatedByAuteurId()
    {
        return $this->userRelatedByAuteurId;
    }

    /**
     * Add User entity to collection.
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Restriction
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove User entity from collection.
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Restriction
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);

        return $this;
    }

    /**
     * Get User entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __sleep()
    {
        return array('id', 'label', 'creation_date', 'update_date', 'auteur_id');
    }
}