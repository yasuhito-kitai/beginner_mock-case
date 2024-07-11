# Atte
Atteはシンプルで直感的に利用できる勤怠管理システムです。
![alt text](/readme-img/Atte.jpg)

## システムの概要
このシステムは、従業員の勤怠状況を人事評価に反映させるために開発しました。  
毎日の勤務時間を自動集計し、日付別、月別（ユーザー毎）の勤務実績を確認することができます。

## アプリケーションURL
http://54.249.52.194/login  
※メール認証機能を実装していますが、本番環境でのメール送信の設定をしていません。  
　そのため、ユーザー登録をしても認証ができないため打刻画面への遷移はできません。

## 機能一覧
|               会員登録               |
| :----------------------------------: |
| ![alt text](/readme-img/会員登録.jpg) |
| ユーザーの登録を行います |


|           ユーザー認証（メール）  |
| :------------------------------: |
| ![alt text](/readme-img/認証メール.jpg) |
|    メール認証を行います|


|               ログイン               |
| :----------------------------------: |
| ![alt text](/readme-img/ログイン.jpg)|
| メールアドレスとパスワードでログインします |

|               各種打刻               |
| :----------------------------------: |
| ![alt text](/readme-img/打刻.jpg) |
| 休憩は何度でも打刻可能です|


|               日付一覧               |
| :----------------------------------: |
| ![alt text](/readme-img/日付一覧.jpg) |
| 複数回休憩した場合,休憩時間は合算されます<br>日付が変わる際に退勤処理がされていない場合,自動で退勤処理がされ翌日の出勤状態となります<br>カレンダーで日付指定が可能です|

|                     ユーザー一覧                |
| :--------------------------------------------: |
|      ![alt text](/readme-img/ユーザー一覧.jpg)      |
| ユーザー名かアドレスで検索が可能です<br>月別勤怠一覧への遷移ができます|

|                    月別一覧                    |
| :--------------------------------------------: |
|       ![alt text](/readme-img/月別一覧.jpg)    |
| ユーザー毎の月別勤怠を一覧表示します |

## 使用技術
・PHP 7.4.9  
・Laravel 8.83.27  
・nginx 1.21.1  
・MySQL 8.0.26

## テーブル設計
![alt text](/readme-img/table1.jpg)
![alt text](/readme-img/table2.jpg)
![alt text](/readme-img/table3.jpg)

## ER図
![alt text](/readme-img/er.jpg)

## 環境構築

**Dockerビルド**
1. `git@github.com:yasuhito-kitai/kitai_beginner_mock-case.git`
2. DockerDesktopアプリを立ち上げる
3. `docker-compose up -d --build`

**Laravel環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. `cp .env.sample .env` 新しく.envファイルを作成。(または、「.env.example」ファイルを 「.env」ファイルに命名を変更。)
4. .envに以下の環境変数を追加
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
~
MAIL_FROM_ADDRESS=info@example.com
```
1. アプリケーションキーの作成
``` bash
php artisan key:generate
```

1. マイグレーションの実行
``` bash
php artisan migrate
```
## URL
- 開発環境：http://localhost/
- phpMyAdmin:：http://localhost:8080/
- mailhog::http://localhost:8025/