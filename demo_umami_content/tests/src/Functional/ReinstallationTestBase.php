<?php

namespace Drupal\Tests\demo_umami_content\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * @group demo_umami_content
 */
abstract class ReinstallationTestBase extends BrowserTestBase {

  /**
   * Tests reading multilingual content.
   */
  public function testReinstall() {
    /** @var \Drupal\Core\Extension\ModuleInstallerInterface $module_installer */
    $module_installer = \Drupal::service('module_installer');
    // 1. Install the feature.
    $this->assertTrue($module_installer->install(['demo_umami_content']));
    // 2. Make sure that there is a recipe content type with some content in
    // there.
    $this->assertArrayHasKey('recipe', \Drupal::entityTypeManager()->getStorage('node_type')->loadMultiple());
    $count = \Drupal::entityTypeManager()->getStorage('node')->getQuery()
      ->condition('type', 'recipe')
      ->count()
      ->execute();
    $this->assertGreaterThan(0, $count);

    $count = \Drupal::entityTypeManager()->getStorage('node')->getQuery()
      ->condition('type', 'article')
      ->count()
      ->execute();
    $this->assertGreaterThan(0, $count);

    // 3. Uninstall the feature.
    $this->assertTrue($module_installer->uninstall(['demo_umami_content']));
    // 4. Make sure that there is no recipe content type with some content in
    // there. But there is still an article and page content type.
    $this->assertArrayNotHasKey('recipe', \Drupal::entityTypeManager()->getStorage('node_type')->loadMultiple());
    // 5. Install the feature.
    $this->assertTrue($module_installer->install(['demo_umami_content']));
    // 6. Make sure that there is a recipe content type with some content in
    // there.
    $this->assertArrayHasKey('recipe', \Drupal::entityTypeManager()->getStorage('node_type')->loadMultiple());
    $count = \Drupal::entityTypeManager()->getStorage('node')->getQuery()
      ->condition('type', 'recipe')
      ->count()
      ->execute();
    $this->assertGreaterThan(0, $count);
  }

}
