<?php // linkslist.js.php - скрипт вывода списка ссылок в tinyMCE редакторе.
define('__WWW_DIR', '/home/hosting/0/uh200900001/htdocs/ecorodinki.ru/www/');   // DOCUMENT_ROOT сайта
define('__CODE_DIR', '/home/hosting/0/uh200900001/htdocs/ecorodinki.ru/_code/'); // каталог с основными скриптами

require_once __CODE_DIR.'/_etc/database.conf.php';
define('__LIBS_DIR', __CODE_DIR.'_libs/');
require_once __LIBS_DIR.'common_functions.php';		// из ядра выдернутые фукнции в отдельный файл.

ASTRegistry::getInstance()->set('Logs', new Logs);
$Db = new DataBase($DataBase, false);	// работа с БД.

$Db->Query("SELECT t2.h1 AS name, t1.url, t1.clevel-1 AS level FROM ".__TABLES_PREFIX."pages AS t1 LEFT JOIN ".__TABLES_PREFIX."pages_data AS t2 ON t1.".__TABLES_PREFIX."pages_id = t2.".__TABLES_PREFIX."pages_id AND t2.".__TABLES_PREFIX."langs_id = 1 WHERE t1.".__TABLES_PREFIX."hosts_id = 2 AND t1.clevel >= 1 AND t1.in_sitemap = 'TRUE' ORDER BY t1.cleft");

$result = 'var tinyMCELinkList = new Array(';
while(false !== $row = $Db->getNextRow())
{
	$result .= '["'.str_repeat('&nbsp; ', $row['level']).htmlspecialchars($row['name'], ENT_COMPAT).' ('.$row['url'].')", "'.$row['url'].'"],';
}

echo substr($result, 0, -1).');';
?>
