<?php if (!defined('THINK_PATH')) exit(); if($Skin_CanSet): ?><link type="text/css" rel="stylesheet" href="<?php echo getRootUrl();?>Addons/Skin/_static/css/skin.css"/>
    <div id="skin_block">
        <a class="change_skin" href="<?php echo addons_url('Skin://Skin/change');?>"  style="-webkit-transform: none ;transition: none"></a>
        <input type="hidden" id="saveAddonUrl" value="<?php echo addons_url('Skin://Skin/save');?>">
    </div>
    <script>
        $('.change_skin').magnificPopup({
            type: 'ajax',
            overflowY: 'scroll',
            modal: false,
            closeOnBgClick:false
        });
    </script><?php endif; ?>