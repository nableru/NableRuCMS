<?php
Yii::setPathOfAlias('DbEntityModule' , dirname(__FILE__));

class DbEntityModule extends CModule {
    private $id,    // entitiy_id
            $type,  // entity_type
            $lang;  // пока всегда ru_ru, поскольку мультиязычность пока не
                    // реализую

    public $Fields = array(); // коллекция колумнов (со значениями).

    public function __construct($type, $id = 0, $lang = 'ru_ru')
    {   // формирует коллекцию полей сущности исходя из ее структуры
        $this->id = (int) $id;
        $this->type = (string) $type;
        $this->lang = $lang;

        if(empty($this->id))
            $this->_newEntity();
	}
    /*
        добавление новой сущности переданного типа
        в случае, если id сущности == 0
    */
    private function _newEntity()
    {
        $criteria=new CDbCriteria;
        $criteria->select='id';  // выбираем только поле 'id'
        $criteria->condition='name=:name';
        $criteria->params=array(':name'=>$this->type);
        $entityType = Entity::model()->find($criteria); // $params не требуется

        if(empty($entityType->id)) // не найден тип сущностей в таблице типов.
            return false;          // Добавление невозможно

        $entityType = 'E'.ucfirst(strtolower($this->type));
        $entity = new $entityType;
        $entity->save();
        $this->id = (int) $entity->id;

        $entityI18n = $entityType.'I18n';
        $entityI18n->id = $this->id;
        $entityI18n->save();
    }

    public function getFields($lang = NULL, $varType = NULL)
    {
        !is_null($lang) AND $this->lang = $lang;
   
        if(empty($this->Fields[$this->lang]))
            $this->Fields[$this->lang] = $this->_getData($varType);
        return $this->Fields[$this->lang];
    }

    private function _getData($varType)
    {// формирует коллекцию полей сущности исходя из ее структуры
        
        $data = array(
            ':entity_name'  => array(
                'value' => $this->type, 
                'type'  => PDO::PARAM_STR
            ),
            ':lang'         => array(
                'value'     => $this->lang,
                'type'      => PDO::PARAM_STR,
            ),
        );
		return nableColumnFactory::buildColumns("
		SELECT
			".$this->id." AS id,
			t2.id AS field_id,
			t2.shortname,
			t2.type,
            t2.container,
			t2.vartype AS datatype,
			t2.searchable,
			t2.required,
			t2.sorting,
			t2.hidden,
			t2.protected,
			t2.multilang,
			t3.name
		FROM
            {{entity}} AS t1
        JOIN
            {{entity_field}} AS t2
        ON
                t1.id = t2.entity_id
		JOIN
			{{entity_field_i18n}} AS t3
		ON
				t2.id = t3.entity_field_id
		    AND
				t3.lang = :lang 
		WHERE
	        t1.name = :entity_name" .
            ($varType ? " AND t2.type = '".$varType."'" : '') . "
        ORDER BY
            t2.sorting DESC
        ", $data, $this->lang);
	}
}

/*
        $data = array(
            ':entity_name'  => array(
                'value' => $this->type, 
                'type'  => PDO::PARAM_STR
            ),
            ':lang'         => array(
                'value'     => $this->lang,
                'type'      => PDO::PARAM_STR,
            ),
            ':entity_id'    => array(
                'value'     => $this->id,
                'type'      => PDO::PARAM_INT,
            ),
        );
		return nableColumnFactory::buildColumns("
		SELECT
			".$this->id." AS id,
			t2.id AS field_id,
			t2.shortname,
			t2.type,
            t2.container,
			t2.vartype AS datatype,
			t2.searchable,
			t2.required,
			t2.sorting,
			t2.hidden,
			t2.protected,
			t2.multilang,
			t3.name
		FROM
            {{entity}} AS t1
        JOIN
            {{entity_field}} AS t2
        ON
                t1.id = t2.entity_id
            AND
                t1.name = :entity_name
		JOIN
			{{entity_field_i18n}} AS t3
		ON
				t2.id = t3.entity_field_id
		    AND
				t3.lang = :lang 
		WHERE
	        t1.id = :entity_id" .
            ($varType ? " AND t2.type = '".$varType."'" : '') . "
        ORDER BY
            t2.sorting DESC
        ", $data, $lang);

*/
