$('#entityProperties').dialog({
      autoOpen: false,
      closeOnEscape: true,
      modal: true,
      width: '100%',
      height: '100%',
      position: { my: 'left top', at: 'left top' },
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });

jQuery(document).ready(function($){
    // set up a handler for the dockshow event...
  var onDockShow = function(){ //scope (this) is the #menu element
        var dock = $('.jqDock', this);
        //set silhouette child's width & height from the dock, and show parent...
        $('#silhouette div').css({width:dock.width(), height:dock.height()})
          .parent().show();
      }
    // ...and a handler for the onSleep callback...
    , onDockSleep = function(){ //scope (this) is the #menu element
        var menu = $(this);
        //slide the entire original menu off the top of the window...
        menu.animate({top:-1 * menu.height()},800);
        //bind a one-off mousemove event to the silhouette child...
        $('#silhouette div').one('mousemove', function(){
            menu.stop().animate({top:0}, 800);
            //...*MUST* give the menu a wake-up 'nudge', but we don't need to
            //wait for completion of the slide...
            menu.trigger('docknudge');
            return false;
          });
      }
    // set up the options to be used for jqDock...
    , dockOptions =
      { align: 'top' // horizontal menu, with expansion DOWN from a fixed TOP edge
      , idle: 2000 // set idle timeout to 2 seconds
      , inactivity: 2000 // 2 second inactivity
      , onSleep: onDockSleep // handler declared above
      };
  // ...and apply...
  $('#jQDmenu').bind('dockshow', onDockShow).jqDock(dockOptions);
});
