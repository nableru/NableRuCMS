<?php

class nableSingleColumn extends nableColumnDecorator
{
	private $list_values;
	
	public function prepareValue($value_name, $value, $init = false)
	{
		return intval($value);
	}
	public function getItems($lang)
    {
    	$_result = array();
        $field = __TABLES_PREFIX . ($this->column->getIsPage() ? 'page' : 'item'). "s_structure";
        $properStructureId = self::getProperStructureId($this->column->getShortname(), $this->column->getStructureId(), $this->column->getIsPage());
        
        $db = ASTRegistry::getInstance()->get('DataBase');  
    	$db->Query("
        SELECT
            " . __TABLES_PREFIX . "lists_values_id AS id,
            value AS name
        FROM
            " . __TABLES_PREFIX . "lists_values
        WHERE
            " . $field . "_id = %{1}
        AND
        	hidden <> 1
        AND
            " . __TABLES_PREFIX . "langs_id = %{0} ORDER BY sorting ASC",
        array($lang, $properStructureId));
		while(false !== $row = $db->GetNextRow())
		{
			$_result[$row['id']] = $row['name'];
		}
		return $_result;
    }
    public function setValue($value)
    {
    	foreach ($this->column->getLangs() as $langId => $editable) {
    		$this->column->setValue($this, $value, $langId);
    	}
    }
    public function getLangs()
    {
    	return array(ASTRegistry::getInstance()->get('Kernel')->getLangId() => 'to');
    }
    public static function getProperStructureId($shortname, $structureId, $isPage = true)
    {
    	$tableName = __TABLES_PREFIX . ($isPage ? 'page' : 'item') . "s_structure";
    	
    	$dataBase = ASTRegistry::getInstance()->get('DataBase');
    	// первым делом смотрим есть ли запись в таблице lists_values - если есть, то наш случай
    	$query = 'SELECT 1 AS id FROM ' . __TABLES_PREFIX . 'lists_values WHERE '. $tableName .'_id = %{0}';
        $result = $dataBase->getResult($query, array($structureId));
        
        if (!empty($result['id'])) {
        	// нашли совпадение - возвращаем то что получили
        	return $structureId;
        } else {
        	// похоже, что нам нужно обратиться к родителям
        	$query = 'SELECT ' . __TABLES_PREFIX . 'pages_id AS list_owner
        			  FROM ' . __TABLES_PREFIX . 'pages
        			  WHERE ' . __TABLES_PREFIX . 'pages_id IN ((SELECT ' . __TABLES_PREFIX . 'pages_id
        			  											 FROM ' . $tableName . '
        			  											 WHERE shortname = "%{0}"))
        			  ORDER BY cleft ASC
        			  LIMIT 1';
        	$result = $dataBase->getResult($query, array($shortname));
        	$listOwner = $result['list_owner'];
        	unset($query, $result);
        	
        	$query = 'SELECT ' . $tableName . '_id AS structure_id
        			  FROM ' . $tableName . '
        			  WHERE ' . __TABLES_PREFIX . 'pages_id = %{0} AND shortname = "%{1}"';
        	$result = $dataBase->getResult($query, array($listOwner, $shortname));
        	return $result['structure_id'];
        }
    }
}