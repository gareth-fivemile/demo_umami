<?php

namespace Drupal\Tests\demo_umami\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests demo_umami profile.
 *
 * @group demo_umami
 */
class DemoUmamiProfileTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $profile = 'demo_umami';

  /**
   * Tests demo_umami profile warnings shown on Status Page.
   */
  public function testWarningsOnStatusPage() {
    $account = $this->drupalCreateUser(['administer site configuration']);
    $this->drupalLogin($account);

    // Check the requirements warning for using an experimental profile.
    $this->drupalGet('admin/reports/status');
    $this->assertSession()->pageTextContains('Demo Umami is an experimental profile to be used for demonstration purposes only, and should not be used for a production/live site. To start building a new site, you should re-install Drupal and choose another profile, for example "Standard".');

    // Check the requirements error for the version of Drupal being updated.
    // Change the stored installed version of Drupal.
    \Drupal::state()->set('demo_umami_drupal_version', \Drupal::VERSION . '1');
    $this->drupalGet('admin/reports/status');
    $this->assertSession()->pageTextContains('Drupal has been updated since this demo was installed, which could cause issues with this site. It is recommended that you re-install the demo to evaluate the latest changes.');

  }

}
