<?php

namespace LarpManager;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * LarpManager\CompetenceControllerProvider
 * 
 * @author kevin
 *
 */
class CompetenceControllerProvider implements ControllerProviderInterface
{
	/**
	 * Initialise les routes pour les competences
	 * Routes :
	 *  - competence.admin.list
	 * 	- competence.list
	 * 	- competence.admin.add
	 *  - competence.admin.update
	 *  - competence.admin.detail
	 *
	 * @param Application $app
	 * @return Controllers $controllers
	 */
	public function connect(Application $app)
	{
		$controllers = $app['controllers_factory'];
		
		/**
		 * Vérifie que l'utilisateur dispose du role REGLE
		 */
		$mustBeOrga = function(Request $request) use ($app) {
			if (!$app['security.authorization_checker']->isGranted('ROLE_REGLE')) {
				throw new AccessDeniedException();
			}
		};
		
		
		$controllers->match('/','LarpManager\Controllers\CompetenceController::indexAction')
			->bind("competence")
			->method('GET')
			->before($mustBeOrga);
		
		$controllers->match('{competence}/document/{document}','LarpManager\Controllers\CompetenceController::getDocumentAction')
			->bind("competence.document")
			->convert('competence', 'converter.competence:convert')
			->method('GET');
		
		$controllers->match('/list','LarpManager\Controllers\CompetenceController::listAction')
			->bind("competence.list")
			->method('GET');
			
		$controllers->match('/add','LarpManager\Controllers\CompetenceController::addAction')
			->bind("competence.add")
			->method('GET|POST')
			->before($mustBeOrga);
		
		$controllers->match('/{index}/update','LarpManager\Controllers\CompetenceController::updateAction')
			->assert('index', '\d+')
			->bind("competence.update")
			->method('GET|POST')
			->before($mustBeOrga);
		
		
		$controllers->match('/{index}','LarpManager\Controllers\CompetenceController::detailAction')
			->assert('index', '\d+')
			->bind("competence.detail")
			->method('GET')
			->before($mustBeOrga);
			
		return $controllers;
	}
}