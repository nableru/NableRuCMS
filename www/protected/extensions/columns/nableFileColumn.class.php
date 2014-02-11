<?php

class nableFileColumn extends nableColumnDecorator
{
	public function prepareValue($value_name, $value, $init = false)
    {
    	switch($value_name)
    	{
    		case 'value':
    			$value = trim($value);
				'' !== $value AND settype($value, 'string');
		        return $value;
    			break;
    		case 'size':
    			return (int) $value;
    			break;
    		default:
    			return $value;
    			break;
    	}
    }
	public function setFilename($_files_, $lang_id)
    {
    	$column_id = $this->column->getId();
    	$shortname = $this->column->getShortname();
    	
        if(empty($_files_[$shortname]['name'][$lang_id]))
            return false;

        $_files_ = array(
            'name'      => $_files_[$shortname]['name'][$lang_id],
            'type'      => $_files_[$shortname]['type'][$lang_id],
            'tmp_name'  => $_files_[$shortname]['tmp_name'][$lang_id],
            'error'     => $_files_[$shortname]['error'][$lang_id],
            'size'      => $_files_[$shortname]['size'][$lang_id],
        );
    	
        $error = false;
    	$upload_path = __WWW_DIR . 'uploads/';
    		
    	// запись уже существовала и файл был загружен - давим гада
        $old_file = $this->column->getFilename($lang_id);
    	if(!empty($old_file) && file_exists($upload_path.$old_file))
    	{
            $wf = new FWF($upload_path.$old_file, ASTRegistry::getInstance()->get('Logs'));
            $wf->rm() OR $error = true;
    	}
        unset($old_file);
    	// сохраняем новый файл
    	$file_name = ($this->column->getIsPage() ? 'pages' : 'items').'/'.ceil($column_id/1000).'/'.$column_id.'/files/'.md5(time().microtime());
    	$wf = new FWF($upload_path.$file_name, ASTRegistry::getInstance()->get('Logs'));
    		
    	if($wf->UploadFile($_files_))
    	{
    		$this->column->setUpdated($this, time(), $lang_id);
    		$this->column->setFilename($this, $file_name, $lang_id);
    		$this->column->setFilesize($this, $_files_['size'], $lang_id);
    		$this->column->setFiletype($this, $wf->getFileType(), $lang_id);
    	}
        else
        {
            $error = true;
        }
        $error AND $this->column->setError();
    	unset($wf);
    }
	public function getFilesize($size_type, $lang_id = null)
    {
		static $size_types = array('bytes' => 1, 'kb' => 1024, 'mb' => 1024000);
		
		$size_type = trim(strtolower($size_type));
		return array_key_exists($size_type, $size_types) ? sprintf("%.1f%s", $this->column->getFilesize($lang_id)/$size_types[$size_type], ucfirst($size_type)) : $this->column->getFilesize($lang_id);
	}
	public function getValue($lang_id = null)
    {
    	$value = $this->column->getValue($lang_id);
    	return !empty($value) ? $value : $this->column->getFilename($lang_id);
	}
    public function delete()
    {
    	$wf = new WF('', ASTRegistry::getInstance()->get('Logs'));
    	$upload_path = __WWW_DIR . 'uploads/';
    	$error = false;
    	
    	foreach($this->column->getLangs() as $lang_id => $editable)
    	{
    		$file_name = $this->column->getFilename($lang_id);
    		if(!empty($file_name))
    		{
    			$wf->rm($upload_path.$file_name) OR $error = true;
    		}
    	}
    	
    	return !$error;
    }
}