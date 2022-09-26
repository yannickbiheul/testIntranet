<?php
/**
 * @file
 * Contains Attribute for miniOrange Login with NTLM Module.
 */

/**
 * Showing Settings form.
 */
namespace Drupal\ldap_auth\Form;

use Drupal\Core\Config\Config;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\ldap_auth\MiniorangeLdapSupport;
use Drupal\ldap_auth\Utilities;

class AttributeMapping extends FormBase {

    private ImmutableConfig $config;
    private Config $config_factory;

    public function __construct()
    {
        global $base_url;
        $this->base_url = $base_url;
        $this->config = \Drupal::config('ldap_auth.settings');
        $this->config_factory = \Drupal::configFactory()->getEditable('ldap_auth.settings');
    }

    public function getFormId() {
        return 'miniorange_ldap_attrmapping';
    }
    public function buildForm(array $form, FormStateInterface $form_state){

        $attachments['#attached']['library'][] = 'ldap_auth/ldap_auth.admin';
        $form['markup_library'] = array(
            '#attached' => array(
                'library' => array(
                    "ldap_auth/ldap_auth.admin",
                    "ldap_auth/ldap_auth.testconfig",
                )
            ),
        );
        global $base_url;

        $form['markup_top'] = array(
            '#markup' => t('<div class="mo_ldap_table_layout_1"><div class="mo_ldap_table_layout container" >
        <span><h2>Attribute Mapping <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><span style="font-size: small">[Premium, All-inclusive]</span></a><a class="button button--primary" style="float:right;" href ="https://developers.miniorange.com/docs/drupal/ldap/attribute-and-role-mapping" target="_blank">&#128366;  Setup Attributes</a></h2></span><br><hr>')
        );

        $form['Configure_Attribute_Mapping_End'] = array(
            '#markup' => t('<p>This feature allows to you to map the user attributes from your LDAP server to the user attributes in Drupal. In addition to the below given Drupal attributes, mapping of other Drupal custom attributes is also present in the <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><b>[Premium, All-inclusive]</b></a> version of the module</p><br><div class="mo_ldap_highlight_background_note_1" >Enter the LDAP attribute names for <b>Email</b>, <b>Phone</b>, <b>First Name</b> and <b>Last Name</b> attributes</div><br>'),
        );

        $form['miniorange_ldap_email_attribute'] = array(
            '#type' => 'textfield',
            '#title' => t('Email Attribute'),
            '#required' => TRUE,
            '#attributes' => array('style' => 'width:700px; background-color: hsla(0,0%,0%,0.02) !important;','placeholder' => t('Enter Email attribute')),
            '#default_value'=>$this->config->get('miniorange_ldap_email_attribute'),
        );

        $form['miniorange_ldap_phone_attribute'] = array(
            '#type' => 'textfield',
            '#title' => t('Phone :'),
            '#disabled' => true,
            '#attributes' => array('style' => 'width:700px; background-color: hsla(0,0%,0%,0.08) !important;','placeholder' => 'Enter phone Attribute'),
        );

        $form['miniorange_ldap_first_name_attribute'] = array(
            '#type' => 'textfield',
            '#title' => t('First Name:'),
            '#disabled' => true,
            '#attributes' => array('style' => 'width:700px; background-color: hsla(0,0%,0%,0.08) !important;','placeholder' => 'Enter first name Attribute'),
        );

        $form['miniorange_ldap_last_name_attribute'] = array(
            '#type' => 'textfield',
            '#title' => t('Last Name:'),
            '#disabled' => true,
            '#attributes' => array('style' => 'width:700px; background-color: hsla(0,0%,0%,0.08) !important;','placeholder' => 'Enter last name Attribute'),
        );

        $form['miniorange_ldap_gateway_config1_submit'] = array(
            '#type' => 'submit',
            '#value' => t('Save Configuration'),
            '#prefix' => '<br>',
            '#suffix' => '<br><br>',
        );


        /**
         * User Role Mapping
         */

        $form['markup_cam_attr'] = array(
            '#markup' => t('<br><br><div><h2>User Role Mapping  <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><small style="font-size: small">[Premium, All-inclusive]</small></a></h2><hr>'),
        );


        $form['miniorange_ldap_enable_rolemapping'] = array(
            '#type' => 'checkbox',
            '#title' => t('Check this option if you want to <b>Enable Role Mapping</b>'),
            '#description' => t('<b style="color: red">Note:</b> Enabling Role Mapping will automatically map Users from LDAP Groups to below selected Drupal Role.<br> Role mapping will not be applicable for primary admin of Drupal.'),
            '#suffix' => '</div>',
            '#disabled' => TRUE,
        );

        $form['miniorange_ldap_disable_role_update'] = array(
            '#type' => 'checkbox',
            '#title' => t('Check this option if you don\'t want to remove existing roles of users (New Roles will be added)'),
            '#disabled' => TRUE,
        );

        $form['miniorange_ldap_enable_ntlm_role_mapping'] = array(
            '#type' => 'checkbox',
            '#disabled' => true,
            '#title' => t('Enable Role Mapping for NTLM Users '),
            '#description' => t('<b style="color: red">Note: </b>Likewise Role Mapping, enabling this option automatically map NTLM user roles from LDAP Groups to below selected Drupal Role.'),
        );


        $mrole= user_role_names($membersonly = TRUE);
        $drole = array_values($mrole);

        $form['miniorange_ldap_default_mapping'] = array(
            '#type' => 'select',
            '#title' => t('Select default group for the new users'),
            '#options' => $mrole,
            '#default_value' => $drole,
            '#attributes' => array('style' => 'width:73%; border-radius: 4px; padding: 5px;'),
            '#disabled' => FALSE,
        );

        $form['miniorange_ldap_memberOf'] = array(
            '#type' => 'textfield',
            '#disabled' => TRUE,
            '#title' => t('LDAP Group Name'),
            '#attributes' => array('style' => 'width:73%; background-color: hsla(0,0%,0%,0.08) !important;','placeholder' => 'memberOf'),
        );

        foreach($mrole as $roles) {
            $rolelabel = str_replace(' ','',$roles);
            $form['miniorange_ldap_role_' . $rolelabel] = array(
                '#type' => 'textfield',
                '#title' => t($roles),
                '#attributes' => array('style' => 'width:73%;background-color: hsla(0,0%,0%,0.08) !important;','placeholder' => 'Semi-colon(;) separated Group/Role value for ' . $roles),
                '#disabled' => TRUE,
            );
        }

        $form['miniorange_ldap_gateway_config4_submit'] = array(
            '#type' => 'submit',
            '#value' => t('Save Configuration'),
            '#disabled' => TRUE,
            '#prefix' => '<br>',
            '#suffix' => '<br><br></div>',
        );

        Utilities::AddSupportButton($form, $form_state);

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state){
        $this->config_factory->set('miniorange_ldap_email_attribute', trim($form_state->getValue('miniorange_ldap_email_attribute')))->save();
    }

    function setup_call(array &$form, FormStateInterface $form_state){
        Utilities::setup_call($form,$form_state);
    }


}
