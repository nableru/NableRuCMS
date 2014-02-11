<?php	// imglist.js.php - скрипт генерации списка загруженных картинок в JS формате.
$result = array();
GetFiles(dirname(__FILE__).'/uploads', '/images/uploads', '', $result);
sort($result);
echo "var tinyMCEImageList = new Array(\r\n";
	for($i = 0, $size = sizeof($result); $i < $size; $i++)
	{
		if($i)
			echo ",\r\n";
		echo '["'.$result[$i][0].'", "'.$result[$i][1].'"]';
	}
echo ");";

function GetFiles($subdir, $images_dir, $imagename, &$result)
{
	if (is_dir($subdir) && is_readable($subdir))
	{
		$subdir .= '/';
		$images_dir .= '/';
		$imagename .= '/';
		if(false === $dh = opendir($subdir))
			return false;

		while (false !== $filename = readdir($dh))
		{
			if('.' === $filename || '..' === $filename) continue; // пропускаем ссылки на саму диру и на родительскую.
			GetFiles($subdir.$filename, $images_dir.$filename, $imagename.$filename, $result);	// нашли каталог.
		}
		closedir($dh);
	}
	elseif(is_file($subdir))
		$result[] = array($imagename, $images_dir);
}
?>