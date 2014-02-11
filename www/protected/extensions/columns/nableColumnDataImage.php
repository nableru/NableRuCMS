<?php

class nableColumnDataImage
{
	/**
	 * ключ - имя свойства
	 * значение - колонка в БД
	 */
	private static $extra_types = null;
	
	public static function getImage($data_type)
	{
		if(!isset(self::$extra_types))
		{
			self::initExtraTypes();
		}
		return isset(self::$extra_types[$data_type]) ? self::$extra_types[$data_type] : array('value' => 'value');
	}
	private static function initExtraTypes()
	{
		self::$extra_types = array();
		/*self::$extra_types['cost'] = array(
			'currency'      => __TABLES_PREFIX.'currencies_id',
	        'value' 		=> 'value'
		);*/
		self::$extra_types['image'] = array(
			'value'         => 'value',         /* alt атрибут */
            'lwidth'        => 'large_width',
            'lheight'       => 'large_height',
            'lname'         => 'large_name',
            'swidth'        => 'small_width',
            'sheight'       => 'small_height',
            'sname'         => 'small_name',
            'lisswf'        => 'large_is_swf',
            'sisswf'        => 'small_is_swf',
            'updated'       => 'updated',       /* когда был обновлен */
		);
		/* self::$extra_types['file'] = array(
			'fileid'        => __TABLES_PREFIX.'file_vars_id',
			'value'         => 'value',
            'filesize'      => 'filesize',
            'filename'      => 'filename',
            'filetype'      => 'fileType',
            'updated'       => 'updated',
            'downloaded'    => 'downloaded',
		);*/
        self::$extra_types['single'] = array(
            'value'         => 'value_id'
        );
	}
}
