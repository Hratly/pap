<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Gestioncontenu',
	'Gestion du contenu'
);


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    $_EXTKEY,
    'Affichagecontenu',
    'Affichage du contenu'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_gestioncontenu';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_gestioncontenu.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'PAP Marketplace');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_papmarketplace_domain_model_contenu', 'EXT:pap_marketplace/Resources/Private/Language/locallang_csh_tx_papmarketplace_domain_model_contenu.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_papmarketplace_domain_model_contenu');
$TCA['tx_papmarketplace_domain_model_contenu'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu',
		'label' => 'nom',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'nom,date_creation,proprietaire,prix,categories,fichiers,commentaires,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Contenu.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_papmarketplace_domain_model_contenu.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_papmarketplace_domain_model_fichier', 'EXT:pap_marketplace/Resources/Private/Language/locallang_csh_tx_papmarketplace_domain_model_fichier.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_papmarketplace_domain_model_fichier');
$TCA['tx_papmarketplace_domain_model_fichier'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_fichier',
		'label' => 'nom',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'nom,dossier,taille,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Fichier.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_papmarketplace_domain_model_fichier.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_papmarketplace_domain_model_achat', 'EXT:pap_marketplace/Resources/Private/Language/locallang_csh_tx_papmarketplace_domain_model_achat.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_papmarketplace_domain_model_achat');
$TCA['tx_papmarketplace_domain_model_achat'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_achat',
		'label' => 'utilisateur',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'utilisateur,date_achat,paye,contenus,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Achat.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_papmarketplace_domain_model_achat.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_papmarketplace_domain_model_categorie', 'EXT:pap_marketplace/Resources/Private/Language/locallang_csh_tx_papmarketplace_domain_model_categorie.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_papmarketplace_domain_model_categorie');
$TCA['tx_papmarketplace_domain_model_categorie'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_categorie',
		'label' => 'nom',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'nom,parent,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Categorie.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_papmarketplace_domain_model_categorie.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_papmarketplace_domain_model_commentaire', 'EXT:pap_marketplace/Resources/Private/Language/locallang_csh_tx_papmarketplace_domain_model_commentaire.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_papmarketplace_domain_model_commentaire');
$TCA['tx_papmarketplace_domain_model_commentaire'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_commentaire',
		'label' => 'utilisateur',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'utilisateur,commentaire,note,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Commentaire.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_papmarketplace_domain_model_commentaire.gif'
	),
);

?>