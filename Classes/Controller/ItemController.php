<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Nikolay Orlenko <info@web-spectr.com>, Web.Spectr
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
 * Controller for the Item object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

 class Tx_WsMap_Controller_ItemController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
   * @var Tx_WsMap_Domain_Model_Item
   */
  protected $itemRepository;
  
  /**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
    $this->itemRepository = t3lib_div::makeInstance('Tx_WsMap_Domain_Repository_ItemRepository');
	}
  
  /**
	 * Displays all Items
	 *
	 * @return string The rendered list view
	 */
	public function listAction() {
	  $GLOBALS['TSFE']->additionalHeaderData['ws_map_pi1'] = '
      <script src="typo3conf/ext/ws_map/Resources/Public/Js/jquery-1.5.1.min.js" type="text/javascript"></script>
      <script src="typo3conf/ext/ws_map/Resources/Public/Js/jquery-tooltip/lib/jquery.bgiframe.js" type="text/javascript"></script>
      <script src="typo3conf/ext/ws_map/Resources/Public/Js/jquery-tooltip/lib/jquery.dimensions.js" type="text/javascript"></script>
      <script src="typo3conf/ext/ws_map/Resources/Public/Js/jquery-tooltip/jquery.tooltip.js" type="text/javascript"></script>
      
      <script type="text/javascript">
      $(function() {
        $("#map .abs").tooltip({
          bodyHandler: function() {
            return $("#"+($(this).attr("id")) + "-desc" ).html();
          },
          extraClass: "pretty", 
          fixPNG: true, 
          opacity: 0.95, 
          showURL: false
        });
      });
      </script>
    ';
	  
    $oItems = $this->itemRepository->findItems();
    foreach($oItems as $k=>$oItem) {
      $oItems[$k] = $this->calculateXY($oItem);  
    }
    
    $cssContent = t3lib_div::getURL($this->settings['css']);
    $cssContent = strlen($cssContent) ? $cssContent : '';
    
    $aSettings = array(
      'width'=> $this->settings['width'],
      'height'=> $this->settings['height'],
      'css' => $cssContent, //TODO
    );
    
		$this->view->assign('items', $oItems);
		$this->view->assign('settings', $aSettings);
	 
	}
	
  /**
  * Calculate XY in pixels for each item
  * @param object
  * @return object
  */
	private function calculateXY($oItem){
	  
    $x = intval($this->settings['width']) * ((float) $oItem->getLongitude() - (float) $this->settings['leftX'])/((float) $this->settings['rightX'] - (float) $this->settings['leftX']);
    $y = intval($this->settings['height']) * ((float) $oItem->getLatitude() - (float) $this->settings['bottomY'])/((float) $this->settings['topY'] - (float) $this->settings['bottomY']);
    
    //Without icon sizes
    $x = intval($x) - 32/3;
    $y = intval($y) - 32/3;
    
    $oItem->setX($x);
    $oItem->setY($y); 
    
    return $oItem;
	}

}
?>