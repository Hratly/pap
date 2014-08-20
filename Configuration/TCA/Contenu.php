<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_papmarketplace_domain_model_contenu'] = array(
	'ctrl' => $TCA['tx_papmarketplace_domain_model_contenu']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, nom, date_creation, prix, image, description, categories, fichiers, commentaires, proprietaire, niveau',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, nom, date_creation, prix, image, description, categories, fichiers, commentaires, proprietaire, niveau,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_papmarketplace_domain_model_contenu',
				'foreign_table_where' => 'AND tx_papmarketplace_domain_model_contenu.pid=###CURRENT_PID### AND tx_papmarketplace_domain_model_contenu.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'nom' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.nom',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'date_creation' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.date_creation',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'prix' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.prix',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2,required'
			),
		),
		'image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.image',
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
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'categories' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.categories',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_papmarketplace_domain_model_categorie',
				'MM' => 'tx_papmarketplace_contenu_categorie_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_papmarketplace_domain_model_categorie',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'fichiers' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.fichiers',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_papmarketplace_domain_model_fichier',
				'foreign_field' => 'contenu',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'commentaires' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.commentaires',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_papmarketplace_domain_model_commentaire',
				'foreign_field' => 'contenu',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'proprietaire' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.proprietaire',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'fe_users',
                'minitems' => 0,
                'maxitems' => 1,
                'items' => array(
                    array('', NULL),
                ),
            ),
		),
		'niveau' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:pap_marketplace/Resources/Private/Language/locallang_db.xlf:tx_papmarketplace_domain_model_contenu.niveau',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_papmarketplace_domain_model_niveau',
				'MM' => 'tx_papmarketplace_contenu_niveau_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_papmarketplace_domain_model_niveau',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
	),
);

?>