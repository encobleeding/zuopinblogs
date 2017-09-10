<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <!-- 设置当前html文件的字符编码 -->
  <meta charset="utf-8">
  <!-- 设置浏览器兼容模式版本，本句话是将ie使用最新的渲染引擎 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- 声明当前网页在移动端浏览器中展示的相关设置 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  <title></title>

  <!-- Bootstrap -->
  <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://at.alicdn.com/t/font_400017_2ibxpa79kfxvquxr.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/setting.css">
  <link rel="stylesheet" href="./css/search.css">
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="./css/blogs.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- 条件注释 -->
  <!--[if lt IE 9]>
      <script src="https://lib/html5shiv/dist/html5shiv.min.js"></script>
      <script src="https://lib/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- 头部区域 -->
  <header id="header">
    <nav class="navbar navbar-zuopin navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_list" aria-expanded="false">
                  <span class="sr-only">切换菜单</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
          <a href="home.php" class="navbar-brand">
                <i class="iconfont icon-iconfont-edu15"></i>
              </a>
        </div>
        <div class="collapse navbar-collapse" id="nav_list">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php"><i class="iconfont icon-zhinanzhen-copy"></i>首页</a></li>
            <li><a href="#"><i class="iconfont icon-ic_system_update_px"></i>下载App</a></li>
            <li>

              <form class="navbar-form navbar-left" role="search" onkeydown="if(event.keyCode==13)return false;">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search" id="search_input">
                  <button type="button" class="btn btn-default" id="search_btn"><i class="iconfont icon-sousuo"></i></button>
                </div>

              </form>

            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right hidden-sm">
            <li><a href="./login.php">登录</a></li>
            <li><a href="./register.php" class="btn btn-zuopin">注册</a></li>
            <li class="write"><a href="./blogs.php" class="btn btn-zuopin"><i class="iconfont icon-shiliangzhinengduixiang9"></i>写文章</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
