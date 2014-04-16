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
class AchatController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * achatRepository
	 *
	 * @var \TYPO3\PapMarketplace\Domain\Repository\AchatRepository
	 * @inject
	 */
	protected $achatRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$achats = $this->achatRepository->findAll();
		$this->view->assign('achats', $achats);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Achat $achat
	 * @return void
	 */
	public function showAction(\TYPO3\PapMarketplace\Domain\Model\Achat $achat) {
		$this->view->assign('achat', $achat);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Achat $newAchat
	 * @dontvalidate $newAchat
	 * @return void
	 */
	public function newAction(\TYPO3\PapMarketplace\Domain\Model\Achat $newAchat = NULL) {
		if ($newAchat == NULL) { // workaround for fluid bug ##5636
			$newAchat = t3lib_div::makeInstance('');
		}
		$this->view->assign('newAchat', $newAchat);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Achat $newAchat
	 * @return void
	 */
	public function createAction(\TYPO3\PapMarketplace\Domain\Model\Achat $newAchat) {
		$this->achatRepository->add($newAchat);
		$this->flashMessageContainer->add('Your new Achat was created.');
		$this->redirect('list');
	}

}
?>