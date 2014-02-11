<?php

class nableStringColumn extends nableColumnDecorator
{
	public function prepareValue($value_name, $value, $init = false)
	{
		$value = trim($value);
		'' !== $value AND settype($value, 'string');
        return $value;
	}
}