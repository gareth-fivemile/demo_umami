<?php

namespace Drupal\demo_umami_content\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Temporarily provides a custom banner block at the head of the recipes page.
 *
 * @Block(
 *   id = "umami_recipes_banner_temp",
 *   admin_label = @Translation("Temporary: Umami Recipes Banner")
 * )
 */
class UmamiRecipesBannerTemp extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return ['label_display' => FALSE];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    /* Temporary approach to hard-coding output and letting raw HTML through */
    return array(
      '#type' => 'inline_template',
      '#template' => '<div class="block block-block-content block-banner-block cover-image" style="background-image: url(/themes/contrib/umami/images/jpg/placeholder--atharva-lele-210748-pshopped.jpg)"><div class="block-inner"><div class="field field--name-field-banner-image field--type-image field--label-hidden field__item"><img src="/themes/contrib/umami/images/jpg/placeholder--atharva-lele-210748-pshopped.jpg" width="1440" height="617" alt="" typeof="foaf:Image" class="image-style-scale-crop-7-3-large"></div><div class="summary"><div class="field field--name-field-title field--type-string field--label-hidden field__item">Baked Camembert with garlic, calvados and salami</div><div class="field field--name-field-summary field--type-string-long field--label-hidden field__item">Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.</div><div class="field field--name-field-content-link field--type-entity-reference field--label-hidden field__item"><a href="/node/11" hreflang="en">Baked Camembert</a></div></div></div></div>',
      '#context' => array(),
    );
  }

}
