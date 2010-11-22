<?php
require_once dirname(__FILE__).'/../Album.php';
require_once dirname(__FILE__).'/../Gallery.php';
require_once dirname(__FILE__).'/../Photo.php';

/**
 *
 * Provides functionality to interact with Zend's Gdata APIs
 *
 * As the Google data API protocol is based upon the Atom Publishing Protocol
 * (APP), CW_Google_PicasaUtil functionality extends the appropriate
 * Zend_Gdata_App classes
 *
 * @link http://code.google.com/apis/gdata/overview.html
 * @link http://framework.zend.com/apidoc/core/Zend_Gdata/Zend_Gdata.html
 *
 * @author Cory D. Wiles
 * @copyright  Copyright (c) 2007 Cory Wiles. (@link http://www.corywiles.com)
 *
 * @category CW
 * @package Google_Picasa
 * @subpackage Service
 */
class CW_Google_Picasa_Service_Util {

  /**
   * MAX size for the an image
   *
   */
  const PIXEL_MAX            = "800";

  /**
   * The start index for displaying images
   *
   */
  const START_INDEX          = 1;

  /**
   * Max number of images to display per page
   *
   */
  const MAX_RESULTS          = 100;

  /**
   * Picasa username
   *
   * @access private
   * @var string
   */
  private $user              = "";

  /**
   * User feed instance
   *
   * @access private
   * @var Zend_Gdata_Photos_UserFeed
   */
  private $userFeedInstance  = "";

  /**
   * Author attributes
   *
   * @access private
   * @var CW_Google_Picasa_Album
   */
  private $authorAttrs       = null;

  /**
   * Enter description here...
   *
   * @access private
   * @var CW_Google_Picasa_Gallery
   */
  private $galleryAttrs      = array();

  /**
   * Enter description here...
   *
   * @access private
   * @var CW_Google_Picasa_Photo
   */
  private $photoAttrs        = array();

  /**
   * Enter description here...
   *
   * @access private
   * @var Zend_Gdata_Photos
   */
  private $gPhotoService     = null;

  /**
   * Enter description here...
   *
   * @access private
   * @var string
   */
  private $gGalleryLocation  = "";

  /**
   * Enter description here...
   *
   * @access private
   * @var string
   */
  private $gGalleryTitle     = "";

  private $gGalleryTimestamp = "";

  private $gGalleryNumPhotos = "";

  private $nextLink          = "";

  private $previousLink      = "";

  /**
   * Initalize CW_Google_PicasaUtil
   *
   * @access public
   * @param string $user
   * @throws Exception
   */
  public function __construct($user) {

    if ($user == "" || $user == null) {

      throw new Exception("Empty username isn't valid");

    } else {

      $this->setUser($user);

       $service = new Zend_Gdata_Photos();
       $this->setGphotoService($service);
    }
  }

  /**
   * Retrieve the list of author attributes who is the 'owner' of the picasa
   * gallery
   *
   * @access public
   * @return array authorAttrs
   */
  public function getPicasaAuthorMetaInformation() {
    $query   = new Zend_Gdata_Photos_UserQuery();

    $query->setUser($this->getUser());
    $query->setKind("album");

    try {

      $this->setUserFeedInstance($this->getGphotoService()->getUserFeed(null, $query));

    } catch (Zend_Gdata_App_HttpException $httpexception) {
      print $httpexception->getResponse()->getBody();
    }

    try {

      $gPicasa= new CW_Google_Picasa_Album(
                                    $this->getUserFeedInstance()->author[0]->name,
                                    $this->getUserFeedInstance()->updated,
                                    $this->getUserFeedInstance()->title,
                                    $this->getUserFeedInstance()->author[0]->uri,
                                    $this->getUserFeedInstance()->getGphotoThumbnail(),
                                    $this->getUserFeedInstance()->getTotalResults()
                                   );

      $this->setAuthorAttrs($gPicasa);

    } catch (Zend_Gdata_App_Exception $e) {
      print  "Error: " . $e->__toString();
    } catch (Exception $ex) {
      print "Error: ".$ex->__toString();
    }

    return $this->getAuthorAttrs();
  }

  /**
   * Retrieves a list of Picasa albums.  There are three possible scenarios that
   * this method can be used.
   * <ol>
   *  <li>
   *    Pass instance of Zend_Gdata_Photos_UserFeed and retrieve the album
   *    attributes
   *  </li>
   *  <li>
   *    If {@link getUserFeedInstance()} has been called and is an instance of
   *    Zend_Gdata_Photos_UserFeed the retrieve the album attributes
   *  </li>
   *  <li>
   *    If there isn't an instance of Zend_Gdata_Photos_UserFeed then create
   *    the query and retrieve the attributes.
   *  </li>
   * </ol>
   *
   * @access public
   * @see Zend_Gdata_Photos_UserFeed
   * @param Zend_Gdata_Photos_UserFeed $zgpuf
   * @throws Exception
   */
  public function getUserAlbums(Zend_Gdata_Photos_UserFeed $zgpuf = null) {

    if ($zgpuf != null && !$zgpuf instanceof Zend_Gdata_Photos_UserFeed) {

      throw new Exception("Invalid parameter. Must be an instance of Zend_Gdata_Photos_UserFeed");

    } elseif ($zgpuf instanceof Zend_Gdata_Photos_UserFeed) {

        foreach ($zgpuf as $gallery) {

          $gPicasa = new CW_Google_Picasa_Gallery(
                                         $gallery->getGphotoId(),
                                         $gallery->getGphotoName(),
                                         $gallery->getPublished(),
                                         $gallery->getGphotoAccess(),
                                         $gallery->getUpdated(),
                                         $gallery->getSummary(),
                                         $gallery->getGphotoLocation(),
                                         $gallery->mediaGroup->thumbnail[0]->url,
                                         $gallery->getGphotoNumPhotos()
                                        );

          $this->setGalleryAttrs($gPicasa);
        }
    } elseif ($this->getUserFeedInstance() instanceof Zend_Gdata_Photos_UserFeed) {

        foreach ($this->getUserFeedInstance() as $gallery) {

          $gPicasa = new CW_Google_Picasa_Gallery(
                                         $gallery->getGphotoId(),
                                         $gallery->getGphotoName(),
                                         $gallery->getPublished(),
                                         $gallery->getGphotoAccess(),
                                         $gallery->getUpdated(),
                                         $gallery->getSummary(),
                                         $gallery->getGphotoLocation(),
                                         $gallery->mediaGroup->thumbnail[0]->url,
                                         $gallery->getGphotoNumPhotos()
                                        );
          $this->setGalleryAttrs($gPicasa);

        }
    } else {

        $query = new Zend_Gdata_Photos_UserQuery();

        $query->setUser($this->getUser());
        $query->setKind("album");

        $this->setUserFeedInstance($this->getGphotoService()->getUserFeed(null, $query));

        foreach ($this->getUserFeedInstance() as $gallery) {

          $gPicasa = new CW_Google_Picasa_Gallery(
                                         $gallery->getGphotoId(),
                                         $gallery->getGphotoName(),
                                         $gallery->getPublished(),
                                         $gallery->getGphotoAccess(),
                                         $gallery->getUpdated(),
                                         $gallery->getSummary(),
                                         $gallery->getGphotoLocation(),
                                         $gallery->mediaGroup->thumbnail[0]->url,
                                         $gallery->getGphotoNumPhotos()
                                        );
          $this->setGalleryAttrs($gPicasa);

        }

    }

    return $this->getGalleryAttrs();

  }

  /**
   * Retrieve list of gallery images and their properties
   *
   * @access public
   * @param string $gallery
   * @throws Exception
   * @return array $photoAttrs
   */
  public function getGalleryImages($gallery) {

    $query = new Zend_Gdata_Photos_AlbumQuery();

    $query->setUser($this->getUser());
    $query->setStartIndex(self::START_INDEX);
    $query->setMaxResults(self::MAX_RESULTS);

    if (Zend_Validate::is($gallery, 'Alnum')) {

      $query->setAlbumName($gallery);

    } elseif (Zend_Validate::is($gallery, 'Digits')) {

      $query->setAlbumId($gallery);

    } else {

      throw new Exception("Invalid gallery was given");
    }

    try {

      $albumFeed = $this->getGphotoService()->getAlbumFeed($query);
      /*
      $previousLink = $albumFeed->getLink("previous");
      $nextLink     = $albumFeed->getLink("next");

      if (!is_null($previousLink)) {

        $previousFeed = $this->getGphotoService()->getAlbumFeed($previousLink->href);
        $this->setPreviousLink($previousLink->href);
      }

      if (!is_null($nextLink)) {

        $nextFeed  = $this->getGphotoService()->getAlbumFeed($nextLink->href);
        $this->setNextLink($nextLink->href);
      }
      */
      $this->setGGalleryNumPhotos($albumFeed->getGphotoNumPhotos());
      $this->setGGalleryLocation($albumFeed->getGphotoLocation());
      $this->setGGalleryTimestamp(substr($albumFeed->getGphotoTimestamp(), 0, 10));
      $this->setGGalleryTitle($albumFeed->title);

      foreach ($albumFeed as $photo) {

        $photoQuery = new Zend_Gdata_Photos_PhotoQuery();

        $photoQuery->setUser($this->getUser());

        if (Zend_Validate::is($gallery, 'Alnum')) {

          $photoQuery->setAlbumName($gallery);

        } elseif (Zend_Validate::is($gallery, 'Digits')) {

          $photoQuery->setAlbumId ($gallery);

        } else {

          throw new Exception("Invalid gallery was given");

        }

        $photoQuery->setPhotoId($photo->getGphotoId());
        $photoQuery->setImgMax(self::PIXEL_MAX);

        $photoFeed = $this->getGphotoService()->getPhotoFeed($photoQuery);

        $geoRssWhere = empty($photo->getGeoRssWhere()->point->pos->text) ? "" : $photo->getGeoRssWhere()->point->pos->text;



        $gPicasa = new CW_Google_Picasa_Photo(
                                     $photo->getGphotoId(),
                                     $photo->getGphotoCommentCount(),
                                     $photo->getGphotoCommentingEnabled(),
                                     $photoFeed->getGphotoSize(),
                                     $photoFeed->getGphotoTimestamp(),
                                     $photoFeed->mediaGroup->content[0]->url,
                                     $photoFeed->mediaGroup->description->text,
                                     $photoFeed->mediaGroup->thumbnail[0]->url,
                                     $photoFeed->mediaGroup->thumbnail[0]->width,
                                     $photoFeed->mediaGroup->thumbnail[0]->height,
                                     $geoRssWhere
                                    );

        $this->setPhotoAttrs($gPicasa);

      }

    } catch (Zend_Gdata_App_Exception $e) {
      print "Error: " .$e->__toString();
    } catch (Zend_Gdata_App_HttpException $httpexception) {
      print $httpexception->getResponse()->getBody();
    } catch (Exception $e) {
      print "Error: ".$e->__toString();
    }

    return $this->getPhotoAttrs();
  }

  /**
   * Returns User
   *
   * @access public
   * @return string user
   */
  public function getUser() {
    return $this->user ;
  }

  /**
   * Returns User Feed Instance
   *
   * @access public
   * @return Zend_Gdata_Photos_UserFeed userFeedInstance
   */
  public function getUserFeedInstance() {
    return $this->userFeedInstance;
  }

  /**
   * Returns Author Attributes
   *
   * @access public
   * @return array | CW_Google_Picasa_Album authorAttrs
   */
  public function getAuthorAttrs() {
    return $this->authorAttrs;
  }

  /**
   * Returns Gallery Attributes
   *
   * @access public
   * @return array | CW_Google_Picasa_Album galleryAttrs
   */
  public function getGalleryAttrs() {
    return $this->galleryAttrs;
  }

  /**
   * Return Google Photo Service.
   *
   * @access public
   * @return Zend_Gdata_Photos gPhotoService
   */
  public function getGphotoService() {
    return $this->gPhotoService;
  }

  /**
   * Return Google Photo Attributes
   *
   * @access public
   * @return array | CW_Google_Picasa_Photo photoAttrs
   */
  public function getPhotoAttrs() {
    return $this->photoAttrs;
  }
  /**
   * Return Gallery Location
   *
   * @access public
   * @return string
   */
  public function getGGalleryLocation() {
    return $this->gGalleryLocation;
  }

  /**
   * Return Gallery Title
   *
   * @access public
   * @return string
   */
  public function getGGalleryTitle() {
    return $this->gGalleryTitle;
  }

  /**
   * Return Number of Photos for a gallery
   *
   * @return string
   */
  public function getGGalleryNumPhotos() {
    return $this->gGalleryNumPhotos;
  }

  /**
   * Return gallery timestamp
   *
   * @return string
   */
  public function getGGalleryTimestamp() {
    return $this->gGalleryTimestamp;
  }

  /**
   * Return previous link
   *
   * @return string
   */
  public function getPreviousLink() {
    return $this->previousLink;
  }


  /**
   * Return next link
   *
   * @return string
   */
  public function getNextLink() {
    return $this->nextLink;
  }

  /**
   * Set Gallery Location
   *
   * @access private
   * @param string $gGalleryLocation
   */
  private function setGGalleryLocation($gGalleryLocation) {
    $this->gGalleryLocation = $gGalleryLocation;
  }

  /**
   * Set Gallery timestamp
   *
   * @access private
   * @param string $gGalleryTimestamp
   */
  private function setGGalleryTimestamp($gGalleryTimestamp) {
    $this->gGalleryTimestamp = $gGalleryTimestamp;
  }

  /**
   * Set Gallery Title
   *
   * @access private
   * @param string $gGalleryTitle
   */
  private function setGGalleryTitle($gGalleryTitle) {
    $this->gGalleryTitle = $gGalleryTitle;
  }

  /**
   * Set user
   *
   * @access private
   * @param string $user
   */
  private function setUser($user) {
    $this->user = $user ;
  }

  /**
   * Set previous link
   *
   * @access private
   * @param string $prevLink
   */
  private function setPreviousLink($prevLink) {
    $this->previousLink = $prevLink;
  }

  /**
   * Enter description here...
   *
   * @access private
   * @param string $nextLink
   */
  private function setNextLink($nextLink) {
    $this->nextLink = $nextLink;
  }

  /**
   * Set num of photos
   *
   * @access private
   * @param string $numPhotos
   */
  private function setGGalleryNumPhotos($numPhotos) {
    $this->gGalleryNumPhotos = $numPhotos;
  }

  /**
   * Set Photo Service
   *
   * @access private
   * @param Zend_Gdata_Photos $gPhotoObj
   */
  private function setGphotoService(Zend_Gdata_Photos $gPhotoObj) {
    $this->gPhotoService = $gPhotoObj;
  }

  /**
   * Set User Feed Instance
   *
   * @access private
   * @param Zend_Gdata_Photos_UserFeed $ufi
   */
  private function setUserFeedInstance(Zend_Gdata_Photos_UserFeed $ufi) {
    $this->userFeedInstance = $ufi;
  }

  /**
   * Set Author Attributes
   *
   * @access private
   * @param CW_Google_Picasa_Album $cwgpinstance
   */
  private function setAuthorAttrs(CW_Google_Picasa_Album $obj) {
    $this->authorAttrs = $obj;
  }

  /**
   * Set Gallery Attributes
   *
   * @access private
   * @param CW_Google_Picasa_Gallery $obj
   */
  private function setGalleryAttrs(CW_Google_Picasa_Gallery $obj) {
    $this->galleryAttrs[] =  $obj;
  }

  /**
   * Set Photo Attributes
   *
   * @access private
   * @param CW_Google_Picasa_Photo $obj
   */
  private function setPhotoAttrs(CW_Google_Picasa_Photo $obj) {
    $this->photoAttrs[] = $obj;
  }
}
