
<?php
require_once 'Cart.php';

function seturl(){
	return "localhost";
}
function setuser(){
	return "root";
}
function setpass(){
	return "HPDYs8rGWDUKrsd4";
}
function setdb(){
	return "gyouza";
}
function insert($id,$name,$password,$phone,$address,$postal){
	//初期値呼び出しSET NAMES utf8;

	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");


	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	mysql_query("SET NAMES utf8;");


	$sql = "INSERT INTO `cos` (`CosID`, `Cosname`, `Coscont`, `point`, `Cosadd`,`postal`) VALUES ('".$id."', '".$name."', '".$phone."', '0', '".$address."','".$postal."');";

	$result = mysql_query($sql) or die("挿入に失敗しました１");


	$sql = "INSERT INTO `password` (`CosID`, `Password`) VALUES ('".$id."', '".$password."');";

	$result = mysql_query($sql) or die("挿入に失敗しました２");



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
	$sql = "SELECT Password FROM password WHERE cosID = '".$id."';";

	$result = mysql_query($sql) or die("クエリの送信に失敗しました。<br />SQL:".$sql);


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

	$result = mysql_query($sql) or die("挿入に失敗しました");

}
function delete($itemid){
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();

	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	$sql = "DELETE FROM `gyouza`.`item` WHERE `item`.`ItemID` = 6 ;";

	mysql_free_result($result);



}
function getcos($id){
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	// MySQLへ接続する
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	// クエリを送信する
	$sql = "SELECT Cosname,Coscont,Cosadd FROM cos WHERE cosID = '".$id."';";

	mysql_query("SET NAMES utf8;")or die("クエリの送信に失敗しました2");

	$result = mysql_query($sql) or die("クエリの送信に失敗しました。<br />SQL:".$sql);

	$row = mysql_fetch_assoc($result);

	$data = array($row['Cosname'],$row['Coscont'],$row['Cosadd']);



	return $data;





}
function getItem($id){
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	// MySQLへ接続する
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	$sql = "SELECT `Itemname` FROM `item` WHERE `ItemID` = ".$id;

	mysql_query("SET NAMES utf8;")or die("クエリの送信に失敗しました2");

	$result = mysql_query($sql) or die("クエリの送信に失敗しました。<br />SQL:".$sql);

	$row = mysql_fetch_assoc($result);

	return $row['Itemname'];

}
function buy($cos,$item,$point){

	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	// MySQLへ接続する
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	mysql_query("SET NAMES utf8;")or die("クエリの送信に失敗しました2");

	$point3 = 0;

	$totalprice = 0;


	foreach ($item as $value => $items) {
		$id = $items["id"];
		$order = $items["order"];
		$sql1 = 'SELECT `Price` FROM `item` WHERE `ItemID` = '.$id;
		$result1 = mysql_query($sql1)or die("挿入に失敗しました"+$sql1);
		$row = mysql_fetch_assoc($result1);
		$price = $row['Price'] * $items["order"];
		$point1 = $price / 100;
		$point2 = (int)$point1;
		$sql2 = "INSERT INTO `gyouza`.`bought` (`CosID`, `ItemID`, `Date`, `value`, `cost`, `getpoint`) VALUES ('".$cos."', '".$id."', CURRENT_TIMESTAMP, '".$order."', '".$price."', '".$point2."')";
		//$sql = "INSERT INTO `bought`(`CosID`,`ItemID`,`Date`,`value`,`cost`,`getpoint`) VALUES ('"+ $_COOKIE['cos']+"','"+$item["id"]+"',' ',"+$item["order"]+","+$price+","+$point+");";
		mysql_query($sql2)or die("挿入に失敗しました"+$sql2);
		$point3 = $point3 + $point2;
		$totalprice = $totalprice + $price;

	}
	$sql1 = "SELECT `point` FROM `cos` WHERE `CosID` ='".$cos."'";
	$result1 = mysql_query($sql1)or die("挿入に失敗しました"+$sql1);
	$row = mysql_fetch_assoc($result1);
	$pointresult = $point3 + $row['point'] - $point;
	$sql = "UPDATE `gyouza`.`cos` SET `point` = ".$pointresult." WHERE `cos`.`CosID` = '".$cos."'";
	mysql_query($sql);


}
function bought($id){
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

	mysql_query("SET NAMES utf8;")or die("クエリの送信に失敗しました2");
	$sql = "SELECT item.itemname,bought.value,bought.cost,bought.date FROM item,bought WHERE item.itemid = bought.itemid AND bought.cosID = '".$id."' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){

		echo "<tr><td> ".$row['itemname']." </td>";
		echo "<td> ".$row['value']." </td>";
		echo "<td> ".$row['cost']."円</td>";
		echo "<td> ".$row['date']." </td></tr>";
	}
}
function getuser(){

	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");


	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
	mysql_query("SET NAMES utf8;")or die("クエリの送信に失敗しました2");
	$sql = "SELECT `Cosname` FROM `cos` WHERE `CosID` = '".$_COOKIE['cos']."'";
	$result1 = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
	$row = mysql_fetch_assoc($result1);
	echo $row['Cosname']."さん<a href=\"logout.php\">ログアウト</a>";
}
function searchfood($goodsname){

	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
	mysql_query("SET NAMES utf8;");

	// クエリを送信する
	$sql = "SELECT * FROM item WHERE Itemname LIKE '%$goodsname%'";
	$result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);

	//結果セットの行数を取得する
	$rows = mysql_num_rows($result);

	if($rows){
		while($row = mysql_fetch_array($result)) {
			echo "<tr>";
			echo  "<td>$row[1]</td><td>$row[3]円</td>\n";
			echo "</tr>";
		}
	}else{
		$msg = "<td>該当する商品がありません。</td><td>-------------</td>";
		echo $msg;
	}
}
function getprice($id,$value){
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
	mysql_query("SET NAMES utf8;");
	$sql1 = 'SELECT `Price` FROM `item` WHERE `ItemID` = '.$id;
	$result1 = mysql_query($sql1)or die("挿入に失敗しました"+$sql1);
	$row = mysql_fetch_assoc($result1);
	$price = $row['Price'] * $value;
	return $price;
}
function getpoint($cusid){
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
	mysql_query("SET NAMES utf8;");
	$sql1 = "SELECT `point` FROM `cos` WHERE `CosID` ='".$cusid."'";
	$result1 = mysql_query($sql1)or die("挿入に失敗しました"+$sql1);
	$row = mysql_fetch_assoc($result1);
	return $row["point"];

}
function checkpoint($cusid,$point){
	$url = seturl();
	$user = setuser();
	$pass = setpass();
	$db = setdb();
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// データベースを選択する
	$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
	mysql_query("SET NAMES utf8;");
	$sql1 = "SELECT `point` FROM `cos` WHERE `CosID` ='".$cusid."'";
	$result1 = mysql_query($sql1)or die("挿入に失敗しました"+$sql1);
	$row = mysql_fetch_assoc($result1);
	if($row['point']<= $point){
		return true;
		break;
	}else{
		return false;
		break;
	}


}
?>