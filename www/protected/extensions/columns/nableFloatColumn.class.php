<?php

class nableFloatColumn extends nableColumnDecorator
{
	public function prepareValue($value_name, $value, $init = false)
    {
    	return str_replace(',', '.', floatval(str_replace(',', '.', $value)));
    }
}