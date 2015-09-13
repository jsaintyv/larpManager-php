<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-06-30 20:35:19.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseGroupe;

/**
 * Je définie les relations ManyToMany içi au lieu de le faire dans Mysql Workbench
 * car l'exporteur ne sait pas gérer correctement les relations ManyToMany ayant des 
 * paramètres autre que les identifiant des tables concernés (c'est dommage ...)
 * 
 * LarpManager\Entities\Groupe
 *
 * @Entity(repositoryClass="LarpManager\Repository\GroupeRepository")
 */
class Groupe extends BaseGroupe
{
	/**
	 * Contructeur.
	 * 
	 * Défini le nombre de place disponible à 0
	 */
	public function __construct()
	{		
		$this->setClasseOpen(0);
		parent::__construct();
	}
	
	/**
	 * méthode magique transtypage en string
	 * 
	 * @return string
	 */
	public function __toString()
	{
		return $this->getNom();	
	}
	
	/**
	 * Vérifie si le groupe dispose de suffisement de place disponible
	 * 
	 * @return boolean
	 */
	public function hasEnoughPlace()
	{
		return $this->getClasseOpen() > count($this->getPersonnages());
	}
	
	/**
	 * Fourni la liste des classes disponibles (non actuellement utilisé par un personnage)
	 * Ce type de liste est utile pour le formulaire de création d'un personnage
	 * 
	 * @return Collection LarpManager\Entities\Classe
	 */
	public function getAvailableClasses()
	{		
		$groupeClasses = $this->getGroupeClasses();
		
		foreach ( $this->getPersonnages() as $personnage)
		{
			$id = $personnage->getClasse()->getId();
			
			foreach (  $groupeClasses as $key => $groupeClasse)
			{
				if ( $groupeClasse->getClasse()->getId() == $id )
				{
					unset($groupeClasses[$key]);
					break;
				}
			}
		}

		$availableClasses = array();
		
		foreach ( $groupeClasses as $groupeClasse)
		{
			$availableClasses[] = $groupeClasse->getClasse();
		}
		
		return $availableClasses;	
	}			
	
	/**
	 * Get User entity related by `responsable_id` (many to one).
	 *
	 * @return \LarpManager\Entities\User
	 */
	public function getResponsable()
	{
		return $this->getUserRelatedByResponsableId();
	}
	
	/**
	 * Set User entity related by `responsable_id` (many to one).
	 * Le responsable est aussi membre du groupe
	 *
	 * @param \LarpManager\Entities\User $user
	 * @return \LarpManager\Entities\Groupe
	 */
	public function setResponsable(User $user)
	{
		$user->addGroupeRelatedByResponsableId($this);
		return $this->setUserRelatedByResponsableId($user);
	}
	
	/**
	 * Get User entity related by `scenariste_id` (many to one).
	 *
	 * @return \LarpManager\Entities\User
	 */
	public function getScenariste()
	{
		return $this->getUserRelatedByScenaristeId();
	}
	
	/**
	 * Set User entity related by `scenariste_id` (many to one).
	 *
	 * @param \LarpManager\Entities\User $user
	 * @return \LarpManager\Entities\Groupe
	 */
	public function setScenariste(User $user)
	{
		return $this->setUserRelatedByScenaristeId($user);
	}
	
	/**
	 * Fourni la liste des classes
	 * 
	 * @return Array LarpManager\Entities\Classe
	 */
	public function getClasses()
	{
		$classes = array();
		$groupeClasses =  $this->getGroupeClasses();
		foreach ( $groupeClasses as $groupeClasse)
		{
			$classes[] = $groupeClasse->getClasse();
		}
		return $classes;
	}
	
	/**
	 * Ajoute une classe dans le groupe
	 * 
	 * @param GroupeClasse $groupeClasse
	 */
	public function addGroupeClass(GroupeClasse $groupeClasse)
	{
		return $this->addGroupeClasse($groupeClasse);
	}
	
	/**
	 * Retire une classe du groupe
	 * @param GroupeClasse $groupeClasse
	 */
	public function removeGroupeClass(GroupeClasse $groupeClasse)
	{
		return $this->removeGroupeClasse($groupeClasse);
	}
}