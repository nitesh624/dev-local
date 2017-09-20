<?php

namespace Drupal\hello\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class HelloForm extends FormBase {

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('Enter your name .It must be at least 5 characters in length.'),
      '#required' => TRUE,
    ];
    // CheckBoxes.
    $form['qualification'] = [
      '#type' => 'checkboxes',
      '#options' => ['pg' => t('PG'), 'ug' => t('UG')],
      '#title' => $this->t('Qualification'),
      '#description' => 'Leave unchecked, If not applicable',
    ];

    // Date.
    $form['dob'] = [
      '#type' => 'date',
      '#title' => $this->t('Date of birth'),
      '#default_value' => ['year' => 2020, 'month' => 2, 'day' => 15],
      '#description' => 'Enter a date in the form of YYYY MM DD',
    ];

    // Email.
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#description' => 'Enter your email address',
    ];

   
    // Password.
    $form['password'] = [
      '#type' => 'password',
      '#title' => $this->t('Password'),
      '#description' => 'Enter a password',
    ];

    // Radios.
    $form['settings']['active'] = [
      '#type' => 'radios',
      '#title' => t('Gender'),
      '#options' => ['M' => $this->t('Male'), 'F' => $this->t('Female')],
      '#description' => $this->t('Select either Male or Female'),
    ];

    
    // Tel.
    $form['phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone'),
      '#description' => $this->t('Enter your phone number, beginning with country code, e.g., 1 503 555 1212'),
    ];

    // Textarea.
    $form['address'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Address'),
      '#description' => $this->t('Enter your Address here'),
    ];

    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form.
    $form['actions'] = [
      '#type' => 'actions',
    ];


    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#description' => $this->t('Submit, #type = submit'),
    ];

    return $form;
  }

  public function getFormId() {
    return 'hello_form';
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    if (strlen($name) < 5) {
      // Set an error for the form element with a key of "title".
      $form_state->setErrorByName('job_title', $this->t('Your name must be at least 5 characters long.'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
 
 $name = $form_state->getValue('name');
 $email = $form_state->getValue('email');
 drupal_set_message(t('Hello %name your Email id is %email', ['%name' => $name,'%email' => $email]));

 //$db = \Drupal::database();

//$db->insert($table_name)->fields($fields_array_key_value_pair)->execute();    
  
   db_insert('hello')->fields(array(
      'name' => $name,
      'email' => $email,
    ))->execute();
   
   //$result = db_query('SELECT * FROM {hello}')->fetchAllAssoc('id');
   //drupal_set_message($result);
  /*
    // Find out what was submitted.
    $values = $form_state->getValues();
    foreach ($values as $key => $value) {
      $label = isset($form[$key]['#title']) ? $form[$key]['#title'] : $key;

      // Many arrays return 0 for unselected values so lets filter that out.
      if (is_array($value)) {
        $value = array_filter($value);
      }

      // Only display for controls that have titles and values.
      if ($value && $label) {
        $display_value = is_array($value) ? preg_replace('/[\n\r\s]+/', ' ', print_r($value, 1)) : $value;
        $message = $this->t('Value for %title: %value', array('%title' => $label, '%value' => $display_value));
        drupal_set_message($message);
        */
      
    }
    
  
  }