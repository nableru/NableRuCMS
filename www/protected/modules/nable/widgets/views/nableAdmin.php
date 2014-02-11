<?php
/* jQDock: http://www.wizzud.com/2012/01/05/onsleep-slide-up-use-menu-to-reinstate/ */
if(!Yii::app()->user->isGuest)
{
    Yii::app()->clientScript->registerPackage('jquery');
    Yii::app()->clientScript->registerPackage('jquery.ui');
    Yii::app()->clientScript->registerCssFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('NableModule')
    . '/assets/jquery-ui/css/redmond/jquery-ui-1.10.3.custom.css', 'screen'));

?>
<div id='jQDpage'>
  <div id='silhouette'>
    <div>show menu...</div>
  </div>
  <div id='jQDmenu'>
    <img src='/images/icons/advancedsettings.png' title='Entity Properties' alt='Entity Properties' onclick="$('#entityProperties').dialog('open'); return false;" />
    <img src='/images/icons/kate.png' title='New page' alt='New page' onclick="$('#newDbEntity').dialog('open');" />
    <?php
        // echo CHtml::link('Оставьте номер', '#', array('onclick' => '$("#mydialog").dialog("open"); return false;',));
        // echo Yii::app()->createUrl('_new');
    ?>
  </div>
</div>
<div id="entityProperties" title="Edit Database Entity Properties"></div>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                    'id' => 'newDbEntity',
                    'options' => array(
                        'title' => 'Отправить сообщение',
                        'autoOpen' => false,
                        'modal' => true,
                        'resizable'=> true 
                    ),
                    'cssFile' => false,
                    'scriptFile' => false,
                ));
    $qForm = new newEntityForm;
    $form =  new CForm('application.views._admin.newEntityForm', $qForm);
    echo $form;
    $this->endWidget('zii.widgets.jui.CJuiDialog');

} // !Yii::app()->user->isGuest
?>
