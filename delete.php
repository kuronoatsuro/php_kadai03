<?php 
//1.対象のIDを取得
$id = $_POST['id'];

//2.DB接続します
try {
    $db_name = 'gs_db_class3'; //データベース名
    $db_id = 'root'; //アカウント名
    $db_pw = ''; //パスワード：MAMPは‘root’
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
};

//3. データ更新SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_an_table WHERE id = :id');

// バインド変数を設定
$stmt->bindValue(':id', $id, PDO::PARAM_INT);// 数値の場合 PDO::PARAM_INT

//4. データ登録処理後
$status = $stmt->execute();// 実行

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: select.php');
    exit();
};

?>