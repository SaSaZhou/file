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
<?php if($config['pattern'] == 1): ?><link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Public/assets/css/animate.min.css" rel="stylesheet">
    <link href="/Public/assets/css/style.min.css" rel="stylesheet">
<?php else: ?>
    <link href="/Public/assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
    <link href="/Public/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/Public/assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/Public/assets/libs/fontello/css/fontello.css" rel="stylesheet" />
    <link href="/Public/assets/libs/animate-css/animate.min.css" rel="stylesheet" />
    <!-- <link href="/Public/assets/libs/nifty-modal/css/component.css" rel="stylesheet" /> -->
    <link href="/Public/assets/libs/pace/pace.css" rel="stylesheet" />
    <link href="/Public/assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
    <link href="/Public/assets/libs/jquery-notifyjs/styles/metro/notify-metro.css" rel="stylesheet" type="text/css" />
    <link href="/Public/assets/css/stylebak.css" rel="stylesheet" type="text/css" />
    <link href="/Public/assets/css/style-responsive.css" rel="stylesheet" />
    <link rel="apple-touch-icon" href="/Public/assets/img/apple-touch-icon.png" /><?php endif; ?>
    <?php if($config['pattern'] == 2): ?><base target="main"><?php endif; ?>
</head>
<body <?php if($config['pattern'] == 1): ?>class="fixed-sidebar full-height-layout gray-bg"<?php endif; ?>>
	
</body>
</html>


<?php if($config['pattern'] == 1): ?><div id="wrapper">
        <!--左侧导航开始-->
        <?php if($config['pattern'] == 1): ?><nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span><img alt="image" class="img-circle" src="/Public/assets/images/profile_small.jpg" /></span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs"><strong class="font-bold"><?php echo ($_SESSION["admin_auth"]["username"]); ?></strong></span>
                                <span class="text-muted text-xs block"><?php echo ($adminauth["title"]); ?><b class="caret"></b></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="J_menuItem" href="<?php echo U('Index/updPwd');?>"><?php echo L('icon-key');?></a></li>
                            <!--<li><a class="J_menuItem" href="<?php echo U('User/updateNickname');?>">个人资料</a></li>-->
                            <li class="divider"></li>
                            <li><a href="<?php echo U('Public/logout');?>"><?php echo L('Logout');?></a></li>
                        </ul>
                    </div>
                    <div class="logo-element">M+</div>
                </li>
                <li>
                    <a class="J_menuItem" href="<?php echo U('Index/summarize');?>"><i class="fa fa-home"></i> <span class="nav-label">主页</span></a>
                </li>
                <?php if($adminauth['category'] == 1 || $adminauth['article'] == 1 || $adminauth['download'] == 1 || $adminauth['jobs'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-file-o"></i>
                            <span class="nav-label">内容管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($adminauth['category'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Category/index');?>">栏目管理</a></li><?php endif; ?>
                            <?php if($adminauth['article'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Article/index');?>">文章管理</a></li><?php endif; ?>
                            <!--<li><a class="J_menuItem" href="<?php echo U('Product/index');?>">产品管理</a></li>
                            <li><a class="J_menuItem" href="<?php echo U('Video/index');?>">视频管理</a></li>-->
                            <?php if($adminauth['download'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Download/index');?>">下载管理</a></li><?php endif; ?>
                            <?php if($adminauth['jobs'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Jobs/index');?>">招聘管理</a></li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['guest'] == 1 || $adminauth['newguest'] == 1 || $adminauth['guestback'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                            <span class="nav-label">留言管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($adminauth['guest'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Guestbook/index');?>">全部留言</a></li><?php endif; ?>
                            <?php if($adminauth['newguest'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Guestbook/index',array('status' => 0));?>">新消息</a></li><?php endif; ?>
                            <?php if($adminauth['guestback'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Guestbook/index',array('status' => 1));?>">已回复</a></li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['member'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">会员管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="<?php echo U('User/index');?>">会员列表</a></li>
                             <!--<li><a class="J_menuItem" href="<?php echo U('User/group_list');?>">会员组管理</a></li>-->
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['id'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">用户管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="<?php echo U('Admin/index');?>">管理员列表</a></li>
                            <li><a class="J_menuItem" href="<?php echo U('Admin/auth_list');?>">用户组管理</a></li>
                            <li><a class="J_menuItem" href="<?php echo U('Havior/index');?>">用户行为</a></li>
                            <li><a class="J_menuItem" href="<?php echo U('Action/index');?>">操作记录</a></li>
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['site'] == 1 || $adminauth['flink'] == 1 || $adminauth['banner'] == 1 || $adminauth['cache'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-gear"></i>
                            <span class="nav-label">基本设置</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($adminauth['site'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Site/index');?>">基本设置</a></li><?php endif; ?>
                            <?php if($adminauth['flink'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Flink/index');?>">友情链接</a></li><?php endif; ?>
                            <?php if($adminauth['banner'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Banner/index');?>">幻灯片管理</a></li><?php endif; ?>
                            <!--<li><a class="J_menuItem" href="<?php echo U('Config/index');?>">SMTP邮箱配置</a></li>-->
                            <?php if($adminauth['cache'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Public/cache');?>">清理缓存</a></li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['dbak'] == 1 || $adminauth['import'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-database"></i>
                            <span class="nav-label">数据库管理</span> 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                             <?php if($adminauth['dbak'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Dbak/index');?>">数据备份</a></li><?php endif; ?>
                             <?php if($adminauth['import'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Dbak/import');?>">数据还原</a></li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
            </ul>
        </div>
    </nav>
<?php else: ?>
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div id="sidebar-menu">
                <ul>
                    <li class=''>
                        <a href="<?php echo U('Index/summarize');?>"><i class='icon-home-3'></i><span>主页</span></a>
                    </li>
                    <?php if($adminauth['category'] == 1 || $adminauth['article'] == 1 || $adminauth['download'] == 1 || $adminauth['jobs'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-file-o'></i><span>内容管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <?php if($adminauth['category'] == 1): ?><li><a href="<?php echo U('Category/index');?>"><span>栏目管理</span></a></li><?php endif; ?>
                                <?php if($adminauth['article'] == 1): ?><li><a href="<?php echo U('Article/index');?>"><span>文章管理</span></a></li><?php endif; ?>
                                <!--<li><a href="<?php echo U('Product/index');?>"><span>产品管理</span></a></li>
                                <li><a href="<?php echo U('Video/index');?>"><span>视频管理</span></a></li>-->
                                <?php if($adminauth['download'] == 1): ?><li><a href="<?php echo U('Download/index');?>"><span>下载管理</span></a></li><?php endif; ?>
                                <?php if($adminauth['jobs'] == 1): ?><li><a href="<?php echo U('Jobs/index');?>"><span>招聘管理</span></a></li><?php endif; ?>
                            </ul>
                        </li><?php endif; ?>
					<?php if($adminauth['guest'] == 1 || $adminauth['newguest'] == 1 || $adminauth['guestback'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-book'></i><span>留言管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <?php if($adminauth['guest'] == 1): ?><li><a href="<?php echo U('Guestbook/index');?>"><span>全部留言</span></a></li><?php endif; ?>
                                <?php if($adminauth['newguest'] == 1): ?><li><a href="<?php echo U('Guestbook/index',array('status' => 0));?>">新消息</a></li><?php endif; ?>
                                <?php if($adminauth['guestback'] == 1): ?><li><a href="<?php echo U('Guestbook/index',array('status' => 1));?>">已回复</a></li><?php endif; ?>
                            </ul>
                        </li><?php endif; ?>
                    <?php if($adminauth['member'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-user'></i><span>会员管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <li><a href="<?php echo U('User/index');?>"><span>会员列表</span></a></li>
                                 <!--<li><a href="<?php echo U('User/group_list');?>"><span>会员组管理</span></a></li>-->
                            </ul>
                        </li><?php endif; ?>
                    <?php if($adminauth['id'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-user'></i><span>用户管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <li><a href="<?php echo U('Admin/index');?>"><span>管理员列表</span></a></li>
                                <li><a href="<?php echo U('Admin/auth_list');?>"><span>用户组管理</span></a></li>
                                <li><a href="<?php echo U('Havior/index');?>"><span>用户行为</span></a></li>
                                <li><a href="<?php echo U('Action/index');?>"><span>操作记录</span></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if($adminauth['site'] == 1 || $adminauth['flink'] == 1 || $adminauth['banner'] == 1 || $adminauth['cache'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-cog'></i><span>系统参数</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <?php if($adminauth['site'] == 1): ?><li><a href="<?php echo U('Site/index');?>"><span>基本设置</span></a></li><?php endif; ?>
                                <?php if($adminauth['flink'] == 1): ?><li><a href="<?php echo U('Flink/index');?>"><span>友情链接</span></a></li><?php endif; ?>
                                <?php if($adminauth['banner'] == 1): ?><li><a href="<?php echo U('Banner/index');?>"><span>幻灯片管理</span></a></li><?php endif; ?>
                                <!--<li><a href="<?php echo U('Config/index');?>"><span>SMTP邮箱配置</span></a></li>-->
                                <?php if($adminauth['cache'] == 1): ?><li><a href="<?php echo U('Public/cache');?>"><span>清理缓存</span></a></li><?php endif; ?>
                            </ul>
                        </li><?php endif; ?>
                    <?php if($adminauth['dbak'] == 1 || $adminauth['import'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-bar-chart'></i><span>数据库管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <?php if($adminauth['dbak'] == 1): ?><li><a href="<?php echo U('Dbak/index');?>"><span>数据备份</span></a></li><?php endif; ?>
                                <?php if($adminauth['import'] == 1): ?><li><a href="<?php echo U('Dbak/import');?>"><span>数据还原</span></a></li><?php endif; ?>
                            </ul>
                        </li><?php endif; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="left-footer">
            <div class="progress progress-xs">
                <div class="progress-bar bg-green-1" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="progress-precentage">80%</span>
                </div>
                <a data-toggle="tooltip" title="See task progress" class="btn btn-default" data-modal="task-progress"><i class="fa fa-inbox"></i></a>
            </div>
        </div>
    </div><?php endif; ?>
            <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <?php if($config['pattern'] == 1): ?><nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary"><i class="fa fa-bars"></i></a></div>
        <a href="<?php echo U('Public/logout');?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> <?php echo L('Logout');?></a>
    </nav>
<?php else: ?>
    <div class="topbar">
        <div class="topbar-left">
            <div class="logo">
                <h1><a href="#"></a></h1>
            </div>
            <button class="button-menu-mobile open-left">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-collapse2">
                    <ul class="nav navbar-nav navbar-right top-navbar">
                        <li class="dropdown iconify hide-phone"><a href="javascript:;" onFocus="this.blur();" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                        <li class="dropdown topbar-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="/Public/assets/images/profile_small.jpg"></span><strong><?php echo ($_SESSION["admin_auth"]["username"]); ?></strong> <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo U('Index/updPwd');?>"><i class="icon-key"></i><?php echo L('icon-key');?></a></li>
                                <li><a id="btn-logout" href="<?php echo U('Public/logout');?>"><i class="icon-logout-1"></i><?php echo L('Logout');?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><?php endif; ?>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" scrolling="yes" width="100%" height="100%" src="<?php echo U('index/summarize');?>" frameborder="0"></iframe>
            </div>
        </div>
        <!--右侧部分结束-->
    </div>
    <!-- 全局js -->
    <script src="/Public/assets/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/assets/js/bootstrap.min.js"></script>
    <script src="/Public/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/Public/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/assets/js/plugins/layer/layer.min.js"></script>
    <!-- 自定义js -->
    <script src="/Public/assets/js/hplus.min.js"></script>
    <script type="text/javascript" src="/Public/assets/js/contabs.min.js"></script>
    <!-- 第三方插件 -->
    <script src="/Public/assets/js/plugins/pace/pace.min.js"></script>
<?php else: ?>
    <div id="wrapper">
        <!-- Top Bar Start -->
        <?php if($config['pattern'] == 1): ?><nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary"><i class="fa fa-bars"></i></a></div>
        <a href="<?php echo U('Public/logout');?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> <?php echo L('Logout');?></a>
    </nav>
<?php else: ?>
    <div class="topbar">
        <div class="topbar-left">
            <div class="logo">
                <h1><a href="#"></a></h1>
            </div>
            <button class="button-menu-mobile open-left">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-collapse2">
                    <ul class="nav navbar-nav navbar-right top-navbar">
                        <li class="dropdown iconify hide-phone"><a href="javascript:;" onFocus="this.blur();" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                        <li class="dropdown topbar-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="/Public/assets/images/profile_small.jpg"></span><strong><?php echo ($_SESSION["admin_auth"]["username"]); ?></strong> <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo U('Index/updPwd');?>"><i class="icon-key"></i><?php echo L('icon-key');?></a></li>
                                <li><a id="btn-logout" href="<?php echo U('Public/logout');?>"><i class="icon-logout-1"></i><?php echo L('Logout');?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><?php endif; ?>
        <!-- Top Bar End -->
        <!-- Left Sidebar Start -->
        <?php if($config['pattern'] == 1): ?><nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span><img alt="image" class="img-circle" src="/Public/assets/images/profile_small.jpg" /></span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs"><strong class="font-bold"><?php echo ($_SESSION["admin_auth"]["username"]); ?></strong></span>
                                <span class="text-muted text-xs block"><?php echo ($adminauth["title"]); ?><b class="caret"></b></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="J_menuItem" href="<?php echo U('Index/updPwd');?>"><?php echo L('icon-key');?></a></li>
                            <!--<li><a class="J_menuItem" href="<?php echo U('User/updateNickname');?>">个人资料</a></li>-->
                            <li class="divider"></li>
                            <li><a href="<?php echo U('Public/logout');?>"><?php echo L('Logout');?></a></li>
                        </ul>
                    </div>
                    <div class="logo-element">M+</div>
                </li>
                <li>
                    <a class="J_menuItem" href="<?php echo U('Index/summarize');?>"><i class="fa fa-home"></i> <span class="nav-label">主页</span></a>
                </li>
                <?php if($adminauth['category'] == 1 || $adminauth['article'] == 1 || $adminauth['download'] == 1 || $adminauth['jobs'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-file-o"></i>
                            <span class="nav-label">内容管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($adminauth['category'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Category/index');?>">栏目管理</a></li><?php endif; ?>
                            <?php if($adminauth['article'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Article/index');?>">文章管理</a></li><?php endif; ?>
                            <!--<li><a class="J_menuItem" href="<?php echo U('Product/index');?>">产品管理</a></li>
                            <li><a class="J_menuItem" href="<?php echo U('Video/index');?>">视频管理</a></li>-->
                            <?php if($adminauth['download'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Download/index');?>">下载管理</a></li><?php endif; ?>
                            <?php if($adminauth['jobs'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Jobs/index');?>">招聘管理</a></li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['guest'] == 1 || $adminauth['newguest'] == 1 || $adminauth['guestback'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                            <span class="nav-label">留言管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($adminauth['guest'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Guestbook/index');?>">全部留言</a></li><?php endif; ?>
                            <?php if($adminauth['newguest'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Guestbook/index',array('status' => 0));?>">新消息</a></li><?php endif; ?>
                            <?php if($adminauth['guestback'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Guestbook/index',array('status' => 1));?>">已回复</a></li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['member'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">会员管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="<?php echo U('User/index');?>">会员列表</a></li>
                             <!--<li><a class="J_menuItem" href="<?php echo U('User/group_list');?>">会员组管理</a></li>-->
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['id'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">用户管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a class="J_menuItem" href="<?php echo U('Admin/index');?>">管理员列表</a></li>
                            <li><a class="J_menuItem" href="<?php echo U('Admin/auth_list');?>">用户组管理</a></li>
                            <li><a class="J_menuItem" href="<?php echo U('Havior/index');?>">用户行为</a></li>
                            <li><a class="J_menuItem" href="<?php echo U('Action/index');?>">操作记录</a></li>
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['site'] == 1 || $adminauth['flink'] == 1 || $adminauth['banner'] == 1 || $adminauth['cache'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-gear"></i>
                            <span class="nav-label">基本设置</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($adminauth['site'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Site/index');?>">基本设置</a></li><?php endif; ?>
                            <?php if($adminauth['flink'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Flink/index');?>">友情链接</a></li><?php endif; ?>
                            <?php if($adminauth['banner'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Banner/index');?>">幻灯片管理</a></li><?php endif; ?>
                            <!--<li><a class="J_menuItem" href="<?php echo U('Config/index');?>">SMTP邮箱配置</a></li>-->
                            <?php if($adminauth['cache'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Public/cache');?>">清理缓存</a></li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
                <?php if($adminauth['dbak'] == 1 || $adminauth['import'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-database"></i>
                            <span class="nav-label">数据库管理</span> 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                             <?php if($adminauth['dbak'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Dbak/index');?>">数据备份</a></li><?php endif; ?>
                             <?php if($adminauth['import'] == 1): ?><li><a class="J_menuItem" href="<?php echo U('Dbak/import');?>">数据还原</a></li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
            </ul>
        </div>
    </nav>
<?php else: ?>
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div id="sidebar-menu">
                <ul>
                    <li class=''>
                        <a href="<?php echo U('Index/summarize');?>"><i class='icon-home-3'></i><span>主页</span></a>
                    </li>
                    <?php if($adminauth['category'] == 1 || $adminauth['article'] == 1 || $adminauth['download'] == 1 || $adminauth['jobs'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-file-o'></i><span>内容管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <?php if($adminauth['category'] == 1): ?><li><a href="<?php echo U('Category/index');?>"><span>栏目管理</span></a></li><?php endif; ?>
                                <?php if($adminauth['article'] == 1): ?><li><a href="<?php echo U('Article/index');?>"><span>文章管理</span></a></li><?php endif; ?>
                                <!--<li><a href="<?php echo U('Product/index');?>"><span>产品管理</span></a></li>
                                <li><a href="<?php echo U('Video/index');?>"><span>视频管理</span></a></li>-->
                                <?php if($adminauth['download'] == 1): ?><li><a href="<?php echo U('Download/index');?>"><span>下载管理</span></a></li><?php endif; ?>
                                <?php if($adminauth['jobs'] == 1): ?><li><a href="<?php echo U('Jobs/index');?>"><span>招聘管理</span></a></li><?php endif; ?>
                            </ul>
                        </li><?php endif; ?>
					<?php if($adminauth['guest'] == 1 || $adminauth['newguest'] == 1 || $adminauth['guestback'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-book'></i><span>留言管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <?php if($adminauth['guest'] == 1): ?><li><a href="<?php echo U('Guestbook/index');?>"><span>全部留言</span></a></li><?php endif; ?>
                                <?php if($adminauth['newguest'] == 1): ?><li><a href="<?php echo U('Guestbook/index',array('status' => 0));?>">新消息</a></li><?php endif; ?>
                                <?php if($adminauth['guestback'] == 1): ?><li><a href="<?php echo U('Guestbook/index',array('status' => 1));?>">已回复</a></li><?php endif; ?>
                            </ul>
                        </li><?php endif; ?>
                    <?php if($adminauth['member'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-user'></i><span>会员管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <li><a href="<?php echo U('User/index');?>"><span>会员列表</span></a></li>
                                 <!--<li><a href="<?php echo U('User/group_list');?>"><span>会员组管理</span></a></li>-->
                            </ul>
                        </li><?php endif; ?>
                    <?php if($adminauth['id'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-user'></i><span>用户管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <li><a href="<?php echo U('Admin/index');?>"><span>管理员列表</span></a></li>
                                <li><a href="<?php echo U('Admin/auth_list');?>"><span>用户组管理</span></a></li>
                                <li><a href="<?php echo U('Havior/index');?>"><span>用户行为</span></a></li>
                                <li><a href="<?php echo U('Action/index');?>"><span>操作记录</span></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if($adminauth['site'] == 1 || $adminauth['flink'] == 1 || $adminauth['banner'] == 1 || $adminauth['cache'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-cog'></i><span>系统参数</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <?php if($adminauth['site'] == 1): ?><li><a href="<?php echo U('Site/index');?>"><span>基本设置</span></a></li><?php endif; ?>
                                <?php if($adminauth['flink'] == 1): ?><li><a href="<?php echo U('Flink/index');?>"><span>友情链接</span></a></li><?php endif; ?>
                                <?php if($adminauth['banner'] == 1): ?><li><a href="<?php echo U('Banner/index');?>"><span>幻灯片管理</span></a></li><?php endif; ?>
                                <!--<li><a href="<?php echo U('Config/index');?>"><span>SMTP邮箱配置</span></a></li>-->
                                <?php if($adminauth['cache'] == 1): ?><li><a href="<?php echo U('Public/cache');?>"><span>清理缓存</span></a></li><?php endif; ?>
                            </ul>
                        </li><?php endif; ?>
                    <?php if($adminauth['dbak'] == 1 || $adminauth['import'] == 1): ?><li class='has_sub'>
                            <a href='javascript:void(0);'><i class='fa fa-bar-chart'></i><span>数据库管理</span><span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <?php if($adminauth['dbak'] == 1): ?><li><a href="<?php echo U('Dbak/index');?>"><span>数据备份</span></a></li><?php endif; ?>
                                <?php if($adminauth['import'] == 1): ?><li><a href="<?php echo U('Dbak/import');?>"><span>数据还原</span></a></li><?php endif; ?>
                            </ul>
                        </li><?php endif; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="left-footer">
            <div class="progress progress-xs">
                <div class="progress-bar bg-green-1" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="progress-precentage">80%</span>
                </div>
                <a data-toggle="tooltip" title="See task progress" class="btn btn-default" data-modal="task-progress"><i class="fa fa-inbox"></i></a>
            </div>
        </div>
    </div><?php endif; ?>
        <!-- Left Sidebar End -->
        <!-- Start right content -->
        <div class="content-page">
            <iframe scrolling="yes" frameborder="0" src="<?php echo U('index/summarize');?>" name="main"></iframe>
        </div>
        <!-- End right content -->
    </div>
    <!-- End of page -->
    <!-- the overlay modal element -->
    <div class="md-overlay"></div>
    <!-- End of eoverlay modal -->
<script>
    var resizefunc = [];
</script>
<script src="/Public/assets/libs/jquery/jquery-1.11.1.min.js"></script>
<script src="/Public/assets/libs/jquery-detectmobile/detect.js"></script>
<script src="/Public/assets/libs/jquery-icheck/icheck.min.js"></script>
<script src="/Public/assets/libs/jquery-notifyjs/notify.min.js"></script>
<script src="/Public/assets/libs/jquery-notifyjs/styles/metro/notify-metro.js"></script>
<script src="/Public/assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<script src="/Public/assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
<script src="/Public/assets/libs/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/Public/assets/libs/bootstrap-bootbox/bootbox.min.js"></script> -->
<script src="/Public/assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
<!-- <script src="/Public/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> -->
<script src="/Public/assets/libs/fastclick/fastclick.js"></script>
<script src="/Public/assets/libs/pace/pace.min.js"></script>
<script src="/Public/assets/js/pages/notifications.js"></script>
<script src="/Public/assets/js/init.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btn-logout").click(function() {
			if(confirm('确定退出？')) {
				window.location.href = "<?php echo U('Public/logout');?>";
			}
		});
	});
</script><?php endif; ?>