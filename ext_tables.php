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
    'Gestionprofil',
    'Gestion du profil'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_gestionprofil';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_gestionprofil.xml');

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
		'searchFields' => 'nom,date_creation,prix,image,description,categories,fichiers,commentaires,proprietaire,niveau,',
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
		'label' => 'date_achat',
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
		'searchFields' => 'date_achat,paye,contenus,utilisateur,',
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
		'label' => 'commentaire',
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
		'searchFields' => 'commentaire,note,utilisateur,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Commentaire.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_papmarketplace_domain_model_commentaire.gif'
	),
);

$tmp_pap_marketplace_columns = array(

	'organisation' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_utilisateur.organisation',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'presentation' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_utilisateur.presentation',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim',
			'wizards' => array(
				'RTE' => array(
					'icon' => 'wizard_rte2.gif',
					'notNewRecords'=> 1,
					'RTEonly' => 1,
					'script' => 'wizard_rte.php',
					'title' => 'LLL:EXT:cms/locallang_ttc.:bodytext.W.RTE',
					'type' => 'script'
				)
			)
		),
		'defaultExtras' => 'richtext[]',
	),
	'paypal' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_utilisateur.paypal',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'photo' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_utilisateur.photo',
		'config' => array(
			'type' => 'group',
			'internal_type' => 'file',
			'uploadfolder' => 'uploads/tx_papmarketplace',
			'show_thumbs' => 1,
			'size' => 5,
			'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
			'disallowed' => '',
		),
	),
);

t3lib_extMgm::addTCAcolumns('fe_users',$tmp_pap_marketplace_columns);

$TCA['fe_users']['columns'][$TCA['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_PapMarketplace_Utilisateur','Tx_PapMarketplace_Utilisateur');

$TCA['fe_users']['types']['Tx_PapMarketplace_Utilisateur']['showitem'] = $TCA['fe_users']['types']['1']['showitem'];
$TCA['fe_users']['types']['Tx_PapMarketplace_Utilisateur']['showitem'] .= ',--div--;LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_utilisateur,';
$TCA['fe_users']['types']['Tx_PapMarketplace_Utilisateur']['showitem'] .= 'organisation, presentation, paypal, photo';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_papmarketplace_domain_model_niveau', 'EXT:pap_marketplace/Resources/Private/Language/locallang_csh_tx_papmarketplace_domain_model_niveau.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_papmarketplace_domain_model_niveau');
$TCA['tx_papmarketplace_domain_model_niveau'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_niveau',
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
		'searchFields' => 'nom,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Niveau.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_papmarketplace_domain_model_niveau.gif'
	),
);

?>