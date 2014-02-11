<?php

class nableColumn_P extends nableColumn
{
	public function __construct($params, $lang, $entityName)
	{
        parent::__construct($params, $lang);

        //echo $entityName; die();
        $this->_entity_name = $entityName;
        $this->_table_name = '{{e_' . $entityName . '}}';
        $this->multi_lang AND $this->_table_name = '{{e_' . $entityName . '_i18n}}';
        $this->_modelName = 'E' . ucfirst($this->_entity_name) . ($this->multi_lang ? 'I18n' : '');
    }
	public function init(nableColumnDecorator $concrete_column)
    {
        //echo $this->_lang_id; die();
        $item = $this->_modelName;
        if($this->multi_lang)
            $this->_ar = $item::model()->findByPk(array(
                'id'   => $this->id, 
                'lang' => $this->lang
            ));
        else
            $this->_ar = $item::model()->findByPk($this->id);
        unset($item);

        //echo '<strong>' . $this->shortname . '</strong>';
        //echo '<pre>', print_r($this->_ar), '</pre>';
        $data_image = nableColumnDataImage::getImage($this->data_type);
    	$data_image['value'] = $this->shortname;
        foreach ($data_image as $prop_name => $value_name)
    	{
    		$this->_data[$this->lang][$prop_name] = array(
    			'value' 	=> $concrete_column->prepareValue($prop_name, $this->_ar->$value_name, true),
    			'changed'	=> false,
    		);
    	}
        //echo '<pre>', print_r($this->_data), '</pre>';

        /*
    	$data_image = nableColumnDataImage::getImage($this->data_type);
    	$data_image['value'] = $this->shortname;
    	
    	$db = Yii::app()->db;
    	$command = $db->createCommand('
    		SELECT 
    			'.join(', ', $data_image).',
    			'.($this->multi_lang ? 'lang' : '0').' AS lang
    		FROM '.$this->_table_name.'
    		WHERE id = :id');
        $command->bindParam(':id', $this->id, PDO::PARAM_INT);
        $dh = $command->query();
    	while(false !== $row = $dh->read())
    	{
    		foreach ($data_image as $prop_name => $value_name)
    		{
    			$this->_data[$row['lang']][$prop_name] = array(
    				'value' 	=> $concrete_column->prepareValue($prop_name, $row[$value_name], true),
    				'changed'	=> false,
    			);
    		}
    	}
        */
        //echo '<pre>',print_r($this->_data),'</pre>';
    }
	protected function _isExists($lang_id)
    {
        $db = Yii::app()->db;
    	$query = 'SELECT 1 AS id FROM '. $this->_table_name . ' WHERE id = :id';
        $command = $db->createCommand($query);
        $command->bindParam(':id', $this->id, PDO::PARAM_INT);
        $result = $command->queryRow();
        return !empty($result['id']);
    }
	protected function _insert($data, $lang_id)
    {
   		if(isset($data['value']))
    	{
    		$data[$this->shortname] = $data['value'];
    		unset($data['value']);
    	}
        $lang_id AND $data['lang'] = $lang_id;
        
        $query = '
	        INSERT INTO '.$this->_table_name . '
	        (id , '.join(', ', $this->_getCols($data)).')
	        VALUES
	        (:id, "'.join('", "', $data).'")';
       
       $db = Yii::app()->db;
       $command = $db->createCommand($query);
       $command->bindParam(':id', $this->id, PDO::PARAM_INT);
       return (int) $command->execute();
    }

    protected function _update($data, $lang_id)
    {
    	if(isset($data['value']))
    	{
    		$data[$this->shortname] = $data['value'];
    		unset($data['value']);
    	}
/*
nable_e_page_i18n
EPageI18n
*/
        //echo '<pre>', print_r($this->_ar), '</pre>';
        foreach($data as $k => $v)
        {
            $this->_ar->$k = $v;
        }
        //echo '<pre>', print_r($this->_ar), '</pre>';
        //die();

        return $this->_ar->save();

        /*
        $query_add = $lang_id ? ' AND lang = :lang_id' : '';
        
        $query = '
        	UPDATE '.$this->_table_name.'
        	SET '.join(', ', $this->_getCols($data, true)) . '
        	WHERE id = :id' . $query_add;

        $db = Yii::app()->db;
        $command = $db->createCommand($query);
        $command->bindParam(':id', $this->id, PDO::PARAM_INT);
        $command->bindParam(':lang_id', $lang_id, PDO::PARAM_STR);
        return (int) $command->execute();
        */
    }
}
