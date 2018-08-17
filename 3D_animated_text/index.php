<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>3D Animated Text Example</title>
<link rel="stylesheet" href="lb_css.css" type="text/css" />
</head>

<body>

<svg viewBox="0 0 600 300">
  <!-- Symbol-->
  <symbol id="s-text">
    <text text-anchor="middle" x="50%" y="50%" dy="0.35em">Legend Blogs</text>
  </symbol>
  <!-- Duplicate symbols-->
  <use class="text" xlink:href="#s-text"></use>
  <use class="text" xlink:href="#s-text"></use>
  <use class="text" xlink:href="#s-text"></use>
  <use class="text" xlink:href="#s-text"></use>
  <use class="text" xlink:href="#s-text"></use>
</svg>
    
</body>
</html>
