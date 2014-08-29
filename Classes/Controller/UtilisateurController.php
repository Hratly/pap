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
     * persistenceManager
     *
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

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


    public function initializeCreateAction() {
        if ($this->arguments->hasArgument('newUtilisateur')) {
            $this->arguments->getArgument('newUtilisateur')->getPropertyMappingConfiguration()->allowProperties('password');
            $this->arguments->getArgument('newUtilisateur')->getPropertyMappingConfiguration()->setTargetTypeForSubProperty('photo', 'array');
        }
    }

    /**
     * action create
     *
     * @param \TYPO3\PapMarketplace\Domain\Model\Utilisateur $newUtilisateur
     * @return void
     */
    public function createAction(\TYPO3\PapMarketplace\Domain\Model\Utilisateur $newUtilisateur) {
        // Valider courriel
        if(!$this->check_email_address($newUtilisateur->getEmail())) {
            $this->flashMessageContainer->add('Vous devez entrer une adresse courriel valide', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, TRUE);
            $this->forward("new","Utilisateur",null,array("newUtilisateur" => $newUtilisateur));
        }

        // Valider courriel paypal
        if($newUtilisateur->getPaypal() && !$this->check_email_address($newUtilisateur->getPaypal())) {
            $this->flashMessageContainer->add('Vous devez entrer une adresse courriel paypal valide', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, TRUE);
            $this->forward("new","Utilisateur",null,array("newUtilisateur" => $newUtilisateur));
        }

        // Valider que la confirmation de mot de passe est pareille que le mot de passe
        if($newUtilisateur->getPassword() != $this->request->getArgument('confirm_password')) {
            $this->flashMessageContainer->add('Votre mot de passe ne concorde pas avec la confirmation', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, TRUE);
            $this->forward("new","Utilisateur",null,array("newUtilisateur" => $newUtilisateur));
        }

        // Valider qu'un autre utilisateur n'a pas le même nom d'utilisateur
        if($this->utilisateurRepository->countByUsername($newUtilisateur->getUsername()) > 0) {
            $this->flashMessageContainer->add("Ce nom d'utilisateur est déja pris. Veuillez en choisir un autre.", '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, TRUE);
            $newUtilisateur->setUsername("");
            $this->forward("new","Utilisateur",null,array("newUtilisateur" => $newUtilisateur));
        }

        // Valider qu'un autre utilisateur n'a pas le même courriel
        if($this->utilisateurRepository->countByEmail($newUtilisateur->getEmail()) > 0) {
            $this->flashMessageContainer->add("Un autre compte utilisateur existe avec cette adresse courriel. Veuillez en choisir une autre ou tenter de modifier votre mot de passe.", '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, TRUE);
            $this->forward("new","Utilisateur",null,array("newUtilisateur" => $newUtilisateur));
        }

        // Upload de la photo
        $arrayPhoto = $newUtilisateur->getPhoto();
        if($arrayPhoto["name"] != "") {
            if(strpos($arrayPhoto["type"],"image") === false) {
                $this->flashMessageContainer->add("Votre photo n'est pas un fichier valide.", '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, TRUE);
                $this->forward("new","Utilisateur",null,array("newUtilisateur" => $newUtilisateur));
            }

            $pathDossier = "/data/www/pap/htdocs/";
            $uploadfile = "uploads/tx_papmarketplace/photos/".$arrayPhoto["name"];
            if (!move_uploaded_file($arrayPhoto['tmp_name'], $pathDossier.$uploadfile)) {
                $this->flashMessageContainer->add("Un problème est survenu lors du téléchargement de votre photo de profil.", '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING, TRUE);
                $newUtilisateur->setPhoto("");
            } else {
                $newUtilisateur->setPhoto($uploadfile);
            }

        } else {
            $newUtilisateur->setPhoto("");
        }

        $this->utilisateurRepository->add($newUtilisateur);
        $this->persistenceManager->persistAll();
        $this->flashMessageContainer->add("Votre compte utilisateur a été créé avec succès.");
        $this->redirect("afficherConfirmation");
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
     * action list
     *
     * @return void
     */
    public function afficherConfirmationAction() {

    }

    /**
     * action modifierMotDePasse
     *
     * @return void
     */
    public function recupererMotDePasseAction() {

    }

    /**
     * action doModifierMotDePasse
     *
     * @return void
     */
    public function doRecupererMotDePasseAction() {
        $email = $this->request->getArgument('email');

        // Vérification de l'adresse courriel
        if(!$this->check_email_address($email) || $this->utilisateurRepository->countByEmail($email) == 0) {
            $this->flashMessageContainer->add("L'adresse courriel entrée est invalide ou elle n'est associée à aucun utilisateur.", '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, TRUE);
            $this->forward("recupererMotDePasse");
        }

        $utilisateur = $this->utilisateurRepository->findOneByEmail($email);

        // Tout est en ordre, on envoi le courriel
        $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
        $message->setTo($email)
          ->setFrom("info@pap.education")
          ->setSubject("ProfsAProfs - Récupération de mot de passe");

        $message->setBody("Bonjour,
        Vous avez demandé une récupération de votre mot de passe sur le site www.pap.education. Voici donc les informations demandées :
        Nom d'utilisateur : ".$utilisateur->getUsername()."
        Mot de passe : ".$utilisateur->getPassword()."

        Cordialement,
        L'équipe PAP", 'text/plain');
        $message->send();

        if($message->isSent()) {
            $this->flashMessageContainer->add("Votre mot de passe a été récupéré avec succès. Consultez vos courriels dans les prochaines minutes afin de récupérer le tout.", '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK, TRUE);
        } else {
            $this->flashMessageContainer->add("Un problème est survenu lors de la récupération de votre mot de passe. Veuillez contacter le support technique à l'adresse info@pap.education", '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, TRUE);
        }
        $this->forward("recupererMotDePasse");
    }

    private function check_email_address($email) {
        // First, we check that there is one @ symbol,
        // and that the lengths are right.
        if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
            // Email invalid because wrong number of characters
            // in one section or wrong number of @ symbols.
            return false;
        }
        // Split it into sections to make life easier
        $email_array = explode("@", $email);
        $local_array = explode(".", $email_array[0]);
        for ($i = 0; $i < sizeof($local_array); $i++) {
            if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
                return false;
            }
        }
        // Check if domain is IP. If not,
        // it should be valid domain name
        if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
            $domain_array = explode(".", $email_array[1]);
            if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
            }
            for ($i = 0; $i < sizeof($domain_array); $i++) {
                if
                (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$",
                    $domain_array[$i])) {
                    return false;
                }
            }
        }
        return true;
    }
}
?>