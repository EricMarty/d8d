<?php

namespace Drupal\ligblock\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements LoremIpsumForm controller.
 *
 * Extend FormBase to go generate lorem ipsum page.
 */
class LoremIpsumForm extends FormBase {
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
   *
   */
}