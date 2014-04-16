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
class UtilisateurController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * utilisateurRepository
	 *
	 * @var \TYPO3\PapMarketplace\Domain\Repository\UtilisateurRepository
	 * @inject
	 */
	protected $utilisateurRepository;

    /**
     * utilisateurRepository
     *
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserGroupRepository
     * @inject
     */
    protected $frontEndUserGroupRepository;

	/**
	 * action new
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Utilisateur $newUtilisateur
	 * @dontvalidate $newUtilisateur
	 * @return void
	 */
	public function newAction(\TYPO3\PapMarketplace\Domain\Model\Utilisateur $newUtilisateur = NULL) {
		$this->view->assign('newUtilisateur', $newUtilisateur);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Utilisateur $newUtilisateur
	 * @return void
	 */
	public function createAction(\TYPO3\PapMarketplace\Domain\Model\Utilisateur $newUtilisateur) {
        if($this->utilisateurRepository->findByUsername($newUtilisateur->getEmail())->count() > 0) {
            $this->controllerContext->getFlashMessageQueue()->addMessage(
                new \TYPO3\CMS\Core\Messaging\FlashMessage(
                    "Erreur, cette adresse de courriel est déjà utilisée.","",\TYPO3\CMS\Core\Messaging\FlashMessage::ERROR
                )
            );
            $this->forward('new');
        }

        $newUtilisateur->setUsername($newUtilisateur->getEmail());
        $newUtilisateur->setPid($this->settings['utilisateurPid']);
        $userGroups = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
        $userGroups->attach($this->frontEndUserGroupRepository->findByUid(1));
        $newUtilisateur->setUsergroup($userGroups);
		$this->utilisateurRepository->add($newUtilisateur);

        $this->redirect('afficherConfirmation');
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Utilisateur $utilisateur
	 * @return void
	 */
	public function editAction(\TYPO3\PapMarketplace\Domain\Model\Utilisateur $utilisateur) {
		$this->view->assign('utilisateur', $utilisateur);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Utilisateur $utilisateur
	 * @return void
	 */
	public function updateAction(\TYPO3\PapMarketplace\Domain\Model\Utilisateur $utilisateur) {
		$this->utilisateurRepository->update($utilisateur);
		$this->flashMessageContainer->add('Your Utilisateur was updated.');
		$this->redirect('list');
	}

    /**
     * action afficherConfirmation
     *
     * @return void
     */
    public function afficherConfirmationAction() {
        $this->controllerContext->getFlashMessageQueue()->addMessage(
            new \TYPO3\CMS\Core\Messaging\FlashMessage(
                "Votre compte d'usager a été créé avec succès. Vous recevrez dans les prochaines minutes une confirmation à votre adresse courriel.","",\TYPO3\CMS\Core\Messaging\FlashMessage::OK
            )
        );
    }

}
?>