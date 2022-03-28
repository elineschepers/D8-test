<?php

namespace Drupal\quiz\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Routing;

/**
 * Provides the form for adding countries.
 */
class QuizForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'quiz_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your name'),
      '#required' => TRUE,
      '#maxlength' => 255,
      '#default_value' =>  '',
    ];
     $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your e-mailaddress'),
      '#required' => FALSE,
      '#maxlength' => 255,
      '#default_value' =>  '',
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#default_value' => $this->t('Save') ,
    ];

    //$form['#validate'][] = 'quizFormValidate';

    return $form;

  }

   /**
   * {@inheritdoc}
   */
  public function validateForm(array & $form, FormStateInterface $form_state) {
       $field = $form_state->getValues();

        $fields["name"] = $field['name'];

        if (!$form_state->getValue('name') || empty($form_state->getValue('name'))) {
            $form_state->setErrorByName('name', $this->t('Please provide your name'));
        }


  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array & $form, FormStateInterface $form_state) {
    try{
        $conn = Database::getConnection();

        $field = $form_state->getValues();

        $fields["name"] = $field['name'];
        $fields["email"] = $field['email'];

          $conn->insert('quiz_users')
               ->fields($fields)->execute();
          \Drupal::messenger()->addMessage($this->t('Your data has been succesfully saved'));

    } catch(Exception $ex){
        \Drupal::logger('quiz')->error($ex->getMessage());
    }

  }

}