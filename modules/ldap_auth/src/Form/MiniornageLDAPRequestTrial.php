<?php

namespace Drupal\ldap_auth\Form;

use Drupal;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\ldap_auth\MiniorangeLdapSupport;
use Drupal\ldap_auth\Utilities;

class MiniornageLDAPRequestTrial extends FormBase
{
  private ImmutableConfig $config;
  protected $messenger;

  public function __construct()
  {
    global $base_url;
    $this->config = Drupal::config('ldap_auth.settings');
    $this->messenger = Drupal::messenger();
  }

  public function getFormId() {
    return 'mo_ldap_request_support';
  }

  public function buildForm(array $form, FormStateInterface $form_state, $options = NULL) {

    $form['#prefix'] = '<div id="modal_example_form">';
    $form['#suffix'] = '</div>';
    $form['status_messages'] = [
      '#type' => 'status_messages',
      '#weight' => -10,
    ];

    $user_email = Utilities::getCustomerEmail();

    $form['mo_ldap_auth_trial_email_address'] = array(
      '#type' => 'email',
      '#title' => t('Email'),
      '#default_value' => $user_email,
      '#required' => true,
      '#attributes' => array('placeholder' => t('Enter your email'), 'style' => 'width:99%;margin-bottom:1%;'),
    );

    $form['mo_ldap_auth_trial_method'] = array(
      '#type' => 'select',
      '#title' => t('Trial Method'),
      '#attributes' => array('style' => 'width:99%;height:30px;margin-bottom:1%;'),
      '#options' => [
        'Drupal ' . Utilities::mo_get_drupal_core_version() . ' LDAP / Active Directory Premium version' => t('Drupal ' . Utilities::mo_get_drupal_core_version() . ' LDAP / Active Directory Premium version'),
        'Drupal ' . Utilities::mo_get_drupal_core_version() . ' LDAP / Active Directory All Inclusive version' => t('Drupal ' . Utilities::mo_get_drupal_core_version() . ' LDAP / Active Directory All Inclusive version'),
        'Not Sure' => t('Not Sure (We will assist you further)'),
      ],
    );

    $form['mo_ldap_auth_trial_description'] = array(
      '#type' => 'textarea',
      '#rows' => 4,
      '#required' => true,
      '#title' => t('Description'),
      '#attributes' => array('placeholder' => t('Describe your use case here!'), 'style' => 'width:99%;'),
    );

    $form['mo_ldap_auth_trial_note'] = array(
      '#markup' =>t('<div>If you are not sure what to choose, you can get in touch with us on <a href="mailto:drupalsupport@xecurify.com">drupalsupport@xecurify.com</a> and we will assist you further.</div>'),
    );

    $form['actions'] = array('#type' => 'actions');
    $form['actions']['send'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#attributes' => [
        'class' => [
          'use-ajax',
          'button--primary'
        ],
      ],
      '#ajax' => [
        'callback' => [$this, 'submitModalFormAjax'],
        'event' => 'click',
      ],
    ];

    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';
    return $form;
  }

  public function submitModalFormAjax(array $form, FormStateInterface $form_state) {
    $form_values = $form_state->getValues();
    $response = new AjaxResponse();
    // If there are any form errors, AJAX replace the form.
    if ( $form_state->hasAnyErrors() ) {
      $response->addCommand(new ReplaceCommand('#modal_example_form', $form));
    } else {
      $email = $form_values['mo_ldap_auth_trial_email_address'];
      $query = $form_values['mo_ldap_auth_trial_method'] .' : '.$form_values['mo_ldap_auth_trial_description'];
      $query_type = 'trial';

      $support = new MiniorangeLdapSupport($email, '', $query, $query_type);
      $support_response = $support->sendSupportQuery();

      $this->messenger->addStatus(t('Success! Trial query successfully sent. We will provide you with the trial version shortly.'));
      $response->addCommand(new RedirectCommand(Url::fromRoute('ldap_auth.ldap_config')->toString()));
    }
    return $response;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) { }

  public function submitForm(array &$form, FormStateInterface $form_state) { }

}
