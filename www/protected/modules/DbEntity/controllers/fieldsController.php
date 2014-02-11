<?php

class fieldsController extends CController {

    public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('get'),
                'users'=>array('?'),
            ),
        );
    }


    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function actionGet($entity_id, $varType = false)
    {// формирует коллекцию полей сущности исходя из ее структуры
        
        $lang = 'ru_ru'; // язык пока всегда 1, поскольку мультиязычность пока не реализовывал
        
        $data = array(
            ':entity_name'  => array(
                'value' => $this->getController()->getId(), 
                'type'  => PDO::PARAM_STR
            ),
            ':lang'         => array(
                'value'     => $lang,
                'type'      => PDO::PARAM_STR,
            ),
            ':entity_id'    => array(
                'value'     => $entity_id,
                'type'      => PDO::PARAM_INT,
            ),
        );
		$this->Fields = nableColumnFactory::buildColumns("
		SELECT
			".$entity_id." AS id,
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

		return $this->Fields;
	}
    /*
        $sql = "
            SELECT
                t2.shortname,
                t2.multilang,
                t2.type,
                t2.protected,
                t3.name
            FROM
                {{entity}} AS t1
            JOIN
                {{entity_field}} AS t2
            ON
                    t1.id = t2.entity_id
                AND
                    t1.id = :entity_id
            JOIN
                {{entity_field_name}} AS t3
            ON
                    t2.id = t3.entity_field_id
                AND 
                    t3.lang_id = :lang
        ";
    */

}
