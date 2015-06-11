<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "jk_poll".
 *
 * Auto generated 30-03-2015 13:50
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Poll',
	'description' => 'A poll based on the extension quickpoll. A template-file can be used to define the output in the frontend. It is also possible to create a horiontal or vertical display of the percentage of users voted for an answer.',
	'category' => 'plugin',
	'version' => '0.9.99',
	'state' => 'beta',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Johannes Krausmueller',
	'author_email' => 'johannes@krausmueller.de',
	'author_company' => '',
	'constraints' =>
	array (
		'depends' =>
		array (
			'typo3' => '4.5.0-6.2.99',
		),
		'conflicts' =>
		array (
		),
		'suggests' =>
		array (
		),
	),
);