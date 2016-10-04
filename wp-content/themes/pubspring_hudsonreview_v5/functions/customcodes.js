(function() {
    tinymce.create('tinymce.plugins.quote', {
        init : function(ed, url) {
            ed.addButton('fulltext', {
                title : 'Add a Full Text Button',
                image : url+'/../images/icons/icon-full-text_red.png',
                onclick : function() {
                     ed.selection.setContent('[fulltext]');

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('fulltext', tinymce.plugins.quote);
})();
