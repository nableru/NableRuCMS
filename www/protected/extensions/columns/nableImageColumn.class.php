<?php

class nableImageColumn extends nableColumnDecorator
{
	public function getValue($lang_id = null)
    {
    	$value = $this->column->getValue($lang_id);
    	return !empty($value) ? $value : $this->column->getLname($lang_id);
	}
	public function prepareValue($value_name, $value, $init = false)
    {
    	switch($value_name)
    	{
    		case 'value':
    			$value = trim($value);
				'' !== $value AND settype($value, 'string');
		        return $value;
    			break;
   		    default:
    			return $value;
    			break;
    	}
    }
	/**
     * delImage 
     * 
     * @param mixed $filename 
     * @access private
     * @return void
     */
	private function delImage($filename)
    {
        if(!file_exists($filename)) return true;

        $path = dirname($filename) . '/';
        $filename = basename($filename);
        $error = false;
        $wf = new ImgLoader($path, ASTRegistry::getInstance()->get('Logs'));
        $wf->delImage($filename) OR $error = true;
        return !$error;
    }

    /**
     * setFilename 
     * 
     * @param mixed $_files_ 
     * @param mixed $lang 
     * @access public
     * @return void
     */
    public function setFilename($_files_, $lang_id)
    {
    	$column_id = $this->column->getId();
    	$shortname = $this->column->getShortname();
    	
        if(empty($_files_[$shortname]['name']['large'][$lang_id]) && empty($_files_[$shortname]['name']['small'][$lang_id]))
            return true;

       empty($_files_[$shortname]['name']['small'][$lang_id]) OR $_sfiles_ = array(
            'name'      => $_files_[$shortname]['name']['small'][$lang_id],
            'type'      => $_files_[$shortname]['type']['small'][$lang_id],
            'tmp_name'  => $_files_[$shortname]['tmp_name']['small'][$lang_id],
            'error'     => $_files_[$shortname]['error']['small'][$lang_id],
            'size'      => $_files_[$shortname]['size']['small'][$lang_id],
        );
        empty($_files_[$shortname]['name']['large'][$lang_id]) OR $_files_ = array(
            'name'      => $_files_[$shortname]['name']['large'][$lang_id],
            'type'      => $_files_[$shortname]['type']['large'][$lang_id],
            'tmp_name'  => $_files_[$shortname]['tmp_name']['large'][$lang_id],
            'error'     => $_files_[$shortname]['error']['large'][$lang_id],
            'size'      => $_files_[$shortname]['size']['large'][$lang_id],
        );
    	
        $error = false;
    	$upload_path = __WWW_DIR . 'uploads/';
    		
        $old_file = $this->column->getLname($lang_id);
        empty($_files_['name']) OR (empty($old_file) OR $this->delImage($upload_path.$old_file));
        unset($old_file);
    	// сохраняем новый файл
    	$iDir = ($this->column->getIsPage() ? 'pages' : 'items').'/'.ceil($column_id/1000).'/'.$column_id.'/images/';
    	$wf = new ImgLoader($upload_path . $iDir, ASTRegistry::getInstance()->get('Logs'));

        $config = ASTRegistry::getInstance()->get('Configs')->LoadConfig('configs.conf.php');   // конфиг основных настроек хоста.
        $config = $config['imagesDefault'];

    	if(!empty($_files_['name']) && $wf->addImage($_files_, false, $config['fullsize_width'], $config['fullsize_height']))
    	{
    		$this->column->setUpdated($this, time(), $lang_id);
    		$this->column->setLname($this, $iDir.$wf->ImageName.$wf->ImageExt, $lang_id);
    		$this->column->setLwidth($this, $wf->wSize, $lang_id);
    		$this->column->setLheight($this, $wf->hSize, $lang_id);
    		$this->column->setLisswf($this, $wf->isSwf(), $lang_id);
    	}
        else if(!empty($_files_['name']))
            $error = true;

        if(!$error && !empty($_sfiles_['name']))
        { // загружали превьюшку вручную.
            $old_file = $this->column->getSname($lang_id);
            empty($old_file) OR $this->delImage($upload_path.$old_file);
            unset($old_file);
           
            if($wf->addImage($_sfiles_, false, $config['preview_width'], $config['preview_height']))
            {
                $small_image['name']  = $wf->ImageName.$wf->ImageExt;
                $small_image['width'] = $wf->wSize;
                $small_image['height'] = $wf->hSize;
                $small_image['is_swf'] = $wf->isSwf();
            }
            else
                $error = true;
        }

        if(!$error && empty($_sfiles_['name']) && !empty($_files_['name']) && !$wf->isSwf())
        { // сами создаем превьюшку.
            $old_file = $this->column->getSname($lang_id);
            empty($old_file) OR $this->delImage($upload_path.$old_file);
            unset($old_file);

            if(!is_array($small_image = $wf->MakePreview($config['preview_width'], $config['preview_height'], false, $config['preview_quality'])))
            {
                $error = true;
                ASTRegistry::getInstance()->get('Logs')->SetLog(ERROR_ERROR, 515);
            }
            else
                $small_image['is_swf'] = 0;
        }

        if($error)
        {
            $this->column->setError();
            return false;
        }
    	$this->column->setSname($this, $iDir.$small_image['name'], $lang_id);
    	$this->column->setSwidth($this, $small_image['width'], $lang_id);
    	$this->column->setSheight($this, $small_image['height'], $lang_id);
    	$this->column->setSisswf($this, $small_image['is_swf'], $lang_id);

        return true;
    }
	/**
     * Удаление файла
     *
     * @return boolean
     */
    public function delete()
    {
    	$wf = new WF('', ASTRegistry::getInstance()->get('Logs'));
    	$upload_path = __WWW_DIR . 'uploads/';
    	$error = false;
    	
    	foreach($this->column->getLangs() as $lang_id => $editable)
    	{
    		$file_large = $this->column->getLname($lang_id);
    		$file_small = $this->column->getSname($lang_id);
    		if(!empty($file_large))
    		{
    			$wf->rm($upload_path.$file_large) OR $error = true;
    		}
    		if(!empty($file_small))
    		{
    			$wf->rm($upload_path.$file_small) OR $error = true;
    		}
    	}
    	
    	return !$error;
    }
	/**
     * Удаление файла и очистка записи
     *
     * @return boolean
     */
	public function unsetFile($lang_id)
    {
    	$wf = new WF('', ASTRegistry::getInstance()->get('Logs'));
    	$upload_path = __WWW_DIR . 'uploads/';
    	$error = false;
    	
   		$file_large = $this->column->getLname($lang_id);
  		$file_small = $this->column->getSname($lang_id);
    	if (!empty($file_large)) {
    		$wf->rm($upload_path.$file_large) OR $error = true;
    	}
    	if (!empty($file_small)) {
    		$wf->rm($upload_path.$file_small) OR $error = true;
    	}
    	!$error AND $this->column->setIsEmpty();
    	unset($wf);
    	
    	return !$error;
    }
}