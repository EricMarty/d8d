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

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('Enter a good title.'),
      '#required' => TRUE,
    ];

    // Convention to add actions and style form correctly
    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
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
    $title = $form_state->getValue('title');
  }

  /**
   * Implements a form submit handler
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // do something
    $title = $form_state->getValue('title');
  }

}