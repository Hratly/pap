<?php
namespace TYPO3\PapMarketplace\Controller;

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
class ContenuController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * contenuRepository
	 *
	 * @var \TYPO3\PapMarketplace\Domain\Repository\ContenuRepository
	 * @inject
	 */
	protected $contenuRepository;

    /**
     * $categorieRepository
     *
     * @var \TYPO3\PapMarketplace\Domain\Repository\CategorieRepository
     * @inject
     */
    protected $categorieRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
        if($this->request->hasArgument("categorieUid")) {
            $contenus = $this->contenuRepository->findByCategorie($this->categorieRepository->findByUid($this->request->getArgument("categorieUid")));
        } else {
            $contenus = $this->contenuRepository->findAll();
        }

		$this->view->assign('contenus', $contenus);
        $this->view->assign('countContenus', count($contenus));
        $categoriesHierarchiques = $this->categorieRepository->findAllHierarchique();
        $this->view->assign('categories', $this->formatCategoriesRecherche($categoriesHierarchiques,TRUE));
	}

    /**
     * action list
     *
     * @return void
     */
    public function mesContenusAction() {
        if($this->request->hasArgument("categorieUid")) {
            $contenus = $this->contenuRepository->findByCategorie($this->categorieRepository->findByUid($this->request->getArgument("categorieUid")));
        } else {
            $contenus = $this->contenuRepository->findAll();
        }

        $this->view->assign('contenus', $contenus);
        $this->view->assign('countContenus', count($contenus));
        $categoriesHierarchiques = $this->categorieRepository->findAllHierarchique();
        $this->view->assign('categories', $this->formatCategoriesRecherche($categoriesHierarchiques,TRUE));
    }

	/**
	 * action show
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
	 * @return void
	 */
	public function showAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
		$this->view->assign('contenu', $contenu);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $newContenu
	 * @dontvalidate $newContenu
	 * @return void
	 */
	public function newAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $newContenu = NULL) {
		$this->view->assign('newContenu', $newContenu);
        $this->view->assign('utilisateur', $GLOBALS['TSFE']->fe_user);
        $categoriesHierarchiques = $this->categorieRepository->findAllHierarchique();
        $this->view->assign('categories', $this->formatCategories($categoriesHierarchiques,TRUE));
        $this->view->assign('categoriesPlain', $this->categorieRepository->findAll());
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $newContenu
	 * @return void
	 */
	public function createAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $newContenu) {
        $newContenu->setDateCreation(new \DateTime());
        if($this->request->hasArgument('image') && $_FILES["tx_papmarketplace_gestioncontenu"] != null) {
            $imageName = $this->generateRandomString().".". substr(strrchr($_FILES["tx_papmarketplace_gestioncontenu"]["name"]["image"],'.'),1);
            move_uploaded_file($_FILES["tx_papmarketplace_gestioncontenu"]["tmp_name"]["image"], "uploads/images/" . $imageName);
            $newContenu->setImage("uploads/images/" . $imageName);
        }

		$this->contenuRepository->add($newContenu);
        if($this->request->hasArgument('fichier') && $_FILES["tx_papmarketplace_gestioncontenu"] != null) {
            $fichierName = $this->generateRandomString().".". substr(strrchr($_FILES["tx_papmarketplace_gestioncontenu"]["name"]["fichier"],'.'),1);
            move_uploaded_file($_FILES["tx_papmarketplace_gestioncontenu"]["tmp_name"]["fichier"], "uploads/contenus/" . $fichierName);
            $fichierTmp = new \TYPO3\PapMarketplace\Domain\Model\Fichier();
            $fichierTmp->setDossier("uploads/contenus/");
            $fichierTmp->setNom($fichierName);
            $fichierTmp->setTaille($_FILES["tx_papmarketplace_gestioncontenu"]["size"]["fichier"]);
            $newContenu->addFichier($fichierTmp);
        }

		$this->flashMessageContainer->add('Your new Contenu was created.');
		$this->redirect('list','Contenu');
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
	 * @return void
	 */
	public function editAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
		$this->view->assign('contenu', $contenu);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
	 * @return void
	 */
	public function updateAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
		$this->contenuRepository->update($contenu);
		$this->flashMessageContainer->add('Your Contenu was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\PapMarketplace\Domain\Model\Contenu $contenu
	 * @return void
	 */
	public function deleteAction(\TYPO3\PapMarketplace\Domain\Model\Contenu $contenu) {
		$this->contenuRepository->remove($contenu);
		$this->flashMessageContainer->add('Your Contenu was removed.');
		$this->redirect('list');
	}

    private function formatCategories($arrCategories, $first = FALSE) {
        if($first === TRUE) {
            $strCategories = "<ul id='arbreCategories'>";
        } else {
            $strCategories = "<ul>";
        }

        for($i = 0; $i < count($arrCategories); $i++){
            $strCategories .= "<li style='cursor:pointer;'><div onclick='selectCategorie(".$arrCategories[$i]["uid"].");'>".$arrCategories[$i]["nom"]."</div>";
            if($arrCategories[$i]["enfants"] != null) {
                $strCategories .= $this->formatCategories($arrCategories[$i]["enfants"]);
            }
            $strCategories .= "</li>";
        }
        $strCategories .= "</ul>";
        return $strCategories;
    }

    private function formatCategoriesRecherche($arrCategories, $first = FALSE) {
        if($first === TRUE) {
            $strCategories = "<ul id='arbreCategories'>";
        } else {
            $strCategories = "<ul>";
        }

        for($i = 0; $i < count($arrCategories); $i++){
            $strCategories .= "<li style='cursor:pointer;'><a href='".$this->curPageURL()."&tx_papmarketplace_affichagecontenu[action]=list&tx_papmarketplace_affichagecontenu[categorieUid]=".$arrCategories[$i]["uid"]."'>".$arrCategories[$i]["nom"]."</a>";
            if($arrCategories[$i]["enfants"] != null) {
                $strCategories .= $this->formatCategoriesRecherche($arrCategories[$i]["enfants"]);
            }
            $strCategories .= "</li>";
        }
        $strCategories .= "</ul>";
        return $strCategories;
    }

    private function curPageURL() {
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        //faire un preg_replace
       // return $pageURL;
        return "http://192.168.1.104/index.php?id=3";
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}
?>