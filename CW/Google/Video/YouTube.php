<?php
/**
 * Model class that holds Google Video properties
 * 
 * @author Cory D. Wiles @link http://www.corywiles.com
 * @category CW
 * @package Google_Video
 * 
 */
class CW_Google_Video_YouTube {
	
	/**
	 * Total results
	 *
	 * @access private
	 * @var string
	 */
	private $totalResults    = '' ;
	
	/**
	 * Video Title
	 *
	 * @access private
	 * @var title
	 */
	private $title           = '' ;
	
	/**
	 * Published
	 *
	 * @access private
	 * @var unknown_type
	 */
	private $published       = '' ;
	
	/**
	 * Video id
	 *
	 * @access private
	 * @var string
	 */
	private $videoId         = '' ;
	
	/**
	 * Last updated
	 *
	 * @access private
	 * @var string
	 */
	private $lastUpdated     = '' ;
	
	/**
	 * Video duration
	 *
	 * @access private
	 * @var string
	 */
	private $duration        = '' ;
	
	/**
	 * Medium type
	 * 
	 * @access private
	 * @var string
	 */
	private $medium          = '' ;
	
	/**
	 * Video comments
	 * 
	 * @access private
	 * @var string
	 */
	private $comments        = '' ;
	
	/**
	 * Video url
	 * 
	 * @access private
	 * @var string
	 */
	private $url             = '' ;
	
	/**
	 * Video keywords
	 *
	 * @access private
	 * @var array
	 */
	private $keywords        = '' ;
	
	/**
	 * Video thumbnail
	 *
	 * @access private
	 * @var string
	 */
	private $thumbnail       = '' ;
	
	/**
	 * Thumbnail width
	 *
	 * @access private
	 * @var string
	 */
	private $thumbnailWidth  = '' ;
	
	/**
	 * Thumbnal height
	 *
	 * @access private
	 * @var string
	 */
	private $thumbnailHeight = '' ;
	
	/**
	 * Video time
	 *
	 * @access private
	 * @var string
	 */
	private $time            = '' ;
	
	/**
	 * Player
	 *
	 * @access private
	 * @var string
	 */
	private $player          = '' ;
	
	/**
	 * Video category
	 *
	 * @access private
	 * @var string
	 */
	private $category        = '' ;
	
	/**
	 * Video content
	 *
	 * @access private
	 * @var string
	 */
	private $content         = '' ;
	
	/**
	 * Video description
	 *
	 * @access private
	 * @var string
	 */
	private $description     = '' ;
	
	/**
	 * Video rating
	 *
	 * @access private
	 * @var string
	 */
	private $rating          = '' ;
	
	/**
	 * Racy true/false
	 *
	 * @access private
	 * @var boolean
	 */
	private $racy            = '' ;
	
	/**
	 * Number of views
	 *
	 * @access private
	 * @var int
	 */
	private $numViews        = '' ;

	/**
	 * Class constructor
	 *
	 * @access public
	 * @param string $totalResults
	 * @param string $title
	 * @param string $published
	 * @param string $videoId
	 * @param string $lastUpdated
	 * @param string $duration
	 * @param string $medium
	 * @param string $comments
	 * @param string $url
	 * @param string $keywords
	 * @param string $thumbnail
	 * @param string $thumbnailWidth
	 * @param string $thumbnailHeight
	 * @param string $time
	 * @param string $player
	 * @param string $category
	 * @param string $content
	 * @param string $description
	 * @param string $rating
	 * @param string $racy
	 * @param string $numViews
	 */
  public function __construct(
                              $totalResults,
                              $title,
                              $published,
                              $videoId,
                              $lastUpdated,
                              $duration,
                              $medium,
                              $comments,
                              $url,
                              $keywords,
                              $thumbnail,
                              $thumbnailWidth,
                              $thumbnailHeight,
                              $time,
                              $player,
                              $category,
                              $content,
                              $description,
                              $rating,
                              $racy,
                              $numViews
                              ) {

    $this->setTotalResuls($totalResults);
    $this->setTitle($title);
    $this->setPublished($published);
    $this->setVideoId($videoId);
    $this->setLastUpdated($lastUpdated);
    $this->setDuration($duration);
    $this->setMedium($medium);
    $this->setComments($comments);
    $this->setUrl($url);
    $this->setKeywords($keywords);
    $this->setThumbnail($thumbnail);
    $this->setThumbnailWidth($thumbnailWidth);
    $this->setThumbnailHeight($thumbnailHeight);
    $this->setTime($time);
    $this->setPlayer($player);
    $this->setCategory($category);
    $this->setContent($content);
    $this->setDescription($description);
    $this->setRating($rating);
    $this->setRacy($racy);
    $this->setNumViews(isset($numViews) ? $numViews : "0");
  }

  /**
   * Return total search results
   * 
   * @access public
   * @return string
   */
  public function getTotalResults() {
    return $this->totalResults;
  }

  /**
   * Return video title
   *
   * @access public
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Return publish true/false
   *
   * @access public
   * @return boolean
   */
  public function getPublished() {
    return $this->published;
  }

  /**
   * Return video id
   *
   * @access public
   * @return string
   */
  public function getVideoId() {
    return $this->videoId;
  }

  /**
   * Return last modified date
   *
   * @access public
   * @return string
   */
  public function getLastUpdated() {
    return $this->lastUpdated;
  }

  /**
   * Return video duration
   *
   * @access public
   * @return string
   */
  public function getDuration() {
    return $this->duration;
  }

  /**
   * Return medium
   *
   * @access public
   * @return string
   */
  public function getMedium() {
    return $this->medium;
  }

  /**
   * Return comments
   *
   * @access public
   * @return string
   */
  public function getComments() {
    return $this->comments;
  }

  /**
   * Return url
   *
   * @access public
   * @return string
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * Return keywords
   *
   * @access public
   * @return string
   */
  public function getKeywords() {
    return $this->keywords;
  }

  /**
   * Return thumbnail
   *
   * @access public
   * @return string
   */
  public function getThumbnail() {
    return $this->thumbnail;
  }

  /**
   * Return thumbnail width
   *
   * @access public
   * @return string
   */
  public function getThumbnailWidth() {
    return $this->thumbnailWidth;
  }

  /**
   * Return thumbnail height
   *
   * @access public
   * @return string
   */
  public function getThumbnailHeight() {
    return $this->thumbnailHeight;
  }

  /**
   * Return time
   *
   * @access public
   * @return string
   */
  public function getTime() {
    return $this->time;
  }

  /**
   * Return player
   *
   * @access public
   * @return string
   */
  public function getPlayer() {
    return $this->player;
  }

  /**
   * Return category
   *
   * @access public
   * @return string
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * Return content
   *
   * @access public
   * @return string
   */
  public function getContent() {
    return $this->content;
  }

  /**
   * Return description
   *
   * @access public
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * Return rating
   *
   * @access public
   * @return string
   */
  public function getRating() {
    return $this->rating;
  }

  /**
   * Return racy true/false
   *
   * @access public
   * @return boolean
   */
  public function getRacy() {
    return $this->racy;
  }

  /**
   * Return number of views
   *
   * @access public
   * @return int
   */
  public function getNumViews() {
    return $this->numViews;
  }

	/**
	 * Set total results
	 *
	 * @access prvate
	 * @param string $totalresults
	 */
  private function setTotalResuls($totalresults) {
    $this->totalResults = $totalresults;
  }

  /**
   * Set title
   *
   * @access private
   * @param string $title
   */
  private function setTitle($title) {
    $this->title = $title;
  }

  /**
   * Set published true/false
   *
   * @access private
   * @param boolean $published
   */
  private function setPublished($published) {
    $this->published = $published;
  }

  /**
   * Set video id
   *
   * @access private
   * @param string $videoid
   */
  private function setVideoId($videoid) {
    $this->videoId = $videoid;
  }

  /**
   * Set last modified date
   *
   * @access private
   * @param string $lastupdated
   */
  private function setLastUpdated($lastupdated) {
    $this->lastUpdated = $lastupdated;
  }

  /**
   * Set duration
   *
   * @access private
   * @param string $duration
   */
  private function setDuration($duration) {
    $this->duration = $duration;
  }

  /**
   * Set medium
   *
   * @access private
   * @param string $medium
   */
  private function setMedium($medium) {
    $this->medium = $medium;
  }

  /**
   * Set comments
   *
   * @access private
   * @param string $comments
   */
  private function setComments($comments) {
    $this->comments = $comments;
  }

  /**
   * Set url
   *
   * @access private
   * @param string $url
   */
  private function setUrl($url) {
    $this->url = $url;
  }

  /**
   * Set keywords
   *
   * @access private
   * @param string $keywords
   */
  private function setKeywords($keywords) {
    $this->keywords = $keywords;
  }

  /**
   * Set thumbail
   *
   * @access private
   * @param string $thumbnail
   */
  private function setThumbnail($thumbnail) {
    $this->thumbnail = $thumbnail;
  }

  /**
   * Set thumbnail width
   *
   * @access private
   * @param string $thumbnailwidth
   */
  private function setThumbnailWidth($thumbnailwidth) {
    $this->thumbnailWidth = $thumbnailwidth;
  }

  /**
   * Set thumbnail height
   *
   * @access private
   * @param string $totalresults
   */
  private function setThumbnailHeight($thumbnailheight) {
    $this->thumbnailHeight = $thumbnailheight;
  }

  /**
   * Set time
   *
   * @access private
   * @param string $time
   */
  private function setTime($time) {
    $this->time = $time;
  }

  /**
   * Set player
   *
   * @access private
   * @param string $player
   */
  private function setPlayer($player) {
    $this->player = $player;
  }

  /**
   * Set category
   *
   * @access private
   * @param string $category
   */
  private function setCategory($category) {
    $this->category = $category;
  }

  /**
   * Set content
   *
   * @access private
   * @param string $content
   */
  private function setContent($content) {
    $this->content = $content;
  }

  /**
   * Set description
   *
   * @access private
   * @param string $description
   */
  private function setDescription($description) {
    $this->description = $description;
  }

  /**
   * Set rating
   *
   * @access private
   * @param string $rating
   */
  private function setRating($rating) {
    $this->rating = $rating;
  }

  /**
   * Set racy true/false
   *
   * @access private
   * @param boolean $racy
   */
  private function setRacy($racy) {
    $this->racy = $racy;
  }

  /**
   * Set number of views
   *
   * @access private
   * @param string $totalresults
   */
  private function setNumViews($numViews) {
    $this->numViews = $numViews;
  }
}
