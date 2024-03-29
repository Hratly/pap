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
class ContenuController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * contenuRepository
	 *
	 * @var \TYPO3\PapMarketplace\Domain\Repository\ContenuRepository
	 * @inject
	 */
	protected $contenuRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$contenus = $this->contenuRepository->findAll();
        echo count($contenus);
		$this->view->assign('contenus', $contenus);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
	 * @return void
	 */
	public function showAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
		$this->view->assign('contenu', $contenu);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $newContenu
	 * @dontvalidate $newContenu
	 * @return void
	 */
	public function newAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $newContenu = NULL) {
		$this->view->assign('newContenu', $newContenu);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $newContenu
	 * @return void
	 */
	public function createAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $newContenu) {
		$this->contenuRepository->add($newContenu);
		$this->flashMessageContainer->add('Your new Contenu was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
	 * @return void
	 */
	public function editAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
		$this->view->assign('contenu', $contenu);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
	 * @return void
	 */
	public function updateAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
		$this->contenuRepository->update($contenu);
		$this->flashMessageContainer->add('Your Contenu was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
	 * @return void
	 */
	public function deleteAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
		$this->contenuRepository->remove($contenu);
		$this->flashMessageContainer->add('Your Contenu was removed.');
		$this->redirect('list');
	}

    /**
     * action acheter
     *
     * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
     * @return void
     */
    public function acheterAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
        die("bibi!");
    }

}
?>