<?php
/**
 * Model class that holds Google Photo properties
 * 
 * @author Cory D. Wiles @link http://www.corywiles.com
 * @category CW
 * @package Google_Picasa
 * 
 * @copyright  Copyright (c) 2007 Cory Wiles. (@link http://www.corywiles.com)
 */
class CW_Google_Picasa_Photo {
  /**
   * Photo id
   *
   * @access private
   * @var string
   */
  private $photoId              = "";
  
  /**
   * Number of photo comments
   *
   * @access private
   * @var string
   */
  private $photoCommentCount    = "";
  
  /**
   * Are comments enabled
   *
   * @access private
   * @var boolean
   */
  private $photoCommentsEnabled = "";
  
  /**
   * Photo size
   *
   * @access private
   * @var string
   */
  private $photoSize            = "";
  
  /**
   * Photo timestamp
   *
   * @access private
   * @var string
   */
  private $photoTimeStamp       = "";
  
  /**
   * Photo image url
   *
   * @access private
   * @var string
   */
  private $photoImgUrl          = "";
  
  /**
   * Photo description
   *
   * @access private
   * @var string
   */
  private $photoDescription     = "";
  
  /**
   * Photo thumbnail url
   *
   * @access private
   * @var string
   */
  private $photoThumbnailUrl    = "";
  
  /**
   * Photo thumbnail width
   *
   * @access private
   * @var string
   */
  private $photoThumbnailWidth  = "";
  
  /**
   * Photo thumbnail height
   *
   * @access private
   * @var string
   */
  private $photoThumbnailHeight = "";
  
  /**
   * Latitude/Longitude of photo
   *
   * @access private
   * @var string
   */
  private $photoGeoWhere        = "";
  
  /**
   * Class constructor
   *
   * @access public
   * @param string $photoId
   * @param string $photoCommentCount
   * @param boolean $photoCommentsEnabled
   * @param string $photoSize
   * @param string $photoTimeStamp
   * @param string $photoImgUrl
   * @param string $photoDescription
   * @param string $photoThumbnailUrl
   * @param string $photoThumbnailWidth
   * @param string $photoThumbnailHeight
   */
  public function __construct(
                              $photoId,
                              $photoCommentCount,
                              $photoCommentsEnabled,
                              $photoSize,
                              $photoTimeStamp,
                              $photoImgUrl,
                              $photoDescription,
                              $photoThumbnailUrl,
                              $photoThumbnailWidth,
                              $photoThumbnailHeight,
                              $photoGeoWhere
                              ) {

    $this->setPhotoId($photoId);
    $this->setPhotoCommentCount($photoCommentCount);
    $this->setPhotoCommentEnabled($photoCommentsEnabled);
    $this->setPhotoSize($photoSize);
    $this->setPhotoTimeStamp($photoTimeStamp);
    $this->setPhotoImgUrl($photoImgUrl);
    $this->setPhotoDescription($photoDescription);
    $this->setPhotoThumbnailUrl($photoThumbnailUrl);
    $this->setPhotoThumbnailWidth($photoThumbnailWidth);
    $this->setPhotoThumbnailHeight($photoThumbnailHeight);
    $this->setPhotoGeoWhere($photoGeoWhere);
  } 
  
  /**
   * Return the photo id
   *
   * @access public
   * @return string
   */
  public function getPhotoId() {
    return $this->photoId;
  }

  /**
   * Return the photo comment count
   *
   * @access public
   * @return string
   */
  public function getPhotoCommentCount() {
    return $this->photoCommentCount;
  }

  /**
   * Return true/false if comments are enabled
   *
   * @access public
   * @return boolean
   */
  public function getPhotoCommentsEnabled() {
    return $this->photoCommentsEnabled;
  }

  /**
   * Return the photo size
   *
   * @access public
   * @return string
   */
  public function getPhotoSize() {
    return $this->photoSize;
  }

  /**
   * Return the photo timestamp
   *
   * @access public
   * @return string
   */
  public function getPhotoTimeStamp() {
    return $this->photoTimeStamp;
  }

  /**
   * Return the photo img url
   *
   * @access public
   * @return string
   */
  public function getPhotoImgUrl() {
    return $this->photoImgUrl;
  }

  /**
   * Return the photo description
   *
   * @access public
   * @return string
   */
  public function getPhotoDescription() {
    return $this->photoDescription;
  }

  /**
   * Return the photo thumbnail url
   *
   * @access public
   * @return string
   */
  public function getPhotoThumbnailUrl() {
    return $this->photoThumbnailUrl;
  }

  /**
   * Return the photo thumbnail width
   *
   * @access public
   * @return string
   */
  public function getPhotoThumbnailWidth() {
    return $this->photoThumbnailWidth;
  }

  /**
   * Return the photo thumbnail height
   *
   * @access public
   * @return string
   */
  public function getPhotoThumbnailHeight() {
    return $this->photoThumbnailHeight;
  }
  
  /**
   * Return the photo geo location
   *
   * @access public
   * @return string
   */
  public function getPhotoGeoWhere() {
  	return $this->photoGeoWhere;
  }
  
  /**
   * Set photo id
   * 
   * @access private
   * @param string $photoId
   */
  private function setPhotoId($photoId) {
    $this->photoId = $photoId;
  }

  /**
   * Set photo comment cont
   * 
   * @access private
   * @param string $commentsCount
   */
  private function setPhotoCommentCount($commentsCount) {
    $this->photoCommentCount = $commentsCount;
  }

  /**
   * Set boolean if comments are enabled for a photo
   * 
   * @access private
   * @param boolean $enabled
   */
  private function setPhotoCommentEnabled($enabled) {
    $this->photoCommentsEnabled = $enabled;
  }

  /**
   * Set photo size
   * 
   * @access private
   * @param string $photoSize
   */
  private function setPhotoSize($photoSize) {
    $this->photoSize = $photoSize;
  }

  /**
   * Set photo timestamp
   * 
   * @access private
   * @param string $timestamp
   */
  private function setPhotoTimeStamp($timestamp) {
    $this->photoTimeStamp = $timestamp;
  }

  /**
   * Set photo id
   * 
   * @access private
   * @param string $photoId
   */
  private function setPhotoImgUrl($url) {
    $this->photoImgUrl = $url;
  }

  /**
   * Set photo description
   * 
   * @access private
   * @param string $description
   */
  private function setPhotoDescription($description) {
    $this->photoDescription = $description;
  }

  /**
   * Set photo thumbnail url
   * 
   * @access private
   * @param string $url
   */
  private function setPhotoThumbnailUrl($url) {
    $this->photoThumbnailUrl = $url;
  }

  /**
   * Set photo thumbnail width
   * 
   * @access private
   * @param string $width
   */
  private function setPhotoThumbnailWidth($width) {
    $this->photoThumbnailWidth = $width;
  }

  /**
   * Set photo thumbnail height
   * 
   * @access private
   * @param string $height
   */
  private function setPhotoThumbnailHeight($height) {
    $this->photoThumbnailHeight = $height;
  }
  
  /**
   * Set the geo where property
   *
   * @access private
   * @param string $where
   */
  private function setPhotoGeoWhere($where) {
  	$this->photoGeoWhere = $where;
  }
}
