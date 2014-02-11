<?php

class nableDateColumn extends nableColumnDecorator
{
	public function prepareValue($value_name, $value, $init = false)
    {
    	if($init) { return $value; }
	    empty($value['Year']) AND $value['Year'] = date('Y');
	    empty($value['Month']) AND $value['Month'] = date('m');
	    empty($value['Day']) AND $value['Day'] = date('d');
	    $value = sprintf('%04d-%02d-%02d', $value['Year'], $value['Month'], $value['Day']);
	    return $value;
    }
}
