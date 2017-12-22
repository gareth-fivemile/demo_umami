<?php

namespace Drupal\demo_umami_content\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Umami feature links' block.
 *
 * @Block(
 *   id = "umami_feature_links",
 *   admin_label = @Translation("Umami feature links")
 * )
 */
class UmamiFeatureLinks extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#type' => 'inline_template',
      '#template' => '
        <div class="block block-block-content block-feature-links">
          <div class="block-inner">
            <div class="feature-link">
              <img src="/themes/contrib/umami/images/png/icon--dinners.png" alt="" typeof="foaf:Image">
              <div class="field field--name-field-link-label">Dinners to impress</div>
              <div class="field field--name-field-link-link"><a href="#">List recipes</a></div>
            </div>
            <div class="feature-link">
              <img src="/themes/contrib/umami/images/png/icon--cook.png" alt="" typeof="foaf:Image">
              <div class="field field--name-field-link-label">Learn to cook</div>
              <div class="field field--name-field-link-link"><a href="#">Recipes for beginners</a></div>
            </div>
            <div class="feature-link">
              <img src="/themes/contrib/umami/images/png/icon--baked.png" alt="" typeof="foaf:Image">
              <div class="field field--name-field-link-label">Baked up</div>
              <div class="field field--name-field-link-link"><a href="#">Delicious cakes and bakes</a></div>
            </div>
            <div class="feature-link">
              <img src="/themes/contrib/umami/images/png/icon--quick.png" alt="" typeof="foaf:Image">
              <div class="field field--name-field-link-label">Quick and easy</div>
              <div class="field field--name-field-link-link"><a href="#">20 minutes or less</a></div>
            </div>
          </div>
        </div>'
    ];
  }

}
