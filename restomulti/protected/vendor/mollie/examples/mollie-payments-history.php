<?php
try
{
	include "mollie-initialize.php";

	$offset = 0;
	$limit  = 25;

	$payments = $mollie->payments->all($offset,  $limit);

	foreach ($payments as $payment)
	{
		echo "&euro; " . htmlspecialchars($payment->amount) . ", status: " . htmlspecialchars($payment->status) . "<br>";
	}
}
catch (Mollie_API_Exception $e)
{
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}
