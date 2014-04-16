<?php
namespace TYPO3\PapMarketplace\Domain\Model;

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
class Achat extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * dateAchat
	 *
	 * @var \DateTime
	 */
	protected $dateAchat;

	/**
	 * paye
	 *
	 * @var boolean
	 */
	protected $paye = FALSE;

	/**
	 * contenus
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Contenu>
	 */
	protected $contenus;

	/**
	 * utilisateur
	 *
	 * @var \TYPO3\PapMarketplace\Domain\Model\Utilisateur
	 */
	protected $utilisateur;

	/**
	 * __construct
	 *
	 * @return Achat
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->contenus = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the dateAchat
	 *
	 * @return \DateTime $dateAchat
	 */
	public function getDateAchat() {
		return $this->dateAchat;
	}

	/**
	 * Sets the dateAchat
	 *
	 * @param \DateTime $dateAchat
	 * @return void
	 */
	public function setDateAchat($dateAchat) {
		$this->dateAchat = $dateAchat;
	}

	/**
	 * Returns the paye
	 *
	 * @return boolean $paye
	 */
	public function getPaye() {
		return $this->paye;
	}

	/**
	 * Sets the paye
	 *
	 * @param boolean $paye
	 * @return void
	 */
	public function setPaye($paye) {
		$this->paye = $paye;
	}

	/**
	 * Returns the boolean state of paye
	 *
	 * @return boolean
	 */
	public function isPaye() {
		return $this->getPaye();
	}

	/**
	 * Adds a Contenu
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
	 * @return void
	 */
	public function addContenu(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
		$this->contenus->attach($contenu);
	}

	/**
	 * Removes a Contenu
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenuToRemove The Contenu to be removed
	 * @return void
	 */
	public function removeContenu(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenuToRemove) {
		$this->contenus->detach($contenuToRemove);
	}

	/**
	 * Returns the contenus
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Contenu> $contenus
	 */
	public function getContenus() {
		return $this->contenus;
	}

	/**
	 * Sets the contenus
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Contenu> $contenus
	 * @return void
	 */
	public function setContenus(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $contenus) {
		$this->contenus = $contenus;
	}

	/**
	 * Returns the utilisateur
	 *
	 * @return \TYPO3\PapMarketplace\Domain\Model\Utilisateur $utilisateur
	 */
	public function getUtilisateur() {
		return $this->utilisateur;
	}

	/**
	 * Sets the utilisateur
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Utilisateur $utilisateur
	 * @return void
	 */
	public function setUtilisateur(\TYPO3\PapMarketplace\Domain\Model\Utilisateur $utilisateur) {
		$this->utilisateur = $utilisateur;
	}

}
?>