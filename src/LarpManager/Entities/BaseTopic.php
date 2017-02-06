<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-02-06 11:59:52.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Topic
 *
 * @Entity()
 * @Table(name="topic", indexes={@Index(name="fk_topic_topic1_idx", columns={"topic_id"}), @Index(name="fk_topic_user1_idx", columns={"user_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseTopic", "extended":"Topic"})
 */
class BaseTopic
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=450)
     */
    protected $title;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $creation_date;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $update_date;

    /**
     * @Column(name="`right`", type="string", length=45, nullable=true)
     */
    protected $right;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $object_id;

    /**
     * @Column(name="`key`", type="string", length=45, nullable=true)
     */
    protected $key;

    /**
     * @OneToMany(targetEntity="Gn", mappedBy="topic", cascade={"persist"})
     * @JoinColumn(name="id", referencedColumnName="topic_id", nullable=false)
     */
    protected $gns;

    /**
     * @OneToMany(targetEntity="Groupe", mappedBy="topic")
     * @JoinColumn(name="id", referencedColumnName="topic_id", nullable=false)
     */
    protected $groupes;

    /**
     * @OneToMany(targetEntity="Post", mappedBy="topic")
     * @JoinColumn(name="id", referencedColumnName="topic_id", nullable=false)
     */
    protected $posts;

    /**
     * @OneToMany(targetEntity="Religion", mappedBy="topic")
     * @JoinColumn(name="id", referencedColumnName="topic_id", nullable=false)
     */
    protected $religions;

    /**
     * @OneToMany(targetEntity="SecondaryGroup", mappedBy="topic")
     * @JoinColumn(name="id", referencedColumnName="topic_id", nullable=false)
     */
    protected $secondaryGroups;

    /**
     * @OneToMany(targetEntity="Territoire", mappedBy="topic")
     * @JoinColumn(name="id", referencedColumnName="topic_id", nullable=false)
     */
    protected $territoires;

    /**
     * @OneToMany(targetEntity="Topic", mappedBy="topic")
     * @JoinColumn(name="id", referencedColumnName="topic_id", nullable=false)
     */
    protected $topics;

    /**
     * @ManyToOne(targetEntity="Topic", inversedBy="topics")
     * @JoinColumn(name="topic_id", referencedColumnName="id")
     */
    protected $topic;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="topics")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    public function __construct()
    {
        $this->gns = new ArrayCollection();
        $this->groupes = new ArrayCollection();
        $this->posts = new ArrayCollection();
        $this->religions = new ArrayCollection();
        $this->secondaryGroups = new ArrayCollection();
        $this->territoires = new ArrayCollection();
        $this->topics = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Topic
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
     * Set the value of title.
     *
     * @param string $title
     * @return \LarpManager\Entities\Topic
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Topic
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
     * Set the value of creation_date.
     *
     * @param \DateTime $creation_date
     * @return \LarpManager\Entities\Topic
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
     * @return \LarpManager\Entities\Topic
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
     * Set the value of right.
     *
     * @param string $right
     * @return \LarpManager\Entities\Topic
     */
    public function setRight($right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * Get the value of right.
     *
     * @return string
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Set the value of object_id.
     *
     * @param integer $object_id
     * @return \LarpManager\Entities\Topic
     */
    public function setObjectId($object_id)
    {
        $this->object_id = $object_id;

        return $this;
    }

    /**
     * Get the value of object_id.
     *
     * @return integer
     */
    public function getObjectId()
    {
        return $this->object_id;
    }

    /**
     * Set the value of key.
     *
     * @param string $key
     * @return \LarpManager\Entities\Topic
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value of key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Add Gn entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Gn $gn
     * @return \LarpManager\Entities\Topic
     */
    public function addGn(Gn $gn)
    {
        $this->gns[] = $gn;

        return $this;
    }

    /**
     * Remove Gn entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Gn $gn
     * @return \LarpManager\Entities\Topic
     */
    public function removeGn(Gn $gn)
    {
        $this->gns->removeElement($gn);

        return $this;
    }

    /**
     * Get Gn entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGns()
    {
        return $this->gns;
    }

    /**
     * Add Groupe entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\Topic
     */
    public function addGroupe(Groupe $groupe)
    {
        $this->groupes[] = $groupe;

        return $this;
    }

    /**
     * Remove Groupe entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\Topic
     */
    public function removeGroupe(Groupe $groupe)
    {
        $this->groupes->removeElement($groupe);

        return $this;
    }

    /**
     * Get Groupe entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupes()
    {
        return $this->groupes;
    }

    /**
     * Add Post entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Post $post
     * @return \LarpManager\Entities\Topic
     */
    public function addPost(Post $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove Post entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Post $post
     * @return \LarpManager\Entities\Topic
     */
    public function removePost(Post $post)
    {
        $this->posts->removeElement($post);

        return $this;
    }

    /**
     * Get Post entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Add Religion entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Religion $religion
     * @return \LarpManager\Entities\Topic
     */
    public function addReligion(Religion $religion)
    {
        $this->religions[] = $religion;

        return $this;
    }

    /**
     * Remove Religion entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Religion $religion
     * @return \LarpManager\Entities\Topic
     */
    public function removeReligion(Religion $religion)
    {
        $this->religions->removeElement($religion);

        return $this;
    }

    /**
     * Get Religion entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReligions()
    {
        return $this->religions;
    }

    /**
     * Add SecondaryGroup entity to collection (one to many).
     *
     * @param \LarpManager\Entities\SecondaryGroup $secondaryGroup
     * @return \LarpManager\Entities\Topic
     */
    public function addSecondaryGroup(SecondaryGroup $secondaryGroup)
    {
        $this->secondaryGroups[] = $secondaryGroup;

        return $this;
    }

    /**
     * Remove SecondaryGroup entity from collection (one to many).
     *
     * @param \LarpManager\Entities\SecondaryGroup $secondaryGroup
     * @return \LarpManager\Entities\Topic
     */
    public function removeSecondaryGroup(SecondaryGroup $secondaryGroup)
    {
        $this->secondaryGroups->removeElement($secondaryGroup);

        return $this;
    }

    /**
     * Get SecondaryGroup entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSecondaryGroups()
    {
        return $this->secondaryGroups;
    }

    /**
     * Add Territoire entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Territoire $territoire
     * @return \LarpManager\Entities\Topic
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
     * @return \LarpManager\Entities\Topic
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

    /**
     * Add Topic entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Topic $topic
     * @return \LarpManager\Entities\Topic
     */
    public function addTopic(Topic $topic)
    {
        $this->topics[] = $topic;

        return $this;
    }

    /**
     * Remove Topic entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Topic $topic
     * @return \LarpManager\Entities\Topic
     */
    public function removeTopic(Topic $topic)
    {
        $this->topics->removeElement($topic);

        return $this;
    }

    /**
     * Get Topic entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * Set Topic entity (many to one).
     *
     * @param \LarpManager\Entities\Topic $topic
     * @return \LarpManager\Entities\Topic
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

    /**
     * Set User entity (many to one).
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Topic
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (many to one).
     *
     * @return \LarpManager\Entities\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __sleep()
    {
        return array('id', 'title', 'description', 'creation_date', 'update_date', 'topic_id', 'user_id', 'right', 'object_id', 'key');
    }
}