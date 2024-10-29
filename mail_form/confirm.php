<!--hidden;目に見えない形で、HTMLの中にデータを埋め込むことができる。
入力画面でPOSTされた情報を完了画面まで引き継ぐことはできない、確認ページで一度値をセットし直す。
//送信されたファイルは、PHPによって一時的にサーバー内に保管される.
ファイルをsend.phpで扱う為、confirm.phpの段階で、プログラム側で決めた一時ディレクトリに移動させる
アップロードされたファイル取得に$_FILES使用（通常は$_POST）
取り出した値は連想配列になっっている。
-->


<DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>お問い合わせフォーム</title>
    </head>
    <body>
        <form action="./thanks.php" method="POST">
        <?php
        $request = $_POST;
//pictureを$fileに入れる
 //アップロードされたものから、どこのフォルダーに保存されたかを取り除き、ファイル名だけを取り出す
 //basement ; 例)ファイルが「/path/to/file.txt」というパスにある場合、basename()関数は「file.txt」だけを返す。
//アップロードされたファイルが保存されるフォルダーを指定,ディレクトリ（imgに一時保存するため）
        $file = $_FILES["picture"]; 
        $filename = basename($file["name"]); 
        $uploaded_path = 'img/'.$filename; 
//画像移動；アップロードされたファイルを指定した場所へ
//tmp_name;アップロードされたファイルの一時的な保存場所のパスを指定
        move_uploaded_file($file['tmp_name'], $uploaded_path);       
        ?>


            <table border="1">
                <!--「onamae」という名前の隠しフィールドに、ユーザーが入力した名前が保存されていますが、ユーザーには表示されないので、隠し情報として送信されます。そして、名前を表示する時は、安全に表示するために特殊文字やHTMLタグが適切に処理されている-->
                <tr>
                    <td><label for="onamae">名前</label></td>
                    <td><?php echo $request['onamae']; ?></td>
                    <input type="hidden" name="onamae" value="<?php echo $request['onamae']; ?>">
                </tr>
                <tr>
                    <td><label for="mail_address">メールアドレス</label></td>
                    <td><?php echo $request['mail_address']; ?></td>
                    <input type="hidden" name="mail_address" value="<?php echo $request['mail_address']; ?>">
                </tr>
                <tr>
                    <td><label for="sex">性別</label></td>
                    <td colspan="2"><?php echo $request['sex']; ?></td>
                    <input type="hidden" name="sex" value="<?php echo $request['sex']; ?>">
                </tr>
                <tr>
                    <!--ENT_QUOTESはhtmlspecialchars()関数で使用されるフラグの一部で安全に表示されて別のコーが読み込まれること防ぐ
                　　　foreachごとinputで次画面へ移す。catesに[]付けて関数・配列-->
                    <td><label for="cates">お問い合わせカテゴリ<br>(複数選択可)</label></td>
                    <td><?php
                        foreach ($request['cates'] as $cates) { 
                        echo htmlspecialchars($cates, ENT_QUOTES, 'UTF-8'); }?>
                        <input type="hidden" name="cates[]" value="<?php echo htmlspecialchars($cates, ENT_QUOTES, 'UTF-8'); ?>"
                    ?></td>
                </tr>
                <tr>
                    <td><label for="pref">お住まい</label></td>
                    <td colspan="2"><?php echo ($request['pref']); ?></td>
                    <input type="hidden" name="pref" value="<?php echo $request['pref']; ?>">
                </tr>
                </tr>
                    <td><label for="message">メッセージ</label></td>
                    <td><?php echo nl2br($request['message']); ?></td>
                    <input type="hidden" name="message" value="<?php echo $request['message']; ?>">
                </tr>
                <tr>
                    <td><label for="picture">画像</label></td>
<!--isset()は、変数が設定されている場合にtrue、設定されていない場合にfalseを返す。
画像の場所（ファイルパス）を表示
alt属性；画像が表示されなかった場合や、視覚障害のある人がウェブページを利用する際に、
代替テキストとして表示される内容を指定
$uploaded_file_pathの情報をhiddenで移行
-->
                    <td>
                        <?php if (!empty($uploaded_path)) { ?>
                            <img src='<?php echo htmlspecialchars($uploaded_path, ENT_QUOTES, 'UTF-8'); ?>' alt='Image'>
                            <input type="hidden" name="picture" value="<?php echo htmlspecialchars($uploaded_path, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php } else {?>
                            アップロードされた画像が見つかりません。
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="send" value="送信" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>        

<!--
-->