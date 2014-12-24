(function($){
    function Question(){
        this.$question_answer = $('#question_answer');
        this.$question = $('#question');

        this.basePath =  'http://zend_moiro/';

        this.$link_click = $('#link_click');
        this.$upload = $('#upload');
        this.$container_img = $('#container_img');
        this.$images = $('#images ul');
        this.$loading = $('#loading');
    }

    Question.prototype.init = function(){
        this.$question.on('click', {self: this} ,function(event){
            event.data.self.$question_answer.toggle();
            return false;
        });

        this.$link_click.on('click', {self: this} ,function(event){
            event.data.self.$container_img.toggle();
            return false;
        });

        this.$upload.on('click', {self: this} ,function(event){
            var $file_name= $('#file');
            var $news= $('#news');

            if($file_name.val()) {
                event.data.self.$loading.show(3);

                $news.attr('action', 'upload-file');

                $news.ajaxForm(function (data) {
                    if($.trim(data)==='true'){
                        event.data.self.$loading.fadeOut(8);
                        event.data.self.$images.append('<li>' +
                        '<a target="_blank" href="/files_upload/'+$file_name.val().replace("C:\\fakepath\\",'')+'">'+event.data.self.basePath+$file_name.val().replace("C:\\fakepath\\",'')+'</a>' +
                        '&nbsp;&nbsp;<img class="delete" data-name="'+$file_name.val().replace("C:\\fakepath\\",'')+'" src="/img/delete.png"></li>');
                        $file_name.val('');
                    }
                }).submit();
            }
            $news.unbind();
            $news.attr('action', 'add');
            return false;
        });



        $(document).on('click',{self: this}, function(event){
            if(event.target.id === 'close'){
                event.data.self.$question_answer.hide();
            }

            var $element = $(event.target);

            if($element.hasClass('delete')){
                var name_file = $element.data('name');
                event.data.self.$loading.show(3);
                var self = event.data.self;
                $.post( "delete-file",{'name_file':name_file},function( data ) {
                    if($.trim(data)==='true') {
                        self.$loading.fadeOut(8);
                        $element.parent().remove();
                    }
                });
            }

        });

        $.cleditor.defaultOptions.width = 200;
        $.cleditor.defaultOptions.height = 100;

        $("#content").cleditor({
            width: '100%', // width not including margins, borders or padding
            height: 250 // height not including margins, borders or padding

        });
    };

    $.cleditor.defaultOptions.width = 200;
    $.cleditor.defaultOptions.height = 100;

    var ojb = new Question();
    ojb.init();

})(jQuery);

