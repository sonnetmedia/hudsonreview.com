(function() {
    tinymce.create('tinymce.plugins.catlist', {
        init : function(ed, url) {
            ed.addButton('ListCategoryPosts', {
                title : 'Add a Category List',
                image : url+'/image.png',
                onclick : function() {
                     ed.selection.setContent('[catlist]' + ed.selection.getContent() + '[/catlist]');

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('catlist', tinymce.plugins.quote);
})();
