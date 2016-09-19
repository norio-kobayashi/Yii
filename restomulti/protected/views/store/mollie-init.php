<?php
try {
    include "mollie-initialize.php";
    
    
    if ($merchant = Yii::app()->functions->getMerchantByToken($_GET['token'])):
        $data = array(
            'total_w_tax' => $merchant['package_price'],
            'merchant_name' => $merchant['restaurant_name'],
        );
    endif;

    $amount_to_pay = 0;
    $amount_to_pay = isset($data['total_w_tax']) ? Yii::app()->functions->standardPrettyFormat($data['total_w_tax']) : '';
    $amount_to_pay = Yii::app()->functions->normalPrettyPrice2($amount_to_pay);

    $payment_description.=isset($data['merchant_name']) ? $data['merchant_name'] : '';


    $order_time = time();

    $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);
    $root_folder = explode('/', $path)[1];
    if ($_GET['Do'] == 'step3b') {
        $returnUrl = "{$protocol}://{$hostname}/{$root_folder}/store/merchantSignup/Do/step4/token/{$_GET['token']}";
    } else {
        $returnUrl = "{$protocol}://{$hostname}/{$root_folder}/store/receipt/{$_GET['id']}";
    }
    $payment = $mollie->payments->create(array(
        "amount" => $amount_to_pay,
        "description" => $payment_description,
        "redirectUrl" => $returnUrl,
        "webhookUrl" => "{$protocol}://{$hostname}/{$root_folder}/store/mollieVerify",
        "metadata" => array(
            "order_id" => $_GET['id'],
        ),
    ));
    database_write($order_time, $payment->status);
    print_r($payment->getPaymentUrl());
    header("Location: " . $payment->getPaymentUrl());
} catch (Mollie_API_Exception $e) {
    ?>	
    <div class="page-right-sidebar payment-option-page">
        <div class="main">	
            <h2><?php echo "API call failed: " . htmlspecialchars($e->getMessage()); ?></h2>
            <?php $back_url = Yii::app()->request->baseUrl . "/store/paymentOption"; ?>
            <div style="height:10px;"></div>
            <a href="<?php echo $back_url; ?>"><?php echo Yii::t("default", "Go back") ?></a>
        </div>
    </div>
    <?php
}

function database_write($order_time, $status) {
    $order_time = intval($order_id);
    $path = Yii::getPathOfAlias('webroot') . "/orders/";
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    $database = $path . "/order-{$order_time}.txt";

    $myfile = fopen($database, "w") or die("Unable to open file!");
    $txt = $order_id;
    fwrite($myfile, $txt);
    fclose($myfile);

    file_put_contents($database, $status);
}
