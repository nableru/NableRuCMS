// tinymce_full.js - скрипт полноценного визинг редактора.
tinyMCE.init({
	doctype : "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">",
	content_css : content_css,
	language : "ru",
	mode : "textareas",
	theme : "advanced",
	verify_html : true,
	cleanup_on_startup : true,
	cleanup : true,
//	plugins : "inlinepopups,save,table,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable",
	plugins : "autosave,inlinepopups,save,table,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable",
	theme_advanced_buttons1_add_before : "save,separator",
	theme_advanced_buttons1_add : "fontselect,fontsizeselect",
	theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
	theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,separator,forecolor,backcolor",
	theme_advanced_buttons3_add_before : "tablecontrols,separator",
	theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
	plugin_insertdate_dateFormat : "%Y-%m-%d",
	plugin_insertdate_timeFormat : "%H:%M:%S",
//	flash_external_list_url : "example_data/example_flash_list.js",
	theme_advanced_resize_horizontal : false,
	apply_source_formatting : true,
	convert_urls : false,
	relative_urls : true,
	remove_script_host : true,
	external_image_list_url : "/images/imglist.js.php",
	external_link_list_url : "/admin/js/linkslist.js.php?asf",
	convert_fonts_to_spans : true,
	tab_focus : ':prev,:next',
	theme_advanced_toolbar_location : "external",
//	theme_advanced_layout_manager : "RowLayout",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
//	skin : "o2k7",
	theme_advanced_resizing : true,
	editor_selector : "dblock",
	editor_deselector : "dnone"
});