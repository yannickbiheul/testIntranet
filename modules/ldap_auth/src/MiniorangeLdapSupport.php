<?php

namespace Drupal\ldap_auth;

use Drupal\ldap_auth\Controller\miniorange_ldapController;
use Drupal\ldap_auth\MiniorangeLdapConstants;
use Drupal\ldap_auth\Utilities;

/**
 * @file
 * This class represents support information for customer.
 */
/**
 * @file
 * Contains miniOrange Support class.
 */
class MiniorangeLdapSupport {
  public $email;
  public $phone;
  public $query;
  public $plan;
  public $mo_timezone;
  public $mo_date;
  public $mo_time;

  public function __construct($email, $phone, $query, $plan = '', $mo_timezone='', $mo_date='', $mo_time='') {
    $this->email = $email;
    $this->phone = $phone;
    $this->query = $query;
    $this->plan = $plan;
    $this->mo_timezone = $mo_timezone;
    $this->mo_date = $mo_date;
    $this->mo_time = $mo_time;
  }

  public function sendSupportQuery()
  {
    $modules_info = \Drupal::service('extension.list.module')->getExtensionInfo('ldap_auth');
    $modules_version = $modules_info['version'];

    if ($this->plan == 'demo' || $this->plan == 'trial' || $this->plan == 'schedule_call' || $this->plan == 'request_quote') {
      $url = MiniorangeLdapConstants::BASE_URL . '/moas/api/notify/send';
      $ch = curl_init($url);

      $request_for = $this->plan == 'demo' ? 'Demo' :(($this->plan == 'trial') ? 'Trial' : (($this->plan == 'schedule_call') ? 'Setup Meeting/Call': 'Quote'));

      $subject = $request_for.' request for Drupal-' . \DRUPAL::VERSION . ' LDAP Login Module | ' .$modules_version;
      $this->query = $request_for.' required for - ' . $this->query;

      $customerKey = \Drupal::config('ldap_auth.settings')->get('miniorange_ldap_customer_id');
      $apikey = \Drupal::config('ldap_auth.settings')->get('miniorange_ldap_customer_api_key');
      if ($customerKey == '') {
        $customerKey = "16555";
        $apikey = "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
      }

      $controller = new miniorange_ldapController();
      $currentTimeInMillis = $controller->get_ldap_timestamp();
      $stringToHash = $customerKey . $currentTimeInMillis . $apikey;
      $hashValue = hash("sha512", $stringToHash);
      $customerKeyHeader = "Customer-Key: " . $customerKey;
      $timestampHeader = "Timestamp: " . $currentTimeInMillis;
      $authorizationHeader = "Authorization: " . $hashValue;

      if($this->plan == 'schedule_call'){
        $content = '<div >Hello, <br><br>Company :<a href="' . $_SERVER['SERVER_NAME'] . '" target="_blank" >' . $_SERVER['SERVER_NAME'] . '</a><br><br>Phone Number:' . $this->phone . '<br><br>Email:<a href="mailto:' . $this->email . '" target="_blank">' . $this->email . '</a><br><br> Timezone: <b>'. $this->mo_timezone .'</b><br><br> Date: <b>'. $this->mo_date .'</b>&nbsp;&nbsp; Time: <b>'. $this->mo_time .'</b><br><br>Query:[DRUPAL ' . Utilities::mo_get_drupal_core_version() . ' LDAP Login Free | ' . $modules_version . ' ] ' . $this->query . '</div>';
      }
      elseif($this->plan == 'request_quote'){
        $content = '<div >Hello, <br><br>Company :<a href="' . $_SERVER['SERVER_NAME'] . '" target="_blank" >' . $_SERVER['SERVER_NAME'] .'<br>Email: <a href="mailto:' . $this->email . '" target="_blank">' . $this->email . '</a><br>'.'</b><br>Query:[DRUPAL ' . Utilities::mo_get_drupal_core_version() . ' LDAP Login Free | ' . $modules_version . ' ] ' . $this->query . '</div>';
      }
      else {
        $content = '<div >Hello, <br><br>Company :<a href="' . $_SERVER['SERVER_NAME'] . '" target="_blank" >' . $_SERVER['SERVER_NAME'] . '</a><br><br>Phone Number:' . $this->phone . '<br><br>Email:<a href="mailto:' . $this->email . '" target="_blank">' . $this->email . '</a><br><br>Query:[DRUPAL ' . Utilities::mo_get_drupal_core_version() . ' LDAP Login Free | ' . $modules_version . ' ] ' . $this->query . '</div>';
      }


      $fields = array(
        'customerKey' => $customerKey,
        'sendEmail' => true,
        'email' => array(
          'customerKey' => $customerKey,
          'fromEmail' => $this->email,
          'fromName' => 'miniOrange',
          'toEmail' => 'drupalsupport@xecurify.com',
          'toName'  => 'drupalsupport@xecurify.com',
          'subject' => $subject,
          'content' => $content
        ),
      );
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $customerKeyHeader,
        $timestampHeader, $authorizationHeader));
    }
    else {

      $this->query = '[Drupal ' . \DRUPAL::VERSION . ' LDAP Login Free Module | '.$modules_version.'] ' . $this->query;
      $fields = array(
        'company' => $_SERVER['SERVER_NAME'],
        'email' => $this->email,
        'phone' => $this->phone,
        'ccEmail' =>'drupalsupport@xecurify.com',
        'query' => $this->query,
      );

      $url = MiniorangeLdapConstants::BASE_URL . '/moas/rest/customer/contact-us';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'charset: UTF-8',
        'Authorization: Basic'
      ));
    }

    $field_string = json_encode($fields);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_ENCODING, "");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);
    $content = curl_exec($ch);


    if (curl_errno($ch)) {
      $error = array(
        '%method' => 'sendSupportQuery',
        '%file' => 'miniorange_ldap_support.php',
        '%error' => curl_error($ch),
      );
      \Drupal::logger('ldap_auth')->notice($error);
      return FALSE;
    }
    curl_close($ch);
    return TRUE;
  }
}
