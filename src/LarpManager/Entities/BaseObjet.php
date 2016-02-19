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
 * LarpManager\Entities\Objet
 *
 * @Entity()
 * @Table(name="objet", indexes={@Index(name="fk_objet_etat1_idx", columns={"etat_id"}), @Index(name="fk_objet_possesseur1_idx", columns={"proprietaire_id"}), @Index(name="fk_objet_users1_idx", columns={"responsable_id"}), @Index(name="fk_objet_photo1_idx", columns={"photo_id"}), @Index(name="fk_objet_rangement1_idx", columns={"rangement_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseObjet", "extended":"Objet"})
 */
class BaseObjet
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
    protected $numero;

    /**
     * @Column(type="string", length=100)
     */
    protected $nom;

    /**
     * @Column(type="string", length=450, nullable=true)
     */
    protected $description;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $nombre;

    /**
     * @Column(type="float", nullable=true)
     */
    protected $cout;

    /**
     * @Column(type="float", nullable=true)
     */
    protected $budget;

    /**
     * @Column(type="boolean", nullable=true)
     */
    protected $investissement;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $creation_date;

    /**
     * @OneToOne(targetEntity="ObjetCarac", mappedBy="objet", cascade={"persist", "merge", "remove", "detach", "all"})
     */
    protected $objetCarac;

    /**
     * @ManyToOne(targetEntity="Etat", inversedBy="objets")
     * @JoinColumn(name="etat_id", referencedColumnName="id")
     */
    protected $etat;

    /**
     * @ManyToOne(targetEntity="Proprietaire", inversedBy="objets")
     * @JoinColumn(name="proprietaire_id", referencedColumnName="id")
     */
    protected $proprietaire;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="objets")
     * @JoinColumn(name="responsable_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ManyToOne(targetEntity="Photo", inversedBy="objets", cascade={"persist", "merge", "remove", "detach", "all"})
     * @JoinColumn(name="photo_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $photo;

    /**
     * @ManyToOne(targetEntity="Rangement", inversedBy="objets")
     * @JoinColumn(name="rangement_id", referencedColumnName="id", nullable=false)
     */
    protected $rangement;

    /**
     * @ManyToMany(targetEntity="Tag", inversedBy="objets")
     * @JoinTable(name="objet_tag",
     *     joinColumns={@JoinColumn(name="objet_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id", nullable=false)}
     * )
     */
    protected $tags;

    public function __construct()
    {
        $this->objetCaracs = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Objet
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
     * Set the value of numero.
     *
     * @param string $numero
     * @return \LarpManager\Entities\Objet
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of numero.
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of nom.
     *
     * @param string $nom
     * @return \LarpManager\Entities\Objet
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
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Objet
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
     * Set the value of nombre.
     *
     * @param integer $nombre
     * @return \LarpManager\Entities\Objet
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre.
     *
     * @return integer
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of cout.
     *
     * @param float $cout
     * @return \LarpManager\Entities\Objet
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get the value of cout.
     *
     * @return float
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * Set the value of budget.
     *
     * @param float $budget
     * @return \LarpManager\Entities\Objet
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get the value of budget.
     *
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set the value of investissement.
     *
     * @param boolean $investissement
     * @return \LarpManager\Entities\Objet
     */
    public function setInvestissement($investissement)
    {
        $this->investissement = $investissement;

        return $this;
    }

    /**
     * Get the value of investissement.
     *
     * @return boolean
     */
    public function getInvestissement()
    {
        return $this->investissement;
    }

    /**
     * Set the value of creation_date.
     *
     * @param \DateTime $creation_date
     * @return \LarpManager\Entities\Objet
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
     * Set ObjetCarac entity (one to one).
     *
     * @param \LarpManager\Entities\ObjetCarac $objetCarac
     * @return \LarpManager\Entities\Objet
     */
    public function setObjetCarac(ObjetCarac $objetCarac = null)
    {
        $objetCarac->setObjet($this);
        $this->objetCarac = $objetCarac;

        return $this;
    }

    /**
     * Get ObjetCarac entity (one to one).
     *
     * @return \LarpManager\Entities\ObjetCarac
     */
    public function getObjetCarac()
    {
        return $this->objetCarac;
    }

    /**
     * Set Etat entity (many to one).
     *
     * @param \LarpManager\Entities\Etat $etat
     * @return \LarpManager\Entities\Objet
     */
    public function setEtat(Etat $etat = null)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get Etat entity (many to one).
     *
     * @return \LarpManager\Entities\Etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set Proprietaire entity (many to one).
     *
     * @param \LarpManager\Entities\Proprietaire $proprietaire
     * @return \LarpManager\Entities\Objet
     */
    public function setProprietaire(Proprietaire $proprietaire = null)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get Proprietaire entity (many to one).
     *
     * @return \LarpManager\Entities\Proprietaire
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set User entity (many to one).
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Objet
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

    /**
     * Set Photo entity (many to one).
     *
     * @param \LarpManager\Entities\Photo $photo
     * @return \LarpManager\Entities\Objet
     */
    public function setPhoto(Photo $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get Photo entity (many to one).
     *
     * @return \LarpManager\Entities\Photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set Rangement entity (many to one).
     *
     * @param \LarpManager\Entities\Rangement $rangement
     * @return \LarpManager\Entities\Objet
     */
    public function setRangement(Rangement $rangement = null)
    {
        $this->rangement = $rangement;

        return $this;
    }

    /**
     * Get Rangement entity (many to one).
     *
     * @return \LarpManager\Entities\Rangement
     */
    public function getRangement()
    {
        return $this->rangement;
    }

    /**
     * Add Tag entity to collection.
     *
     * @param \LarpManager\Entities\Tag $tag
     * @return \LarpManager\Entities\Objet
     */
    public function addTag(Tag $tag)
    {
        $tag->addObjet($this);
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove Tag entity from collection.
     *
     * @param \LarpManager\Entities\Tag $tag
     * @return \LarpManager\Entities\Objet
     */
    public function removeTag(Tag $tag)
    {
        $tag->removeObjet($this);
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * Get Tag entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function __sleep()
    {
        return array('id', 'numero', 'nom', 'description', 'etat_id', 'proprietaire_id', 'responsable_id', 'nombre', 'cout', 'budget', 'investissement', 'creation_date', 'photo_id', 'rangement_id');
    }
}