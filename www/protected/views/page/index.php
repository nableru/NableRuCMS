<?php $this->breadcrumbs=array( 'Page',); ?>

<?php echo $fields['h1']; ?>
<?php echo $fields['content']; ?>

<?php
/*
<?php echo '<'.$fields['h1']->getContainer().' id="' . $fields['h1']->getCssId() . '" class="' . $fields['h1']->getCssClass() . '">'.$fields['h1'].'</'.$fields['h1']->getContainer().'>'; ?> 
<?php echo '<'.$fields['content']->getContainer().' id="' . $fields['content']->getCssId() . '" class="' . $fields['content']->getCssClass() . '">'.$fields['content'].'</'.$fields['content']->getContainer().'>'; ?> 
*/
?>


<?php
/*
//echo '<div id="' . $fields['content']->getCssId() . '" class="' . $fields['content']->getCssClass() . '">' . $fields['content']->getValue() . '</div>';
//<div id="<?php echo $cssId; ?>" class="editableString"><?php echo $value; ?></div>

<div id="newDbEntity">
<p>
    Please enter url for the new Entity:<br/>
    <input type="text" name="routePart"/><br/>
</p>
<p>
Please choice type of Entity:<br/>
    <select name="entityType">
        <option value="0">please select</option>
        <?php
        foreach($entities as $v)
        {
            echo '<option value="' . $v->id. '">' . $v->name . '</option>';
        }
        ?>
    </select>
</p>
</div>
*/

?>
