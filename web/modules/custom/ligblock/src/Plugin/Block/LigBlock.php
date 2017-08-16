<?php

namespace Drupal\ligblock\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'LigBlock' block.
 *
 * @Block(
 *   id = "ligblock",
 *   admin_label = @Translation("LigBlock")
 * )
 */
class LigBlock extends BlockBase {

  /**
   * {@inheritdoc)
   */
  public function build() {
    return [
      '#markup' => 'Generate Lorem Ipsum Button',
    ];
  }
}