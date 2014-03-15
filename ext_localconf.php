<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Gestioncontenu',
	array(
		'Contenu' => 'list, show, new, edit',
        'Commentaire' => ''
	),
	// non-cacheable actions
	array(
		'Contenu' => 'create, update, delete',
        'Commentaire' => 'create'
	)
);

?>