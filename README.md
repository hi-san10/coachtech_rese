# Rese(飲食店予約サービス)

## 外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持つために作成

## 機能一覧
・ 会員登録

・ 会員登録時にメールによる本人認証

・ ログイン

・ 管理者ログイン

・ 店舗代表者ログイン

・ ログアウト

・ ユーザー別マイページ

・ ユーザー飲食店お気に入り一覧取得

・ ユーザー飲食店予約機能

・ ユーザー飲食店予約削除

・ ユーザー飲食店予約情報取得

・ ユーザー飲食店予約情報変更

・ ユーザー飲食店予約情報をQRコードで表示

・ ユーザー飲食店評価とコメント機能

・ 飲食店をエリア(都道府県)検索

・ 飲食店をジャンル検索

・ 飲食店を店名(ワード)で検索

・ 管理者が店舗代表者作成

・ 管理者がユーザーにメールを送信

・ 店舗代表者が店舗作成

・ 店舗代表者が店舗情報変更

・ 店舗代表者が店舗の予約情報確認

## 環境構築

### Dockerビルド

1. git clone git@github.com:hi-san10/coachtech_rese.git

2. docker-compose up -d --build

*MYSQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。

### Laravel環境構築

1. docker-compose exec php bash

2. composer install

3. env.example ファイルから .env を作成し、環境変数を変更

4. php artisan key:generate

5. php artisan migrate

6. php artisan db:seed
![103985DE-3AFC-41D1-B28B-B189BDC8938A](https://github.com/user-attachments/assets/cf370312-651d-4836-94b7-b7154552033a)
    ・

    ・認証メールの機能はそれぞれでenvファイルを編集して使用してください

    ・

    ・

## 使用技術

・PHP 7.4.9

・Laravel 8.83

・MYSQL 8.0

## ER図

![](https://github.com/user-attachments/assets/b53378c6-834b-44de-9487-a1a2260fe8c6)

## URL

・アプリケーション:[http//localhost/](http//localhost/)

・phpMyAdmin:[http//localhost:8080](http/localhost:8080)
