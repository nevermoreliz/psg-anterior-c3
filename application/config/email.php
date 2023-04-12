<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//SSL
/*$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'mail.upea.bo',
    'smtp_port' => 465,
    'smtp_user' => 'posgrado@upea.bo',
    'smtp_pass' => 'Posgrado#1',
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'text', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);*/
$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'mail.upea.bo',
    'smtp_port' => 465,
    'smtp_user' => 'posgrado@upea.bo',
    'smtp_pass' => 'Posgrado#1',
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
//    'charset' => 'UTF-8',
//    'wordwrap' => TRUE
);
