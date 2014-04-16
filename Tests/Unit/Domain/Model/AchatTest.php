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
 * Test case for class \TYPO3\PapMarketplace\Domain\Model\Achat.
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
class AchatTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\PapMarketplace\Domain\Model\Achat
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\PapMarketplace\Domain\Model\Achat();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getDateAchatReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setDateAchatForDateTimeSetsDateAchat() { }
	
	/**
	 * @test
	 */
	public function getPayeReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setPayeForOoleanSetsPaye() { }
	
	/**
	 * @test
	 */
	public function getContenusReturnsInitialValueForContenu() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getContenus()
		);
	}

	/**
	 * @test
	 */
	public function setContenusForObjectStorageContainingContenuSetsContenus() { 
		$contenu = new \TYPO3\PapMarketplace\Domain\Model\Contenu();
		$objectStorageHoldingExactlyOneContenus = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneContenus->attach($contenu);
		$this->fixture->setContenus($objectStorageHoldingExactlyOneContenus);

		$this->assertSame(
			$objectStorageHoldingExactlyOneContenus,
			$this->fixture->getContenus()
		);
	}
	
	/**
	 * @test
	 */
	public function addContenuToObjectStorageHoldingContenus() {
		$contenu = new \TYPO3\PapMarketplace\Domain\Model\Contenu();
		$objectStorageHoldingExactlyOneContenu = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneContenu->attach($contenu);
		$this->fixture->addContenu($contenu);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneContenu,
			$this->fixture->getContenus()
		);
	}

	/**
	 * @test
	 */
	public function removeContenuFromObjectStorageHoldingContenus() {
		$contenu = new \TYPO3\PapMarketplace\Domain\Model\Contenu();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($contenu);
		$localObjectStorage->detach($contenu);
		$this->fixture->addContenu($contenu);
		$this->fixture->removeContenu($contenu);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getContenus()
		);
	}
	
	/**
	 * @test
	 */
	public function getUtilisateurReturnsInitialValueForUtilisateur() { }

	/**
	 * @test
	 */
	public function setUtilisateurForUtilisateurSetsUtilisateur() { }
	
}
?>