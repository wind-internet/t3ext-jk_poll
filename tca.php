<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");


$TCA["tx_jkpoll_poll"]["ctrl"]["dividers2tabs"] = 1;
$TCA["tx_jkpoll_poll"] = Array (
	"ctrl" => $TCA["tx_jkpoll_poll"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "hidden,starttime,endtime,fe_group,title,image,question,votes,answers,colors,crdate"
	),
	"feInterface" => $TCA["tx_jkpoll_poll"]["feInterface"],
	"columns" => Array (
		"crdate" => Array (		
			"exclude" => 1,
			"l10n_mode" => "mergeIfNotBlank",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.crdate",
			"config" => Array (
				"type" => "input",
				"size" => "15",
				"eval" => "date",
			)
		),
		"hidden" => Array (		
			"exclude" => 1,
			"l10n_mode" => "mergeIfNotBlank",
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.hidden",
			"config" => Array (
				"type" => "check",
				"default" => "0"
			)
		),
		"starttime" => Array (		
			"exclude" => 1,
			"l10n_mode" => "mergeIfNotBlank",
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.starttime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"default" => "0",
				"checkbox" => "0"
			)
		),
		"endtime" => Array (		
			"exclude" => 1,
			"l10n_mode" => "mergeIfNotBlank",
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.endtime",
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0",
				"range" => Array (
					"upper" => mktime(0,0,0,12,31,2020),
					"lower" => mktime(0,0,0,date("m")-1,date("d"),date("Y"))
				)
			)
		),
		"fe_group" => Array (		
			"exclude" => 1,
			"l10n_mode" => "mergeIfNotBlank",
			"label" => "LLL:EXT:lang/locallang_general.php:LGL.fe_group",
			"config" => Array (
				"type" => "select",
				"items" => Array (
					Array("", 0),
					Array("LLL:EXT:lang/locallang_general.php:LGL.hide_at_login", -1),
					Array("LLL:EXT:lang/locallang_general.php:LGL.any_login", -2),
					Array("LLL:EXT:lang/locallang_general.php:LGL.usergroups", "--div--")
				),
				"foreign_table" => "fe_groups"
			)
		),
		"title" => Array (		
			"exclude" => 1,
			"l10n_mode" => "prefixLangTitle",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required",
			)
		),
		"image" => Array (		
			"exclude" => 1,
			"l10n_mode" => "exclude",		
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.image",		
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => $GLOBALS["TYPO3_CONF_VARS"]["GFX"]["imagefile_ext"],	
				"max_size" => 500,	
				"uploadfolder" => "uploads/tx_jkpoll",
				"show_thumbs" => 1,	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
		"question" => Array (		
			"exclude" => 1,
			"l10n_mode" => "prefixLangTitle",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.question",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => Array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
		"votes" => Array (		
			"exclude" => 1,
			"l10n_mode" => "exclude",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.votes",
			"config" => Array (
				"type" => "none",
				"cols" => "30",	
				"rows" => "5",
			)
		),
		"answers" => Array (		
			"exclude" => 1,
			"l10n_mode" => "prefixLangTitle",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.answers",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
			)
		),
		"colors" => Array (		
			"exclude" => 1,
			"l10n_mode" => "mergeIfNotBlank",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.colors",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
			)
		),
		"votes_count" => Array (		
			"exclude" => 1,
			"l10n_mode" => "exclude",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.votes_count",
			"config" => Array (
				"type" => "none",
				"cols" => "30",	
			)
		),
		"valid_till" => Array (        
			"exclude" => 1,
			"l10n_mode" => "mergeIfNotBlank",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.valid_till",        
			"config" => Array (
				"type" => "input",
				"size" => "8",
				"max" => "20",
				"eval" => "date",
				"checkbox" => "0",
				"default" => "0"
			),
		),        
		"title_tag" => Array (        
			"exclude" => 1,
			"l10n_mode" => "prefixLangTitle",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.title_tag",        
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "2",
			)
		),
		"alternative_tag" => Array (        
			"exclude" => 1,
			"l10n_mode" => "prefixLangTitle",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.alternative_tag",        
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "2",
			)
		),
		"width" => Array (        
			"exclude" => 1,
			"l10n_mode" => "exclude",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.width",        
			"config" => Array (
				"type" => "input",
				"size" => "4",
				"max" => "4",
				"eval" => "int",
				"checkbox" => "0",
				"range" => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
		"height" => Array (        
			"exclude" => 1,
			"l10n_mode" => "exclude",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.height",        
			"config" => Array (
				"type" => "input",
				"size" => "4",
				"max" => "4",
				"eval" => "int",
				"checkbox" => "0",
				"range" => Array (
					"upper" => "1000",
					"lower" => "10"
				),
				"default" => 0
			)
		),
		"link" => Array (        
			"exclude" => 1,
			"l10n_mode" => "mergeIfNotBlank",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.link",        
			"config" => Array (
				"type" => "input",
				"size" => "15",
				"max" => "255",
				"checkbox" => "",
				"eval" => "trim",
				"wizards" => Array(
				"_PADDING" => 2,
				"link" => Array(
						"type" => "popup",
						"title" => "Link",
						"icon" => "link_popup.gif",
						"script" => "browse_links.php?mode=wizard",
						"JSopenParams" => "height=300,width=500,status=0,menubar=0,scrollbars=1"
					)
				)
			)
		),
		"clickenlarge" => Array (        
			"exclude" => 1,
			"l10n_mode" => "exclude",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.clickenlarge",        
			"config" => Array (
				"type" => "check",
			)
		),
		"answers_image" => Array (		
			"exclude" => 1,
			"l10n_mode" => "exclude",		
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.answers_image",		
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => $GLOBALS["TYPO3_CONF_VARS"]["GFX"]["imagefile_ext"],	
				"max_size" => 500,	
				"uploadfolder" => "uploads/tx_jkpoll",
				"show_thumbs" => 1,	
				"size" => 3,	
				"minitems" => 0,
				"maxitems" => 20,
			)
		),
		"answers_description" => Array (		
			"exclude" => 1,
			"l10n_mode" => "prefixLangTitle",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.answers_description",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
			)
		),
		"explanation" => Array (		
			"exclude" => 1,
			"l10n_mode" => "prefixLangTitle",
			"label" => "LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.explanation",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "3",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => Array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
		'sys_language_uid' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => Array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => Array(
					Array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					Array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => Array(
				'type' => 'select',
				'items' => Array(
					Array('', 0),
				),
				'foreign_table' => 'tx_jkpoll_poll',
				'foreign_table_where' => 'AND tx_jkpoll_poll.uid=###REC_FIELD_l18n_parent### AND tx_jkpoll_poll.sys_language_uid IN (-1,0)',
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'edit' => Array(
						'type' => 'popup',
						'title' => 'edit default language version of this record ',
						'script' => 'wizard_edit.php',
						'popup_onlyOpenIfSelected' => 1,
						'icon' => 'edit2.gif',
						'JSopenParams' => 'height=600,width=700,status=0,menubar=0,scrollbars=1,resizable=1',
					)
				)
			)
		),
		'l18n_diffsource' => Array(
			'config' => Array(
				'type'=>'passthrough'
			)
		),
	),
	"types" => Array (
		"0" => Array("showitem" => 
					'crdate, title, question;;4;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], answers;;2, colors, explanation;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts];1-1-1,
					--div--;LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.tabs.image, image;;3, title_tag, alternative_tag, width, height,
					--div--;LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.tabs.answers, answers_image, answers_description,
					--div--;LLL:EXT:jk_poll/locallang_db.xml:tx_jkpoll_poll.tabs.access, hidden;;1, valid_till,
					')
	
	
	/*			"hidden;;1;;1-1-1, title;;;;1-1-1,question;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],votes_count;;2,votes,answers,colors,answers_image,answers_description,explanation;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], image;;;;2-2-2,title_tag,alternative_tag,width,height,link,clickenlarge,crdate")
	
	'0' => Array('showitem' =>
            'hidden, type;;;;1-1-1,title;;;;2-2-2,short,bodytext;;2;richtext:rte_transform[flag=rte_enabled|mode=ts];4-4-4,
            --div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.special, datetime;;;;2-2-2,archivedate,author;;3;; ;;;;2-2-2,
                keywords;;;;2-2-2,sys_language_uid;;1;;3-3-3,
            --div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.media, image;;;;1-1-1,imagecaption;;5;;,links;;;;2-2-2,news_files;;;;4-4-4,
            --div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.catAndRels, category;;;;3-3-3,related;;;;3-3-3,
            --div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.access, starttime,endtime,fe_group,editlock,
            --div--;LLL:EXT:tt_news/locallang_tca.xml:tt_news.tabs.extended,
            '),*/
	
		
	),
	"palettes" => Array (
		"1" => Array("showitem" => "starttime, endtime, fe_group"),
		"2" => Array("showitem" => "votes_count, votes"),
	 	"3" => Array("showitem" => "link, clickenlarge"),
//		"4" => Array("showitem" => "explanation;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts]")
	)
);
?>
