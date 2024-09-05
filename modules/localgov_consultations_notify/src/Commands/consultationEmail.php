<?php

namespace Drupal\localgov_consultations_notify\Commands;

use Drupal;
use Drush\Commands\DrushCommands;
use Drupal\node\Entity\Node;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Core\Entity\RevisionLogInterface;

/**
 * A drush command file.
 *
 * @package Drupal\localgov_consultations\Commands
 */
class consultationEmail extends DrushCommands {

  /**
   * Drush command to do consultation email processing.
   *
   * @command localgov_consultations:process-email
   * @usage localgov_consultations:process-email
   */
  public function localgov_consultation_email() {
    localgov_consultations_notify_process_opens();

    // Disabled due to bugs
    //localgov_consultations_notify_process_closes();
  }
}
