<?php
try
{
	include "mollie-initialize.php";

	$payment  = $mollie->payments->get($_POST["id"]);
	$order_id = $payment->metadata->order_id;

	database_write($order_id, $payment->status);

	if ($payment->isPaid() == TRUE)
	{
		/*
		 * At this point you'd probably want to start the process of delivering the product to the customer.
		 */
	}
	elseif ($payment->isOpen() == FALSE)
	{
		/*
		 * The payment isn't paid and isn't open anymore. We can assume it was aborted.
		 */
	}
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
