<?php

class nableColumn_NP extends nableColumn
{
	protected $c_id;
	
	public function __construct($params, $langs, $is_page = true)
	{
        parent::__construct($params, $langs, $is_page);
        
        $this->_table_name = __TABLES_PREFIX.$this->data_type.'_vars';
    }
	public function getCid() { return $this->c_id; }
	
    public function init(nableColumnDecorator $concrete_column)
    {
    	$data_image = nableColumnDataImage::getImage($this->data_type);
    	
    	$db = ASTRegistry::getInstance()->get('DataBase');
    	$db->Query('
    		SELECT 
    			'.$this->_table_name.'_id AS c_id,
    			'.join(', ', $data_image).',
    			'.($this->multi_lang ? __TABLES_PREFIX.'langs_id' : '0').' AS lang
    		FROM '.$this->_table_name.'
    		WHERE '.$this->_field_name.' = %{0} AND shortname = "%{1}"', array($this->id, $this->shortname));
    	while(false !== $row = $db->getNextRow())
    	{
    		$this->c_id = (int) $row['c_id'];
    		foreach ($data_image as $prop_name => $value_name)
    		{
    			$this->_data[(int) $row['lang']][$prop_name] = array(
    				'value' 	=> $concrete_column->prepareValue($prop_name, $row[$value_name], true),
    				'changed'	=> false,
    			);
    		}
    	}
    }
	protected function _isExists($lang_id, $db)
    {
    	$query = '
    		SELECT 1 AS id 
    		FROM '.$this->_table_name.' 
    		WHERE '.$this->_field_name.' = %{0}'.($lang_id ? ' AND '. __TABLES_PREFIX.'langs_id = %{1}' : '').' AND shortname = "%{2}"';
        $result = $db->getResult($query, array($this->id, $lang_id, $this->shortname));
        return !empty($result['id']);
    }
	protected function _insert($data, $lang_id, $db)
    {
        $lang_id AND $data[__TABLES_PREFIX.'langs_id'] = $lang_id;
        
        return $db->Query('
	        INSERT INTO '.$this->_table_name.'
	        ('.$this->_field_name.', shortname, '.join(', ', $this->_getCols($data)).')
	        VALUES
	        (%{0}, "%{1}", "'.join('", "', $data).'")', array($this->id, $this->shortname));
    }

    protected function _update($data, $lang_id, $db)
    {
        $query_add = $lang_id ? ' AND '. __TABLES_PREFIX.'langs_id = %{2}' : '';
        $query_params = array($this->id, $this->shortname, $lang_id);
        if($this->_is_empty)
        {	// пустых значений не держим
        	$query = 'DELETE FROM '.$this->_table_name.' WHERE '.$this->_field_name.' = %{0} AND shortname = "%{1}"'.$query_add;
    		return $db->Query($query, $query_params);
        }
        return $db->Query('
        	UPDATE '.$this->_table_name.'
        	SET '.join(', ', $this->_getCols($data, true)).'
        	WHERE '.$this->_field_name.' = %{0} AND shortname = "%{1}"'.$query_add, $query_params);
    }
}
