<!--//GET;通常のアクセス、入力画面を返す・POST;ブラウザからサーバーへ何か情報を送る時のアクセス、確認＆完了画面を返す
//条件分岐使って、１つのファイルでいくつかの画面に飛べる
//入力のコントロールを使うために必要な宣言
//action;次にどのファイルを呼びだして動かすか
//method;プログラムで何かをするための指示。次は情報を送信するからpost
//ラベル（<label>）を使うと、フォームに入力する時に、その入力フィールドが何のためのものかがっきりわかる。
    ラベルを使うことで、ウェブサイトやアプリを使う人が、スムーズに操作できるようになる-->

<DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>お問い合わせフォーム</title>
    </head>
    <body>
        <form action="./confirm.php" method="POST" enctype="multipart/form-data">

            <table border="1">
                <tr>
                    <td><label for="onamae">名前</label></td>
                    <td align="left"><input type="text" name="onamae" value="" required></td>
                </tr>
                <tr>
                    <td><labe for="mail_address">メールアドレス</labe></td>
                    <td><input type="email" name="mail_address" value="" required></td>
                </tr>
                <tr>
                    <td><label for="sex">性別</label></td>
                    <td>
                        <input type="radio" name="sex" value="男性">男性
                        <input type="radio" name="sex" value="女性">女性
                    </td>
                </tr>
                <tr>
                    <td><label for="cates">お問い合わせカテゴリ<br>(複数選択可)</label></td>
                    <td>
                        <input type="checkbox" name="cates[]" value="製品について">製品について
                        <input type="checkbox" name="cates[]" value="サービスについて">サービスについて
                        <input type="checkbox" name="cates[]" value="採用について">採用について
                        <input type="checkbox" name="cates[]" value="その他">その他
                    </td>
                </tr>
                <tr>
                    <td><label for="pref">お住まい</label></td>
                    <td><select name="pref">
                        <option value="北海道">北海道</option>
                        <option value="東北">東北</option>
                        <option value="関東">関東</option>
                        <option value="中部">中部</option>
                        <option value="近畿">近畿</option>
                        <option value="中国">中国</option>
                        <option value="四国">四国</option>
                        <option value="九州・沖縄">九州・沖縄</option>
                       </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="message">メッセージ</label></td>
                    <td><textarea cols="80" rows="6" name="message" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="picture">画像</label></td>
                    <td>
                        <input type="file" name="picture" size="30" accept="image/*" multiple>
                    </td>                  
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="send" value="送信" /></td>
                </tr>
            </table>
        </form>
        
    </body>
</html>