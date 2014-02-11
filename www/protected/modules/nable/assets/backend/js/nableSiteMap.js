/**
 * Реализация поведения системного плагина siteMap для Nable.Ru CMS
 * Для работы необоходимы: 
 * jQuery SimpleTree Drag&Drop plugin
 * jQuery SimpleCover Plugin  
 */

function NableSiteMap()
{
	/* переменные и стандартные значения */	
	var tree					= this;
	tree.treeID					= '';
	tree.nodePref				= '';
	tree.coverID		 		= '';
	tree.manualAdding  			= true;
	tree.debugMode				= false;
	tree.simpleTreeCollection	= null;
	tree.ajaxUrl				= '';
	
	tree.dblClick				= true;
	tree.clickInterval			= null;
	tree.jsName					= '';
	
	tree._adminUrl				= '';
	tree._lang					= '';
	
	tree.__st_texts 		= {
		add_title:		'Создать дочернюю страницу',
		add_status:		'Добавление в',
		edit_title:		'Свойства страницы',
		edit_status:	'Свойства',
		delete_title:	'Удалить страницу и дочерние',
		delete_status:	'Удалить страницу и дочерние к ней?',
		delete_ok:		'Данные успешно удалены.',
		delete_error:	'Во время удаления произошла ошибка!',
		move_error:		'Во время перемещения произошла ошибка!'
	};
	tree.simpleClick=function(){
		if(false==tree.dblClick){
			var node=tree.simpleTreeCollection.get(0).getSelected();
            window.location.replace('/'+tree._adminUrl+tree._lang+'/pages/?act=edit&id='+tree.getNodeID(tree.simpleTreeCollection.get(0).getSelected().attr('id')));
		}
	};
	tree.afterClick=function(node){
		tree.dblClick=false;
		tree.clickInterval=setTimeout("window."+tree.jsName+".simpleClick();", 200);
	};
	tree.afterDblClick=function(node){
		tree.dblClick=true;
		clearTimeout(tree.clickInterval);
	};
	//переназначаем стандартные функции дерева - для удобства
	tree.afterContextMenu=function(node, e){
		if(true==tree.buildSTContextMenu('jqContextMenu')){
			$('#jqContextMenu').show().css({
				top:e.pageY+"px",
				left:e.pageX+"px",
                width: 250+'px',
				position:"absolute",
				opacity: 0.8,
				zIndex: 2000
			});
		}
		return false;
	};
	tree.afterMove=function(destination, source, pos)
    {
		if(true==tree.manualAdding)
        {
			$('ul#'+tree.treeID+'.simpleTree').simpleCover(tree.coverID);
            dstId = destination.attr('id');
            if(dstId == undefined) { tree.moveNodeStatus({status: true}); return false; }    // отпустили в той же ветке. не стал разбираться откуда ноги растут.
			$.ajax({
				url:tree.ajaxUrl, 
				type:'GET', 
				data:{
					act:'move',
					move_id:tree.getNodeID(source.attr('id')), 
					move_to:tree.getNodeID(destination.attr('id')),
					move_pos:pos
				}, 
				dataType:'json', 
				success:tree.moveNodeStatus
			});
		}
        else
			tree.manualAdding=true;
	};

	//строим контекстное меню
	tree.buildSTContextMenu=function(menu_id)
    {
		if(undefined!==tree.simpleTreeCollection.get(0).getSelected().attr('id'))
        {
			if(undefined!==$('div#'+menu_id))
				$('div#'+menu_id).remove();
			var contextMenu=$('<div id="'+menu_id+'"><ul></ul></div>')
				.hide()
				.addClass('contextMenu')
				.appendTo('body');
			
			$('<li id="add"><a href="javascript://"><img src="/admin/images/simpletree/folder_add.png" border="0" /> '+tree.__st_texts.add_title+'</a></li>').click(tree.addMenuClick).appendTo($('ul', contextMenu));
			if('root'!=tree.simpleTreeCollection.get(0).getSelected().attr('class')){
				if(undefined==$('[class^=doc]', tree.simpleTreeCollection.get(0).getSelected()).attr('id'))
					var menuType='page';
				else
					var menuType='folder';
				$('<li id="edit"><a href="javascript://"><img src="/admin/images/simpletree/'+menuType+'_edit.png" border="0" /> '+tree.__st_texts.edit_title+'</a></li>').click(tree.editMenuClick).appendTo($('ul', contextMenu));
				$('<li id="delete"><a href="javascript://"><img src="/admin/images/simpletree/'+menuType+'_delete.png" border="0" /> '+tree.__st_texts.delete_title+'</a></li>').click(tree.deleteMenuClick).appendTo($('ul', contextMenu));
			}
			else
			{
				$('<li id="edit"><a href="javascript://"><img src="/admin/images/simpletree/folder_edit.png" border="0" /> '+tree.__st_texts.edit_title+'</a></li>').click(tree.editMenuClick).appendTo($('ul', contextMenu));
			}
				
			return true;
		}else
			return false;
	};
	//назначается "Добавить" элементу контекстного меню
	tree.addMenuClick=function(){
		if(undefined!=tree.simpleTreeCollection.get(0).getSelected().attr('id')){
            window.location.replace('/'+tree._adminUrl+tree._lang+'/pages/?act=edit&id=0&parent='+tree.getNodeID(tree.simpleTreeCollection.get(0).getSelected().attr('id')));
		}
	};
	//назначается "Изменить" элементу контекстного меню
	tree.editMenuClick=function(){
		if(undefined!=tree.simpleTreeCollection.get(0).getSelected().attr('id')){
            window.location.replace('/'+tree._adminUrl+tree._lang+'/pages/fields/?id='+tree.getNodeID(tree.simpleTreeCollection.get(0).getSelected().attr('id')));
		}
	};
	//назначается "Удалить" элементу контекстного меню
	tree.deleteMenuClick=function(){ 
		if(undefined!==tree.simpleTreeCollection.get(0).getSelected().attr('id') && confirm(tree.__st_texts.delete_status)){
			$('ul#'+tree.treeID+'.simpleTree').simpleCover(tree.coverID);
			$.ajax({
				url:tree.ajaxUrl, 
				type:'GET', 
				data:{
					act:'delete',
					node_id:tree.getNodeID(tree.simpleTreeCollection.get(0).getSelected().attr('id'))
				}, 
				dataType:'json', 
				success:tree.deleteNode
			});
		}	
	};
	//удаление элемента по его id в дереве
	tree.deleteNodeById=function(node_id)
	{
		if($('#' + node_id, tree.simpleTreeCollection.get(0)).length)
		{
			$('.active', tree.simpleTreeCollection.get(0)).removeClass('active').addClass('text');
			$('#' + node_id + '> span', tree.simpleTreeCollection.get(0)).removeClass('text').addClass('active');
			tree.deleteMenuClick();
		}
	};
	//удаление элемента дерева - смотрим статус - если хорошо удаляем
	tree.deleteNode=function(data){ 
		if(undefined==data.status || false==data.status)
			alert(tree.__st_texts.delete_error);
		else{
			tree.simpleTreeCollection.get(0).delNode();
			alert(tree.__st_texts.delete_ok);
		}
		$.simpleCover.removeCover(tree.coverID);
		tree.debugMessage(data);
	};
	//проверяем статус перемещения - если неудача - возвращаем в свое положение
	//TODO - перемещение в начальное положение еще не реализованно
	//ошибка маловероятна
	tree.moveNodeStatus=function(data){
		if(false==data.status){
			alert(tree.__st_texts.move_error);
		}
		$.simpleCover.removeCover(tree.coverID);
		tree.debugMessage(data);
	};
	tree.getNodeID=function(full_id){
		return full_id.substr(tree.nodePref.length);
	};
	tree.debugMessage=function(data){
		if(true === tree.debugMode && undefined != data.debug_message)
		{
			alert(data.debug_message);
		}
	};
}
