<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="<?php echo getRootUrl();?>Addons/Skin/_static/js/skin.js"></script>
<!--模态弹窗-->


<div class="skin_popup" style="max-width: 745px;margin:auto;background: white;padding: 50px;position: relative">
    <button title="Close (Esc)" type="button" class="mfp-close" style="color: #000">×</button>
    <?php if(!is_login()): ?><div class="need_login_tip">登录后才能设置个人皮肤</div><?php endif; ?>
    <div class="select_block">
        <div id="style_list">
            <div class="SkinPreview" data-role="SkinPreview">
                <?php if(is_array($skinList)): $i = 0; $__LIST__ = $skinList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$skin): $mod = ($i % 2 );++$i; if(($skin["value"]) == $defaultSkin): ?><div class="colorBox current" onclick="fChange('<?php echo ($skin["value"]); ?>',$(this));"
                             data-role="colorBox">
                            <a href="javascript:;" onclick="fChange('<?php echo ($skin["value"]); ?>',$(this));">
                                <img src="<?php echo ($skin["thumb_url"]); ?>"/>
                                <div class="skin_title" data-role="skin_title"><span><?php echo ($skin["name"]); ?></span></div>
                            </a>
                        </div>
                        <?php else: ?>
                        <div class="colorBox" onclick="fChange('<?php echo ($skin["value"]); ?>',$(this));" data-role="colorBox">
                            <a href="javascript:;" onclick="fChange('<?php echo ($skin["value"]); ?>',$(this));">
                                <img src="<?php echo ($skin["thumb_url"]); ?>"/>
                                <div class="skin_title" data-role="skin_title"><span><?php echo ($skin["name"]); ?></span></div>
                            </a>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <input type="hidden" value="<?php echo ($default["value"]); ?>" name="config[defaultSkin]" id="default"/>
    </div>
    <div class="button_list"><a class="btn btn-primary" data-role="SelectSkin" <?php if(!is_login()): ?>disabled="disabled"<?php endif; ?>>确定</a><a class="btn btn-primary" data-role="SelectSkinDefault" <?php if(!is_login()): ?>disabled="disabled"<?php endif; ?>>恢复默认</a><a class="btn btn-primary " data-role="USelectSkin">重置</a></div>
    <div class="clearfix"></div>
</div>
<!--模态弹窗 end-->