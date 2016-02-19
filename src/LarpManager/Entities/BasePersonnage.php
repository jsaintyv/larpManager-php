<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-02-17 11:46:03.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Personnage
 *
 * @Entity()
 * @Table(name="personnage", indexes={@Index(name="fk_personnage_groupe1_idx", columns={"groupe_id"}), @Index(name="fk_personnage_archetype1_idx", columns={"classe_id"}), @Index(name="fk_personnage_age1_idx", columns={"age_id"}), @Index(name="fk_personnage_genre1_idx", columns={"genre_id"}), @Index(name="fk_personnage_joueur1_idx", columns={"joueur_id"}), @Index(name="fk_personnage_territoire1_idx", columns={"territoire_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePersonnage", "extended":"Personnage"})
 */
class BasePersonnage
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
    protected $nom;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $surnom;

    /**
     * @Column(type="boolean", nullable=true)
     */
    protected $intrigue;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $renomme;

    /**
     * @Column(type="string", length=100, nullable=true)
     */
    protected $photo;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $xp;

    /**
     * @OneToMany(targetEntity="ExperienceGain", mappedBy="personnage")
     * @JoinColumn(name="id", referencedColumnName="personnage_id", nullable=false)
     */
    protected $experienceGains;

    /**
     * @OneToMany(targetEntity="ExperienceUsage", mappedBy="personnage")
     * @JoinColumn(name="id", referencedColumnName="personnage_id", nullable=false)
     */
    protected $experienceUsages;

    /**
     * @OneToMany(targetEntity="Membre", mappedBy="personnage")
     * @JoinColumn(name="id", referencedColumnName="personnage_id", nullable=false)
     */
    protected $membres;

    /**
     * @OneToMany(targetEntity="PersonnagesReligions", mappedBy="personnage")
     * @JoinColumn(name="id", referencedColumnName="personnage_id", nullable=false)
     */
    protected $personnagesReligions;

    /**
     * @OneToMany(targetEntity="Postulant", mappedBy="personnage")
     * @JoinColumn(name="id", referencedColumnName="personnage_id", nullable=false)
     */
    protected $postulants;

    /**
     * @OneToMany(targetEntity="SecondaryGroup", mappedBy="personnage")
     * @JoinColumn(name="id", referencedColumnName="personnage_id", nullable=false)
     */
    protected $secondaryGroups;

    /**
     * @ManyToOne(targetEntity="Groupe", inversedBy="personnages")
     * @JoinColumn(name="groupe_id", referencedColumnName="id", nullable=false)
     */
    protected $groupe;

    /**
     * @ManyToOne(targetEntity="Classe", inversedBy="personnages")
     * @JoinColumn(name="classe_id", referencedColumnName="id", nullable=false)
     */
    protected $classe;

    /**
     * @ManyToOne(targetEntity="Age", inversedBy="personnages")
     * @JoinColumn(name="age_id", referencedColumnName="id", nullable=false)
     */
    protected $age;

    /**
     * @ManyToOne(targetEntity="Genre", inversedBy="personnages")
     * @JoinColumn(name="genre_id", referencedColumnName="id", nullable=false)
     */
    protected $genre;

    /**
     * @OneToOne(targetEntity="Participant", inversedBy="personnage")
     * @JoinColumn(name="joueur_id", referencedColumnName="id", nullable=false)
     */
    protected $participant;

    /**
     * @ManyToOne(targetEntity="Territoire", inversedBy="personnages")
     * @JoinColumn(name="territoire_id", referencedColumnName="id")
     */
    protected $territoire;

    /**
     * @ManyToMany(targetEntity="Competence", mappedBy="personnages")
     */
    protected $competences;

    public function __construct()
    {
        $this->experienceGains = new ArrayCollection();
        $this->experienceUsages = new ArrayCollection();
        $this->membres = new ArrayCollection();
        $this->personnagesReligions = new ArrayCollection();
        $this->postulants = new ArrayCollection();
        $this->secondaryGroups = new ArrayCollection();
        $this->competences = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Personnage
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
     * Set the value of nom.
     *
     * @param string $nom
     * @return \LarpManager\Entities\Personnage
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of surnom.
     *
     * @param string $surnom
     * @return \LarpManager\Entities\Personnage
     */
    public function setSurnom($surnom)
    {
        $this->surnom = $surnom;

        return $this;
    }

    /**
     * Get the value of surnom.
     *
     * @return string
     */
    public function getSurnom()
    {
        return $this->surnom;
    }

    /**
     * Set the value of intrigue.
     *
     * @param boolean $intrigue
     * @return \LarpManager\Entities\Personnage
     */
    public function setIntrigue($intrigue)
    {
        $this->intrigue = $intrigue;

        return $this;
    }

    /**
     * Get the value of intrigue.
     *
     * @return boolean
     */
    public function getIntrigue()
    {
        return $this->intrigue;
    }

    /**
     * Set the value of renomme.
     *
     * @param integer $renomme
     * @return \LarpManager\Entities\Personnage
     */
    public function setRenomme($renomme)
    {
        $this->renomme = $renomme;

        return $this;
    }

    /**
     * Get the value of renomme.
     *
     * @return integer
     */
    public function getRenomme()
    {
        return $this->renomme;
    }

    /**
     * Set the value of photo.
     *
     * @param string $photo
     * @return \LarpManager\Entities\Personnage
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of photo.
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of xp.
     *
     * @param integer $xp
     * @return \LarpManager\Entities\Personnage
     */
    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * Get the value of xp.
     *
     * @return integer
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * Add ExperienceGain entity to collection (one to many).
     *
     * @param \LarpManager\Entities\ExperienceGain $experienceGain
     * @return \LarpManager\Entities\Personnage
     */
    public function addExperienceGain(ExperienceGain $experienceGain)
    {
        $this->experienceGains[] = $experienceGain;

        return $this;
    }

    /**
     * Remove ExperienceGain entity from collection (one to many).
     *
     * @param \LarpManager\Entities\ExperienceGain $experienceGain
     * @return \LarpManager\Entities\Personnage
     */
    public function removeExperienceGain(ExperienceGain $experienceGain)
    {
        $this->experienceGains->removeElement($experienceGain);

        return $this;
    }

    /**
     * Get ExperienceGain entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExperienceGains()
    {
        return $this->experienceGains;
    }

    /**
     * Add ExperienceUsage entity to collection (one to many).
     *
     * @param \LarpManager\Entities\ExperienceUsage $experienceUsage
     * @return \LarpManager\Entities\Personnage
     */
    public function addExperienceUsage(ExperienceUsage $experienceUsage)
    {
        $this->experienceUsages[] = $experienceUsage;

        return $this;
    }

    /**
     * Remove ExperienceUsage entity from collection (one to many).
     *
     * @param \LarpManager\Entities\ExperienceUsage $experienceUsage
     * @return \LarpManager\Entities\Personnage
     */
    public function removeExperienceUsage(ExperienceUsage $experienceUsage)
    {
        $this->experienceUsages->removeElement($experienceUsage);

        return $this;
    }

    /**
     * Get ExperienceUsage entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExperienceUsages()
    {
        return $this->experienceUsages;
    }

    /**
     * Add Membre entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Membre $membre
     * @return \LarpManager\Entities\Personnage
     */
    public function addMembre(Membre $membre)
    {
        $this->membres[] = $membre;

        return $this;
    }

    /**
     * Remove Membre entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Membre $membre
     * @return \LarpManager\Entities\Personnage
     */
    public function removeMembre(Membre $membre)
    {
        $this->membres->removeElement($membre);

        return $this;
    }

    /**
     * Get Membre entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembres()
    {
        return $this->membres;
    }

    /**
     * Add PersonnagesReligions entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnagesReligions $personnagesReligions
     * @return \LarpManager\Entities\Personnage
     */
    public function addPersonnagesReligions(PersonnagesReligions $personnagesReligions)
    {
        $this->personnagesReligions[] = $personnagesReligions;

        return $this;
    }

    /**
     * Remove PersonnagesReligions entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnagesReligions $personnagesReligions
     * @return \LarpManager\Entities\Personnage
     */
    public function removePersonnagesReligions(PersonnagesReligions $personnagesReligions)
    {
        $this->personnagesReligions->removeElement($personnagesReligions);

        return $this;
    }

    /**
     * Get PersonnagesReligions entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnagesReligions()
    {
        return $this->personnagesReligions;
    }

    /**
     * Add Postulant entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Postulant $postulant
     * @return \LarpManager\Entities\Personnage
     */
    public function addPostulant(Postulant $postulant)
    {
        $this->postulants[] = $postulant;

        return $this;
    }

    /**
     * Remove Postulant entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Postulant $postulant
     * @return \LarpManager\Entities\Personnage
     */
    public function removePostulant(Postulant $postulant)
    {
        $this->postulants->removeElement($postulant);

        return $this;
    }

    /**
     * Get Postulant entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostulants()
    {
        return $this->postulants;
    }

    /**
     * Add SecondaryGroup entity to collection (one to many).
     *
     * @param \LarpManager\Entities\SecondaryGroup $secondaryGroup
     * @return \LarpManager\Entities\Personnage
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
     * @return \LarpManager\Entities\Personnage
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
     * Set Groupe entity (many to one).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\Personnage
     */
    public function setGroupe(Groupe $groupe = null)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get Groupe entity (many to one).
     *
     * @return \LarpManager\Entities\Groupe
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set Classe entity (many to one).
     *
     * @param \LarpManager\Entities\Classe $classe
     * @return \LarpManager\Entities\Personnage
     */
    public function setClasse(Classe $classe = null)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get Classe entity (many to one).
     *
     * @return \LarpManager\Entities\Classe
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set Age entity (many to one).
     *
     * @param \LarpManager\Entities\Age $age
     * @return \LarpManager\Entities\Personnage
     */
    public function setAge(Age $age = null)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get Age entity (many to one).
     *
     * @return \LarpManager\Entities\Age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set Genre entity (many to one).
     *
     * @param \LarpManager\Entities\Genre $genre
     * @return \LarpManager\Entities\Personnage
     */
    public function setGenre(Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get Genre entity (many to one).
     *
     * @return \LarpManager\Entities\Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set Participant entity (one to one).
     *
     * @param \LarpManager\Entities\Participant $participant
     * @return \LarpManager\Entities\Personnage
     */
    public function setParticipant(Participant $participant)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get Participant entity (one to one).
     *
     * @return \LarpManager\Entities\Participant
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set Territoire entity (many to one).
     *
     * @param \LarpManager\Entities\Territoire $territoire
     * @return \LarpManager\Entities\Personnage
     */
    public function setTerritoire(Territoire $territoire = null)
    {
        $this->territoire = $territoire;

        return $this;
    }

    /**
     * Get Territoire entity (many to one).
     *
     * @return \LarpManager\Entities\Territoire
     */
    public function getTerritoire()
    {
        return $this->territoire;
    }

    /**
     * Add Competence entity to collection.
     *
     * @param \LarpManager\Entities\Competence $competence
     * @return \LarpManager\Entities\Personnage
     */
    public function addCompetence(Competence $competence)
    {
        $this->competences[] = $competence;

        return $this;
    }

    /**
     * Remove Competence entity from collection.
     *
     * @param \LarpManager\Entities\Competence $competence
     * @return \LarpManager\Entities\Personnage
     */
    public function removeCompetence(Competence $competence)
    {
        $this->competences->removeElement($competence);

        return $this;
    }

    /**
     * Get Competence entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    public function __sleep()
    {
        return array('id', 'nom', 'surnom', 'intrigue', 'groupe_id', 'classe_id', 'age_id', 'genre_id', 'renomme', 'photo', 'joueur_id', 'xp', 'territoire_id');
    }
}