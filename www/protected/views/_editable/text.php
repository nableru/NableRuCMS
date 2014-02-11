<div id="<?php echo $cssId; ?>" class="editableText"><?php echo $value; ?></div>

<?php 
//$this->widget('ext.tinymce.ETinyMce', array('name'=>'html', 'value' => $value));
/*
$this->widget('ext.newtinymce.TinyMce', array(
    'model' => $this,
    //'value' => $tmp,
    'attribute' => 'tinyMceArea',
    // Optional config
    'compressorRoute' => 'tinyMce/compressor',
    'spellcheckerRoute' => 'tinyMce/spellchecker',
    'fileManager' => array(
        'class' => 'ext.elFinder.TinyMceElFinder',
        'connectorRoute'=>'admin/elfinder/connector',
    ),
    'htmlOptions' => array(
        'rows' => 6,
        'cols' => 60,
    ),
));
*/
//echo '<div id="' . $cssId . '" class="' . $cssClass . '">' . $value . '</div>';


/*
Yii::app()->clientScript->registerScript('edit',"
    
        $('.editableText').editInPlace({
            bg_over: '#cff',
		    field_type: 'textarea',
		    textarea_rows: '15',
		    textarea_cols: '35',
            url: '/eip/set/'
        });
        $('.editableString').editInPlace({
            bg_over: '#cff',
		    field_type: 'text',
            url: '/eip/set/'
        });

");
*/
/*
callback: function(e, data) {
                alert('this');
                return data;
            }
        
*/
/*
$('#username').editable({
        type: 'text',
            pk: 1,
                url: '/post',
                    title: 'Enter username'
});
} */
?> 
