<?php

class NableHelpBlock extends CWidget
{
    public function init($content)
    {
        $this->render('nableHelpBlock', array('helpText' => $content));
    }
}
