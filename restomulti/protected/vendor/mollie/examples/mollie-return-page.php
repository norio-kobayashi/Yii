<?php

$status = database_read($_GET["order_id"]);

$protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
$hostname = $_SERVER['HTTP_HOST'];
$path     = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);

echo "<p>Your payment status is '" . htmlspecialchars($status) . "'.</p>";
echo "<p>";
echo '<a href="' . $protocol . '://' . $hostname . $path . '/mollie-Init.php">Retry example 1</a><br>';
echo '<a href="' . $protocol . '://' . $hostname . $path . '/mollie-ideal-payment.php">Retry example 4</a><br>';
echo "</p>";

function database_read ($order_id)
{
	$order_id = intval($order_id);
	$database = dirname(__FILE__) . "/orders/order-{$order_id}.txt";

	$status  = @file_get_contents($database);

	return $status ? $status : "unknown order";
}
