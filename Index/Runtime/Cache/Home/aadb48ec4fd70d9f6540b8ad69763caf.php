<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="/ERP/Public/EasyUi/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="/ERP/Public/EasyUi/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="/ERP/Public/EasyUi/demo.css">
    <script type="text/javascript" src="/ERP/Public/EasyUi/jquery.min.js"></script>
    <script type="text/javascript" src="/ERP/Public/EasyUi/locale/easyui-lang-zh_CN.js"></script>
    <script type="text/javascript" src="/ERP/Public/EasyUi/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="/ERP/Public/Js/Rbac/access.js"></script>
        <style>
            .app{
                width:94%;
                height:auto;
                overflow:hidden;
                margin:20px auto;
                padding:10px 20px;
                border:#ccc solid 1px;
            }
            .app dl{
                margin:10px 0;
                border:#ccc solid 1px;
                height:auto;
                overflow:hidden;
            }
            .app dl dt{
                display:blick;
                height:36px;
                line-height:36px;
                background:#e6e6e6;
                text-index:10px;
                padding:0 10px;
            }
            .app dl dd{
                float:left;
                margin:0 10px;
                padding:10px 15px;
            }
        </style>
        <script>
            var setUrl = "<?php echo U('Rbac/setAccess');?>";
            var aceUrl = "<?php echo U('Rbac/access');?>";
        </script>
</head>
<body>
        <form >
            <?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
                    <p>
                        <?php echo ($app["title"]); ?> <input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>" level="1" <?php if($app["access"]): ?>checked='checked'<?php endif; ?>/>                         
                    </p>
                    <?php if(is_array($app["children"])): foreach($app["children"] as $key=>$action): ?><dl>
                           <dt style="color:#f00;">
                                <?php echo ($action["title"]); ?> <input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>" level="2" <?php if($action["access"]): ?>checked="checked"<?php endif; ?> />
                            </dt>
                            <?php if(is_array($action["children"])): foreach($action["children"] as $key=>$method): ?><dd>
                                    <span><?php echo ($method["title"]); ?></span> <input type="checkbox" 
                                    name="access[]" value="<?php echo ($method["id"]); ?>" level="3" <?php if($method["access"]): ?>checked="checked"<?php endif; ?> />
                                </dd><?php endforeach; endif; ?>
                        </dl><?php endforeach; endif; ?>
                </div><?php endforeach; endif; ?>
            <input type="hidden" name="rid" value="<?php echo ($rid); ?>" id = "rid"/>
            <div id="dlg-buttons">
                <a href = '#' class="easyui-linkbutton" iconCls="icon-ok" onclick = "save()">保存</button>
                <a href="<?php echo U('User/role');?>" class="easyui-linkbutton" iconCls="icon-cancel" >返回</a>
            </div>
         </form>
</body>
</html>