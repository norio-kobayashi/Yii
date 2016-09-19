<?php
try
{
	include "mollie-initialize.php";
	$methods = $mollie->methods->all();
	foreach ($methods as $method)
	{
		echo '<div style="line-height:40px; vertical-align:top">';

		echo '<img src="' . htmlspecialchars($method->image->normal) . '"> ';
		echo htmlspecialchars($method->description) . ' (' .  htmlspecialchars($method->id) . ')';

		echo '</div>';
	}
}
catch (Mollie_API_Exception $e)
{
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}
