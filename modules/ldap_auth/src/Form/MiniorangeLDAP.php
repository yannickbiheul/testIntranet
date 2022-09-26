<?php

/**
 * @file
 * Contains \Drupal\miniorange_ldap\Form\MiniorangeLDAP.
 */

namespace Drupal\ldap_auth\Form;
use Drupal\Core\Config\Config;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Url;
use Drupal\ldap_auth\handler;
use Drupal\ldap_auth\LDAPLOGGERS;
use Drupal\ldap_auth\LDAPFlow;
use Drupal\ldap_auth\MiniorangeLdapSupport;
use Drupal\ldap_auth\Utilities;
use Drupal\Component\Utility\Html;

class MiniorangeLDAP extends FormBase{

    private $base_url;
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
    return 'miniorange_ldap_config_client';
  }
    public function buildForm(array $form, FormStateInterface $form_state){

    global $base_url;
    $ldap_connect = new LDAPFlow();
    $form['markup_library'] = array(
        '#attached' => array(
            'library' => array(
                "ldap_auth/ldap_auth.admin",
                "ldap_auth/ldap_auth.main",
                 "ldap_auth/ldap_auth.test",
            )
        ),
    );

    if(!Utilities::isLDAPInstalled()){
        $form['markup_reg_msg'] = array(
            '#markup' => '<div class="mo_ldap_enable_extension_message"><b>The PHP LDAP extension is not enabled.</b><br> Please Enable the PHP LDAP Extension for you server to continue. If you want, you refer to the steps given on the link  <a target="_blank" href="https://faq.miniorange.com/knowledgebase/how-to-enable-php-ldap-extension/" >here</a> to enable the extension for your server.</div><br>',
        );
    }
    $next_disabled = true;
    if($this->config->get('miniorange_ldap_test_conn_enabled') == 1 )
      $next_disabled = false;
    $status= $this->config->get('miniorange_ldap_config_status');
    if($status=='')
      $status = 'two';

    $config_step = $this->config->get('miniorange_ldap_steps');
    switch ($config_step) {
      case 0:
        $navbar_val = 1;
    break;
      case 1:
        $navbar_val = 20;
    break;
      case 2:
        $navbar_val = 40;
    break;
      case 3:
        $navbar_val = 60;
        break;
      case 4:
        $navbar_val = 80;
        break;
      case 5:
         $navbar_val =100;
         break;
      default:
        $navbar_val = 1;
    }
    if($navbar_val == 100 ){
      $form['#prefix'] = '
    <div class="mo_ldap_table_layout_1">
        <div class="mo_ldap_table_layout">
            <strong>Note: </strong>You can get the below information from your LDAP administrator</strong><div class="btn-right"><a class="button button--primary" href ="https://www.youtube.com/watch?v=wBe8T6FLKx4" target="_blank">▶️ Video</a><a class="button button--primary" href="https://plugins.miniorange.com/guide-to-configure-ldap-ad-integration-module-for-drupal" target="_blank">&#128366; Guide</a><br></div>
        <br><br>';
    }
    else {
      $form['#prefix'] = '
    <div class="mo_ldap_table_layout_1">
        <div class="container_m1">
          <div class="table_navbar"><table><th>Step 1: <br>Contact LDAP Server</th><th>Step 2: <br>Perform Test Connection</th><th>Step 3: <br>Select Base/Bind DN</th><th>Step 4: <br>Enable Login using LDAP</th><th>Step 5: <br>Test LDAP Login</th><th>All Done</th></table></div>
          <progress id="determinate"  value="' . $navbar_val . '" min="0" max="100"> 25% </progress>
        </div>
            <br>
        <div class="mo_ldap_table_layout">
            <strong>Note: </strong>You can get the below information from your LDAP administrator</strong><div class="btn-right"><a class="button button--primary" href ="https://www.youtube.com/watch?v=wBe8T6FLKx4" target="_blank">Setup Video</a> <a class="button button--primary" href="https://plugins.miniorange.com/guide-to-configure-ldap-ad-integration-module-for-drupal" target="_blank">Setup Guide</a><br></div>
        <br><br>';
    }
    if($status=='review_config'){

        $form['ldap_server'] = array(
            '#markup' => "
                <h1><b>LDAP Connection Information</b></h1><hr><h3>LDAP Server:</h3>",
        );
        $form['ldap_server_url_markup_start'] = array(
            '#markup' => '<div class="ldap_Server_row">',
        );

        $form['miniorange_ldap_options'] = array(
            '#type' => 'value',
            '#id' => 'miniorange_ldap_options',
            '#value' => array(
              'ldap://' => t('ldap://'),
              'ldaps://' => t('ldaps://'),),
        );
        $form['miniorange_ldap_protocol'] = array(
        '#id' => 'miniorange_ldap_protocol',
        '#type' => 'select',
        '#prefix' => '<div class="ldap-column left">',
        '#suffix' => '</div>',
        '#default_value' =>$this->config->get('miniorange_ldap_protocol'),
        '#options' => $form['miniorange_ldap_options']['#value'],
        '#attributes' => array('style'=>'width:100%'),
        );

        $form['miniorange_ldap_server_address'] = array(
            '#type' => 'textfield',
            '#id' => 'miniorange_ldap_server_address',
            '#prefix' => '<div class="ldap-column middle">',
            '#suffix' => '</div>',
            '#default_value' =>$this->config->get('miniorange_ldap_server_address'),
            '#attributes' => array('style' => 'width:100%;','placeholder' => 'Enter your server-address or IP'),
        );
        $form['miniorange_ldap_server_port_number'] = array(
            '#type' => 'textfield',
            '#prefix' => '<div class="ldap-column right">',
            '#suffix' => '</div>',
            '#default_value' =>$this->config->get('miniorange_ldap_server_port_number'),
            '#attributes' => array('style' => 'width:100%;','placeholder' => '<port>'),
        );
        $form['ldap_server_url_markup_end'] = array(
            '#markup' => '</div><small>Specify the host name for the LDAP server eg: ldap://myldapserver.domain:389 , ldap://89.38.192.1:389. When using SSL, the host may have to take the form ldaps://host:636.<br>
                            LDAPS allows you to secure your LDAP server connection between client and server application to encrypt the communication.
                            </small>',
        );
        $form['miniorange_ldap_enable_tls'] = array(
        '#type' => 'checkbox',
        '#disabled' => true,
        '#id' => 'check',
        '#title' => t('Enable TLS (Check this only if your server use TLS Connection)  <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><strong>[Premium, All-inclusive]</strong></a>'),

      );

        $form['miniorange_ldap_contact_server_button'] = array(
            '#type' => 'submit',
            '#value' => t('Contact LDAP Server'),
            '#submit' => array('::test_ldap_connection'),
            '#suffix'=>'<br>',
        );

        global $base_url;
        $form['miniorange_ldap_anonymous_bind_markup_2'] = array(
            '#markup' => '<br><div class="mo_ldap_highlight_background_note_1" >In case you do not have any authentication setup and wish to perform anonymous bind to your server, please click on the Next button and continue with your setup.</div>',
        );

        $form['miniorange_ldap_server_account_username'] = array(
            '#type' => 'textfield',
            '#title' => t('Bind Account DN'),
            '#default_value' =>$this->config->get('miniorange_ldap_server_account_username'),
            '#description' => "This service account username will be used to establish the connection. Specify the Service Account Username of the LDAP server in the either way as follows Username@domainname or domainname\Username. or Distinguished Name(DN) format",
            '#attributes' => array('style' => 'width:73%;','placeholder' => 'CN=service,DC=domain,DC=com'),
        );
        $form['miniorange_ldap_server_account_password'] = array(
            '#type' => 'password',
            '#title' => t('Bind Account Password'),
            '#default_value' =>$this->config->get('miniorange_ldap_server_account_password'),
            '#attributes' => array('style' => 'width:73%;','placeholder' => 'Enter password for Service Account'),
        );

        $form['miniorange_ldap_test_connection_button'] = array(
            '#type' => 'submit',
            '#disabled' => $next_disabled,
            '#prefix' => '<br>',
            '#suffix'=>'<br><br>',
            '#value' => t('Test Connection'),
            '#submit' => array('::test_connection_ldap'),
        );

        $possible_search_bases = $ldap_connect->getSearchBases();
        $possible_search_bases_in_key_val = array();
        foreach($possible_search_bases as $search_base){
            $possible_search_bases_in_key_val[$search_base]=$search_base;
        }
        $possible_search_bases_in_key_val['custom_base']='Provide Custom LDAP Search Base';

        $form['miniorange_search_base_options'] = array(
            '#type' => 'value',
            '#id' => 'miniorange_search_base_options',
            '#value' => $possible_search_bases_in_key_val,
        );

        $form['miniorange_ldap_custom_sb_attribute'] = array(
        '#type' => 'textfield',
        '#title' => t('Custom Search Base(s):'),
        '#default_value' =>$this->config->get('miniorange_ldap_custom_sb_attribute'),
        '#states' => array('visible' => array(':input[name = "search_base_attribute"]' => array('value' => 'custom_base' ), ),),
        '#attributes' => array('style' => 'width:73%;'),
      );

        $form['miniorange_search_base_options']['search_base_attribute'] = array(
            '#id' => 'miniorange_ldap_search_base_attribute',
            '#title' => t('Search Base(s):'),
            '#type' => 'select',
            '#default_value' =>$this->config->get('miniorange_ldap_search_base'),
            '#options' => $form['miniorange_search_base_options']['#value'],
            '#attributes' => array('style'=>'width:73%;height:30px'),
            '#description' => t('This is the LDAP tree under which we will search for the users for authentication. If we are not able to find a user in LDAP it means they are not present in this search base or any of its sub trees.
                Provide the distinguished name of the Search Base object. <b>E.g. cn=Users,dc=domain,dc=com.</b>
               <p> Multiple Search Bases are supported in the <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><strong>[Premium, All-inclusive]</strong></a> version of the module.</p>'),
        );
        $form['miniorange_username_options'] = array(
            '#type' => 'value',
            '#id' => 'miniorange_username_options',
            '#value' => array(
              'samaccountName' => t('samaccountName'),
              'mail' => t('mail'),
              'userPrincipalName' => t('userPrincipalName'),
              'cn' => t('cn'),
              'custom' => t('Provide Custom LDAP attribute name'),
            ),
          );

        $form['ldap_auth']['settings']['username_attribute'] = array(
            '#id' => 'miniorange_ldap_username_attribute',
            '#title' => t('Username/Search Filter:'),
            '#type' => 'select',

            '#default_value' =>$this->config->get('miniorange_ldap_username_attribute_option'),
            '#options' => $form['miniorange_username_options']['#value'],
            '#attributes' => array('style'=>'width:73%;height:30px'),
            '#description' => t('Select the LDAP attribute against which the user will be searched. <b>For example:</b> If you want the user to login in Drupal using their email address( the one present in the LDAP server), you can select <b>mail</b> in the dropdown.<br>
            <p>You can even search for your user using a Custom Search Filter. You can also allow logging in with multiple attributes, separated with the <i>semicolon</i> <strong>e.g. cn;mail</strong>  <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><strong>[Premium, All-inclusive]</strong></a><br>'),
          );
        $form['miniorange_ldap_custom_username_attribute'] = array(
            '#type' => 'textfield',
            '#title' => t('Custom Search Filter:'),
            '#default_value' =>$this->config->get('miniorange_ldap_custom_username_attribute'),
            '#states' => array('visible' => array(':input[name = "username_attribute"]' => array('value' => 'custom' ), ),),
            '#attributes' => array('style' => 'width:73%;'),
        );

        $form['save_user_mapping'] = array(
            '#markup' => "
                <div style='background-color: white; padding: 10px ;margin-left: 20px; width: 70%' id='enable_ldap'>
                    <p><b>Please Note:</b> The attributes that we are showing are examples and the actual ones could be different. These should be confirmed with the LDAP Admin.<p>
                    <input type='button' style='background-color: #4CAF50;border: none;color: white;padding: 8px 20px;text-align: center;text-decoration: none;display: inline-block;border-radius: 12px;font-size: 16px;' value='Save User Mapping' onclick='msg()'>
                </div>",
        );
        $form['troubleshooting_2'] = array(
            '#markup' => "
                <div style='background-color: white; padding: 10px ;margin-left: 20px; width: 70%' id='enable_ldap'>
                    <input type='button' style='background-color: #008CBA;border: none;color: white;padding: 8px 20px;text-align: center;text-decoration: none;display: inline-block;border-radius: 12px;font-size: 16px;' value='Troubleshooting' onclick='msg()'>
                </div>",
        );

        $form['miniorange_ldap_enable_ldap_markup'] = array(
        '#markup' => "<br><h1><b>Login With LDAP</b></h1><hr><br>",
      );
        $form['miniorange_ldap_enable_ldap'] = array(
        '#type' => 'checkbox',
        '#title' => t('Enable Login with LDAP '),
        '#default_value' => $this->config->get('miniorange_ldap_enable_ldap'),
      );
        $form['miniorange_ldap_enable_auto_reg'] = array(
        '#type' => 'checkbox',
        '#disabled' => 'true',
        '#title' => t('Enable Auto Creation of users if they do not exist in Drupal <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><strong>[Premium, All-inclusive]</strong></a>'),
        '#default_value' =>$this->config->get('miniorange_ldap_enable_auto_reg'),
      );
        $form['set_of_radiobuttons']['miniorange_ldap_authentication'] = array(
        '#type' => 'radios',
        '#disabled' => true,
        '#title' => t('Authentication restrictions: <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing">[Premium, All-inclusive]</a>'),
        '#description' => t('Only particular personalities will be able to login by selecting the above option.'),
        '#tree' => TRUE,
        '#default_value' => is_null($this->config->get('miniorange_ldap_authentication'))?0:$this->config->get('miniorange_ldap_authentication'),
        '#options' => array(0 => t('User can login using both their Drupal or LDAP credentials'), 1 => t('User can login in Drupal using their LDAP credentials and Drupal admins can also login using their local Drupal credentials'), 2 => t('Users can only login using their LDAP credentials')),
      );

        $form['save_config_edit'] = array(
        '#type' => 'submit',
        '#button_type' => 'primary',
        '#value' => t('Save Changes'),
        '#submit' => array('::miniorange_ldap_review_changes'),
        '#attributes' => array('style' => 'float: left;'),
      );
        $form['back_step_3'] = array(
        '#type' => 'submit',
        '#button_type' => 'danger',
        '#value' => t('Reset Configurations'),
        '#suffix'=> '<br><br>',
        '#submit' => array('::miniorange_ldap_back_2'),
      );

        $form['miniorange_ldap_testuser'] = array(
          '#markup' => "<div><br><h1><b>Test Authentication:</b></h1><hr></div>",
         );

        $form['miniorange_ldap_test_authentication_markup'] = array(
         '#markup' => t("<small>Please enter the LDAP username and password of user to authenticate the user against.Your user will be searched base on your search filter i.e <b>".$this->config->get('miniorange_ldap_username_attribute_option')."</b> under the search base <b>".$this->config->get('miniorange_ldap_search_base')."</b></small>"),
         );

        $form['miniorange_ldap_test_account_username'] = array(
          '#type' => 'textfield',
          '#title' => t('Username:'),
          '#id' => 'miniorange_ldap_test_account_username',
          '#default_value' => $this->config->get('mo_last_authenticated_user'),
          '#attributes' => array('placeholder' => 'User Account Username','style' => 'margin-left:0px;max-width: 50%'),
        );

        $form['miniorange_ldap_test_account_password'] = array(
          '#type' => 'password',
          '#title' => t('Password:'),
          '#id' => 'miniorange_ldap_test_account_password',
          '#attributes' => array('placeholder' => 'User Account Password','style' => 'margin-left:0px;max-width: 50%;'),
        );

        $form['miniorange_test_configuration'] = array(
          '#type' => 'submit',
          '#prefix'=>"<br>",
          '#value' => t('Test Authentication'),
          '#attributes' => ['onclick' => 'ldap_testConfig()', 'class' => ['use-ajax'] ],
          '#ajax'=>['event'=>'click']
        );
        }
    if($status=='one'){
        $form['miniorange_ldap_enable_ldap_markup'] = array(
            '#markup' => "<h1><b>Login Settings:</b></h1><hr><br>",
        );
        $form['miniorange_ldap_enable_ldap'] = array(
            '#type' => 'checkbox',
            '#description' => t('Select this checkbox to enable Login using LDAP/Active Directory credentials.'),
            '#title' => t('Enable Login with LDAP '),
            '#default_value' =>$this->config->get('miniorange_ldap_enable_ldap'),
        );
        $form['miniorange_ldap_enable_auto_reg'] = array(
          '#type' => 'checkbox',
          '#title' => t('Enable Auto Registering users if they do not exist in Drupal <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><strong>[Premium, All-inclusive]</strong></a>'),
          '#disabled' => 'true',
          '#default_value' =>$this->config->get('miniorange_ldap_enable_auto_reg'),
        );
        $form['set_of_radiobuttons']['miniorange_ldap_authentication'] = array(
            '#type' => 'radios',
            '#disabled' => 'true',
            '#suffix' =>  '<br>',
            '#title' => t('Authentication restrictions: <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing">[Premium, All-inclusive]</a>'),
            '#description' => t('Only particular personalities will be able to login by selecting the above option.'),
            '#tree' => TRUE,
            '#default_value' => is_null($this->config->get('miniorange_ldap_authentication'))?0:$this->config->get('miniorange_ldap_authentication'),
          '#options' => array(0 => t('User can login using both their Drupal or LDAP credentials'), 1 => t('User can login in Drupal using their LDAP credentials and Drupal admins can also login using their local Drupal credentials'), 2 => t('Users can only login using their LDAP credentials')),
        );

        $form['back_step_3'] = array(
            '#type' => 'submit',
            '#button_type' => 'danger',
            '#id' => 'button_config',
            '#value' => t('Back'),
            '#submit' => array('::miniorange_ldap_back_5'),
            '#attributes' => array('style' => 'width: fit-content;display:inline-block;'),
        );
        $form['next_step_1'] = array(
            '#type' => 'submit',
            '#button_type' => 'primary',
            '#id' => 'button_config',
            '#value' => t('Save & Next'),
            '#attributes' => array('style' => 'float: right;display:block;'),
            '#submit' => array('::miniorange_ldap_next_1'),
        );
    }
    else if($status=='two'){
        $form['mo_ldap_local_configuration_form_action'] = array(
            '#markup' => "<input type='hidden' name='option' id='mo_ldap_local_configuration_form_action' value='mo_ldap_local_save_config'></input>",
        );
        $form['ldap_server'] = array(
            '#markup' => "
            <br><h1><b>LDAP Connection Information</b></h1><hr><br><h3>LDAP Server:</h3>",
        );

        $form['ldap_server_url_markup_start'] = array(
            '#markup' => '<div class="ldap_Server_row">',
        );

        $form['miniorange_ldap_options'] = array(
            '#type' => 'value',
            '#id' => 'miniorange_ldap_options',
            '#value' => array(
              'ldap://' => t('ldap://'),
              'ldaps://' => t('ldaps://'),),
          );
        $form['miniorange_ldap_protocol'] = array(
            '#id' => 'miniorange_ldap_protocol',
            '#type' => 'select',
            '#prefix' => '<div class="ldap-column left">',
            '#suffix' => '</div>',
            '#default_value' =>$this->config->get('miniorange_ldap_protocol'),
            '#options' => $form['miniorange_ldap_options']['#value'],
            '#attributes' => array('style'=>'width:100%'),
          );
        $form['miniorange_ldap_server_address'] = array(
            '#type' => 'textfield',
            '#id' => 'miniorange_ldap_server_address',
            '#prefix' => '<div class="ldap-column middle">',
            '#suffix' => '</div>',
            '#default_value' =>$this->config->get('miniorange_ldap_server_address'),
            '#attributes' => array('style' => 'width:100%;','placeholder' => 'Enter your server-address or IP'),
        );
        $form['miniorange_ldap_server_port_number'] = array(
            '#type' => 'textfield',
            '#prefix' => '<div class="ldap-column right">',
            '#suffix' => '</div>',
            '#default_value' => $this->config->get('miniorange_ldap_server_port_number'),
            '#attributes' => array('style' => 'width:100%;','placeholder' => '<port>'),
        );

        $form['ldap_server_url_markup_end'] = array(
            '#markup' => '</div><small>Specify the host name for the LDAP server eg: ldap://myldapserver.domain:389 , ldap://89.38.192.1:389. When using SSL, the host may have to take the form ldaps://host:636.</small><br><br>',
        );
        $form['miniorange_ldap_contact_server_button'] = array(
            '#type' => 'submit',
            '#value' => t('Contact LDAP Server'),
            '#id' => 'button_config',
            '#submit' => array('::test_ldap_connection'),
        );
        $form['miniorange_ldap_enable_tls'] = array(
            '#prefix' => '<br><br>',
            '#type' => 'checkbox',
            '#id' => 'check',
            '#disabled' => 'true',
            '#title' => t('Enable TLS (Check this only if your server use TLS Connection) <b><a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><strong>[Premium, All-inclusive]</strong></a></b>'),
        );

        if($this->config->get('miniorange_ldap_steps') == 1) {
          $form['miniorange_ldap_anonymous_bind_markup'] = array(
            '#markup' => '<br><div class="mo_ldap_highlight_background_note_1">In case you do not have any authentication setup and wish to perform anonymous bind to your server, please click on the Next button and continue with your setup.</div>',
          );
          $form['miniorange_ldap_server_account_username'] = array(
            '#type' => 'textfield',
            '#title' => t('Bind Account DN:'),
            '#default_value' => $this->config->get('miniorange_ldap_server_account_username'),
            '#description' => t("This service account username will be used to establish the connection. Specify the Service Account Username of the LDAP server in the either way as follows Username@domainname or domainname\Username. or Distinguished Name(DN) format"),
            '#attributes' => array('style' => 'width:73%;', 'placeholder' => 'CN=service,DC=domain,DC=com'),
          );
          $form['miniorange_ldap_server_account_password'] = array(
            '#type' => 'password',
            '#title' => t('Bind Account Password:'),
            '#default_value' => $this->config->get('miniorange_ldap_server_account_password'),
            '#attributes' => array('style' => 'width:73%;', 'placeholder' => 'Enter password for Service Account'),
          );
          $form['miniorange_ldap_test_connection_button'] = array(
            '#type' => 'submit',
            '#prefix' => '<br>',
            '#value' => t('Test Connection'),
            '#submit' => array('::test_connection_ldap'),
          );

          $form['next_step_x'] = array(
            '#type' => 'submit',
            '#button_type' => 'primary',
            '#id' => 'button_config',
            '#value' => t('Next'),
            '#attributes' => array('style' => 'float: right;display:block;'),
            '#submit' => array('::miniorange_ldap_next_x'),
          );


        }
    }
    else if($status=='three'){
      //Get all Search bases from AD
      $possible_search_bases = $ldap_connect->getSearchBases();
      $possible_search_bases_in_key_val = array();
      foreach($possible_search_bases as $search_base){
        $possible_search_bases_in_key_val[$search_base]=$search_base;
      }
      $possible_search_bases_in_key_val['custom_base']='Provide Custom LDAP Search Base';

      $form['miniorange_search_base_options'] = array(
        '#type' => 'value',
        '#id' => 'miniorange_search_base_options',
        '#value' => $possible_search_bases_in_key_val,
      );
      $form['miniorange_search_base_options']['search_base_attribute'] = array(
        '#id' => 'miniorange_ldap_search_base_attribute',
        '#title' => t('Search Base(s):'),
        '#type' => 'select',
        '#description' => t('This is the LDAP tree under which we will search for the users for authentication. If we are not able to find a user in LDAP it means they are not present in this search base or any of its sub trees.
                   Provide the distinguished name of the Search Base object. <b>E.g. cn=Users,dc=domain,dc=com.</b>
                   <p>Multiple Search Bases are supported in the <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><strong>[Premium, All-inclusive]</strong></a> version of the module.</p><br>'),
        '#default_value' =>$this->config->get('miniorange_ldap_search_base'),
        '#options' => $form['miniorange_search_base_options']['#value'],
        '#attributes' => array('style'=>'width:73%;height:30px'),
      );
      $form['miniorange_ldap_custom_sb_attribute'] = array(
        '#type' => 'textfield',
        '#title' => t('Custom Search Base(s):'),
        '#default_value' =>$this->config->get('miniorange_ldap_custom_sb_attribute'),
        '#states' => array('visible' => array(':input[name = "search_base_attribute"]' => array('value' => 'custom_base' ), ),),
        '#attributes' => array('style' => 'width:73%;'),
      );

      $form['miniorange_username_options'] = array(
        '#type' => 'value',
        '#id' => 'miniorange_username_options',
        '#value' => array(
          'samaccountName' => t('samaccountName'),
          'mail' => t('mail'),
          'userPrincipalName' => t('userPrincipalName'),
          'cn' => t('cn'),
          'custom' => t('Provide Custom LDAP attribute name'),
        ),
      );
      $form['ldap_auth']['settings']['username_attribute'] = array(
        '#id' => 'miniorange_ldap_username_attribute',
        '#title' => t('Search Filter/Username Attribute:'),
        '#type' => 'select',
        '#description'=>t('Select the LDAP attribute against which the user will be searched. <b>For example:</b> If you want the user to login in Drupal using their email address( the one present in the LDAP server), you can select <b>mail</b> in the dropdown.<br>
            <p>You can even search for your user using a Custom Search Filter. You can also allow logging in with multiple attributes, separated with  <i>semicolon</i> <strong>e.g. cn;mail</strong>  <a href="' . $base_url .'/admin/config/people/ldap_auth/Licensing"><strong>[Premium, All-inclusive]</strong></a></p><div><br>'
        ),
        '#default_value' =>$this->config->get('miniorange_ldap_username_attribute_option'),
        '#options' => $form['miniorange_username_options']['#value'],
        '#attributes' => array('style'=>'width:73%;height:30px'),
      );
      $form['miniorange_ldap_custom_username_attribute'] = array(
        '#type' => 'textfield',
        '#title' => t('Custom Search Filter:'),
        '#default_value' =>$this->config->get('miniorange_ldap_custom_username_attribute'),
        '#states' => array('visible' => array(':input[name = "username_attribute"]' => array('value' => 'custom' ), ),),
        '#attributes' => array('style' => 'width:73%;'),
      );

      $form['back_step_3'] = array(
        '#type' => 'submit',
        '#button_type' => 'danger',
        '#id' => 'button_config',
        '#prefix' => "<div class='pito_enable_alignment'>",
        '#value' => t('Back'),
        '#submit' => array('::miniorange_ldap_back_3'),
        '#attributes' => array('style' => 'display: inline-block;'),
      );
      $form['next_step_3'] = array(
        '#type' => 'submit',
        '#id' => 'button_config',
        '#button_type' => 'primary',
        '#value' => t('Next'),
        '#suffix' => "</div></div>",
        '#attributes' => array('style' => 'float: right;display:block;'),
        '#submit' => array('::miniorange_ldap_next3'),
      );
    }
    else if($status=='four'){

      $form['miniorange_ldap_test_auth_markup'] = array(
        '#markup' => "<h1><b>Test Authentication:</b></h1><hr><br>",
      );

      $form['miniorange_ldap_test_account_username']=array(
        '#type'=>'textfield',
        '#id' => 'miniorange_ldap_test_account_username',
        '#title' => t('Username:'),
        '#required'=>true,
        '#description'=>t('Please enter the LDAP username to test the user attributes. Your user will be searched base on your search filter i.e <b>'.$this->config->get('miniorange_ldap_username_attribute_option').'</b> under the search base <b>'.$this->config->get('miniorange_ldap_search_base').'</b>'),
        '#default_value' =>$this->config->get('miniorange_ldap_server_account_username'),
        '#attributes' => array('placeholder' => 'User Account Username','style' => 'margin-left:0px;max-width: 50%;'),
      );
      $form['miniorange_ldap_test_account_password'] = array(
        '#type' => 'password',
        '#title' => t('Password:'),
        '#id' => 'miniorange_ldap_test_account_password',
        '#attributes' => array('placeholder' => 'User Account Password','style' => 'margin-left:0px;max-width: 50%;'),
        '#suffix' =>'<br>',
      );
      $form['miniorange_test_configuration_1'] = array(
        '#type' => 'button',
        '#value' => t('Test Authentication'),
        '#attributes' => ['onclick' => 'ldap_testConfig()', 'class' => ['use-ajax'] ],
        '#ajax'=>['event'=>'click']
      );

      $form['back_step_6'] = array(
        '#type' => 'submit',
        '#button_type' => 'danger',
        '#id' => 'button_config',
        '#value' => t('Back'),
        '#submit' => array('::miniornage_ldap_back_6'),
        '#attributes' => array('style' => 'display: inline-block;'),
      );

    }

    $form['mo_markup_div_imp']=array('#markup'=>'</div>');
    Utilities::AddSupportButton($form, $form_state);
    return $form;
  }

    function miniorange_ldap_back_1($form,$form_state){
        $this->config_factory->set('miniorange_ldap_config_status', 'one')->save();
  }
    function miniorange_ldap_back_2($form,$form_state){

        $this->config_factory->clear('miniorange_ldap_enable_ldap')
                             ->clear('miniorange_ldap_authenticate_admin')
                             ->clear('miniorange_ldap_authenticate_drupal_users')
                             ->clear('miniorange_ldap_enable_auto_reg')
                             ->clear('miniorange_ldap_server')
                             ->clear('miniorange_ldap_server_account_username')
                             ->clear('miniorange_ldap_server_account_password')
                             ->clear('miniorange_ldap_search_base')
                             ->clear('miniorange_ldap_username_attribute')
                             ->clear('miniorange_ldap_test_username')
                             ->clear('miniorange_ldap_test_password')
                             ->clear('miniorange_ldap_server_address')
                             ->clear('miniorange_ldap_protocol')
                             ->clear('miniorange_ldap_username_attribute_option')
                             ->clear('miniorange_ldap_user_attributes')->save();

        $this->config_factory->set('miniorange_ldap_server_port_number', '389')->save();
        $this->config_factory->set('miniorange_ldap_custom_username_attribute', 'samaccountName')->save();
        $this->config_factory->set('miniorange_ldap_config_status', 'two')->save();
        $this->config_factory->set('miniorange_ldap_steps', "0")->save();

        Utilities::add_message(t('Configurations removed successfully.'),'status');
    }
    function miniorange_ldap_back_3($form,$form_state){
        $this->config_factory->set('miniorange_ldap_config_status', 'two')->save();
        $this->config_factory->set('miniorange_ldap_steps', "1")->save();
    }
    function miniorange_ldap_back_5($form,$form_state){
      $this->config_factory->set('miniorange_ldap_steps', "2")->save();
      $this->config_factory->set('miniorange_ldap_config_status', 'three')->save();
    }
    function miniorange_ldap_back_4($form,$form_state){
        $this->config_factory->set('miniorange_ldap_config_status', 'four')->save();
    }
    function miniornage_ldap_back_6($form,$form_state){
      $this->config_factory->set('miniorange_ldap_config_status', 'three')->save();
      $this->config_factory->set('miniorange_ldap_steps', "3")->save();
    }

    /**
     * Test Connection
     */
    function test_connection_ldap($form,$form_state){

        $server_account_username ="";
        $server_account_password ="";
        $ldap_connect = new LDAPFlow();

        if(isset($_POST['miniorange_ldap_server_account_username']) && !empty($_POST['miniorange_ldap_server_account_username'])){
          $server_account_username = Html::escape(trim($_POST['miniorange_ldap_server_account_username']));
          $ldap_connect->setServiceAccountUsername($server_account_username);
        }
        if(isset($_POST['miniorange_ldap_server_account_password']) && !empty($_POST['miniorange_ldap_server_account_password'])){
            $server_account_password = Html::escape($_POST['miniorange_ldap_server_account_password']);
            $ldap_connect->setServiceAccountPassword($server_account_password);
        }
        user_cookie_save(array("mo_ldap_test" => true));
        $error = array();

        $error = $ldap_connect->test_mo_ldap_config($server_account_username,$server_account_password);

        if( $error[1] == "error" ) {
            if($this->config->get('miniorange_ldap_steps') != '5') {
              $this->config_factory->set('miniorange_ldap_config_status', 'two')->save();
            }
            $this->config_factory->set('miniorange_ldap_test_connection', 'Tried and Failed')->save();
            if($error[0] == "Invalid Password. Please check your password and try again."){
                $this->config_factory->set('miniorange_ldap_server_account_password', '')->save();
                Utilities::add_message(t($error[0]),'error');
            }
            elseif($error[0] == "Username or Password can not be empty until and unless you do not have any authentication setup and wish to perform <b>anonymous bind</b> to your server. If that is the case, please ignore this message and continue with the setup."){
                Utilities::add_message(t($error[0]),'error');
            }
            else
               Utilities::add_message(t("There was an error processing your request."),'error');

        }
        else if($error[1] == "Success") {
            if($this->config->get('miniorange_ldap_steps') != '5') {
              $this->config_factory->set('miniorange_ldap_steps', "2")->save();
            }
            $this->config_factory->set('miniorange_ldap_next_step_base_selection', '1')->save();
            $this->config_factory->set('miniorange_ldap_test_connection', 'Successful')->save();
            $this->config_factory->set('miniorange_ldap_server_account_password', $server_account_password)->save();
            self::miniorange_ldap_next_2($form,$form_state);
             Utilities::add_message(t('Test Connection is successful. Now, select your Search Base, Filter and click on the <b>Next</b> button to continue.'),'status');
        }
    }

    function miniorange_ldap_next_1($form, $form_state){
    $this->config_factory->set('miniorange_ldap_config_status', 'four')->save();
    $this->config_factory->set('miniorange_ldap_steps', "4")->save();
    $enable_ldap = $form['miniorange_ldap_enable_ldap']['#value'];
    $this->config_factory->set('miniorange_ldap_enable_ldap', $enable_ldap)->save();
    if(!empty($form['miniorange_ldap_authenticate_admin']['#value'])){
      $authn_admin = $form['miniorange_ldap_authenticate_admin']['#value'];
      $this->config_factory->set('miniorange_ldap_authenticate_admin', $authn_admin)->save();
    }
    if(!empty($form['miniorange_ldap_authenticate_drupal']['#value'])){
      $authn_drupal_users = $form['miniorange_ldap_authenticate_drupal']['#value'];
      $this->config_factory->set('miniorange_ldap_authenticate_drupal_users', $authn_drupal_users)->save();
    }
    $auto_reg_users = $form['miniorange_ldap_enable_auto_reg']['#value'];
    $this->config_factory->set('miniorange_ldap_enable_auto_reg', $auto_reg_users)->save();
    user_cookie_save(array("mo_ldap_test" => true));
    $ldap_connect = new LDAPFlow();
    $error = $ldap_connect->test_mo_ldap_config();

    if($error[1]=="error")
      Utilities::add_message(t($error[0]),'status');
    return;
  }

    function miniorange_ldap_next_2($form, $form_state){
      $server_address ="";
      $ldap_connect = new LDAPFlow();
      if(isset($_POST['miniorange_ldap_server_address']) && !empty($_POST['miniorange_ldap_server_address']))
        $server_address = Html::escape(trim($_POST['miniorange_ldap_server_address']));
      if(trim($server_address) == ''){
       Utilities::add_message(t('LDAP Server Address can not be empty'),'error');
        return;
      }
      if(isset($_POST['miniorange_ldap_protocol']) && !empty($_POST['miniorange_ldap_protocol']))
        $protocol = Html::escape(trim($_POST['miniorange_ldap_protocol']));
      $server_name = $protocol.$server_address;
      if(isset($_POST['miniorange_ldap_server_port_number']) && !empty($_POST['miniorange_ldap_server_port_number'])){
        $port_number = Html::escape(trim($_POST['miniorange_ldap_server_port_number']));
        $server_name = $server_name.':'.$port_number;
      }

      $this->config_factory->set('miniorange_ldap_server_address', $server_address)->save();
      $this->config_factory->set('miniorange_ldap_protocol', $protocol)->save();
      $this->config_factory->set('miniorange_ldap_server_port_number', $port_number)->save();
      $ldap_connect->setServerName($server_name);

      if(!empty($form['miniorange_ldap_server_account_username']['#value'])){
        $server_account_username = $form['miniorange_ldap_server_account_username']['#value'];
        $ldap_connect->getServiceAccountUsername($server_account_username);
      }
      if(!empty($form['miniorange_ldap_server_account_password']['#value'])){
        $server_account_password = $form['miniorange_ldap_server_account_password']['#value'];
        $ldap_connect->setServiceAccountPassword($server_account_password);
      }

      if($this->config->get('miniorange_ldap_steps') != '5'){
        $this->config_factory->set('miniorange_ldap_config_status', 'three')->save();
      }
    }

    function miniorange_ldap_next3($form, $form_state){
        $this->config_factory->set('miniorange_ldap_config_status', 'one')->save();

        if(!empty($form['miniorange_search_base_options']['search_base_attribute']['#value'])){
            $searchBase = $form['miniorange_search_base_options']['search_base_attribute']['#value'];
            $searchBaseCustomAttribute = null;
            if($searchBase == 'custom_base'){
                $this->config_factory->set('miniorange_ldap_username_attribute_option', 'custom')->save();
                $searchBaseCustomAttribute = $form['miniorange_ldap_custom_sb_attribute']['#value'];
            }
            $ldap_connect = new LDAPFlow();
            $ldap_connect->setSearchBase($searchBase,$searchBaseCustomAttribute);
            $this->config_factory->set('miniorange_ldap_steps', "3")->save();
        }

        if(!empty($form['ldap_auth']['settings']['username_attribute']['#value'])){
            $usernameAttribute = $form['ldap_auth']['settings']['username_attribute']['#value'];
            $usernameCustomAttribute=null;
            if($usernameAttribute == 'custom'){
                $this->config_factory->set('miniorange_ldap_username_attribute_option', 'custom')->save();
                $usernameCustomAttribute = $form['miniorange_ldap_custom_username_attribute']['#value'];
                if(trim($usernameCustomAttribute) == ''){
                    $usernameCustomAttribute = 'samaccountName';
                }
                $this->config_factory->set('miniorange_ldap_custom_username_attribute', $usernameCustomAttribute)->save();
                $ldap_connect->setSearchFilter($usernameCustomAttribute);
            }
            else{
            $this->config_factory->set('miniorange_ldap_username_attribute_option', $usernameAttribute)->save();
            $ldap_connect->setSearchFilter($usernameAttribute);
            }
        }

        if(!empty($form['miniorange_ldap_test_username']['#value'])){
            $testUsername = $form['miniorange_ldap_test_username']['#value'];
            $this->config_factory->set('miniorange_ldap_test_username', $testUsername)->save();
        }

        if(!empty($form['miniorange_ldap_test_password']['#value'])){
            $testPassword = $form['miniorange_ldap_test_password']['#value'];
            $this->config_factory->set('miniorange_ldap_test_password', $testPassword)->save();
        }
    }

    public function miniorange_ldap_next_4($form,$form_state){
    $this->config_factory->set('miniorange_ldap_config_status', 'review_config')->save();
    $this->config_factory->set('miniorange_ldap_steps', "5")->save();

    Utilities::add_message(t('Configuration updated successfully. <br><br>Now please open a private/incognito window and try to login to your Drupal site using your LDAP credentials. In case you face any issues or if you need any sort of assistance, please feel free to reach out to us at <u><a href="mailto:drupalsupport@xecurify.com"><i>drupalsupport@xecurify.com</i></a></u>'),'status');
  }

    public function miniorange_ldap_next_x(&$form,&$form_state){
    $this->config_factory->set('miniorange_ldap_config_status', 'three')->save();
    $this->config_factory->set('miniorange_ldap_steps', "2")->save();
  }

    /**
     * Contact LDAP server
     */
    function test_ldap_connection($form,$form_state){
        global $base_url;
        LDAPLOGGERS::addLogger('L101: Entered Contact LDAP Server ');

        if(!Utilities::isLDAPInstalled()){
            LDAPLOGGERS::addLogger('L102: PHP_LDAP Extension is not enabled');
            Utilities::add_message(t('You have not enabled the PHP LDAP extension'),'error');
            return;
        }

        $server_address ="";
        if(isset($_POST['miniorange_ldap_server_address']) && !empty($_POST['miniorange_ldap_server_address']))
            $server_address = Html::escape(trim($_POST['miniorange_ldap_server_address']));
        if(trim($server_address) == ''){
            Utilities::add_message(t('LDAP Server Address can not be empty.'),'error');
            return;
        }
        if(isset($_POST['miniorange_ldap_protocol']) && !empty($_POST['miniorange_ldap_protocol']))
            $protocol = Html::escape(trim($_POST['miniorange_ldap_protocol']));
        $server_name = $protocol.$server_address;
        if(isset($_POST['miniorange_ldap_server_port_number']) && !empty($_POST['miniorange_ldap_server_port_number'])){
            $port_number = Html::escape(trim($_POST['miniorange_ldap_server_port_number']));
            $server_name = $server_name.':'.$port_number;
        }

      $ldap_connect = new LDAPFlow();
      $ldap_connect->setServerName($server_name);
      $ldapconn = $ldap_connect->getConnection();
        $this->config_factory->set('miniorange_ldap_server', $server_name)->save();
        $this->config_factory->set('miniorange_ldap_server_address', $server_address)->save();
        $this->config_factory->set('miniorange_ldap_protocol', $protocol)->save();
        $this->config_factory->set('miniorange_ldap_server_port_number', $port_number)->save();
        if($ldapconn){
          if($this->config->get('miniorange_ldap_steps') != '5') {
            $this->config_factory->set('miniorange_ldap_steps', "1")->save();
          }
          $this->config_factory->set('miniorange_ldap_contacted_server', "Successful")->save();
          $this->config_factory->set('miniorange_ldap_test_conn_enabled', "1")->save();
          Utilities::add_message(t('Congratulations, you were able to successfully connect to your LDAP Server'),'status');
          return;
        }
        else{
          $this->config_factory->set('miniorange_ldap_contacted_server', "Failed")->save();
          $this->config_factory->set('miniorange_ldap_test_conn_enabled', "0")->save();
          Utilities::add_message(t('There seems to be an error trying to contact your LDAP server. Please check your configurations or contact the administrator for the same.'),'error');
          return;
        }
      }

    public function miniorange_ldap_review_changes($form, $form_state){
        $ldap_connect = new LDAPFlow();
        $enable_ldap = $form['miniorange_ldap_enable_ldap']['#value'];
        $this->config_factory->set('miniorange_ldap_enable_ldap', $enable_ldap)->save();
        if(!empty($form['miniorange_ldap_authenticate_admin']['#value'])){
            $authn_admin = $form['miniorange_ldap_authenticate_admin']['#value'];
            $this->config_factory->set('miniorange_ldap_authenticate_admin', $authn_admin)->save();
        }
        if(!empty($form['miniorange_ldap_authenticate_drupal']['#value'])){
            $authn_drupal_users = $form['miniorange_ldap_authenticate_drupal']['#value'];
            $this->config_factory->set('miniorange_ldap_authenticate_drupal', $authn_drupal_users)->save();
        }
        $auto_reg_users = $form['miniorange_ldap_enable_auto_reg']['#value'];
        $this->config_factory->set('miniorange_ldap_enable_auto_reg', $auto_reg_users)->save();
        if(!empty($form['miniorange_ldap_server']['#value'])){
            $mo_ldap_server = $form['miniorange_ldap_server']['#value'];
            $this->config_factory->set('miniorange_ldap_server', $mo_ldap_server)->save();
        }

        if(!empty($form['miniorange_ldap_server_account_username']['#value'])){
            $server_account_username = $form['miniorange_ldap_server_account_username']['#value'];
            $this->config_factory->set('miniorange_ldap_server_account_username', $server_account_username)->save();
        }
        if(!empty($form['miniorange_ldap_server_account_password']['#value'])){
            $server_account_password = $form['miniorange_ldap_server_account_password']['#value'];
            $this->config_factory->set('miniorange_ldap_server_account_password', $server_account_password)->save();
        }

        if(!empty($form['miniorange_search_base_options']['search_base_attribute']['#value'])){
            $searchBase = $form['miniorange_search_base_options']['search_base_attribute']['#value'];
            if($searchBase == 'custom_base'){
                $this->config_factory->set('miniorange_ldap_username_attribute_option', 'custom')->save();
                $searchBaseCustomAttribute = $form['miniorange_ldap_custom_sb_attribute']['#value'];
                $this->config_factory->set('miniorange_ldap_custom_sb_attribute', $searchBaseCustomAttribute)->save();
                $ldap_connect->setSearchBase($searchBase,$searchBaseCustomAttribute);
            }
            else{
              $this->config_factory->set('miniorange_ldap_search_base', $searchBase)->save();
              $ldap_connect->setSearchBase($searchBase);
            }
        }

        if(!empty($form['ldap_auth']['settings']['username_attribute']['#value'])){
            $usernameAttribute = $form['ldap_auth']['settings']['username_attribute']['#value'];
            if($usernameAttribute == 'custom'){
                $this->config_factory->set('miniorange_ldap_username_attribute_option', 'custom')->save();
                $usernameCustomAttribute = $form['miniorange_ldap_custom_username_attribute']['#value'];
                if(trim($usernameCustomAttribute) == ''){
                    $usernameCustomAttribute = 'samaccountName';
                }
                $this->config_factory->set('miniorange_ldap_custom_username_attribute', $usernameCustomAttribute)->save();
                $this->config_factory->set('miniorange_ldap_username_attribute', $usernameCustomAttribute)->save();
                $ldap_connect->setSearchFilter($usernameCustomAttribute);
            }
            else{
            $this->config_factory->set('miniorange_ldap_username_attribute_option', $usernameAttribute)->save();
            $this->config_factory->set('miniorange_ldap_username_attribute', $usernameAttribute)->save();
            $ldap_connect->setSearchFilter($usernameAttribute);
            }
        }
        if(!empty($form['miniorange_ldap_test_username']['#value'])){
            $testUsername = $form['miniorange_ldap_test_username']['#value'];
            $this->config_factory->set('miniorange_ldap_test_username', $testUsername)->save();
        }
        if(!empty($form['miniorange_ldap_test_password']['#value'])){
            $testPassword = $form['miniorange_ldap_test_password']['#value'];
            $this->config_factory->set('miniorange_ldap_test_password', $testPassword)->save();
        }
        $this->config_factory->set('miniorange_ldap_steps', "5")->save();
        Utilities::add_message(t('Configuration updated successfully.'),'status');
    }

    public function submitForm(array &$form, FormStateInterface $form_state){

    }

    public function setup_call(array &$form, FormStateInterface $form_state){
    Utilities::setup_call($form,$form_state);
  }

}
