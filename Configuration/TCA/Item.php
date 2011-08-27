<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_wsmap_domain_model_item'] = array(
	'ctrl' => $TCA['tx_wsmap_domain_model_item']['ctrl'],
	'interface' => array(
		'showRecordFieldList'	=> 'name,id,latitude,longitude,description,link,align,icon',
	),
	'types' => array(
		'1' => array('showitem'	=> 'name,id,latitude,longitude,description,link,align,icon'),
	),
	'palettes' => array(
		'1' => array('showitem'	=> ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude'			=> 1,
			'label'				=> 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config'			=> array(
				'type'					=> 'select',
				'foreign_table'			=> 'sys_language',
				'foreign_table_where'	=> 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0)
				),
			)
		),
		'l18n_parent' => array(
			'displayCond'	=> 'FIELD:sys_language_uid:>:0',
			'exclude'		=> 1,
			'label'			=> 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config'		=> array(
				'type'			=> 'select',
				'items'			=> array(
					array('', 0),
				),
				'foreign_table' => 'tx_wsmap_domain_model_item',
				'foreign_table_where' => 'AND tx_wsmap_domain_model_item.uid=###REC_FIELD_l18n_parent### AND tx_wsmap_domain_model_item.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'		=>array(
				'type'		=>'passthrough',
			)
		),
		't3ver_label' => array(
			'displayCond'	=> 'FIELD:t3ver_label:REQ:true',
			'label'			=> 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config'		=> array(
				'type'		=>'none',
				'cols'		=> 27,
			)
		),
		'hidden' => array(
			'exclude'	=> 1,
			'label'		=> 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'	=> array(
				'type'	=> 'check',
			)
		),
		'name' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.name',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'id' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.id',
			'config'	=> array(
				'type' => 'input',
				'size' => 15,
				'eval' => 'trim,required'
			),
		),
		'latitude' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.latitude',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'longitude' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.longitude',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'description' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.description',
			'config' => Array (
        'type' => 'text',
        'cols' => 40,    
        'rows' => 6,
        'softref' => 'typolink_tag,images,email[subst],url',  
        'wizards' => Array(
          '_PADDING' => 4,
          'RTE' => Array(
            'notNewRecords' => 1,
            'RTEonly' => 1,
            'type' => 'script',
            'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
            'icon' => 'wizard_rte2.gif',
            'script' => 'wizard_rte.php',
          ),
        )
      ),
		),
		'link' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.link',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
        'wizards' => array(
          '_PADDING' => 2,
          'link' => array(
            'type' => 'popup',
            'title' => 'Link',
            'icon' => 'link_popup.gif',
            'script' => 'browse_links.php?mode=wizard',
            'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
          )
        ),
        'softref' => 'typolink[linkList]'
        
			),
		),
		'align' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.align',
			'config'	=> array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.align.top', 1),
          array('LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.align.bottom', 2),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'icon' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.icon',
			'config'	=> array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.icon.red', 1),
          array('LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.icon.yellow', 2),
          array('LLL:EXT:ws_map/Resources/Private/Language/locallang_db.xml:tx_wsmap_domain_model_item.icon.blue', 3),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
	),
  'types' => array(
    '0' => array('showitem' => 'hidden, name, id, longitude, latitude, description;;;richtext[]:rte_transform[mode=ts], link, align, icon'),
  ),
  'palettes' => array(
    '1' => array('showitem' => 'hidden, title')
  ),
);
?>