<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" dir="rtl"/>
<title>GW Top���</title>
<meta name="description" content="中華料理通信販売サイト" />
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script.js"></script>
</head>

ID name ジャンルID　価格
<body >
<script>
/**
 * �s�ǉ�
 */
function insertRow(id) {
    // �e�[�u���擾
    var table = document.getElementById(id);
    // �s���s���ɒǉ�
    var row = table.insertRow(-1);
    // �Z���̑}��
    var cell1 = row.insertCell(-1);
    var cell2 = row.insertCell(-1);
    var cell3 = row.insertCell(-1);
    // �{�^���p HTML
    var button = '<input type="button" value="行削除" onclick="deleteRow(this)" />';

    // �s���擾
    var row_len = table.rows.length;

    // �Z���̓��e����
    cell1.innerHTML = button;
    cell2.innerHTML = row_len + "-" + 1;
    cell3.innerHTML = row_len + "-" + 2;
}

/**
 * �s�폜
 */
function deleteRow(obj) {
    // �폜�{�^�����������ꂽ�s���擾
    tr = obj.parentNode.parentNode;
    // tr�̃C���f�b�N�X���擾���čs���폜����
    tr.parentNode.deleteRow(tr.sectionRowIndex);
}

/**
 * ��ǉ�
 */
function insertColumn(id) {
    // �e�[�u���擾
    var table = document.getElementById(id);
    // �s���擾
    var rows = table.rows.length;

    // �e�s�����ɃZ����ǉ�
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
 * ��폜
 */
function deleteColumn(id) {
    // �e�[�u���擾
    var table = document.getElementById(id);
    // �s���擾
    var rows = table.rows.length;
    <?php require_once 'sql.php';

    ?>

    // �e�s���̃Z�����폜
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


//���i�̃e�[�u����\������<br><br>
<form action="insert.php" method="post">
商品ID:<input type="text" size="40" name="foodID"/><br><br>
商品名:<input type="text" size="40" name="foodname"/><br><br>
ジャンルID:<input type="text" size="40" name="genreID"/><br><br>
価格:<input type="text" size="40" name="price"/><br><br>
<input type="submit" value="追加"/>
</form>

</body>
</html>
