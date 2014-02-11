<?php

class nableBoolColumn extends nableColumnDecorator
{
	public function prepareValue($value_name, $value, $init = false)
    {
    	$value = trim($value);
		return empty($value) ? 0 : 1;
    }
}