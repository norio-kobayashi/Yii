<?php
$status = database_read($_GET["order_id"]);

$protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
$hostname = $_SERVER['HTTP_HOST'];
$path = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);
?>
<!--<div class="page-right-sidebar payment-option-page">
    <div class="main">  
        <h2><?php echo "<p>Your payment status is '" . htmlspecialchars($status) . "'.</p>"; ?> </h2>
<?php // echo '<p><a href="' . $protocol . '://' . $hostname . $path . '/store/mollieInit">Something went wrong. Please try again.</a><br></p>'; ?>
    </div>
</div>-->
<!--Page Content-->
<div id="page-content">
    <section class="container">
        <div class="row">
            <header>
                <h1 class="page-title"><?php echo "<p>Your payment status is '" . htmlspecialchars($status) . "'.</p>"; ?> </h1>
                <?php // echo '<p><a href="' . $protocol . '://' . $hostname . $path . '/store/mollieInit">Something went wrong. Please try again.</a><br></p>'; ?>
            </header>					
        </div>
    </section>
</div>
<!-- end Page Content-->
<?php

function database_read($order_id) {
//
//    $params = array(
//        'merchant_id' => $merchant_id,
//        'broadcast_id' => "999999999",
//        'client_id' => $order_info['client_id'],
//        'client_name' => $order_info['full_name'],
//        'contact_phone' => $sms_notify_number,
//        'sms_message' => $sms_alert_message,
//        'status' => $resp['msg'],
//        'gateway_response' => $resp['raw'],
//        'date_created' => date('c'),
//        'date_executed' => date('c'),
//        'ip_address' => $_SERVER['REMOTE_ADDR'],
//        'gateway' => $sms_provider
//    );
//    $db_ext->insertData("{{sms_broadcast_details}}", $params);

    $path = Yii::getPathOfAlias('webroot') . "/orders/";
    $order_id = intval($order_id);
    $database = $path . "/order-{$order_id}.txt";

    $status = @file_get_contents($database);

    return $status ? $status : "unknown order";
}
