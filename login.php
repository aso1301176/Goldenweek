<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>ログイン</title>
<meta name="description" content="ここにサイト説明を入れます" />
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script.js"></script>
</head>


<body onload="MM_preloadImages('images/menu_over_01.jpg','images/menu_over_02.jpg','images/menu_over_03.jpg','images/menu_over_04.jpg','images/menu_over_05.jpg','images/menu_over_06.jpg','images/menu_over_07.jpg')">


<div id="container">

<h1>h1テキスト入力場所です。titleタグの次に重要なので念入りに考えてワードを盛り込みましょう。</h1>



<div id="header">


<ul id="menu">
<li><a href="index.html"><img src="images/menu_01.png" alt="top" width="430" height="50" id="Image1" onmouseover="MM_swapImage('Image1','','images/menu_over_01.png',1)" onmouseout="MM_swapImgRestore()" /></a></li>
<li><a href="food.html"><img src="images/menu_02.png" alt="food" name="Image2" width="430" height="50" id="Image2" onmouseover="MM_swapImage('Image2','','images/menu_over_02.png',1)" onmouseout="MM_swapImgRestore()" /></a></li>
<li><a href="drink.html"><img src="images/menu_03.png" alt="drink" name="Image3" width="430" height="50" id="Image3" onmouseover="MM_swapImage('Image3','','images/menu_over_03.png',1)" onmouseout="MM_swapImgRestore()" /></a></li>
<li><a href="dessert.html"><img src="images/menu_04.png" alt="dessert" name="Image4" width="430" height="50" id="Image3" onmouseover="MM_swapImage('Image4','','images/menu_over_04.png',1)" onmouseout="MM_swapImgRestore()" /></a></li>
<li><a href="contact.html"><img src="images/menu_07.png" alt="contact" width="430" height="50" id="Image7" onmouseover="MM_swapImage('Image7','','images/menu_over_07.png',1)" onmouseout="MM_swapImgRestore()" /></a></li>
<li><a href="profile.html"><img src="images/menu_08.png" alt="profile" width="430" height="50" id="Image8" onmouseover="MM_swapImage('Image8','','images/menu_over_08.png',1)" onmouseout="MM_swapImgRestore()" /></a></li>

</ul>

</div>
<!--/header-->
<div id="contents">

<div id="main">

<h2 id="a">ログイン</h2><br>
<div align="center">
<form action="login2.php" method="post">
<font size="3">IDとpasswardを入力してください。</font><br><br>
<font size="3">ID</font><input type="text" name ="id"><font size="3" color="#DF0101">(半角英数字)</font></br></br>
<font size="3">passward</font><input type="passward" name="pass"><font size="3" color="#DF0101">(半角英数字)</font></br></br>
<input type="image" src="images/loginbutton.gif"><br><br></form>
<font size="3">会員ではない方</font><a href=".html"><font size="3">こちら</font></a>
<ul id="footermenu">
<li><a href="index.html">top</a></li>
<li><a href="food.html">food</a></li>
<li><a href="drink.html">drink</a></li>
<li><a href="contact.html">contact</a></li>
</ul>
<!--/footermenu-->


</div>
<!--/contents-->


</div>
<!--/container-->


<div id="footer">

Copyright&copy; 2012 サンプルカフェサイト All Rights Reserved.<br />
<a href="http://nikukyu-punch.com/" target="_blank">Template design by Nikukyu-Punch</a>

</div>


</body>
</html>
