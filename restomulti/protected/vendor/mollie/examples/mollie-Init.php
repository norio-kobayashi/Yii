<?php
try
{
	include "mollie-initialize.php";

	$order_id = time();

	$protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
	$hostname = $_SERVER['HTTP_HOST'];
	$path     = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);

	$payment = $mollie->payments->create(array(
		"amount"       => 10.00,
		"description"  => "My first API payment",
		"redirectUrl"  => "{$protocol}://{$hostname}{$path}/mollie-return-page.php?order_id={$order_id}",
		"webhookUrl"   => "{$protocol}://{$hostname}{$path}/mollie-webhook-verification.php",
		"metadata"     => array(
			"order_id" => $order_id,
		),
	));
	database_write($order_id, $payment->status);
	header("Location: " . $payment->getPaymentUrl());
}
catch (Mollie_API_Exception $e)
{
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}
function database_write ($order_id, $status)
{
	$order_id = intval($order_id);
	$database = dirname(__FILE__) . "/orders/order-{$order_id}.txt";

	file_put_contents($database, $status);
}
