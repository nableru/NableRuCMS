<?php echo CHtml::beginForm(array('/user/auth')); 
echo CHtml::hiddenField('returnUrl', '/'.Yii::app()->request->getUrl());
?>
<table class="list httpError">
<thead>
<tr valign="top" class="zebra2">
	<td colspan="2" height="12" class="bold">&nbsp;Ошибка 403. Доступ запрещен. Введите логин и пароль.</td>
</tr>
<tr class="zebra1">
	<td colspan="2" height="172" class="httpError1">&nbsp;</td>
</tr>
</thead>
<tbody>
<tr class="zebra2">
	<td width="50%" height="7%" align="right" class="text"><?php echo CHtml::activeLabelEx($userAuth,'Введите логин'); ?>:&nbsp;</td>
	<td align="left" width="50%">&nbsp;<?php echo CHtml::activeTextField($userAuth,'username', array('size' => 20)) ?></td>
</tr>
<tr class="zebra1">
	<td width="50%" height="7%" align="right" class="text"><?php echo CHtml::activeLabelEx($userAuth,'Введите пароль'); ?>:&nbsp;</td>
	<td align="left" width="50%">&nbsp;<?php echo CHtml::activePasswordField($userAuth,'password', array('size' => 20)); ?></td>
</tr>
<tr class="zebra1">
	<td colspan="2" class="httpError2">
   <?php if(Yum::hasModule('registration') 
					&& Yum::module('registration')->enableRecovery)
			echo CHtml::link(Yum::t('Lost password?'), 
				Yum::module('registration')->recoveryUrl); ?> 
    <input type="image" src="<?php echo $backendImagesPath; ?>/blank.gif"/><a href="#" onclick="document.loginform.reset(); return false;">Сбросить</a><a href="#" onclick="document.loginform.submit();" class="bold">Войти</a></td>
</tr>
</tbody>
</table>
<?php echo CHtml::endForm(); ?>
