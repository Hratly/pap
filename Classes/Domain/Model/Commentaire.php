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
class Commentaire extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * commentaire
	 *
	 * @var \string
	 */
	protected $commentaire;

	/**
	 * note
	 *
	 * @var \integer
	 */
	protected $note;

	/**
	 * utilisateur
	 *
	 * @var \TYPO3\PapMarketplace\Domain\Model\Utilisateur
	 */
	protected $utilisateur;

	/**
	 * Returns the commentaire
	 *
	 * @return \string $commentaire
	 */
	public function getCommentaire() {
		return $this->commentaire;
	}

	/**
	 * Sets the commentaire
	 *
	 * @param \string $commentaire
	 * @return void
	 */
	public function setCommentaire($commentaire) {
		$this->commentaire = $commentaire;
	}

	/**
	 * Returns the note
	 *
	 * @return \integer $note
	 */
	public function getNote() {
		return $this->note;
	}

	/**
	 * Sets the note
	 *
	 * @param \integer $note
	 * @return void
	 */
	public function setNote($note) {
		$this->note = $note;
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