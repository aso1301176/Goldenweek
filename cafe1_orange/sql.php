<?php
function seturl(){
	return "localhost";
}
function setuser(){
	return "root";
}
function setpass(){
	return "";
}
function setdb(){
	return "gyouza";
}
function insert($id,$name,$password,$phone,$address){
	//初期値呼び出し
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	$sql = "INSERT INTO `cos` (`CosID`, `Cosname`, `Coscont`, `point`, `Cosadd`) VALUES ('"+$id + "', '"+$name+"', '"+$phone+"', '0', '"+$address+"');";

	$result = mysql_query($sql) or die("挿入に失敗しました");

	mysql_free_result($result);



	// MySQLへの接続を閉じる
	mysql_close($link) or die("MySQL切断に失敗しました。");



}
function insert2($foodID,$foodname,$genre,$price){
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	$sql = "INSERT INTO `item` (`ItemID`, `Itemname`, `GenreID`, `Price`) VALUES ('"+$foodID + "', '"+$foodname+"', '"+$genre+"', ' +$price+ ');";

	$result = mysql_query($sql) or die("挿入に失敗しました");

	mysql_free_result($result);

	mysql_close($link) or die("MySQL切断に失敗しました。");

}
function quell($id,$password){
	//初期値呼び出し
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	// MySQLへ接続する
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	// クエリを送信する
	$sql = "SELECT Password FROM password WHERE cosID = '"+$id+"';";

	$result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);

	//結果セットの行数を取得する
	$rows = mysql_num_rows($result);

	//結果の内容をセット
	$resultset = mysql_fetch_assoc($result);
	if($resultset['Password'] == $password){
		$res = true;
	}else{
		$res = false;
	}
	//結果保持用メモリを開放する
	mysql_free_result($result);



	// MySQLへの接続を閉じる
	mysql_close($link) or die("MySQL切断に失敗しました。");

	return $res;
}
function update($name,$password,$phone,$address){
	//初期値呼び出し
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();

	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	$sql = "UPDATE `item` SET `ItemID` = '6', `Itemname` = 'エビチリ', `GenreID` = '2', `Price` = '108' WHERE `item`.`ItemID` = 1; '\";";



}
function delete($itemid){
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();




}
?>