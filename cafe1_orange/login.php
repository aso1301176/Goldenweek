<?php
require_once 'sql.php';
if(quell($_POST['id'], $_POST['password'])){
	setcookie("cos",$_POST['id']);
	?>
	<meta http-equiv="refresh" content="1;URL=index.html">
	<?php }else{
	?>
	出直してまいれ<?php
}?>