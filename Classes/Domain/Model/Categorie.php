<?php
namespace TYPO3\PapMarketplace\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Sébastien Légaré 
 *  Jérémie Ratomposon 
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
class Categorie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * nom
	 *
	 * @var \string
	 */
	protected $nom;

	/**
	 * parent
	 *
	 * @var \TYPO3\PapMarketplace\Domain\Model\Categorie
	 */
	protected $parent;

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
	 * Returns the parent
	 *
	 * @return \TYPO3\PapMarketplace\Domain\Model\Categorie $parent
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * Sets the parent
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Categorie $parent
	 * @return void
	 */
	public function setParent(\TYPO3\PapMarketplace\Domain\Model\Categorie $parent) {
		$this->parent = $parent;
	}

}
?>