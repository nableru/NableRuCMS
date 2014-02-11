<?php
/* @var $this JDealsController */
/* @var $model EJdeals */
/* @var $form CActiveForm */

//echo '<pre>',print_r($model),'</pre>';

/*

<a href="#" data-type="select" data-pk="1" data-url="/post" data-original-title="empty"></a>
<a href="#" id="status" data-type="select" data-pk="1" data-url="/post" data-original-title="Select status"></a>
<script>
$(function(){
    $('#status').editable({
        value: 2,    
        source: [
            {value: 1, text: 'Active'},
            {value: 2, text: 'Blocked'},
            {value: 3, text: 'Deleted'}
            ]
        }
    });
});
</script>*/
?>
<table class="deal">
<tbody>
<tr>
    <td rowspan="7">1</td>
    <td>
        <?php echo CHtml::encode($model->getAttributeLabel('symbol')); ?>
    </td>
    <td>
        <?php echo CHtml::link('', '#', array(
            'id' => 'symbol', 
            'encode' => false,
            'data-type' => 'select',
            'data-pk' => '1',
            'data-value' => 4,
            'data-url' => '/post',
            'data-original-title' => 'empty',
            'class' => 'symbol'
        )); ?>
    </td>
</tr>
<?php /*
<tr>
    <td rowspan="7">1</td>
    <td>
        <?php echo $form->dropDownList($model,'symbol', EForexSymbol::getSymbols(),array('empty' => '&nbsp;')); ?>
		<?php echo $form->error($model,'symbol'); ?>
    </td>
    <td><?php echo $form->labelEx($model,'otime'); ?></td>
    <td>
		<?php echo $form->textField($model,'otime'); ?>
		<?php echo $form->error($model,'otime'); ?>
    </td>
    <td rowspan="8">
   		<?php echo $form->labelEx($model,'oreason'); ?>
		<?php echo $form->textArea($model,'oreason',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'oreason'); ?>
    </td>
    <td>
		<?php echo $form->labelEx($model,'ctime'); ?>
		<?php echo $form->textField($model,'ctime'); ?>
		<?php echo $form->error($model,'ctime'); ?>
    </td>
    <td rowspan="8">
		<?php echo $form->labelEx($model,'creason'); ?>
		<?php echo $form->textArea($model,'creason',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'creason'); ?>
    </td>
    <td rowspan="8">
		<?php echo $form->labelEx($model,'analysis'); ?>
		<?php echo $form->textArea($model,'analysis',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'analysis'); ?>
    </td>
    <td rowspan="8"> статистика </td>
</tr>
<tr>
    <td> BUY / SELL</td>
    <td><?php echo $form->labelEx($model,'oprice'); ?></td>
    <td>
		<?php echo $form->textField($model,'oprice',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'oprice'); ?>
    </td>

    <td>
   		<?php echo $form->labelEx($model,'cprice'); ?>
		<?php echo $form->textField($model,'cprice',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'cprice'); ?>
    </td>
</tr>
<tr>
    <td>
    </td>
    <td>
		<?php echo $form->labelEx($model,'osl'); ?>
    </td>
    <td>
		<?php echo $form->textField($model,'osl',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'osl'); ?>
    </td>
    <td>
        <?php echo $form->labelEx($model,'csl'); ?>
		<?php echo $form->textField($model,'csl',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'csl'); ?>
    </td>
</tr>
<tr>
    <td>
    </td>
    <td>
   		<?php echo $form->labelEx($model,'otp'); ?>
    </td>
    <td>
   		<?php echo $form->textField($model,'otp',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'otp'); ?>
    </td>
    <td>
   		<?php echo $form->labelEx($model,'ctp'); ?>
		<?php echo $form->textField($model,'ctp',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'ctp'); ?>
    </td>
</tr>
<tr>
    <td>
    </td>
    <td>
		<?php echo $form->labelEx($model,'lot'); ?>
    </td>
    <td>
        автолот.
    </td>
    <td>
   		<?php echo $form->textField($model,'lot',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'lot'); ?>
    </td>
</tr>
<tr>
    <td>
    </td>
    <td>
        <?php echo $form->labelEx($model,'lpips'); ?>
        /
        <?php echo $form->labelEx($model,'ppips'); ?>
    </td>
    <td>
		<?php echo $form->textField($model,'lpips',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'lpips'); ?>
        /
		<?php echo $form->textField($model,'ppips',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'ppips'); ?>
    </td>
    <td>
    </td>
</tr>
<tr>
    <td>
    плечо
    </td>
    <td>
    прибыль/убыток $
    </td>
    <td>
    автоубыток исходя из S.L.
    </td>
    <td>
    </td>
</tr>
<tr>
    <td>
   	    <?php echo $form->labelEx($model,'dealrisk'); ?>
		<?php echo $form->textField($model,'dealrisk',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'dealrisk'); ?>
    </td>
    <td>
    </td>
    <td>
		<?php echo $form->labelEx($model,'balance'); ?>
    </td>
    <td>
		<?php echo $form->textField($model,'balance',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'balance'); ?>
    </td>
    <td>
    </td>
</tr>
*/ ?>
</tbody>
</table>

<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'swap'); ?>
		<?php echo $form->textField($model,'swap',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'swap'); ?>
	</div>
*/ ?>
