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
class Utilisateur extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser {

	/**
	 * organisation
	 *
	 * @var \string
	 */
	protected $organisation;

	/**
	 * presentation
	 *
	 * @var \string
	 */
	protected $presentation;

	/**
	 * paypal
	 *
	 * @var \string
	 */
	protected $paypal;

	/**
	 * photo
	 *
	 * @var \string
	 */
	protected $photo;

	/**
	 * Returns the organisation
	 *
	 * @return \string $organisation
	 */
	public function getOrganisation() {
		return $this->organisation;
	}

	/**
	 * Sets the organisation
	 *
	 * @param \string $organisation
	 * @return void
	 */
	public function setOrganisation($organisation) {
		$this->organisation = $organisation;
	}

	/**
	 * Returns the presentation
	 *
	 * @return \string $presentation
	 */
	public function getPresentation() {
		return $this->presentation;
	}

	/**
	 * Sets the presentation
	 *
	 * @param \string $presentation
	 * @return void
	 */
	public function setPresentation($presentation) {
		$this->presentation = $presentation;
	}

	/**
	 * Returns the paypal
	 *
	 * @return \string $paypal
	 */
	public function getPaypal() {
		return $this->paypal;
	}

	/**
	 * Sets the paypal
	 *
	 * @param \string $paypal
	 * @return void
	 */
	public function setPaypal($paypal) {
		$this->paypal = $paypal;
	}

	/**
	 * Returns the photo
	 *
	 * @return \string $photo
	 */
	public function getPhoto() {
		return $this->photo;
	}

	/**
	 * Sets the photo
	 *
	 * @param \string $photo
	 * @return void
	 */
	public function setPhoto($photo) {
		$this->photo = $photo;
	}

}
?>