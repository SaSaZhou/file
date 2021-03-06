<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<title><?php echo ($config["companyname"]); ?>-后台管理系统</title>
<!--[if lt IE 8]>
<script>
	alert('H+已不支持IE6-8，请使用谷歌、火狐等浏览器\n或360、QQ等国产浏览器的极速模式浏览本页面！');
</script>
<![endif]-->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" type="text/css" href="/Public/assets/css/Css.css" />
<link href="/Public/assets/css/font-awesome.min.css" rel="stylesheet">
<?php if($sel == 1 || $sel == 3 || $sel == 4): ?><script type="text/javascript" charset="utf-8" src="/Public/Ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="/Public/Ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Ueditor/ueditor.parse.js"></script>
    <script type="text/javascript" src="/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Ueditor/ueditor.config.min.js"></script><?php endif; ?>
<?php if($sel == 2 || $sel == 3 || $sel == 4): ?><link rel="stylesheet" type="text/css" href="/Public/User/css/uploadify.css" />
	<script src="/Public/assets/js/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/Public/User/js/jquery.uploadify-3.1.js"></script><?php endif; ?>
<?php if($sel == 4): ?><link href="/Public/assets/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
<link href="/Public/assets/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/Public/assets/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script><?php endif; ?>
</head>
<body>
	
</body>
</html>

<block name="body">
    <ol class="breadcrumb">
        <li><a href="<?php echo U('Index/index');?>">首页</a></li>
        <li>文章管理</li>
    </ol>
    <div class="content">
        <div class="Config_nav">
            <ul>
                <li><a class="on" href="<?php echo U('Article/index');?>">文章管理</a></li>
                <li><a href="<?php echo U('Article/add');?>">添加文章</a></li>
                <li><a href="<?php echo U('Articlecomment/index');?>">文章评论</a></li>
                <li><a href="<?php echo U('Article/recycle');?>">回收站</a></li>
            </ul>
        </div>
        <div class="Search">
            <form action="" method="get">
                <div class="JianSuo">
                    <select name="catid">
                        <option>选择栏目</option>
                        <?php if(is_array($cate_list)): foreach($cate_list as $k=>$vo): ?><option value="<?php echo ($vo["catid"]); ?>" <?php if($vo['ispart']==1 or $vo['ismodel']!=1){echo "disabled='disabled'";}?>><?php echo str_repeat("└─",$vo['level']); echo ($vo["catname"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="keyword"><input class="common-text input-text" size="16" placeholder="关键字" name="q" value=""  type="text"></div>
                <div class="btn1"><input class="btn btn-primary btn6 mr10" value="查询" type="submit" /></div>
            </form>
        </div>
        <form action="<?php echo U('Article/sortBatch');?>" name="myform" id="myform" method="post">
            <div class="List">
                <div class="table-list">
                    <ul>
                        <li class="ID">ID</li>
                        <li class="Name">文章标题</li>
                        <li class="Property">发布时间</li>
                        <li class="S_Order">排序</li>
                        <li class="Status">状态</li>
                        <li class="Oper">管理操作</li>
                    </ul>
                </div>
                <?php if(is_array($article_list)): foreach($article_list as $k=>$vo): ?><div class="ProList">
                        <ul>
                            <li class="ID"><?php echo ($vo["id"]); ?></li>
                            <li class="Name"><a href="<?php echo U('Article/edit',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></li>
                            <li class="Property"><?php echo (date("Y-m-d",$vo["inputtime"])); ?></li>
                            <li class="S_Order"><input type="text" class="sInput" name="sort[<?php echo ($vo["id"]); ?>]" value="<?php echo ($vo["sort"]); ?>" /></li>
                            <li class="Status"><?php echo ($vo[status]==1?'正常':'<font color=red>已删除</font>'); ?></li>
                            <li class="Oper">
                                <div>
                                    <a href="<?php echo U('Articlecomment/index',array('articleid'=>$vo['id']));?>">评论</a>
                                    <span>|</span>
                                    <a href="<?php echo U('Article/edit',array('id'=>$vo['id']));?>">编辑</a>
                                    <span>|</span>
                                    <a href="<?php echo U('Article/status',array('id'=>$vo['id'],'status'=>$vo['status']));?>">删除</a>
                                </div>
                            </li>
                        </ul>
                    </div><?php endforeach; endif; ?>
                <div class="cl" style="margin-top: 15px;"></div>
                <div class="Order_submit">
                    <input class="btn btn-primary btn6 mr10" type="submit" value="排序" />
                    <div class="tp_pages"><?php echo ($page); ?></div>
                </div>
            </div>
        </form>           
    	<!-- Footer Start -->
<footer>
    技术支持：<a href="##" title="某某信息有限公司" target="_blank">某某信息有限公司</a> 1.1.1.100305版本 &copy; 2016 - 2018
</footer>
<!-- Footer End -->	

    </div>
</black>