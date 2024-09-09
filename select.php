<?php
//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */
try {
    $db_name = 'gs_db_class3'; //データベース名
    $db_id = 'root'; //アカウント名
    $db_pw = ''; //パスワード：MAMPは‘root’
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_an_table;');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>結果表示</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="main">
    <header>
        <nav>
            <a href="index.php">データ登録</a>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>結果表示</h1>
            <div class="book-list">
                <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <p>
                        <a href="detail.php?id=<?= htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8')?>">
                            <?= htmlspecialchars($result['date'], ENT_QUOTES, 'UTF-8') ?> :
                            <?= htmlspecialchars($result['book_name'], ENT_QUOTES, 'UTF-8') ?> - 
                            <?= htmlspecialchars($result['book_comment'], ENT_QUOTES, 'UTF-8') ?> 
                        </a>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8') ?>">
                            <input type="submit" value="削除">
                        </form>
                    </p>
                <?php endwhile; ?>
            </div>
        </div>
    </main>

</body>

</html>