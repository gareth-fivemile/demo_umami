<?php

/**
 * @file
 * Enables modules and site configuration for a demo_umami site installation.
 */

use Drupal\contact\Entity\ContactForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_FORM_ID_alter() for install_configure_form().
 *
 * Allows the profile to alter the site configuration form.
 */
function demo_umami_form_install_configure_form_alter(&$form, FormStateInterface $form_state) {
  $form['#submit'][] = 'demo_umami_form_install_configure_submit';
}

/**
 * Submission handler to sync the contact.form.feedback recipient.
 */
function demo_umami_form_install_configure_submit($form, FormStateInterface $form_state) {
  $site_mail = $form_state->getValue('site_mail');
  ContactForm::load('feedback')->setRecipients([$site_mail])->trustData()->save();
}

/**
 * Implements hook_toolbar().
 */
function demo_umami_toolbar() {
  // Add a warning about using an experimental profile.
  $items['experimental-profile-warning'] = array(
    '#type' => 'toolbar_item',
    'tab' => array(
      '#type' => 'inline_template',
      '#template' => '<p class="toolbar-warning">
        <a href="{{ more_info_link }}">This demo is for testing purposes only.</a>
        </p>',
      '#context' => [
        'more_info_link' => 'https://www.drupal.org/project/drupal/issues/2829101',
      ],
      '#attached' => [
        'library' => ['demo_umami/toolbar-warning'],
      ],
    ),
    '#weight' => 999,
  );
  return $items;
}