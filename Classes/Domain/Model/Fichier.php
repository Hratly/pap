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
class Fichier extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * nom
	 *
	 * @var \string
	 */
	protected $nom;

	/**
	 * dossier
	 *
	 * @var \string
	 */
	protected $dossier;

	/**
	 * taille
	 *
	 * @var \float
	 */
	protected $taille;

	/**
	 * Returns the nom
	 *
	 * @return \string $nom
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * Sets the nom
	 *
	 * @param \string $nom
	 * @return void
	 */
	public function setNom($nom) {
		$this->nom = $nom;
	}

	/**
	 * Returns the dossier
	 *
	 * @return \string $dossier
	 */
	public function getDossier() {
		return $this->dossier;
	}

	/**
	 * Sets the dossier
	 *
	 * @param \string $dossier
	 * @return void
	 */
	public function setDossier($dossier) {
		$this->dossier = $dossier;
	}

	/**
	 * Returns the taille
	 *
	 * @return \float $taille
	 */
	public function getTaille() {
		return $this->taille;
	}

	/**
	 * Sets the taille
	 *
	 * @param \float $taille
	 * @return void
	 */
	public function setTaille($taille) {
		$this->taille = $taille;
	}

}
?>