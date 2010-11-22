<?php
require_once dirname(__FILE__).'/../YouTube.php';
/**
 *
 * Provides functionality to interact with Zend's Gdata APIs
 *
 * As the Google data API protocol is based upon the Atom Publishing Protocol
 * (APP), gVideoUtil functionality extends the appropriate Zend_Gdata_App classes
 *
 * @link http://code.google.com/apis/gdata/overview.html
 * @link http://framework.zend.com/apidoc/core/Zend_Gdata/Zend_Gdata.html
 * 
 * @category CW
 * @package Google_Video
 *
 * @copyright  Copyright (c) 2007 Cory Wiles. (http://www.corywiles.com)
 */

class CW_Google_Video_Service_Util {

  /**
   * YouTube category name
   *
   * @access private
   * @var string
   */
  private $category  = '';

  /**
   * YouTube username used for video upload lookup
   *
   * @access private
   * @var string
   */
  private $username  = '';

  /**
   * Holds CW_Google_Video bean instance
   *
   * @see CW_Google_Video
   * @var array
   */
  private $videos    = array();

  /**
   * Create CW_Google_Video_Util object
   *
   * @access public
   * @throws Exception
   * @param string $categoryOrUser
   * @param string $value
   */
  public function __construct($categoryOrUser, $value) {
    
  	if (empty($categoryOrUser) || empty($value)) {
      throw new Exception("You must enter a category or user");
    }

    if ($categoryOrUser == strtolower("category")) {
      
    	$this->setCategory($value);
    
    } elseif ($categoryOrUser == strtolower("user")) {
      
    	$this->setUsername($value);
    
    } else {
      
    	throw new Exception("First value must be either 'category' or 'user'");
    
    }
  }

  /**
   * Retrieve video of based upon a given category
   *
   * @access public
   * @param int $maxResults
   * @return gVideo
   */
  public function getCategoryVideos($maxResults = 15) {
    
  	if ($this->getCategory() == '') {
      
  		throw new Exception("Empty categories are not allowed");
    
  	} else {
      
  		try {
        
  			$yt = new Zend_Gdata_YouTube();

        $query             = $yt->newVideoQuery();
        $query->category   = $this->getCategory();
        $query->maxResults = $maxResults;

        $videoFeed = $yt->getVideoFeed($query);

        foreach ($videoFeed as $videoEntry) {
          
        	$gVideo = new CW_Google_Video_YouTube(
                              '',
                               $videoEntry->mediaGroup->title->text,
                               $videoEntry->getPublished(),
                               $videoEntry->getId(),
                               $videoEntry->updated->text,
                               $videoEntry->mediaGroup->duration->seconds,
                               $videoEntry->mediaGroup->content[0]->medium,
                               $videoEntry->comments->feedLink->getHref(),
                               $videoEntry->mediaGroup->content[0]->url,
                               $videoEntry->mediaGroup->keywords->text,
                               $videoEntry->mediaGroup->thumbnail[0]->url,
                               $videoEntry->mediaGroup->thumbnail[0]->width,
                               $videoEntry->mediaGroup->thumbnail[0]->height,
                               $videoEntry->mediaGroup->thumbnail[0]->time,
                               $videoEntry->mediaGroup->player[0]->url,
                               $videoEntry->mediaGroup->category[0]->text,
                               $videoEntry->getContent(),
                               $videoEntry->mediaGroup->description->text,
                               $videoEntry->getRating(),
                               $videoEntry->getRacy(),
                               $videoEntry->getStatistics()->getViewCount()
                               );

          $this->setVideos($gVideo);

        }

      } catch (Zend_Gdata_App_Exception $ex) {
        print $ex->getMessage();
      } catch (Exception $e) {
        print $e->getMessage();
      }
    }

    return $this->getVideos();
  }

  /**
   * Retrieve video of based upon a user
   *
   * @access public
   * @return gVideo
   * @throws Exception
   */
  public function getUserVideos() {
    
  	if ($this->getUsername() == "") {
      
  		throw new Exception("Empty username was passed");
    
  	} else {

      try {
        
      	$yt        = new Zend_Gdata_YouTube();
        $videoFeed = $yt->getUserUploads($this->getUsername());

        foreach ($videoFeed as $videoEntry) {

          $gVideo = new CW_Google_Video_YouTube(
                               $videoFeed->totalResults->text,
                               $videoEntry->mediaGroup->title->text,
                               $videoEntry->getPublished()->text,
                               $videoEntry->getId()->text,
                               $videoEntry->updated->text,
                               $videoEntry->mediaGroup->duration->seconds,
                               $videoEntry->mediaGroup->content[0]->medium,
                               $videoEntry->comments->feedLink->href,
                               $videoEntry->mediaGroup->content[0]->url,
                               $videoEntry->mediaGroup->keywords->text,
                               $videoEntry->mediaGroup->thumbnail[0]->url,
                               $videoEntry->mediaGroup->thumbnail[0]->width,
                               $videoEntry->mediaGroup->thumbnail[0]->height,
                               $videoEntry->mediaGroup->thumbnail[0]->time,
                               $videoEntry->mediaGroup->player[0]->url,
                               $videoEntry->mediaGroup->category[0]->text,
                               $videoEntry->getContent()->text,
                               $videoEntry->mediaGroup->description->text,
                               $videoEntry->getRating(),
                               $videoEntry->getRacy(),
                               $videoEntry->statistics->viewCount
                               );

          $this->setVideos($gVideo);

        }

      } catch (Zend_Gdata_App_Exception $ex) {
        print $ex->getMessage();
      } catch (Exception $e) {
        print $e->getMessage();
      }
    }

    return $this->getVideos();
  }

  /**
   * Returns category
   *
   * @access public
   * @return string
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * Returns username
   *
   * @access public
   * @return string
   */
  public function getUsername() {
    return $this->username;
  }

  /**
   * Returns videos
   *
   * @access public
   * @return gVideo
   */
  public function getVideos() {
    return $this->videos;
  }

  /**
   * Sets category
   *
   * @access private
   * @param string $category
   */
  private function setCategory($category) {
    $this->category = $category;
  }

  /**
   * Sets username
   *
   * @access private
   * @param string $username
   */
  private function setUsername($username) {
    $this->username = $username;
  }

  /**
   * Sets gVideo instance
   *
   * @access private
   * @param gVideo $videoInstance
   */
  private function setVideos(CW_Google_Video_YouTube $videoInstance) {
    $this->videos[] = $videoInstance;
  }
}
