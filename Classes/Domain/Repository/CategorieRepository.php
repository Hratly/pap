<?php
namespace TYPO3\PapMarketplace\Domain\Repository;

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
class CategorieRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * Returns all objects of this repository.
     *
     * @return array
     */
    public function findAllHierarchique() {
        $query = $this->createQuery();
        $listeCategories = $query->matching($query->equals('parent',0))->execute()->toArray();
        $listeCategoriesFinal = array();
        for($i = 0; $i < count($listeCategories); $i++){
            $listeCategoriesFinal[$i]["uid"] = $listeCategories[$i]->getUid();
            $listeCategoriesFinal[$i]["nom"] = $listeCategories[$i]->getNom();
            $listeCategoriesFinal[$i]["enfants"] = $this->findAllEnfants($listeCategories[$i]->getUid());
        }
        return $listeCategoriesFinal;
    }

    private function findAllEnfants($uidParent){
        if($this->countEnfants($uidParent) > 0){
            $arrTmp = array();
            $query = $this->createQuery();
            $listeCategoriesTmp = array();
            $listeCategories = $query->matching($query->equals('parent',$uidParent))->execute()->toArray();
            for($i = 0; $i < count($listeCategories); $i++){
                $listeCategoriesTmp[$i]["uid"] = $listeCategories[$i]->getUid();
                $listeCategoriesTmp[$i]["nom"] = $listeCategories[$i]->getNom();
                $listeCategoriesTmp[$i]["enfants"] = $this->findAllEnfants($listeCategories[$i]->getUid());
            }
            return $listeCategoriesTmp;
        }
    }

    private function countEnfants($uidParent){
        $query = $this->createQuery();
        return $query->matching($query->equals('parent',$uidParent))->count();
    }
}
?>