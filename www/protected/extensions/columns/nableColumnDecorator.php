<?php

abstract class nableColumnDecorator
{
	protected $column;
              // имя представления на основе которого отображать поле. обычно содержит название сущности.
    protected $view           = '', 
              // массив свойств колумна, связанных с его отображением и используемых
              // для передачи информации между виджетами приложения
              $_tpl           = array();  
	
	public function __construct(nableColumn $column)
	{
		$this->column = $column;
		$this->column->init($this);
	}
	public function __call($fn_name, $fn_args)
	{
		if(0 === strpos(strtolower($fn_name), 'set'))
		{
			array_unshift($fn_args, $this);
		}
		return call_user_func_array(array($this->column, $fn_name), $fn_args);
	}
	public function delete()
	{
		return true;
	}

    public function __toString()
	{
        $htmlOptions = array();
        $this->get_tpl_CssId() AND $htmlOptions['id'] = $this->get_tpl_CssId();
        $this->get_tpl_CssClass() AND $htmlOptions['class'] = $this->get_tpl_CssClass();
        return CHtml::tag($this->column->getContainer(), $htmlOptions, $this->column->getValue()); 
	}
    /*
    старый подход с использованием отдельных представлений (темплейтов) для
    визуального редактора
	public function __toString()
	{
        $view = $this->view;

        // виджет не назначен. возвращаем как есть.
        if(empty($view))
        {
            return CHtml::tag($this->column->getContainer(), array(), $this->column->getValue()); 
        }
        $viewName = $view. '/' . $this->column->getDataType();
        return Yii::app()->controller->renderPartial($viewName, array(
            'value'     => $this->column->getValue(),
            'cssId'     => $this->get_tpl_CssId(),
            'cssClass'  => $this->get_tpl_CssClass(),
        ), true);

        unset($view, $viewName);
	}
    */

	abstract public function prepareValue($value_name, $value, $init = false);

    public function set_view($view)
    {
        $this->view = $view;
    }
    public function get_view()
    {
        return $this->view;
    }
}
