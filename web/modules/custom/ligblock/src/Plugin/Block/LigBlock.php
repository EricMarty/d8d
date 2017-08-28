<?php

namespace Drupal\ligblock\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

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
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'ligblock_example_string' => $this->t('A default value.'),
    ];
  }

  /**
   * {@inheritdoc)
   *
   * This method defines a form to generate a loremipsum page
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['ligblock_example_string_text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Block contents'),
      '#description' => $this->t('This text will appear in the ligblock block'),
      '#default_value' => $this->configuration['ligblock_example_string'],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['ligblock_example_string']
      = $form_state->getValue('ligblock_example_string_text');
  }

  /**
   * {@inheritdoc)
   */
  public function build() {
    return [
      '#markup' => $this->configuration['ligblock_example_string'],
    ];
  }
}