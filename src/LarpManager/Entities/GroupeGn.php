<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-09-07 15:49:37.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseGroupeGn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\GroupeGn
 *
 * @Entity(repositoryClass="LarpManager\Repository\GroupeGnRepository")
 */
class GroupeGn extends BaseGroupeGn
{
	/**
	 * Défini le responsable de cette session de jeu
	 * 
	 * @param Participant $participant
	 */
	public function setResponsable(Participant $participant)
	{
		$this->setParticipant($participant);
		return $this;
	}
	
	/**
	 * Fourni le responsable de cette session de jeu
	 */
	public function getResponsable()
	{
		return $this->getParticipant();
	}
	
	/**
	 * Supprime le responsable de cette session de jeu
	 */
	public function setResponsableNull()
	{
		return $this->setParticipant(null);		
	}
	
	/**
	 * Fourni la liste des personnages de cette session de jeu
	 */
	public function getPersonnages()
	{
		$personnages = new ArrayCollection();
		
		foreach ( $this->getParticipants() as $participant )
		{
			if ( $participant->getPersonnage() )
			{
				$personnages[] = $participant->getPersonnage();
			}
		}
		return $personnages;
	}
	
}