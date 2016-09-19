<?php
require_once dirname(__FILE__) . "/../../vendor/mollie/src/Mollie/API/Autoloader.php";

$data=Yii::app()->functions->getOrder($_GET['id']);	
$merchant_id=isset($data['merchant_id'])?$data['merchant_id']:'';
$api_key=Yii::app()->functions->getOption('mollie_api_key',$merchant_id);
$mollie = new Mollie_API_Client;
$mollie->setApiKey($api_key);