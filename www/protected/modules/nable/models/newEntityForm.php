<?php
/* добавление данных в таблицы сущностей.
    создание новой сущности, НЕ типа сущности.
*/
class newEntityForm extends CFormModel
{
    public  $routePart,
            $entityType,
            $currentRoute;

    public function rules()
    {
        /*
        $result = Entity:model()->findAll();
        $types = array();
        foreach($result as $v)
            $types[] = $v->name;
        */

        return array(
            array('currentRoute, routePart, entityType', 'required'),
            //array('route', 'text'),
            array('entityType', 'exist', 'className' => 'Entity', 'attributeName' => 'name'),
        );
    }
}
