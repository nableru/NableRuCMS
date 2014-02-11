<?php

class nableIntColumn extends nableColumnDecorator
{
	public function prepareValue($value_name, $value, $init = false)
	{
		return intval($value);
	}
}