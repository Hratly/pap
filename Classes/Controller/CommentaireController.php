<?php
namespace TYPO3\PapMarketplace\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Sébastien Légaré
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
class CommentaireController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

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
		$commentaires = $this->commentaireRepository->findAll();
		$this->view->assign('commentaires', $commentaires);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Commentaire $newCommentaire
	 * @dontvalidate $newCommentaire
	 * @return void
	 */
	public function newAction(\TYPO3\PapMarketplace\Domain\Model\Commentaire $newCommentaire = NULL) {
		$this->view->assign('newCommentaire', $newCommentaire);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Commentaire $newCommentaire
	 * @return void
	 */
	public function createAction(\TYPO3\PapMarketplace\Domain\Model\Commentaire $newCommentaire) {
		$contenu = $this->contenuRepository->findOneByUid($this->request->getArgument("contenu"));
        $contenu->addCommentaire($newCommentaire);
        $this->contenuRepository->update($contenu);
		$this->redirect('show','Contenu',array("contenu" => $contenu));
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaire
	 * @return void
	 */
	public function editAction(\TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaire) {
		$this->view->assign('commentaire', $commentaire);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaire
	 * @return void
	 */
	public function updateAction(\TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaire) {
		$this->commentaireRepository->update($commentaire);
		$this->flashMessageContainer->add('Your Commentaire was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaire
	 * @return void
	 */
	public function deleteAction(\TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaire) {
		$this->commentaireRepository->remove($commentaire);
		$this->flashMessageContainer->add('Your Commentaire was removed.');
		$this->redirect('list');
	}

}
?>