<?php

namespace Drupal\demo_umami_content\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Promo banner' block for footer.
 *
 * @Block(
 *   id = "umami_footer_promo",
 *   admin_label = @Translation("Umami Bundle")
 * )
 */
class UmamiFooterPromo extends BlockBase {

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
    return ['#markup' => '<h2 class="footer-promo__title">' . $this->t('Umami Food Magazine') . '</h2><p class="footer-promo__text">' . $this->t('Skills and know-how. Magazine exclusive articles, recipes and plenty of reasons to get your copy today. <a href=":findmore">Find out more</a>', [':findmore' => 'https://www.drupal.org']) . '</p>'];
  }

}
