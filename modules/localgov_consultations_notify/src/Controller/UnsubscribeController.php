<?php

namespace Drupal\localgov_consultations_notify\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;

/**
 *
 */
class UnsubscribeController extends ControllerBase {

  /**
   * Check that the hash in the email matches the subscription hash.
   */
  public function access(AccountInterface $account) {
    /** @var \Drupal\mailing_list\Entity\Subscription $subscription */
    $subscription = \Drupal::routeMatch()->getParameter('mailing_list_subscription');
    if (!$subscription) {
      return AccessResult::forbidden();
    }

    $hash = $subscription->getAccessHash();

    $token = \Drupal::routeMatch()->getParameter('token');

    if ($hash === $token) {
      return AccessResult::allowed();
    }
    else {
      return AccessResult::forbidden();
    }
  }

}
