<html>
    <body>
        <h3 id=""contact>お問い合わせ</h3>
        <p>サイトに関するお問い合わせはこちら</p>
        <form action="#" method="POST">
        <dl>
            <dt><label for="username">お名前(必須):</label></dt>
            <dd><input type="text" name="username" id="username" value=""></dd>
            <dt><label for="email">メールアドレス:</label></dt>
            <dd><input type="email" name="email" id="email" value=""></dd>
            <dt><label for="type">お問い合わせ種類</label></dt>
            <dd>
                <select name="type" id="type">
                    <option value="1">コーヒーについて</option>
                    <option value="2">その他</option>
                </select>
            </dd>
            <dt><label for="content">お問い合わせ内容:</label></dt>
            <dd><textara name="content" id="content" cols="30" rows="10"></textara></dd>
        </dl>
        <p><input type="submit" value="送信する"></p>
    </body>
</html>