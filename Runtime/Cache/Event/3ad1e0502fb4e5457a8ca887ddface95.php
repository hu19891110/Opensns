<?php if (!defined('THINK_PATH')) exit();?><hr/>

<div class="row insert-face-container">
    <div class="col-md-12 weibo_post_box">
        <h5 class="text-primary">评论</h5>
        <h5 class="text-primary">活动星级&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input name="level" type="radio" value="1" />&nbsp;一星 </label> &nbsp;&nbsp;&nbsp;&nbsp;
        <label><input name="level" type="radio" value="2" />&nbsp;二星 </label> &nbsp;&nbsp;&nbsp;&nbsp;
        <label><input name="level" type="radio" value="3" />&nbsp;三星 </label> &nbsp;&nbsp;&nbsp;&nbsp;
        <label><input name="level" type="radio" value="4" />&nbsp;四星 </label> &nbsp;&nbsp;&nbsp;&nbsp;
        <label><input name="level" type="radio" value="5" checked='checked' />&nbsp;五星 </label> &nbsp;&nbsp;&nbsp;&nbsp;
        </h5>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <textarea id="comment-content" style="height: 8em; width: 100%;"
                              class="form-control insert-face-textarea"
                              placeholder="说点什么吧～"></textarea>
                </p>
                <a class="col-md-10" style="padding: 0;" href="javascript:" onclick="insertFace($(this))"><img
                        src="/opensns/Public/static/image/bq.png"/></a>

                <div class="row">
                    <div class="col-md-2">
                        <button class="btn btn-block btn-primary" id="submit-comment"
                                data-url="<?php echo tox_addons_url('LocalComment/Index/addComment', array('app'=>$app,'mod'=>$mod, 'row_id'=>$row_id,'uid'=>$uid));?>">
                            发表
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="emot_content" class="emot_content"></div>

        <div class="row">
            <div class="col-md-12">
                <hr/>
            </div>
        </div>
        <?php if(!$list): ?><p class="text-muted" style="text-align:center;padding-top:2em;padding-bottom:2em;font-size:2em;">
                暂时没有评论～
            </p><?php endif; ?>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="row">
                <div class="col-sm-12">
                    <?php if(($comment["uid"]) == "0"): ?><a class="pull-left">
                            <img src="<?php echo getRootUrl();?>Addons/Avatar/default_64_64.jpg" style="width: 64px;"
                                 class="avatar-img"/>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo ($comment["user"]["space_url"]); ?>" class="pull-left">
                            <img src="<?php echo ($comment["user"]["avatar64"]); ?>" style="width: 64px;" ucard="<?php echo ($comment["user"]["uid"]); ?>"
                                 class="avatar-img"/>
                        </a><?php endif; ?>


                    <div style="overflow: hidden">
                        <div class="" style="padding-left: 16px;">

                            <p>
                                <?php if(($comment["uid"]) == "0"): ?><a>游客</a>
                                    <?php else: ?>
                                    <a href="<?php echo ($comment["user"]["space_url"]); ?>"
                                       ucard="<?php echo ($comment["user"]["uid"]); ?>"><?php echo (op_t($comment["user"]["nickname"])); ?></a><?php endif; ?>
                                    <?php if($comment["ranker"] == 1): ?><a style="float:right">所给出的活动评分为：一星</a>
                                        <?php elseif($comment["ranker"] == 2): ?>
                                        <a style="float:right">所给出的活动评分为：二星</a>
                                        <?php elseif($comment["ranker"] == 3): ?>
                                        <a style="float:right">所给出的活动评分为：三星</a>
                                        <?php elseif($comment["ranker"] == 4): ?>
                                        <a style="float:right">所给出的活动评分为：四星</a>
                                        <?php else: ?>
                                        <a style="float:right">所给出的活动评分为：五星</a><?php endif; ?>
                            </p>
                            <p><?php echo (parse_comment_content($comment["content"])); ?></p>

                            <p>
                                <span class="text-muted"><?php echo (friendlydate($comment["create_time"])); ?></span>

                            <div class="pull-right">
                                <?php if(check_auth('deleteLocalComment') OR is_administrator() OR ( ($comment['uid'] == is_login()) AND (is_login() != 0)) ): ?><a class="local-comment-delete" data-cid="<?php echo ($comment["id"]); ?>">删除</a> &nbsp;&nbsp;<?php endif; ?>
                                <a class=" local-comment-reply" data-uid="<?php echo ($comment["uid"]); ?>"
                                   data-username="<?php echo (op_t($comment["user"]["nickname"])); ?>">回复</a>
                            </div>


                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr/><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="pull-right">
            <?php echo getPagination($total_count, $count);?>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#submit-comment').click(function (e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            var content = $('#comment-content').val();
            var chkObjs = document.getElementsByName("level"); 
            var ranker = 9;
            for(var i=0;i<chkObjs.length;i++){ 
                  if(chkObjs[i].checked){ 
                      var ranker = chkObjs[i].value;
                  }
             }
            $('#submit-comment').attr('disabled','disabled');
            $.post(url, {content: content,ranker: ranker}, function (a) {
                if(!a.status){
                    $('#submit-comment').removeAttr('disabled');
                }
                handleAjax(a);
            });
        });
    })
</script>


<script type="text/javascript" src="/opensns/Public/Core/js/ext/atwho/atwho.js"></script>
<link type="text/css" rel="stylesheet" href="/opensns/Public/Core/js/ext/atwho/atwho.css"/>

<script>
    $(function () {
        var config = {
            at: "@",
            data: "<?php echo U('Weibo/Index/atWhoJson');?>",
            tpl: "<li data-value='@${nickname}'><img class='avatar-img' style='width:2em;margin-right: 0.6em' src='${avatar32}'/>${nickname}</li>",
            show_the_at: true,
            search_key: 'search_key',
            start_with_space: false
        };
        $('#comment-content').atwho(config);
    });

    $(function () {
        $('.local-comment-reply').click(function (e) {
            var $textarea = $('#comment-content');
            var nickname = $(this).attr('data-username');
            $textarea.focus();
            $textarea.append('回复 @' + nickname + ' ：');
        });

        $('.local-comment-delete').click(function (e) {
            $.post("<?php echo tox_addons_url('LocalComment/Index/deleteComment');?>", {id: $(this).attr('data-cid')}, function (msg) {
                handleAjax(msg);
            })
        });
    })

</script>