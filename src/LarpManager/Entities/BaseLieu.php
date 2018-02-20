<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-05-13 16:49:12.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Lieu
 *
 * @Entity()
 * @Table(name="lieu")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseLieu", "extended":"Lieu"})
 */
class BaseLieu
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
    protected $nom;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @OneToMany(targetEntity="IntrigueHasLieu", mappedBy="lieu")
     * @JoinColumn(name="id", referencedColumnName="lieu_id", nullable=false)
     */
    protected $intrigueHasLieus;

    /**
     * @ManyToMany(targetEntity="Document", inversedBy="lieus")
     * @JoinTable(name="lieu_has_document",
     *     joinColumns={@JoinColumn(name="lieu_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@JoinColumn(name="document_id", referencedColumnName="id", nullable=false)}
     * )
     */
    protected $documents;

    public function __construct()
    {
        $this->intrigueHasLieus = new ArrayCollection();
        $this->documents = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Lieu
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
     * @return \LarpManager\Entities\Lieu
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
     * @return \LarpManager\Entities\Lieu
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
     * Add IntrigueHasLieu entity to collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasLieu $intrigueHasLieu
     * @return \LarpManager\Entities\Lieu
     */
    public function addIntrigueHasLieu(IntrigueHasLieu $intrigueHasLieu)
    {
        $this->intrigueHasLieus[] = $intrigueHasLieu;

        return $this;
    }

    /**
     * Remove IntrigueHasLieu entity from collection (one to many).
     *
     * @param \LarpManager\Entities\IntrigueHasLieu $intrigueHasLieu
     * @return \LarpManager\Entities\Lieu
     */
    public function removeIntrigueHasLieu(IntrigueHasLieu $intrigueHasLieu)
    {
        $this->intrigueHasLieus->removeElement($intrigueHasLieu);

        return $this;
    }

    /**
     * Get IntrigueHasLieu entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntrigueHasLieus()
    {
        return $this->intrigueHasLieus;
    }

    /**
     * Add Document entity to collection.
     *
     * @param \LarpManager\Entities\Document $document
     * @return \LarpManager\Entities\Lieu
     */
    public function addDocument(Document $document)
    {
        $document->addLieu($this);
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove Document entity from collection.
     *
     * @param \LarpManager\Entities\Document $document
     * @return \LarpManager\Entities\Lieu
     */
    public function removeDocument(Document $document)
    {
        $document->removeLieu($this);
        $this->documents->removeElement($document);

        return $this;
    }

    /**
     * Get Document entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    public function __sleep()
    {
        return array('id', 'nom', 'description');
    }
}