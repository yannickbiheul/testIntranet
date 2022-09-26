<?php

namespace Drupal\ldap_auth\Form;

use Drupal\Core\Config\Config;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\ldap_auth\Utilities;


class MiniorangeDebug extends FormBase {

    private $base_url;
    private ImmutableConfig $config;
    private Config $config_factory;
    public function __construct(){
    global $base_url;
    $this->base_url = $base_url;
    $this->config = \Drupal::config('ldap_auth.settings');
    $this->config_factory = \Drupal::configFactory()->getEditable('ldap_auth.settings');
   }

    public function getFormId() {
        return 'miniorange_ldap_debug';
    }

    public function buildForm(array $form, FormStateInterface $form_state){
      global $base_url;
      $current_status = $this->config->get('miniorange_ldap_status');
      $form['markup_library'] = array(
        '#attached' => array(
            'library' => array(
                "ldap_auth/ldap_auth.admin",
            )
        ),
      );
      $form['markup_14'] = array(
        '#markup' => '<div class="mo_ldap_table_layout_1"><div class="mo_ldap_table_layout container"><div>');

      $form['ldap_debug'] = array(
        '#type' => 'vertical_tabs',
        '#default_tab' => 'edit-debug',
      );
      $form['debug'] = array(
        '#type' => 'details',
        '#title' => $this
          ->t('Debug Logs'),
        '#group' => 'ldap_debug',
      );
      $form['debug']['markup'] = array(
        '#markup' => '<h2>Debugging and Troubleshoot</h2><br>',
      );
      $form['debug']['loggers'] = array(
        '#type' => 'checkbox',
        '#name' => 'loggers',
        '#title' => t('Enable Logging '),
        '#description' => 'Enabling this checkbox will add loggers under the <a target = "_blank" href="'.$base_url.'/admin/reports/dblog?type%5B%5D=ldap_auth">Reports</a> section',
        '#default_value' => $this->config->get('miniorange_ldap_enable_logs'),
      );
      $form['debug']['miniorange_ldap_save_logs_option'] = array(
        '#type' => 'submit',
        '#value' => t('Save'),
        '#submit' => array('::save_logs_option'),
      );

      $form['demo_support'] = array(
        '#type' => 'details',
        '#title' => $this
          ->t("Request for a Demo"),
        '#group' => 'ldap_debug',
      );

      $form['demo_support']['miniorange_ldap_demo_email_address'] = array(
        '#type' => 'textfield',
        '#default_value' => Utilities::getCustomerEmail(),
        '#title' => t('Email Address'),
        '#attributes' => array('placeholder' => 'Enter your email'),
      );

      $form['demo_support']['miniorange_ldap_demo_phone_number'] = array(
        '#type' => 'textfield',
        '#title' => t('Phone number'),
        '#attributes' => array('placeholder' => 'Enter your phone number'),
      );

      $form['demo_support']['miniorange_ldap_demo_support_query'] = array(
        '#type' => 'textarea',
        '#title' => t('Query'),
        '#cols' => '10',
        '#rows' => '5',
        '#attributes' => array('style'=>'width:80%','placeholder' => 'Write your query here'),
      );

      $form['demo_support']['miniorange_ldap_request_for_demo_submit'] = array(
        '#type' => 'submit',
        '#value' => t('Request for Demo/Trial'),
        '#submit' => array('::request_for_demo'),
      );

      $form['demo_support']['miniorange_ldap_support_note'] = array(
        '#markup' => '<div><br/>If you want custom features in the module, just drop an email to <a href="mailto:drupalsupport@xecurify.com">drupalsupport@xecurify.com</a></div>'
      );

      $form['register_close'] = array(
          '#markup' => '</div>',
      );

      $form['mo_markup_div_imp_2']=array('#markup'=>'</div>');
      Utilities::AddSupportButton($form, $form_state);

      return $form;
    }
    public function save_logs_option(array &$form, FormStateInterface $form_state){
        $enable_loggers = $form['debug']['loggers']['#value'];
        $this->config_factory->set('miniorange_ldap_enable_logs', $enable_loggers)->save();
        Utilities::add_message(t('Settings Saved Successfully.'),'status');
    }
    public function submitForm(array &$form, FormStateInterface $form_state) {
    }
    public function request_for_demo(array &$form, FormStateInterface $form_state) {
      $email = $form['demo_support']['miniorange_ldap_demo_email_address']['#value'];
      $phone = $form['demo_support']['miniorange_ldap_demo_phone_number']['#value'];
      $query = $form['demo_support']['miniorange_ldap_demo_support_query']['#value'];
      if(empty($email)||empty($query)){
        Utilities::add_message(t('The <b><u>Email </u></b> and <b><u>Query</u></b> fields are mandatory.'),'error');
        return;
      }
        $query = '<br><b>Demo Request: </b> <br>'.$query;
        Utilities::send_support_query($email, $phone, $query);
    }


    public function miniorange_ldap_back(&$form, $form_state) {
      $current_status = 'CUSTOMER_SETUP';
      $this->config_factory->set('miniorange_ldap_status', $current_status)->save();
      $this->config_factory
        ->clear('miniorange_miniorange_ldap_customer_admin_email')
        ->clear('miniorange_ldap_customer_admin_phone')
        ->clear('miniorange_ldap_tx_id')
        ->save();
      Utilities::add_message(t('Register/Login with your miniOrange Account'),'status');
    }

    public function miniorange_ldap_resend_otp(&$form, $form_state) {
      $this->config_factory->clear('miniorange_ldap_tx_id')->save();
      $username = $this->config->get('miniorange_ldap_customer_admin_email');
      $phone = $this->config->get('miniorange_ldap_customer_admin_phone');
      $customer_config = new MiniorangeLdapCustomer($username, $phone, NULL, NULL);
      $send_otp_response = json_decode($customer_config->sendOtp());
      if ($send_otp_response->status == 'SUCCESS') {
        // Store txID.
          $this->config_factory->set('miniorange_ldap_tx_id', $send_otp_response->txId)->save();
          $current_status = 'VALIDATE_OTP';
          $this->config_factory->set('miniorange_ldap_status', $current_status)->save();
          Utilities::add_message(t('Verify email address by entering the passcode sent to @username', array('@username' => $username)),'status');
        }
    }

    public function miniorange_ldap_validate_otp_submit(&$form, $form_state) {
      $otp_token = $form['miniorange_ldap_customer_otp_token']['#value'];
      $username = $this->config->get('miniorange_ldap_customer_admin_email');
      $phone = $this->config->get('miniorange_ldap_customer_admin_phone');
      $tx_id = $this->config->get('miniorange_ldap_tx_id');
      $customer_config = new MiniorangeLdapCustomer($username, $phone, NULL, $otp_token);
      $validate_otp_response = json_decode($customer_config->validateOtp($tx_id));

      if ($validate_otp_response->status == 'SUCCESS')
      {
          $this->config_factory->clear('miniorange_ldap_tx_id')->save();
          $password = $this->config->get('miniorange_ldap_customer_admin_password');
          $customer_config = new MiniorangeLdapCustomer($username, $phone, $password, NULL);
          $create_customer_response = json_decode($customer_config->createCustomer());
          if ($create_customer_response->status == 'SUCCESS') {
              $current_status = 'PLUGIN_CONFIGURATION';
              $this->config_factory->set('miniorange_ldap_status', $current_status)->save();
              $this->config_factory->set('miniorange_ldap_customer_admin_email', $username)->save();
              $this->config_factory->set('miniorange_ldap_customer_admin_phone', $phone)->save();
              $this->config_factory->set('miniorange_ldap_customer_admin_token', $create_customer_response->token)->save();
              $this->config_factory->set('miniorange_ldap_customer_id', $create_customer_response->id)->save();
              $this->config_factory->set('miniorange_ldap_customer_api_key', $create_customer_response->apiKey)->save();
              Utilities::add_message(t('Customer account created.'),'status');
          }
          else if(trim($create_customer_response->message) == 'Email is not enterprise email.'){
              Utilities::add_message(t('There was an error creating an account for you.<br> You may have entered an invalid Email-Id
              <strong>(We discourage the use of disposable emails) </strong>
              <br>Please try again with a valid email.'),'error');
              return;
          }
          else {
              Utilities::add_message(t('Error creating customer'),'error');
              return;
          }
      }
      else {
          Utilities::add_message(t('Error validating OTP'),'error');
          return;
      }
    }

    function setup_call(array &$form, FormStateInterface $form_state){
    Utilities::setup_call($form,$form_state);
  }

}
