<?php

namespace Drupal\demo_umami_content\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Powered by Drupal' block.
 *
 * @Block(
 *   id = "umami_disclaimer",
 *   admin_label = @Translation("Umami disclaimer")
 * )
 */
class UmamiDisclaimer extends BlockBase {

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
    return ['#markup' => '<span class="umami-disclaimer">' . $this->t('<strong>Umami Magazine & Umami Publications</strong> is a fictional magazine and publisher for illustrative purposes only.') . '</span><span class="umami-copyright">© 2017 ' . $this->t('Terms & Conditions') . '</span>'];
  }

}
