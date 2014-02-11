<?php

class nableColumnFactory
{	
	public static function buildColumns($sql, $data, $lang)
	{
		$columns = array();
		
        $db = Yii::app()->db;

        $command = $db->createCommand($sql);

        foreach($data as $k => $v)
        {
            $command->bindParam($k, $v['value'], $v['type']);
        }
		
        $dh = $command->query();
		while(false !== $row = $dh->read())
		{
            //echo '<pre>',print_r($row),'</pre>';
		    $class_name = 'nableColumn_'.($row['protected'] ? '' : 'N').'P';
		    $column_class_name = 'nable'.ucfirst($row['datatype']).'Column';
			$columns[$row['shortname']] = new $column_class_name(new $class_name($row, $lang, $data[':entity_name']['value']));

            /*
            echo '$column[\'' . $row['shortname'] . '\'] = new ' 
            . $column_class_name . '(new ' . $class_name . '($row, $lang, \''
            . $data[':entity_name']['value'] . '\'));<br/>';
            */
		}
		
		return $columns;
	}
}
