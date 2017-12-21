<?php

namespace Drupal\demo_umami_content\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Umami this months' block.
 *
 * @Block(
 *   id = "umami_this_month",
 *   admin_label = @Translation("Umami this month")
 * )
 */
class UmamiThisMonth extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#type' => 'inline_template',
      '#template' => '
        <div class="block block-block-content block-this-month-block" style="background-image: url(/themes/contrib/umami/images/jpg/placeholder-wooden-floor.jpg)">
          <div class="block-inner">
            <div class="field field--name-field-cover-image field--type-image field--label-hidden field__item">
              <img src="/themes/contrib/umami/images/jpg/placeholder--umami-cover.jpg" width="258" height="366" alt="" typeof="foaf:Image" class="image-style-scale-crop-7-3-large">
            </div>
            <div class="summary">
              <div class="field field--name-field-title field--type-string field--label-hidden field__item">In this month&rsquo;s issue</div>
              <div class="field field--name-field-summary field--type-string-long field--label-hidden field__item">
                <p>Nullam id dolor id nibh ultricies vehicula ut id elit vehicula ut id elit.</p>
                <ul>
                  <li>Comforting Winter Puddings</li>
                  <li>Introduction to Icelandic Food</li>
                  <li>15 Hearty Meals Under 500 Calories</li>
                  <li>Winter Wamers</li>
                  <li>Are all Sugars the Same?</li>
                  <li>Profiles on Head Chef Jeremy Watson</li>
                  <li>and Much More&hellip;</li>
                </ul>
              </div>
              <div class="field field--name-field-content-link field--type-entity-reference field--label-hidden field__item"><a href="/node/11" hreflang="en">More umami</a></div>
            </div>
          </div>
        </div>'
    ];
  }

}
