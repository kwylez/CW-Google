<?php
ini_set('dispaly_errors', 1);

require_once 'Zend/Loader.php';
Zend_Loader::registerAutoload();
require_once dirname(__FILE__).'/CW/Google/Picasa/Service/Util.php';

try {
  /**
   * Change the user name to whatever you want
   */
  $gPicasa = new CW_Google_Picasa_Service_Util("kwylez");
  $gPicasa->getPicasaAuthorMetaInformation();
  //Zend_Debug::dump($gPicasa);

  /**
   * User Attributes
   */
  print "Author Name: {$gPicasa->getAuthorAttrs()->getAlbumAuthName()}<br/>";
  print "Author's Last Updated Time Stamp: {$gPicasa->getAuthorAttrs()->getAlbumLastUpdated()}<br/>";
  print "Author Title {$gPicasa->getAuthorAttrs()->getAlbumTitle()}<br/>";
  print "Author URI: {$gPicasa->getAuthorAttrs()->getAlbumAuthorUri()}<br/>";
  print "Author's Thumbnail: {$gPicasa->getAuthorAttrs()->getAlbumAuthorThumbnail()}<br/>";
  print "Author's Total Number of Albums: {$gPicasa->getAuthorAttrs()->getAlbumTotalResults()}<br/><br/>";

	/**
	 * Album Attributes
	 */
  foreach ($gPicasa->getUserAlbums() as $gallery):
    print "Gallery Photo Id: {$gallery->getGalleryPhotoId()}<br/>";
    print "Gallery Photo Name: {$gallery->getGalleryPhotoName()}<br/>";
    print "Gallery Published Date: {$gallery->getGalleryPublishedDate()}<br/>";
    print "Gallery Access Level: {$gallery->getGalleryAccess()}<br/>";
    print "Last Updated: {$gallery->getGalleryUpdatedDate()}<br/>";
    print "Gallery Summary: {$gallery->getGallerySummary()}<br/>";
    print "Gallery Location: {$gallery->getGalleryLocation()}<br/>";
    print "Gallery Thumbnail: {$gallery->getGalleryThumbnail()}<br/>";
    print "Number of Photos in Gallery: {$gallery->getGalleryNumPhotos()}<br/><br/>";
    print "<br/><br/>";
  endforeach;

  /**
   * Photo attributes found in a specific gallery
   * You can pass either the album name or the id
   */
  //$gPicasa->getGalleryImages("5199126673731272993");
  $gPicasa->getGalleryImages("MSRPCADE");

  foreach ($gPicasa->getPhotoAttrs() as $attr) {
    print "Photo Id: {$attr->getPhotoId()}<br/>";
    print "Photo Comment Count: {$attr->getPhotoCommentCount()}<br/>";
    print "Photo Comments Enabled: {$attr->getPhotoCommentsEnabled()}<br/>";
    print "Photo Size: {$attr->getPhotoSize()}<br/>";
    print "Photo Timestamp: {$attr->getPhotoTimeStamp()}<br/>";
    print "Photo Geo Where: {$attr->getPhotoGeoWhere()}<br/>";
    print "Photo URL: {$attr->getPhotoImgUrl()}<br/><br/>";
  }

} catch (Exception $e) {
  print $e->__toString();
}


