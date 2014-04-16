<?php
namespace TYPO3\PapMarketplace\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Sébastien Légaré 
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package pap_marketplace
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class FichierController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * fichierRepository
	 *
	 * @var \TYPO3\PapMarketplace\Domain\Repository\FichierRepository
	 * @inject
	 */
	protected $fichierRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$fichiers = $this->fichierRepository->findAll();
		$this->view->assign('fichiers', $fichiers);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Fichier $fichier
	 * @return void
	 */
	public function showAction(\TYPO3\PapMarketplace\Domain\Model\Fichier $fichier) {
		$this->view->assign('fichier', $fichier);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Fichier $newFichier
	 * @dontvalidate $newFichier
	 * @return void
	 */
	public function newAction(\TYPO3\PapMarketplace\Domain\Model\Fichier $newFichier = NULL) {
		$this->view->assign('newFichier', $newFichier);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Fichier $newFichier
	 * @return void
	 */
	public function createAction(\TYPO3\PapMarketplace\Domain\Model\Fichier $newFichier) {
		$this->fichierRepository->add($newFichier);
		$this->flashMessageContainer->add('Your new Fichier was created.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Fichier $fichier
	 * @return void
	 */
	public function deleteAction(\TYPO3\PapMarketplace\Domain\Model\Fichier $fichier) {
		$this->fichierRepository->remove($fichier);
		$this->flashMessageContainer->add('Your Fichier was removed.');
		$this->redirect('list');
	}

}
?>