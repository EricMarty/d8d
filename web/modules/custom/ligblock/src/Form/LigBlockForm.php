<?php

namespace Drupal\ligblock\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements LigBlockForm controller.
 *
 * Extend FormBase to go generate lorem ipsum page.
 */
class LigBlockForm extends FormBase {
  /**
   * Build the lorem ipsum form.
   *
   * @param array $form
   *  Default form array structure.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *  Object containing current form state.
   *
   * @return array
   *  The render array defining the elements of the form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['paragraphs'] = [
      '#type' => 'number',
      '#title' => $this->t('Paragraphs'),
      '#min' => 1,
      '#default_value' => 1,
      '#required' => TRUE,
    ];

    $form['phrases'] = [
      '#type' => 'number',
      '#title' => $this->t('Phrases'),
      '#min' => 1,
      '#default_value' => 2,
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

    return $form;
  }

  /**
   * Getter method for Form ID.
   *
   * @return string
   *  The unique ID of the form defined by this class.
   */
  public function getFormId() {
    return 'ligblock_loremipsum_form';
  }

  /**
   * Implements form validation.
   *
   * @param array $form
   *  The render array of the currently built form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *  Object describing the current state of the form.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // do something
    $paragraphs = $form_state->getValue('paragraphs');
    $phrases = $form_state->getValue('phrases');

    if ($paragraphs < 1) {
      // Set an error for the form element paragraphs
      $form_state->setErrorByName('paragraphs', $this->t('Must be greater than 0.'));
    }
    if ($phrases < 1) {
      // Set an error for the form element phrases
      $form_state->setErrorByName('phrases', $this->t('Must be greater than 0.'));
    }
  }

  /**
   * Implements a form submit handler
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $paragraphs = $form_state->getValue('paragraphs');
    $phrases = $form_state->getValue('phrases');

    $form_state->setRedirect('loremipsum.generate',
      ['paragraphs' => $paragraphs, 'phrases' => $phrases]);
  }

}