<?php

namespace TYPO3\PapMarketplace\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Sébastien Légaré 
 *  			Jérémie Ratomposon 
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
 * Test case for class \TYPO3\PapMarketplace\Domain\Model\Fichier.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage PAP Marketplace
 *
 * @author Sébastien Légaré 
 * @author Jérémie Ratomposon 
 */
class FichierTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\PapMarketplace\Domain\Model\Fichier
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\PapMarketplace\Domain\Model\Fichier();
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
	public function getDossierReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDossierForStringSetsDossier() { 
		$this->fixture->setDossier('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDossier()
		);
	}
	
	/**
	 * @test
	 */
	public function getTailleReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getTaille()
		);
	}

	/**
	 * @test
	 */
	public function setTailleForFloatSetsTaille() { 
		$this->fixture->setTaille(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getTaille()
		);
	}
	
}
?>