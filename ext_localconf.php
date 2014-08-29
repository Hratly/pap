<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Gestioncontenu',
	array(
		'Contenu' => 'list, show, new, edit, acheter',
		
	),
	// non-cacheable actions
	array(
		'Contenu' => 'create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'TYPO3.' . $_EXTKEY,
    'Gestionprofil',
    array(
        'Utilisateur' => 'new, edit, afficherConfirmation, recupererMotDePasse',

    ),
    // non-cacheable actions
    array(
        'Utilisateur' => 'create, update, doRecupererMotDePasse',

    )
);

?>