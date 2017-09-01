<?php

namespace Drupal\ligblock\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure lorem ipsum page to generate
 */
class LigBlockForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ligblock_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function getEditableConfigNames() {
    return ['ligblock.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Set path based on if we are generating lorem ipsum text
    $current_path = \Drupal::service('path.current')->getPath();
    $path_args = explode('/', $current_path);
    //\Drupal::logger('ligblock')->notice(print_r($path_args, TRUE));
    $default_value = ['paragraphs' => 1, 'phrases' => 1];
    if ($path_args[1] === 'loremipsum') {
      $default_value['paragraphs'] = $path_args[2];
      $default_value['phrases'] = $path_args[3];
    }

    // Add form inputs
    $form['paragraphs'] = [
      '#type' => 'number',
      '#title' => $this->t('Paragraphs'),
      '#min' => 1,
      '#default_value' => $default_value['paragraphs'], //$config->get('ligblock.paragraphs'),
      '#required' => TRUE,
    ];
    $form['phrases'] = [
      '#type' => 'number',
      '#title' => $this->t('Phrases'),
      '#min' => 1,
      '#default_value' => $default_value['phrases'], //$config->get('ligblock.phrases'),
      '#required' => TRUE,
    ];
    // Convention to add actions and style form correctly
    $form['actions'] = [
      '#type' => 'actions',
    ];
    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate'),
    ];

    return $form; //parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $paragraphs = $form_state->getValue('paragraphs');
    $phrases = $form_state->getValue('phrases');
    // Verify submitted values are positive
    if ($paragraphs < 1) {
      $form_state->setErrorByName('paragraphs', $this->t('Must be greater than 0.'));
    }
    if ($phrases < 1) {
      $form_state->setErrorByName('phrases', $this->t('Must be greater than 0.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $paragraphs = $form_state->getValue('paragraphs');
    $phrases = $form_state->getValue('phrases');
    // Update config settings to most recent submission
    //$this->config('ligblock.settings')
    //  ->set('ligblock.paragraphs', $paragraphs)
    //  ->set('ligblock.phrases', $phrases)
    //  ->save();
    // Redirect to page using submitted values to generate lorem ipsum
    $form_state->setRedirect('loremipsum.generate',
      ['paragraphs' => $paragraphs, 'phrases' => $phrases]);
  }
}