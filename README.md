## 概要

「読んだ本をただ読み終えるのではなく、学びを引き出す」を目的としたアプリケーション。

このような課題を解決します。

-   自分が読んだ本の内容をスマホ 1 つで、見返すことができます。

---

## URL

https://yominaoshi.com/

---

## テストユーザー情報

-   ユーザー 1

    -   ユーザーネーム
        → testUser1
    -   パスワード
        → password1

-   ユーザー 2

    -   ユーザーネーム
        → testUser2
    -   パスワード
        → password2

-   ユーザー 3
    -   ユーザーネーム
        → testUser3
    -   パスワード
        → password3

---

## 仕様技術

-   HTML5
-   css3
-   Jquery
-   php 7.4.28
-   laravel 8.82.0
-   MySQL 5,7
-   heteml(レンタルサーバー)

---

## 機能一覧

-   ユーザー機能系
    -   新規登録
    -   ログイン
    -   ログアウト
    -   パスワード変更
    -   退会
-   図書管理系
    -   図書検索機能
    -   図書登録機能
    -   図書ステータス変更機能
    -   図書削除機能
    -   本棚並べ替え機能
-   付箋管理系
    -   付箋新規登録
    -   付箋変更
    -   付箋削除

---

## プロジェクトセットアップ手順

#### プロジェクトをクローンする

```
git clone git@github.com:panpanYuya/reading-management.git
```

#### 設定が必要なもの

-   .env ファイルを作成する
    ※各項目は必要に応じて、値を変更してください。

*   Laravel プロジェクトの設定

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
```

DB の設定

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

メール関係を設定する

```
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```
