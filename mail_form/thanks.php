<DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>お問い合わせフォーム</title>
    </head>
    <body>
        <h1>ありがとうございます。</h1>
        <h3>以下の内容でお問い合わせを受け付けました。</h3>
        <?php
        $request = $_POST; 
        $uploaded_path = $_POST["picture"];
//$_POST["picture"]から取得したファイルの情報を、$uploaded_file_pathの変数に保存
//→ウェブサイトのフォームから送信されたファイル情報を取ってきて、新しい場所（変数）に保存
        ?>
        <table border="1">
            <tr>
                <td><label for="onamae">名前</label></td>
                <td><?php echo $request["onamae"] ; ?></td>                   
            </tr>
            <tr>
                <td><label for="mail_address">メールアドレス</label></td>
                <td><?php echo $request["mail_address"]; ?></td>                  
            </tr>
            <tr>
                <td><label for="sex">性別</label></td>
                <td><?php echo $request["sex"];?></td>
            </tr>
            <tr>
                <td><label for="cates">お問い合わせカテゴリ<br>(複数選択可)</label></td>
                <td><?php                   
                foreach ($request['cates'] as $cates) {
                    echo htmlspecialchars($cates, ENT_QUOTES, 'UTF-8');
                }   
                ?></td>
            </tr>
            <tr>
                <td><label for="pref">お住まい</label></td>
                <td><?php echo $request["pref"];?></td>
            </tr>
            <tr>
                <td><label for="message">メッセージ</label></td>
                <td><?php echo nl2br($request["message"]); ?></td> 
            </tr>
            <tr>
                <td><label for="picture">画像</label></td>
                <td><?php if (isset($uploaded_path)) { ?>
                    <img src='<?php echo htmlspecialchars($uploaded_path, ENT_QUOTES, 'UTF-8'); ?>' alt='Image'>
                    <?php } else {?>
                        アップロードされた画像が見つかりません。
                    <?php } 
                    ?>
                </td>
            </tr>
            
        </table>
        
        <p><a href="./top.php">戻る</a></p>
    </body>
</html>
<!---
<php  var_dump($upload_file_path) ?>