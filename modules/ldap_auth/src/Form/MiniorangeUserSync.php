<?php

/**
 * @file
 * Contains \Drupal\miniorange_ldap\Form\usersync.
 */

namespace Drupal\ldap_auth\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\ldap_auth\MiniorangeLdapSupport;
use Drupal\ldap_auth\Utilities;

class MiniorangeUserSync extends FormBase{
    public function getFormId()
    {
        return 'user_sync';
    }

    public function buildForm( array $form, FormStateInterface $form_state )
    {
        global $base_url;
        $attachments['#attached']['library'][] = 'ldap_auth/ldap_auth.admin';
        $form['markup_library'] = array(
           '#attached' => array(
               'library' => array(
              "ldap_auth/ldap_auth.admin",
          )
      ),
  );

 /*
 *  All Inclusive feature showcase
 */
      $form['markup_top'] = array(
            '#markup' => t('<div class="mo_ldap_table_layout_1"><div class="mo_ldap_table_layout container" >
                           <h3 ><span>User & Password Sync  <a href= "' . $base_url .'/admin/config/people/ldap_auth/Licensing"><span style="font-size: small">[All Inclusive]</span></a> <a class="button button--primary" style="float:right;" href ="https://www.drupal.org/docs/contributed-modules/ldap-integration/ldap-password-sync" target="_blank">&#128366; How to sync users</a></span></h3><br><hr><br>')
        );
      $form['sync_markup_note']=array(
        '#markup'=> '<div class="mo_ldap_highlight_background_note_1" >
            These feature allows you to perform of directory & password synchronization for your Drupal users with any LDAP Directory and vice versa.</div><br>'
      );

      $form['create_user_in_ldap'] =array(
        '#type'=> 'checkbox',
        '#disabled' => TRUE,
        '#title'=> t('Create users in Active Directory/LDAP Server when a user is created in Drupal.')
      );

      $form['delete_user_in_ldap'] =array(
        '#type'=> 'checkbox',
        '#disabled' => TRUE,
        '#title'=> t('Delete users in Active Directory/LDAP Server when a user is deleted in Drupal.')
      );

      $form['miniorange_ldap_update_user_info'] =array(
        '#type'=> 'checkbox',
        '#disabled' => TRUE,
        '#title'=> t('Update user information in Active Directory/LDAP Server when user information is updated in Drupal.'),
      );

      $form['miniorange_ldap_enable_password_sync'] =array(
        '#type'=> 'checkbox',
        '#disabled' => TRUE,
        '#title'=> t('Update user password in your LDAP/AD server when a user resets the password in Drupal .'),
        '#description'=> t('<b>Note:- </b>You need LDAPS for password related operations.'),
      );

      $form['miniorange_ldap_enable_ldap_markup2'] = array(
        '#markup' => "<br><div><h2><b>Import Users From LDAP:</b></h2><hr></div>",
      );
      $form['miniorange_ldap_import_at_cron'] = array(
        '#type' => 'checkbox',
        '#disabled' => TRUE,
        '#title' => t('Import Users from your LDAP/AD server on cron'),
      );

      $form['miniorange_ldap_load_account_with_email'] = array(
        '#type' => 'checkbox',
        '#disabled' => TRUE,
        '#title' => t('Search User By Email, if not found by Username'),
      );

      $form['miniorange_ldap_import_mapping'] = array(
        '#type' => 'checkbox',
        '#disabled' => TRUE,
        '#title' => t('Enable Attribute and Role mapping during User sync'),
      );

      $form['miniorange_ldap_import_auto_create_users'] = array(
        '#type' => 'checkbox',
        '#disabled' => TRUE,
        '#title' => t('Auto Create users after Sync'),
      );


      $form['miniorange_ldap_set_of_radiobuttons1']['miniorange_ldap_block_new_users']=array(
        '#type'=>'radios',
        '#disabled' => TRUE,
        '#options' => array('block_ad' => 'Block the new users which are not present in Drupal and present in AD','block_drupal' => 'Block the users which are not present in AD and present in Drupal', 'block_none' => 'Do not block any user'),
      );


      $form['miniorange_ldap_import_username_attribute'] = array(
        '#type' => 'textfield',
        '#title' => t('Username Attribute:'),
        '#disabled' => TRUE,
        '#description' => 'Enter the attribute with which you wish to search against their Drupal Usernames.Example: sAMAccountName, mail, userPrincipalName',
        '#attributes' => array('placeholder' => 'Enter Username Attribute'),
        '#suffix' => '<br>'
      );

      $form['miniorange_ldap_save_import_users_settings']= array(
        '#type' => 'submit',
        '#value' => t('Save Changes'),
        '#disabled' => TRUE,
      );

      $form['miniorange_ldap_import_users']= array(
        '#type' => 'submit',
        '#value' => t('Import All Users From LDAP'),
        '#disabled' => TRUE,
      );

      $form['miniorange_ldap_save_export_users_settings']= array(
        '#prefix' => "<br><br>",
        '#type' => 'submit',
        '#disabled' => TRUE,
        '#value' => t('Export Log'),
      );


      $form['mo_markup_div_imp_2']=array('#markup'=>'</div>');

      Utilities::AddSupportButton($form, $form_state);
      return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state){
    }


    function setup_call(array &$form, FormStateInterface $form_state){
    Utilities::setup_call($form,$form_state);
  }

}
