<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>GW Top画面</title>
<meta name="description" content="中華料理通信販売サイト" />
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script.js"></script>
</head>

ID name ジャンルID　価格
<body >
<script>
/**
 * 行追加
 */
function insertRow(id) {
    // テーブル取得
    var table = document.getElementById(id);
    // 行を行末に追加
    var row = table.insertRow(-1);
    // セルの挿入
    var cell1 = row.insertCell(-1);
    var cell2 = row.insertCell(-1);
    var cell3 = row.insertCell(-1);
    // ボタン用 HTML
    var button = '<input type="button" value="行削除" onclick="deleteRow(this)" />';

    // 行数取得
    var row_len = table.rows.length;

    // セルの内容入力
    cell1.innerHTML = button;
    cell2.innerHTML = row_len + "-" + 1;
    cell3.innerHTML = row_len + "-" + 2;
}

/**
 * 行削除
 */
function deleteRow(obj) {
    // 削除ボタンを押下された行を取得
    tr = obj.parentNode.parentNode;
    // trのインデックスを取得して行を削除する
    tr.parentNode.deleteRow(tr.sectionRowIndex);
}

/**
 * 列追加
 */
function insertColumn(id) {
    // テーブル取得
    var table = document.getElementById(id);
    // 行数取得
    var rows = table.rows.length;

    // 各行末尾にセルを追加
    for ( var i = 0; i < rows; i++) {
        var cell = table.rows[i].insertCell(-1);
        var cols = table.rows[i].cells.length;
        if (cols > 10) {
            continue;
        }
        cell.innerHTML = (i + 1) + '-' + (cols - 1);
    }
}

/**
 * 列削除
 */
function deleteColumn(id) {
    // テーブル取得
    var table = document.getElementById(id);
    // 行数取得
    var rows = table.rows.length;

    // 各行末のセルを削除
    for ( var i = 0; i < rows; i++) {
        var cols = table.rows[i].cells.length;
        if (cols < 2) {
            continue;
        }
        table.rows[i].deleteCell(-1);
    }
}
</script>

<input type="button" value="行追加" onclick="insertRow('sample1_table')" />
<input type="button" value="列追加" onclick="insertColumn('sample1_table')" />
<input type="button" value="列削除" onclick="deleteColumn('sample1_table')" />
<table id="sample1_table">
    <tr>
        <td nowrap><input type="button" value="行削除"
            onclick="deleteRow(this)" /></td>
        <td nowrap>1-1</td>
        <td nowrap>1-2</td>
    </tr>
    <tr>
        <td nowrap><input type="button" value="行削除"
            onclick="deleteRow(this)" /></td>
        <td nowrap>2-1</td>
        <td nowrap>2-2</td>
    </tr>
    <tr>
        <td nowrap><input type="button" value="行削除"
            onclick="deleteRow(this)" /></td>
        <td nowrap>3-1</td>
        <td nowrap>3-2</td>
    </tr>
</table>


//商品のテーブルを表示する<br><br>
商品ID:<INPUT type="text" size="40" name="foodID"><br><br>
商品名:<INPUT type="text" size="40" name="foodname"><br><br>
ジャンルID:<INPUT type="text" size="40" name="genreID"><br><br>
価格:<INPUT type="text" size="40" name="price"><br><br>
<input type="submit" value="追加">

</body>
</html>
