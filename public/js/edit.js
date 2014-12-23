(function($){
    function Question(){
        this.$question_answer = $('#question_answer');
        this.$question = $('#question');

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
                    console.log(data);
                    if($.trim(data)==='true'){
                        $file_name.val('');
                        event.data.self.$loading.fadeOut(8);
                        event.data.self.$images.append('<li>1<li>');
                    }
                }).submit();
            }
            return false;
        });

        $(document).on('click',{self: this}, function(event){


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

