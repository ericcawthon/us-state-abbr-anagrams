<?php
class util
{
	static function debug($data, $displaytype = 'print_r')
	{
		echo '<pre>';
		if ($displaytype == 'print_r')
		{
			print_r($data);
		}
		else
		{
			var_dump($data);
		}
		echo '</pre>';
	}

}
?>
