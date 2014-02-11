<?php

class nableCostColumn extends nableColumnDecorator
{
	public function prepareValue($value_name, $value, $init = false)
    {
    	switch($value_name)
    	{
    		case 'value':
    			return $init ? floatval($value) : str_replace(',', '.', floatval(str_replace(',', '.', $value)));
    			break;
    		case 'currency':
    			return (int) $value;
    			break;
    		default:
    			throw new Exception(sprintf('Class %s does\'t have "%s" value.', __CLASS__, $value_name));
    			break;
    	}
    }
	public function getCurrencyList()
	{
		static $currencies;
		if(!isset($currencies)){
			$currencies = array();
			$db = ASTRegistry::getInstance()->get('DataBase');
			$db->Query("SELECT ".__TABLES_PREFIX."currencies_id AS id, shortname, symbol, base "
					 . "FROM ".__TABLES_PREFIX."currencies ORDER BY sorting");
			while(false !== $row = $db->GetNextRow())
			{
				$currencies[$row['id']] = $row;
			}
		}
		return $currencies;
	}
	public function __toString()
	{
		$currency_id = $this->column->getCurrency();
		$currencies = $this->getCurrencyList();
		return $column->getValue().' '.$currencies[$currency_id]['symbol'];
	}
}