<?php if (!defined('THINK_PATH')) exit();?><a href="javascript:" onclick="insert_topic.InsertTopic(this)"><img class="weibo_type_icon" src="<?php echo getRootUrl();?>Addons/InsertTopic/_static/image/topic.png"/></a>

    <script type="text/javascript">
        $(function () {
            var WEIBO_CONTENT_CLASS = '.weibo_post_box';
            insert_topic = {
                find: function (obj) {
                    return $(this.obj).parents(WEIBO_CONTENT_CLASS).find(obj);
                },
                obj: 0,
                InsertTopic: function (obj) {
                	this.obj = obj;
            		var textbox = this.find("#weibo_content");
                	var text = '请在这里输入自定义话题';
                	textbox.val(textbox.val()+"#"+text+"#");
                	var len = textbox.val().length;
                	textbox.selectRange(len-text.length-1,len-1);
                }
            }
            
            
            $.fn.selectRange = function(start, end) {
                return this.each(function() {
                    if (this.setSelectionRange) {
                        this.focus();
                        this.setSelectionRange(start, end);
                    } else if (this.createTextRange) {
                        var range = this.createTextRange();
                        range.collapse(true);
                        range.moveEnd('character', end);
                        range.moveStart('character', start);
                        range.select();
                    }
                });
            };            
            
        })
    </script>