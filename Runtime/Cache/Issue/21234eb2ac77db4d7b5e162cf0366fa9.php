<?php if (!defined('THINK_PATH')) exit();?><link href="/opensns/Public/static/ueditormini/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">

<script type="text/javascript" charset="utf-8" src="/opensns/Public/static/ueditormini/js/umeditor.config.js"></script>

<script type="text/javascript" charset="utf-8" src="/opensns/Public/static/ueditormini/js/umeditor.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/opensns/Public/static/ueditormini/js/lang/zh-cn/zh-cn.js"></script>
<script type="text/plain" name="<?php echo ($name); ?>" id="<?php echo ($id); ?>" style="width:<?php echo ($width); ?>;height:<?php echo ($height); ?>;"><?php echo ($default); ?></script>
<script>
    $(function(){
        var config={<?php echo ($config); ?>};
        var um = UM.getEditor('<?php echo ($id); ?>',config);

    })


</script>