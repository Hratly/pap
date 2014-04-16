<?php

namespace TYPO3\PapMarketplace\Tests;
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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \TYPO3\PapMarketplace\Domain\Model\Contenu.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage PAP Marketplace
 *
 * @author Sébastien Légaré 
 */
class ContenuTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\PapMarketplace\Domain\Model\Contenu
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\PapMarketplace\Domain\Model\Contenu();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getNomReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNomForStringSetsNom() { 
		$this->fixture->setNom('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getNom()
		);
	}
	
	/**
	 * @test
	 */
	public function getDateCreationReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setDateCreationForDateTimeSetsDateCreation() { }
	
	/**
	 * @test
	 */
	public function getPrixReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getPrix()
		);
	}

	/**
	 * @test
	 */
	public function setPrixForFloatSetsPrix() { 
		$this->fixture->setPrix(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getPrix()
		);
	}
	
	/**
	 * @test
	 */
	public function getCategoriesReturnsInitialValueForCategorie() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getCategories()
		);
	}

	/**
	 * @test
	 */
	public function setCategoriesForObjectStorageContainingCategorieSetsCategories() { 
		$category = new \TYPO3\PapMarketplace\Domain\Model\Categorie();
		$objectStorageHoldingExactlyOneCategories = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCategories->attach($category);
		$this->fixture->setCategories($objectStorageHoldingExactlyOneCategories);

		$this->assertSame(
			$objectStorageHoldingExactlyOneCategories,
			$this->fixture->getCategories()
		);
	}
	
	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategories() {
		$category = new \TYPO3\PapMarketplace\Domain\Model\Categorie();
		$objectStorageHoldingExactlyOneCategory = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->fixture->addCategory($category);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneCategory,
			$this->fixture->getCategories()
		);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategories() {
		$category = new \TYPO3\PapMarketplace\Domain\Model\Categorie();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($category);
		$localObjectStorage->detach($category);
		$this->fixture->addCategory($category);
		$this->fixture->removeCategory($category);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getCategories()
		);
	}
	
	/**
	 * @test
	 */
	public function getFichiersReturnsInitialValueForFichier() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getFichiers()
		);
	}

	/**
	 * @test
	 */
	public function setFichiersForObjectStorageContainingFichierSetsFichiers() { 
		$fichier = new \TYPO3\PapMarketplace\Domain\Model\Fichier();
		$objectStorageHoldingExactlyOneFichiers = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneFichiers->attach($fichier);
		$this->fixture->setFichiers($objectStorageHoldingExactlyOneFichiers);

		$this->assertSame(
			$objectStorageHoldingExactlyOneFichiers,
			$this->fixture->getFichiers()
		);
	}
	
	/**
	 * @test
	 */
	public function addFichierToObjectStorageHoldingFichiers() {
		$fichier = new \TYPO3\PapMarketplace\Domain\Model\Fichier();
		$objectStorageHoldingExactlyOneFichier = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneFichier->attach($fichier);
		$this->fixture->addFichier($fichier);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneFichier,
			$this->fixture->getFichiers()
		);
	}

	/**
	 * @test
	 */
	public function removeFichierFromObjectStorageHoldingFichiers() {
		$fichier = new \TYPO3\PapMarketplace\Domain\Model\Fichier();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($fichier);
		$localObjectStorage->detach($fichier);
		$this->fixture->addFichier($fichier);
		$this->fixture->removeFichier($fichier);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getFichiers()
		);
	}
	
	/**
	 * @test
	 */
	public function getCommentairesReturnsInitialValueForCommentaire() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getCommentaires()
		);
	}

	/**
	 * @test
	 */
	public function setCommentairesForObjectStorageContainingCommentaireSetsCommentaires() { 
		$commentaire = new \TYPO3\PapMarketplace\Domain\Model\Commentaire();
		$objectStorageHoldingExactlyOneCommentaires = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCommentaires->attach($commentaire);
		$this->fixture->setCommentaires($objectStorageHoldingExactlyOneCommentaires);

		$this->assertSame(
			$objectStorageHoldingExactlyOneCommentaires,
			$this->fixture->getCommentaires()
		);
	}
	
	/**
	 * @test
	 */
	public function addCommentaireToObjectStorageHoldingCommentaires() {
		$commentaire = new \TYPO3\PapMarketplace\Domain\Model\Commentaire();
		$objectStorageHoldingExactlyOneCommentaire = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCommentaire->attach($commentaire);
		$this->fixture->addCommentaire($commentaire);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneCommentaire,
			$this->fixture->getCommentaires()
		);
	}

	/**
	 * @test
	 */
	public function removeCommentaireFromObjectStorageHoldingCommentaires() {
		$commentaire = new \TYPO3\PapMarketplace\Domain\Model\Commentaire();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($commentaire);
		$localObjectStorage->detach($commentaire);
		$this->fixture->addCommentaire($commentaire);
		$this->fixture->removeCommentaire($commentaire);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getCommentaires()
		);
	}
	
	/**
	 * @test
	 */
	public function getProprietaireReturnsInitialValueForUtilisateur() { }

	/**
	 * @test
	 */
	public function setProprietaireForUtilisateurSetsProprietaire() { }
	
}
?>