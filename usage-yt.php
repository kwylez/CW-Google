<?php
ini_set('display_errors', 1);
require_once 'Zend/Loader.php';
Zend_Loader::registerAutoload();

require_once dirname(__FILE__).'/CW/Google/Video/Service/Util.php';
?>
<h1><b>Search by user:</b></h1><br/>
<?php
      try {
      
        $gVid = new CW_Google_Video_Service_Util("user", "kwylez");
        //Zend_Debug::dump($gVid->getUserVideos());
        foreach ($gVid->getUserVideos() as $video):
          print "Total Results: {$video->getTotalResults()}<br/>";
          print "Title: {$video->getTitle()}<br/>";
          print "Published: {$video->getPublished()}<br/>";
          print "Video ID: {$video->getVideoId()}<br/>";
          print "Last Updated: {$video->getLastUpdated()}<br/>";
          print "Duration: {$video->getDuration()}<br/>";
          print "Medium: {$video->getMedium()}<br/>";
          print "Comments: {$video->getComments()}<br/>";
          print "Video player: {$video->getPlayer()}<br/>";
          print "Url {$video->getUrl()}<br/>";
          print "Keywords {$video->getKeywords()}<br/>";
          print "Thumbnail {$video->getThumbnail()}<br/>";
          print "Thumbnail width: {$video->getThumbnailWidth()}<br/>";
          print "Thumbnail height: {$video->getThumbnailHeight()}<br/>";
          print "Time: {$video->getTime()}<br/>";
          print "Player: {$video->getPlayer()}<br/>";
          print "Category: {$video->getCategory()}<br/>";
          print "Description: {$video->getDescription()}<br/>";
          print "Content: {$video->getContent()}<br/>";
          print "Racy: {$video->getRacy()}<br/>";
          print "Num views: {$video->getNumViews()}<br/>";
          
          print "<br/><br/>";
        endforeach;
      } catch (Exception $e) {
        print "<p>A technical error has occurred.  The webmaster has been notified";
        $logger->err($e->__toString());
      }
?>

<h1><b>Search by Category:</b></h1><br/>
<?php
      try {
      
        $gVid = new CW_Google_Video_Service_Util("category", "entertainment");
        //Zend_Debug::dump($gVid->getUserVideos());
        foreach ($gVid->getCategoryVideos(5) as $video):
          print "Total Results: {$video->getTotalResults()}<br/>";
          print "Title: {$video->getTitle()}<br/>";
          print "Published: {$video->getPublished()}<br/>";
          print "Video ID: {$video->getVideoId()}<br/>";
          print "Last Updated: {$video->getLastUpdated()}<br/>";
          print "Duration: {$video->getDuration()}<br/>";
          print "Medium: {$video->getMedium()}<br/>";
          print "Comments: {$video->getComments()}<br/>";
          print "Video player: {$video->getPlayer()}<br/>";
          print "Url {$video->getUrl()}<br/>";
          print "Keywords {$video->getKeywords()}<br/>";
          print "Thumbnail {$video->getThumbnail()}<br/>";
          print "Thumbnail width: {$video->getThumbnailWidth()}<br/>";
          print "Thumbnail height: {$video->getThumbnailHeight()}<br/>";
          print "Time: {$video->getTime()}<br/>";
          print "Player: {$video->getPlayer()}<br/>";
          print "Category: {$video->getCategory()}<br/>";
          print "Description: {$video->getDescription()}<br/>";
          print "Content: {$video->getContent()}<br/>";
          print "Racy: {$video->getRacy()}<br/>";
          print "Num views: {$video->getNumViews()}<br/>";
          
          print "<br/><br/>";
        endforeach;
      } catch (Exception $e) {
        print "<p>A technical error has occurred.  The webmaster has been notified";
        $logger->err($e->__toString());
      }
?>
