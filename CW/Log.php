<?php
require_once 'Zend/Mail.php';
require_once 'Zend/Mail/Transport/Smtp.php';

class CW_Log extends Zend_Log {
  
  /**
   * Enter description here...
   *
   */
  const EMAIL_TO = "kwylez@gmail.com";
  
  /**
   * Enter description here...
   *
   * @param Zend_Log_Writer_Abstract $writer
   */
  public function __construct(Zend_Log_Writer_Abstract $writer = null) {
    parent::__construct($writer);
  }
  
  /**
   * Enter description here...
   *
   * @param unknown_type $message
   * @param unknown_type $priority
   */
  public function log($message, $priority) {
    
    parent::log($message, $priority);
    
    if ((int) $priority <= Zend_Log::ERR) {

      $mail = new Zend_Mail();
      $mail->addTo(self::EMAIL_TO, 'Cory Wiles');
      $mail->setFrom('do-not-reply@stmary-memphis.com', 'DO-NOT-REPLY');
      $mail->setSubject('LOGGER MESSAGE (level) - '.$priority);
      $mail->setBodyHtml(htmlspecialchars_decode($message));
      $mail->send();
    }
  }
  
  /**
   * Class destructor.  Shutdown log writers
   *
   * @return void
   */
  public function __destruct() {
    parent::__destruct();
  }
}
