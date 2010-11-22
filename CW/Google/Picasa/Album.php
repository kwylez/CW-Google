<?php
/**
 * Model class that holds Google Album properties
 * 
 * @author Cory D. Wiles @link http://www.corywiles.com
 * @category CW
 * @package Google_Picasa
 * 
 */
class CW_Google_Picasa_Album {

  /**
   * Album name
   *
   * @access private
   * @var string
   */
	private $albumAuthName        = "";
	
	/**
	 * Last Updated
	 *
	 * @access private
	 * @var string
	 */
	private $albumLastUpdated     = "";
	
	/**
	 * Album title.
	 *
	 * @access private
	 * @var string
	 */
	private $albumTitle           = "";
	
	/**
	 * Album Author uri
	 *
	 * @access private
	 * @var string
	 */
	private $albumAuthorUri       = "";
	
	/**
	 * Album Author Thumbnail
	 *
	 * @access private
	 * @var string
	 */
	private $albumAuthorThumbnail = "";
	
	/**
	 * Album Total Results
	 *
	 * @access private
	 * @var string
	 */
	private $albumTotalResults    = "";

  /**
   * Class Constructor
   *
   * @access public
   * @param string $albumAuthName
   * @param string $albumLastUpdated
   * @param string $albumTitle
   * @param string $albumAuthorUri
   * @param string $albumAuthorThumbnail
   * @param string $albumTotalResults
   */
  public function __construct(
                              $albumAuthName,
                              $albumLastUpdated,
                              $albumTitle,
                              $albumAuthorUri,
                              $albumAuthorThumbnail,
                              $albumTotalResults
                              ) {

  	$this->setAlbumAuthName($albumAuthName);
  	$this->setAlbumLastUpdated($albumLastUpdated);
  	$this->setAlbumTitle($albumTitle);
  	$this->setAlbumAuthorUri($albumAuthorUri);
  	$this->setAlbumAuthorThumbnail($albumAuthorThumbnail);
  	$this->setAlbumTotalResults($albumTotalResults);
  }

	/**
	 * Return Author's name for a particular album.
	 * 
	 * @access public
	 * @return string
	 */
	public function getAlbumAuthName() {
		return $this->albumAuthName ;
	}

	/**
	 * Returns thumbnail for author's profile
	 * 
	 * @access public
	 * @return string
	 */
	public function getAlbumAuthorThumbnail() {
		return $this->albumAuthorThumbnail ;
	}

	/**
	 * Return the uri to the author's album's
	 * 
	 * @access public
	 * @return string
	 */
	public function getAlbumAuthorUri() {
		return $this->albumAuthorUri ;
	}

	/**
	 * Return the date that the album was last updated.
	 * 
	 * @access public
	 * @return string
	 */
	public function getAlbumLastUpdated() {
		return $this->albumLastUpdated ;
	}

	/**
	 * Return the album title
	 * 
	 * @access public
	 * @return string
	 */
	public function getAlbumTitle() {
		return $this->albumTitle ;
	}

	/**
	 * Return the total number of albums per user
	 * 
	 * @access public
	 * @return string
	 */
	public function getAlbumTotalResults() {
		return $this->albumTotalResults ;
	}

	/**
	 * Sets album's author's name
	 * 
	 * @access private
	 * @param string $albumAuthName
	 */
	private function setAlbumAuthName($albumAuthName) {
		$this->albumAuthName = $albumAuthName ;
	}

	/**
	 * Set author's album's thumbnail
	 * 
	 * @access private
	 * @param string $albumAuthorThumbnail
	 */
	private function setAlbumAuthorThumbnail($albumAuthorThumbnail) {
		$this->albumAuthorThumbnail = $albumAuthorThumbnail ;
	}

	/**
	 * Set's author's album uri
	 * 
	 * @access private
	 * @param string $albumAuthorUri
	 */
	private function setAlbumAuthorUri($albumAuthorUri) {
		$this->albumAuthorUri = $albumAuthorUri ;
	}

	/**
	 * Set the album's last updated timestamp
	 * 
	 * @access private
	 * @param string $albumLastUpdated
	 */
	private function setAlbumLastUpdated($albumLastUpdated) {
		$this->albumLastUpdated = $albumLastUpdated ;
	}

	/**
	 * Set the album title
	 * 
	 * @access private
	 * @param string $albumTitle
	 */
	private function setAlbumTitle($albumTitle) {
		$this->albumTitle = $albumTitle ;
	}

	/**
	 * Set the total number of album results
	 * 
	 * @access private
	 * @param string $albumTotalResults
	 */
	private function setAlbumTotalResults($albumTotalResults) {
		$this->albumTotalResults = $albumTotalResults ;
	}
}

