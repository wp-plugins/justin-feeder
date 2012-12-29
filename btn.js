(function() {
    tinymce.create('tinymce.plugins.JustinFeeder_CombinedButton', {

    	
        createControl: function(n, cm) {
            switch (n) {
                case 'JustinFeeder_Button':
                var c = cm.createSplitButton('JustinFeeder_Button', {
                    title : 'JustIn Feeder',
                    image : '../wp-content/plugins/justin-feeder/btn.png',
                    onclick : function() {showMenu();}
                });
                c.onRenderMenu.add(function(c, m) {
                
					m.add({title : 'Nur im Feed anzeigen', onclick : function() {
						tinyMCE.activeEditor.execCommand('mceInsertContent',false,JustInFeeder_Button_InFeed())
					}});
     
			         m.add({title : 'Nicht im Feed anzeigen', onclick : function() {
			     		tinyMCE.activeEditor.execCommand('mceInsertContent',false,JustInFeeder_Button_NotInFeed())
			         }});
			         
                });
                return c;
            }
            return null;
        }
    });
    tinymce.PluginManager.add('justinfeeder', tinymce.plugins.JustinFeeder_CombinedButton);
})();


function JustInFeeder_Button_InFeed() {
	return "[infeed]"+tinyMCE.activeEditor.selection.getContent()+"[/infeed]";
}


function JustInFeeder_Button_NotInFeed() {
	return "[notinfeed]"+tinyMCE.activeEditor.selection.getContent()+"[/notinfeed]";
}