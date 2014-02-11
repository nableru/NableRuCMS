<?php
/* @var $this JDealsController */
/* @var $dataProvider CActiveDataProvider */
//Yii::app()->clientScript->registerScriptFile("/bootstrap-editable/js/bootstrap-editable-inline.js",CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile("/bootstrap-editable/js/bootstrap-editable-inline.js",CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile("/bootstrap-editable/css/bootstrap-editable.css",'screen,projection');

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    //'links'=>array('Library'=>'#', 'Ejdeals'),
    'links'=>array('Ejdeals'),

));

$this->menu=array(
	array('label'=>'Create EJdeals', 'url'=>array('create')),
	array('label'=>'Manage EJdeals', 'url'=>array('admin')),
);
?>

<h1>Журнал сделок</h1>

<?php
//echo '<pre>',print_r($items),'</pre>';
$gridDataProvider = new CActiveDataProvider(EJdeals::model());
//$gridDataProvider = new CActiveDataProvider(EJdeals::model()->with('symbol0')->findAll());

$this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped condensed',
    'dataProvider'=>$gridDataProvider,
    //'template'=>"{pager} {summary} {items}",
    'template'=>"{items}",
    'columns'=>array(
        array(
            'header' => 'Order ID',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->orderId), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'text',
                'data-original-title' => 'empty',
            ))",

        ),
        array(
            'header'=>'Symbol',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->forexSymbol->symbol ), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-value' => '\$data->symbol',
                'data-pk' => '\$data->id',
                'data-type' => 'select',
                'data-original-title' => 'empty',
            ))",
        ),
        array(
            'header'=>'Open Date/Time',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->otime ), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'date',
                'data-format' => 'yy-mm-dd',
                'data-datepicker' => '{ weekStart: 0, startView: 0, autoclose: true}',
                'data-original-title' => 'empty',
                'data-clear' => 'false',
            ))",

         ),
        array(
            'header'=>'Open S.L.',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->osl), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'text',
                'data-original-title' => 'empty',
            ))",
        ),
        array(
            'header'=>'Open price',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->oprice), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'text',
                'data-original-title' => 'empty',
            ))",
        ),
        array(
            'header'=>'Open T.P.',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->otp), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'text',
                'data-original-title' => 'empty',
            ))",
        ),
        array(
            'header'=>'Volume',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->lot), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'text',
                'data-original-title' => 'empty',
            ))",
        ),
        array(
            'header'=>'Open Date/Time',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->ctime ), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'date',
                'data-format' => 'yy-mm-dd',
                'data-datepicker' => '{ weekStart: 0, startView: 0, autoclose: true}',
                'data-original-title' => 'empty',
                'data-clear' => 'false',
            ))",

         ),
        array(
            'header'=>'Close S.L.',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->csl), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'text',
                'data-original-title' => 'empty',
            ))",
        ),
        array(
            'header'=>'Close T.P.',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->ctp), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'text',
                'data-original-title' => 'empty',
            ))",
        ),
        array(
            'header'=>'Close price',
            'type' => 'raw',
            'value' => "CHtml::link( CHtml::encode(\$data->cprice), array('#'), array(
                'encode' => false,
                'class' => 'editable',
                'data-url' => '/post',
                'data-pk' => '\$data->id',
                'data-type' => 'text',
                'data-original-title' => 'empty',
            ))",
        ),
/*        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px', 'class' => 'editable'),
        ),*/
    ),
));
/*
$this->widget('ext.editablegridview.CEditableGridView', array(
     'dataProvider'=>$gridDataProvider,
     'showQuickBar'=>'true',
     'quickCreateAction'=>'QuickCreate', // will be actionQuickCreate()
     'columns'=>array(
        'title',          // display the 'title' attribute
        array('header' => 'editMe', 'name' => 'editable_row', 'class' => 'ext.editablegridview.CEditableColumn')
    )
));
*/
?>

<?php
/*
foreach($items as $i=>$item): 
    echo $this->renderPartial('_form', array('model'=>$item));
 endforeach; 
*/

/* список символов */
$symbols = EForexSymbol::getSymbols();
$result = array();
foreach($symbols as $k => $v)
{
  $result[] = array(
    'value' => $k,
    'text' => $v,
  );  
}
/* список символов */
?>
<script type="text/javascript">
$(function(){
    $('.editable').editable({
        source: <?php echo CJSON::encode($result); ?>
    })
});

$('.add').
</script>
