<?php
if(is_array($this->pageTitle)) $this->pageTitle = join(' :: ', $this->pageTitle);
if(false === strpos($this->pageTitle, '<title')) $this->pageTitle = '<title>'.$this->pageTitle.'</title>';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <?php
	//<title id="title">Nable.Ru CMS {if is_array($title)}{$title|@join:" :: "}{else}{$title}{/if}</title>
    echo $this->pageTitle;
    ?>
	<link rel="icon" href="<?php echo $backendImagesPath; ?>/icons/favico.ico" />
    <script type="text/javascript">var backendImagesPath='<?php echo $backendImagesPath; ?>'</script>
</head>

<body onload="init();">
<div id="outerWrapper" class="httpError">
    <div id="header"><div id="mmenu"></div></div>

    <div id="main" class="httpError">
	    <div id="cwrapper">
		    <?php if(!empty($userAuth)) echo CHtml::errorSummary($userAuth); ?>
		    <div id="content"><?php echo $content; ?></div>
	    </div>
    </div>
</div>
</body>
</html>
