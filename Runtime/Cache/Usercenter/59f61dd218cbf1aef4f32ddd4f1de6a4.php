<?php if (!defined('THINK_PATH')) exit();?><link type="text/css" rel="stylesheet" href="/opensns/Public/Usercenter/css/group.css"/>
<div class="col-xs-12">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-xs-12 uc_information" style="margin-left: 10px;">
            <ul class="nav nav-pills ucenter-tab">
                <li
                <?php if(($tab) == "group"): ?>class="uc_current"<?php endif; ?>
                ><a href="<?php echo U('appList',array('type'=>$type,'uid'=>$uid,'tab'=>'group'));?>">发表的</a></li>
                <li
                <?php if(($tab) == "group_in"): ?>class="uc_current"<?php endif; ?>
                ><a href="<?php echo U('appList',array('type'=>$type,'uid'=>$uid,'tab'=>'group_in'));?>">评论的</a></li>
            </ul>

        </div>
    </div>
    <?php if(!$list): ?><div class="row">
            <div class="col-xs-12">
                <p class="text-muted" style="text-align: center; font-size: 3em;">
                    <br/><br/>
                    暂时没有帖子～
                    <br/><br/><br/>
                </p>
            </div>
        </div><?php endif; ?>

    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$document): $mod = ($i % 2 );++$i; $user = query_user(array('avatar128','avatar64','nickname','uid','space_url','icons_html'), $document['uid']); ?>
        <div class="row">
            <div class="col-md-2 col-xs-4 text-center hidden-xs" style="margin-right: -20px">
                <p>
                    <a href="<?php echo ($user["space_url"]); ?>">
                        <img src="<?php echo ($user["avatar64"]); ?>" ucard="<?php echo ($user["uid"]); ?>" width="48px" class="avatar-img"/>
                    </a>
                </p>
            </div>
            <div class="col-md-10 col-xs-12" >

                <p>
                    <a class="group_group_name" href="<?php echo U('Group/Index/group',array('id'=>$document['group_id']));?>" target="_blank" style="font-weight: 700">[<?php echo (parseweibocontent($document["group"]["title"])); ?>]</a>&nbsp;<a
                        class="group-list-title-link" title="<?php echo (parseweibocontent(htmlspecialchars($document["title"]))); ?>"
                        href="<?php echo U('Group/Index/detail',array('id'=>$document['id']));?>" target="_blank"><?php echo (mb_substr(parseweibocontent(htmlspecialchars($document["title"])),0,30,'utf-8')); ?>
                </a>

                 <?php if(($document["is_top"]) == "1"): ?><i class="glyphicon glyphicon-fire" style="color: #bc0000;margin-right: 10px;" title="置顶"></i><?php endif; ?>



                </p>

                <p class="pull-right text-muted">
                    <span>阅读（<?php echo ($document["view_count"]); ?>）</span>
                    <span style="width: 1em; display: inline-block;">&nbsp;</span>
                    <span>回复（<?php echo ($document["reply_count"]); ?>）</span>
                </p>

                <p class="text-muted author">
                    <a href="<?php echo ($user["space_url"]); ?>" ucard="<?php echo ($user["uid"]); ?>"><?php echo (op_t($user["nickname"])); ?></a><?php echo ($user["icons_html"]); ?>
                    发布：<?php echo (friendlydate($document["create_time"])); ?>

                </p>
            </div>
        </div>


        <?php if($i != count($list)): ?><hr class="group-list-hr"/>
            <?php else: ?>
            <div class="group-list-no-hr"></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>

</div>