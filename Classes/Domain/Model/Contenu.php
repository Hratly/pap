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
class Contenu extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * nom
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $nom;

    /**
     * description
     *
     * @var \string
     * @validate NotEmpty
     */
    protected $description;

	/**
	 * dateCreation
	 *
	 * @var \DateTime
	 */
	protected $dateCreation;

	/**
	 * uid du FE User proprietaire
	 *
	 * @var \integer
	 * @validate NotEmpty
	 */
	protected $proprietaire;

	/**
	 * prix
	 *
	 * @var \float
	 * @validate NotEmpty
	 */
	protected $prix;

    /**
     * image
     * @var \string
     */
    protected $image;

	/**
	 * categories
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Categorie>
	 */
	protected $categories;

	/**
	 * fichiers
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Fichier>
	 */
	protected $fichiers;

	/**
	 * commentaires
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Commentaire>
	 */
	protected $commentaires;

	/**
	 * __construct
	 *
	 * @return Contenu
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
		$this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->fichiers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->commentaires = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

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
     * Returns the description
     *
     * @return \string $description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param \string $description
     * @return void
     */
    public function setDescription($description) {
        $this->description = $description;
    }

	/**
	 * Returns the dateCreation
	 *
	 * @return \DateTime $dateCreation
	 */
	public function getDateCreation() {
		return $this->dateCreation;
	}

	/**
	 * Sets the dateCreation
	 *
	 * @param \DateTime $dateCreation
	 * @return void
	 */
	public function setDateCreation($dateCreation) {
		$this->dateCreation = $dateCreation;
	}

	/**
	 * Returns the proprietaire
	 *
	 * @return \integer $proprietaire
	 */
	public function getProprietaire() {
		return $this->proprietaire;
	}

	/**
	 * Sets the proprietaire
	 *
	 * @param \integer $proprietaire
	 * @return void
	 */
	public function setProprietaire($proprietaire) {
		$this->proprietaire = $proprietaire;
	}

	/**
	 * Returns the prix
	 *
	 * @return \float $prix
	 */
	public function getPrix() {
		return $this->prix;
	}

	/**
	 * Sets the prix
	 *
	 * @param \float $prix
	 * @return void
	 */
	public function setPrix($prix) {
		$this->prix = $prix;
	}

    /**
     * @param mixed $image
     */
    public function setImage($image) {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage() {
        return $this->image;
    }

	/**
	 * Adds a Categorie
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Categorie $category
	 * @return void
	 */
	public function addCategory(\TYPO3\PapMarketplace\Domain\Model\Categorie $category) {
		$this->categories->attach($category);
	}

	/**
	 * Removes a Categorie
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Categorie $categoryToRemove The Categorie to be removed
	 * @return void
	 */
	public function removeCategory(\TYPO3\PapMarketplace\Domain\Model\Categorie $categoryToRemove) {
		$this->categories->detach($categoryToRemove);
	}

	/**
	 * Returns the categories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Categorie> $categories
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * Sets the categories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Categorie> $categories
	 * @return void
	 */
	public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * Adds a Fichier
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Fichier $fichier
	 * @return void
	 */
	public function addFichier(\TYPO3\PapMarketplace\Domain\Model\Fichier $fichier) {
		$this->fichiers->attach($fichier);
	}

	/**
	 * Removes a Fichier
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Fichier $fichierToRemove The Fichier to be removed
	 * @return void
	 */
	public function removeFichier(\TYPO3\PapMarketplace\Domain\Model\Fichier $fichierToRemove) {
		$this->fichiers->detach($fichierToRemove);
	}

	/**
	 * Returns the fichiers
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Fichier> $fichiers
	 */
	public function getFichiers() {
		return $this->fichiers;
	}

	/**
	 * Sets the fichiers
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Fichier> $fichiers
	 * @return void
	 */
	public function setFichiers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $fichiers) {
		$this->fichiers = $fichiers;
	}

	/**
	 * Adds a Commentaire
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaire
	 * @return void
	 */
	public function addCommentaire(\TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaire) {
		$this->commentaires->attach($commentaire);
	}

	/**
	 * Removes a Commentaire
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaireToRemove The Commentaire to be removed
	 * @return void
	 */
	public function removeCommentaire(\TYPO3\PapMarketplace\Domain\Model\Commentaire $commentaireToRemove) {
		$this->commentaires->detach($commentaireToRemove);
	}

	/**
	 * Returns the commentaires
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Commentaire> $commentaires
	 */
	public function getCommentaires() {
		return $this->commentaires;
	}

	/**
	 * Sets the commentaires
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\PapMarketplace\Domain\Model\Commentaire> $commentaires
	 * @return void
	 */
	public function setCommentaires(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $commentaires) {
		$this->commentaires = $commentaires;
	}

}
?>