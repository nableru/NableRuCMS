var dataContainer = new Object(); // ����� ������ ��� ����������.
var tmtout = 3000; // ����� �������� ����������.
var tout = false; // ID �������� ��� ���������/�������. ��������� ����������.
var ckConfig = { 
        'allowedContent': true,
         'autoParagraph': false
    };

/*
������� ��� ���������� ������, �������������� �������������� �����������.
*/
function Save()
{
    var toSave = new Object();
    for(var k in dataContainer) {
        // key - �������� ��������
        if(dataContainer[k]['init'] == true)
            continue;
        toSave[k] = dataContainer[k]['data'];
    }
    // ��������� toSave
    jSettings = {
         'url': '/editinplace/set/',
        'type': 'post',
        'data': {'dataToSave': toSave},
    }
    jQuery.ajax('/editinplace/set/', jSettings);
}

/*
�������������� ���������� ���������� � ������� ��� ����, ����� �� ���������
������, ���� ��� ������������� �� ����������.
���������� �� ������� ������������� ��-���� ���������.
*/
function prepareContainer(type)
{
    var et = $('body .editable'+type).each(function(){
        $(this).prop('contenteditable', 'true');
        var id = $(this).prop('id');
        dataContainer[id] = new Object();
        dataContainer[id]['data'] = $(this).html();
        dataContainer[id]['init'] = true;
    });

    $('body .editable'+type).
        css('min-height', '20px').
        css('border', '1px transparent');
    $('body .editable'+type).hover(
        function() { $(this).css('border', 'dashed 1px grey'); },
        function() { $(this).css('border', 'none'); }
    );
    var et = $('body .editable'+type).ckeditor(ckConfig).editor;
    if(typeof(et) == 'undefined')
    {   // ��� �� ������ ���� � ������������ ��������������.
        return false;
    }
    et.on( 'blur', function(e) {
        /* ���������� �������� ������������� �� �������� ������ � ��������� �
        ���������� ���������� � ���������� HTTP ������, ������ ���� �������������,
        ���� ���������. */
        //alert( 'The editor named ' + e.editor.name + ' lost the focus' );
        //alert( e.editor.getData() );
        setContainer(e.editor.element.getId(), e.editor.getData());
    });
    et.on('focus', function(e) {
        clearTimeout(tout);
    });
    et.on ('key', function(e){
        setContainer(e.editor.element.getId(), e.editor.getData());
    });
    et.on ('change', function(e){
        setContainer(e.editor.element.getId(), e.editor.getData());
    });
}

/* ������� ��������� ��� ���������� */
function setContainer(id, data)
{
    // ������������� �� �������� ������ ��� ����������.
    //alert('before');
    if(typeof(dataContainer[id]['data']) != 'undefined' && dataContainer[id]['data'] == data) return false;
    //alert('after');

    dataContainer[id]['data'] = data;
    dataContainer[id]['init'] = false;

    // ������������� ������.
    if( false != tout) clearTimeout(tout);
    tout = setTimeout('Save()', tmtout);
}

function prepareEditableDiv(type)
{
    var container = $('#entityProperties');
    $('head .editable'+type).each(function(){
        //$(this).prop('contenteditable', 'true');
        var id = $(this).prop('id');
        var originalId = '_original_'+id;
        $(this).prop('id', originalId);
        dataContainer[id] = new Object();
        dataContainer[id]['data'] = $(this).html();
        dataContainer[id]['init'] = true;
        var content = $(this).html();
        //$('<div id="'+id+'" class="editable'+type+'" contenteditable="true">'+content+'</div>').appendTo(container);
        var result = container.html() + '<p>' + $(this).prop('tagName') + ':</p><div id="'+id+'" class="editable'+type+'" contenteditable="true">'+content+'</div><div class="clear"></div>';
        container.html(result);

        var et = $('#' + id).ckeditor(ckConfig).editor;
        if(typeof(et) == 'undefined')
        {
            alert('type: ' + type);
            return false;
        }
        et.on( 'blur', function(e) {
            /* ���������� �������� ������������� �� �������� ������ � ��������� �
            ���������� ���������� � ���������� HTTP ������, ������ ���� �������������,
            ���� ���������. */
            //alert( 'The editor named ' + e.editor.name + ' lost the focus' );
            //alert( e.editor.getData() );
            setContainer(e.editor.element.getId(), e.editor.getData());
        });
        et.on('focus', function(e) {
            clearTimeout(tout);
        });
        et.on ('key', function(e){
            setContainer(e.editor.element.getId(), e.editor.getData());
            $('#'+originalId).html(e.editor.getData());
        });
        et.on ('change', function(e){
            setContainer(e.editor.element.getId(), e.editor.getData());
            $('#'+originalId).html(e.editor.getData());
        });
    });
}

$(document).ready(function() {
    prepareContainer('Text'); 
    prepareContainer('String'); 

    prepareEditableDiv('String');
    prepareEditableDiv('Text');


    // ����������/�������� ���� 
    $('#propDivMenu')
    .mouseover(function(){ })
    .mouseout(function(){});
});
