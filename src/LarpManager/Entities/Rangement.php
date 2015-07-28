<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-28 20:50:32.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseRangement;

/**
 * LarpManager\Entities\Rangement
 *
 * @Entity()
 */
class Rangement extends BaseRangement
{
	public function getAdresse()
	{
		$adresse =  $this->getLabel();
		if ( $this->getlocalisation() )
		{
			$adresse .= ' ('.$this->getLocalisation()->getLabel().')';
		}
		return $adresse;
	}
}