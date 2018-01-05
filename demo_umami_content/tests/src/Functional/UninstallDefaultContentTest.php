<?php

namespace Drupal\Tests\demo_umami_content\Functional;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Tests\BrowserTestBase;

/**
 * Tests that uninstalling default content removes created content.
 *
 * @group demo_umami_content
 */
class UninstallDefaultContentTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $profile = 'demo_umami';

  /**
   * Tests uninstalling content removes created entities.
   */
  public function testReinstall() {
    $node_storage = $this->container->get('entity_type.manager')->getStorage('node');
    $this->assertRecipesImported($node_storage);

    $count = $node_storage->getQuery()
      ->condition('type', 'article')
      ->count()
      ->execute();
    $this->assertGreaterThan(0, $count);

    $module_installer = $this->container->get('module_installer');
    $module_installer->uninstall(['demo_umami_content']);

    $node_storage->resetCache();
    $count = $node_storage->getQuery()
      ->condition('type', 'article')
      ->count()
      ->execute();
    $this->assertEquals(0, $count);
    $count = $node_storage->getQuery()
      ->condition('type', 'recipe')
      ->count()
      ->execute();
    $this->assertEquals(0, $count);
    $module_installer->install(['demo_umami_content']);
    $this->assertRecipesImported($node_storage);
  }

  /**
   * Assert recipes are imported.
   *
   * @param \Drupal\Core\Entity\EntityStorageInterface $node_storage
   *   Node storage.
   */
  protected function assertRecipesImported(EntityStorageInterface $node_storage) {
    $count = $node_storage->getQuery()
      ->condition('type', 'recipe')
      ->count()
      ->execute();
    $this->assertGreaterThan(0, $count);
    $nodes = $node_storage->loadByProperties(['title' => 'Cheesy smoked cod with mushrooms and pasta']);
    $this->assertCount(1, $nodes);
  }

}
