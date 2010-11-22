<?php
/**
 * Model class that holds Google Gallery properties
 * 
 * @author Cory D. Wiles @link http://www.corywiles.com
 * @category CW
 * @package Google_Picasa
 * 
 * @copyright  Copyright (c) 2007 Cory Wiles. (@link http://www.corywiles.com)
 */
class CW_Google_Picasa_Gallery {
	
	/**
	 * Gallery photo id
	 * 
	 * @access private
	 * @var string
	 */
	private $galleryPhotoId   = "";
	
	/**
	 * Gallery photo name
	 *
	 * @access private
	 * @var string
	 */
	private $galleryPhotoName = "";
	
	/**
	 * Gallery publish date
	 *
	 * @access private
	 * @var string
	 */
	private $galleryPublished = "";
	
	/**
	 * Public/Private access for the gallery
	 *
	 * @access private
	 * @var string
	 */
	private $galleryAccess    = "";
	
	/**
	 * Last modified date for a gallery
	 *
	 * @access private
	 * @var string
	 */
	private $galleryUpdated   = "";
	
	/**
	 * Gallery summary
	 *
	 * @access private
	 * @var string
	 */
	private $gallerySummary   = "";
	
	/**
	 * Gallery location
	 * 
	 * @access private
	 * @var string
	 */
	private $galleryLocation  = "";
	
	/**
	 * Thumbnail for a gallery
	 *
	 * @access private
	 * @var string
	 */
	private $galleryThumbnail = "";
	
	/**
	 * Number of photos for a gallery
	 *
	 * @access private
	 * @var string
	 */
	private $galleryNumPhotos = "";
	
	/**
	 * Class Constructor
	 * 
	 * @access public
	 * @param string $galleryId
	 * @param string $galleryName
	 * @param string $galleryPublished
	 * @param string $galleryAccess
	 * @param string $galleryUpdated
	 * @param string $gallerySummary
	 * @param string $galleryLocation
	 * @param string $galleryThumbnail
	 * @param string $galleryNumPhotos
	 */
	public function __construct(
	                            $galleryId,
	                            $galleryName, 
	                            $galleryPublished, 
	                            $galleryAccess, 
	                            $galleryUpdated,
	                            $gallerySummary,
	                            $galleryLocation,
	                            $galleryThumbnail,
	                            $galleryNumPhotos
	                            ) {
		
	  $this->setGalleryPhotoId($galleryId);
		$this->setGalleryPhotoName($galleryName);
		$this->setGalleryPublishedDate($galleryPublished);
		$this->setGalleryAccess($galleryAccess);
		$this->setGalleryUpdatedDate($galleryUpdated);
		$this->setGallerySummary($gallerySummary);
		$this->setGalleryLocation($galleryLocation);
		$this->setGalleryThumbnail($galleryThumbnail);
		$this->setGalleryNumPhotos($galleryNumPhotos);
	}

	/**
	 * Returns a gallery photo id
	 * 
	 * @access public
	 * @return string
	 */
  public function getGalleryPhotoId() {
    return $this->galleryPhotoId;
  }

  /**
   * Returns a gallery photo name
   *
   * @access public
   * @return string
   */
  public function getGalleryPhotoName() {
    return $this->galleryPhotoName;
  }

  /**
   * Returns the gallery published date
   *
   * @access public
   * @return string
   */
  public function getGalleryPublishedDate() {
    return $this->galleryPublished;
  }

  /**
   * Returns the gallery access
   *
   * @access public
   * @return string
   */
  public function getGalleryAccess() {
    return $this->galleryAccess;
  }

  /**
   * Returns the gallery last modified date
   *
   * @access publc
   * @return string
   */
  public function getGalleryUpdatedDate() {
    return $this->galleryUpdated;
  }

  /**
   * Returns gallery summary
   *
   * @access public
   * @return string
   */
  public function getGallerySummary() {
    return $this->gallerySummary;
  }

  /**
   * Returns gallery location
   *
   * @access public
   * @return string
   */
  public function getGalleryLocation() {
    return $this->galleryLocation;
  }

  /**
   * Returns the gallery thumbnail
   *
   * @access public
   * @return string
   */
  public function getGalleryThumbnail() {
    return $this->galleryThumbnail;
  }

  /**
   * Return the number of photos for a gallery
   *
   * @access public
   * @return string
   */
  public function getGalleryNumPhotos() {
    return $this->galleryNumPhotos;
  }
	
  /**
   * Set the gallery photo id
   *
   * @access private
   * @param string $galleryPhotoId
   */
  private function setGalleryPhotoId($galleryPhotoId) {
    $this->galleryPhotoId = $galleryPhotoId;
  }

  /**
   * Set the gallery photo name
   *
   * @access private
   * @param string $galleryPhotoName
   */
  private function setGalleryPhotoName($galleryPhotoName) {
    $this->galleryPhotoName = $galleryPhotoName;
  }

  /**
   * Set the gallery publish date
   *
   * @access private
   * @param string $galleryPublishedDate
   */
  private function setGalleryPublishedDate($galleryPublishedDate) {
    $this->galleryPublished = $galleryPublishedDate;
  }

  /**
   * Set the gallery access
   *
   * @access private
   * @param string $galleryAccess
   */
  private function setGalleryAccess($galleryAccess) {
    $this->galleryAccess = $galleryAccess;
  }

  /**
   * Set the last modified date
   *
   * @access private
   * @param string $galleryUpdatedDate
   */
  private function setGalleryUpdatedDate($galleryUpdatedDate) {
    $this->galleryUpdated = $galleryUpdatedDate;
  }

  /**
   * Set the gallery summary
   *
   * @access private
   * @param string $gallerySummary
   */
  private function setGallerySummary($gallerySummary) {
    $this->gallerySummary = $gallerySummary;
  }

  /**
   * Set gallery location
   * 
   * @access private
   * @param string $galleryLocation
   */
  private function setGalleryLocation($galleryLocation) {
    $this->galleryLocation = $galleryLocation;
  }

  /**
   * Set gallery thumbnail
   *
   * @access private
   * @param string $thumbnail
   */
  private function setGalleryThumbnail($thumbnail) {
    $this->galleryThumbnail = $thumbnail;
  }

  /**
   * Set the number of gallery photos
   *
   * @access private
   * @param string $numPhotos
   */
  private function setGalleryNumPhotos($numPhotos) {
    $this->galleryNumPhotos = $numPhotos;
  }
}

 
