/**
 * SimpleCover 0.1 alpha - jQuery Plugin
 *
 * Возникла необходимость использовать табличную структуру для отображения сообщения
 * это позволило использовать центрирование во всех браузерах не прибегая к хакам
 * TODO - желательно текст сообщения как то выделять
 *
 * SimpleCover has been tested in the following browsers:
 * - IE 6, 7
 * - Firefox 2
 * - Opera 9
 * - Safari 3
 *
 * @name SimpleCover
 * @type jQuery
 * @requires jQuery v1.2+
 * @author divil666
 * @version 0.1 alpha
 */
(function($){
	$.simpleCover={};
	$.fn.simpleCover=function(id, options){
		$.simpleCover.removeCover(id);
		options=$.extend($.simpleCover.defaults, options || {});
		var position=$(this).position();
		var cover_top=($.browser.msie ? position.top-1 : position.top)+"px";
		var cover_left=($.browser.msie ? position.left-1 : position.left)+"px";
		var cover_html=((options.image!='' || options.message!='') ?
			'<table width="100%" height="100%"><tr><td align="center" valign="middle">'+(options.image != ''
                ? '<img src="'+options.image+'" align="absmiddle">'+(true==options.br_image ? '<br />' : ' ') 
                : '')
            +options.message+'</td></tr></table>'
			: ''
		);
		$('<div id="'+id+'"></div>')
			.css($.extend(options.coverStyle, {
					background:options.color,
				 	opacity:options.opacity,
				 	top:cover_top, 
				 	left:cover_left			  
			}))
			.width($(this).innerWidth()+"px")
			.height($(this).innerHeight()+"px")
			.html(cover_html)
			.appendTo('body')
			.show();
		return this;
	};
	$.simpleCover.removeCover=function(cover_id){
		if(undefined!==$('div#'+cover_id).attr('id'))
			$('div#'+cover_id).remove();
	};
	$.simpleCover.defaults={
		coverStyle:{
			position:'absolute',
			overflow:'hidden',
			verticalAlign:'middle',
			textAlign:'center',
			zIndex:'1000',
			border:'1px solid #E9EBD6'
		},
		color:'#F9FAEF',
		opacity:'0.5',
		image:'images/loading.gif',
		br_image:true,
		message:'Loading...'
	};
})(jQuery);
