<?php
try
{
	include "mollie-initialize.php";

	$payment_id = "tr_q2cLW9pxMT";
	$payment = $mollie->payments->get($payment_id);

	if ($payment->canBeRefunded())
	{
		$refund = $mollie->payments->refund($payment, 15.00);

		echo "€ 15,00 of payment {$payment_id} refunded.", PHP_EOL;
	}
	else
	{
		echo "Payment {$payment_id} can not be refunded.", PHP_EOL;
	}

	var_dump($mollie->payments_refunds->with($payment)->all());
}
catch (Mollie_API_Exception $e)
{
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}
