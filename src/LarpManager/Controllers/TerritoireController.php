<?php
namespace LarpManager\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use LarpManager\Form\TerritoireForm;


/**
 * LarpManager\Controllers\TerritoireController
 *
 * @author kevin
 *
 */
class TerritoireController
{
	/**
	 * Liste des territoires
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function indexAction(Request $request, Application $app)
	{
		$territoires = $app['orm.em']->getRepository('\LarpManager\Entities\Territoire')->findAll();
		$territoires = $app['larp.manager']->sortTerritoire($territoires);
		
		return $app['twig']->render('territoire/index.twig', array('territoires' => $territoires));
	}
	
	/**
	 * Detail d'un territoire
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function detailAction(Request $request, Application $app)
	{
		$id = $request->get('index');
		
		$territoire = $app['orm.em']->find('\LarpManager\Entities\Territoire',$id);
		
		if ( $app['security.authorization_checker']->isGranted('ROLE_SCENARISTE') )
		{
			return $app['twig']->render('territoire/detail.twig', array('territoire' => $territoire));
		}
		else
		{
			return $app['twig']->render('territoire/detail_joueur.twig', array('territoire' => $territoire));
		}
	}
	
	/**
	 * Ajoute un territoire
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function addAction(Request $request, Application $app)
	{
		$territoire = new \LarpManager\Entities\Territoire();
		
		$form = $app['form.factory']->createBuilder(new TerritoireForm(), $territoire)
			->add('save','submit', array('label' => "Sauvegarder"))
			->add('save_continue','submit', array('label' => "Sauvegarder & continuer"))
			->getForm();
		
		$form->handleRequest($request);
		
		if ( $form->isValid() )
		{
			$territoire = $form->getData();
						
			$app['orm.em']->persist($territoire);
			$app['orm.em']->flush();
			
			$app['session']->getFlashBag()->add('success', 'Le territoire a été ajouté.');
				
			if ( $form->get('save')->isClicked())
			{
				return $app->redirect($app['url_generator']->generate('territoire'),301);
			}
			else if ( $form->get('save_continue')->isClicked())
			{
				return $app->redirect($app['url_generator']->generate('territoire.add'),301);
			}
		}
		
		return $app['twig']->render('territoire/add.twig', array(
				'form' => $form->createView(),
		));
	}
	
	/**
	 * Modifie un territoire
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function updateAction(Request $request, Application $app)
	{
		$id = $request->get('index');
		
		$territoire = $app['orm.em']->find('\LarpManager\Entities\Territoire',$id);
		
		$form = $app['form.factory']->createBuilder(new TerritoireForm(), $territoire)
			->add('update','submit', array('label' => "Sauvegarder"))
			->add('delete','submit', array('label' => "Supprimer"))
			->getForm();
		
		$form->handleRequest($request);
		
		if ( $form->isValid() )
		{
			$territoire = $form->getData();
			
			if ( $form->get('update')->isClicked())
			{
				
				$app['orm.em']->persist($territoire);
				$app['orm.em']->flush();
				$app['session']->getFlashBag()->add('success', 'Le territoire a été mis à jour.');
		
				return $app->redirect($app['url_generator']->generate('territoire.detail',array('index' => $id)),301);
			}
			else if ( $form->get('delete')->isClicked())
			{
				$app['orm.em']->remove($territoire);
				$app['orm.em']->flush();
				$app['session']->getFlashBag()->add('success', 'Le territoire a été supprimé.');
				return $app->redirect($app['url_generator']->generate('territoire'),301);
			}
		}		

		return $app['twig']->render('territoire/update.twig', array(
				'territoire' => $territoire,
				'form' => $form->createView(),
		));
	}
}