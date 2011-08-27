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
 * Item
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

 class Tx_WsMap_Domain_Model_Item extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * name
	 *
	 * @var string $name
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * id
	 *
	 * @var string $id
	 * @validate NotEmpty
	 */
	protected $id;

	/**
	 * latitude
	 *
	 * @var float $latitude
	 * @validate NotEmpty
	 */
	protected $latitude;

	/**
	 * longitude
	 *
	 * @var float $longitude
	 * @validate NotEmpty
	 */
	protected $longitude;
	
	
	/**
   * x
   *
   * @var int $x
   */
  protected $x;

  /**
   * y
   *
   * @var int $y
   */
  protected $y;
	

	/**
	 * description
	 *
	 * @var string $description
	 * @validate NotEmpty
	 */
	protected $description;

	/**
	 * link
	 *
	 * @var string $link
	 */
	protected $link;

	/**
	 * align
	 *
	 * @var string $align
	 */
	protected $align;

	/**
	 * icon
	 *
	 * @var string $icon
	 */
	protected $icon;

	/**
	 * Setter for name
	 *
	 * @param string $name name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Getter for name
	 *
	 * @return string name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Setter for id
	 *
	 * @param string $id id
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Getter for id
	 *
	 * @return string id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Setter for latitude
	 *
	 * @param float $latitude latitude
	 * @return void
	 */
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}

	/**
	 * Getter for latitude
	 *
	 * @return float latitude
	 */
	public function getLatitude() {
		return $this->latitude;
	}

	/**
	 * Setter for longitude
	 *
	 * @param float $longitude longitude
	 * @return void
	 */
	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}

	/**
	 * Getter for longitude
	 *
	 * @return float longitude
	 */
	public function getLongitude() {
		return $this->longitude;
	}
	
  /**
   * Setter for x
   *
   * @param float $x x
   * @return void
   */
  public function setX($x) {
    $this->x = $x;
  }

  /**
   * Getter for x
   *
   * @return int x
   */
  public function getX() {
    return $this->x;
  }
  
  /**
   * Setter for y
   *
   * @param float $y y
   * @return void
   */
  public function setY($y) {
    $this->y = $y;
  }

  /**
   * Getter for y
   *
   * @return int y
   */
  public function getY() {
    return $this->y;
  }

	/**
	 * Setter for description
	 *
	 * @param string $description description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Getter for description
	 *
	 * @return string description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Setter for link
	 *
	 * @param string $link link
	 * @return void
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * Getter for link
	 *
	 * @return string link
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * Setter for align
	 *
	 * @param string $align align
	 * @return void
	 */
	public function setAlign($align) {
		$this->align = $align;
	}

	/**
	 * Getter for align
	 *
	 * @return string align
	 */
	public function getAlign() {
		return $this->align;
	}

	/**
	 * Setter for icon
	 *
	 * @param string $icon icon
	 * @return void
	 */
	public function setIcon($icon) {
		$this->icon = $icon;
	}

	/**
	 * Getter for icon
	 *
	 * @return string icon
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * The constructor of this Item
	 *
	 * @return void
	 */
	public function __construct() {

	}

}
?>