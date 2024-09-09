<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブックマーク</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Head[Start] -->
    <header>
        <nav>
            <a href="select.php">データ一覧</a>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <fieldset>
            <legend>ブックマーク</legend>
            <div class="form-group">
                <label for="book_name">書籍名</label>
                <input type="text" id="book_name" name="book_name">
            </div>
            <div class="form-group">
                <label for="book_url">書籍URL</label>
                <input type="text" id="book_url" name="book_url">
            </div>
            <div class="form-group">
                <label for="book_comment">書籍コメント</label>
                <textarea id="book_comment" name="book_comment" rows="4"></textarea>
            </div>
            <input type="submit" value="送信">
        </fieldset>
    </form>
</body>

</html>