<?php

abstract class nableColumn
{
	protected 	$id				= 0,
				$shortname		= '',
				$type			= '',
                $container      = 'div',
				$data_type		= '',
				$name			= '',
				$searchable		= false,
				$required		= false,
				$protected		= false,
				$in_list		= false,
				$multi_lang		= false,
				$structure_id	= 0,
                $lang           = '';

	
	protected 	$_is_empty		= true,
				$_is_error		= false,
				$_table_name	= '',
                $_entity_name   = '',
                $_modelName     = '', // название модели ActiveRecord
                // массив произвольного формата уникальных свойст поля в
                // зависимости от его типа данных.
				$_data			= array(),
                // массив произвольного формата для сохранения информации по отображению поля
                $_tpl           = array(),
                // объект класса ActiveRecord для работы с данными.
                $_ar;
	
	protected function __construct($params, $lang)
    {
    	// переменный поля
		$this->id			= (int) $params['id'];
		$this->shortname	= $params['shortname'];
		$this->type			= $params['type'];
        $this->container    = !empty($params['container']) ? $params['container'] : 'div';
		$this->data_type	= $params['datatype'];
		$this->name			= $params['name'];
		$this->searchable	= (bool) $params['searchable'];
		$this->required		= (bool) $params['required'];
        $this->protected    = (bool) $params['protected'];
		//$this->in_list		= (bool) $params['in_list'];
		$this->multi_lang	= (bool) $params['multilang'];
		
		//$this->structure_id = (int) $params['structure_id'];
		
		$this->lang = $lang;
    }

    public function get_entity_name()
    {
        return $this->_entity_name;
    }

	public function setError()
	{
		$this->_is_error = true;
	}
	public function setIsEmpty()
	{
		$this->_is_empty = true;
	}
	/*private function prepareLang($lang_id = null)
	{
		if (!$this->multi_lang)
	    {
	    	$lang_id = 0;
	    }
	    return is_null($lang_id) ? Yii::app()->request->getPreferredLanguage() : $lang_id;
	}*/
	public function __call($fn_name, $fn_args)
	{
		// оперируем со значениями в нижнем регистре
		$fn_type = strtolower(substr($fn_name, 0, 3));
		$fn_prop = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', substr($fn_name, ('_' != $fn_name{3} ? 3 : 4))));
		
		// внутренние свойства только для чтения
		if('get' === $fn_type && in_array($fn_prop, array_keys(get_class_vars(get_class($this)))))
		{
			return $this->{$fn_prop};
		}
		// свойства конкретного поля 
        if(0 === strpos($fn_prop, 'tpl'))
            return $this->_tpl($fn_args, $fn_type, $fn_prop);
        else
        {
		    //$lang_id = $this->prepareLang(array_pop($fn_args));
            $lang_id = $this->lang;
            return $this->_data($fn_args, $fn_type, $fn_prop, $lang_id);
        }
	}

    // отвечает за работу с индивидуальными свойствами поля, не связанными с отображением.
    protected function _data($fn_args, $fn_type, $fn_prop, $lang_id)
    {
        switch ($fn_type)
		{
			case 'get':
				return isset($this->_data[$lang_id][$fn_prop]) ?  $this->_data[$lang_id][$fn_prop]['value'] : '';
				break;
			case 'set':
                //echo CHtml::encode("fn_args: ".print_r($fn_args,1)."<br/>\r\n<br/>\r\n");
				$concrete_column = array_shift($fn_args);
                //echo '<pre>',print_r($fn_args),'</pre>';
				if(is_object($concrete_column))
				{
                    //echo 'this'; die();
					$value = $concrete_column->prepareValue($fn_prop, array_shift($fn_args));
					if(!empty($value))
					{
						$this->_is_empty = false;
					}
					if(isset($this->_data[$lang_id][$fn_prop]) && $value == $this->_data[$lang_id][$fn_prop])
					{
						break;
					}
					$this->_data[$lang_id][$fn_prop] = array(
						'value'		=> $value,
						'changed'	=> true,
					);
				}
				break;
			default:
				throw new Exception(sprintf("Class %s does not have '%s' method.", get_class($this), $fn_name));
				break;
		}
        return true;
    }

    // управляет свойствами поля, отвечающими за его отображение.
    protected function _tpl($fn_args, $fn_type, $fn_prop)
    {
        switch ($fn_type)
		{
			case 'get':
				return isset($this->_tpl[$fn_prop]) ?  $this->_tpl[$fn_prop] : '';
				break;
			case 'set':
				$concrete_column = array_shift($fn_args);
				$this->_tpl[$fn_prop] = array_shift($fn_args);
				break;
			default:
				throw new Exception(sprintf("Class %s does not have '%s' method.", get_class($this), $fn_name));
				break;
		}
        return true;
    }

	protected function _getCols($data, $is_update = false)
    {
        // формирует преобразование ключа в колонку БД в зависимости от типа данных.
        // $data_image = nableColumnDataImage::getImage($this->data_type);
        $columns = array();
        foreach($data as $k => $v)
        {
            $columns[] = (isset($data_image[$k]) ? $data_image[$k] : $k).($is_update ? ' = "'.$v.'"' : '');
        }
        return $columns;
    }
	public function save($id = 0)
    {
    	if($this->_is_error)
    	{
    		return false;
    	}
    	// хак с id необходим для передачи вновь полученного id итема/страницы при певоначальном сохранении,
        // в противном случае Id итема/страницы придется передавать в класс колумна по ссылке
       	if(settype($id, 'int') && $id)
       	{
       		$this->id = $id;
       	}
        
    	$error = false;
        //$db = ASTRegistry::getInstance()->get('DataBase');
        
        foreach ($this->_data as $lang_id => $lang_data)
        {
        	$changed = array();
        	foreach ($lang_data as $column => $v)
        	{
        		if(!$v['changed']) continue;
        		//$changed[$column] = $db->Escape($v['value']);
                $changed[$column] = $v['value'];
        	}
        	if(empty($changed)) continue;
        	if(!$this->_isExists($lang_id))
        	{
                $this->_insert($changed, $lang_id) OR $error = true;
        	}
            else
            {
                $this->_update($changed, $lang_id) OR $error = true;
            }	
        }
        return !$error;
    }
    abstract public function init(nableColumnDecorator $concrete_column);
    abstract protected function _isExists($lang_id);
    abstract protected function _insert($changed, $lang_id);
    abstract protected function _update($changed, $lang_id);
}
