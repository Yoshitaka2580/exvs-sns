# VS-Connect

PlayStation4ソフト「機動戦士ガンダム マキシブーストON」のコミュニティサイトです。<br>
**URL :** https://vs-connect.work/

## アプリ概要

- 相方や仲間の募集する投稿
- 気になった投稿やマッチした投稿をクリップして保存
- 自分の条件に合って参加したい募集にコメントができる
- 気になったユーザーや、今後マッチしたいユーザーをフォロー
- 募集している機体名を検索できる（#ハッシュタグ)

作成した背景など、より詳細な情報は下記からご覧ください。
<br>
[ポートフォリオ( VS-Connect ) 解説 - Qiita](https://qiita.com/yossy2580/private/a22af66ba4d0937e77d3)

## 使用技術

- フロントエンド
  - HTML / CSS / Bootstrap / MDBootstrap
  - Vue.js 2.6.12

- バックエンド
  - PHP 7.3.22
  - Laravel 6.18.36
  - PHPUnit 8.0
  - Google API
  - Facebook API

- インフラ
  - CircleCi 2.1
  - Docker 19.03.12 / docekr-compose 1.27.2
  - nginx 1.12.2
  - PostgreSQL 9.5.19
  - AWS (VPC, EC2, ALB, S3, RDS, CodeDeploy, Chatbot, CloudFormation, RouteS3, EIP, IAM)


- その他ツール
  - draw.io
  - Visual Studio Code
  - Gyazo
  - Slack

## 機能一覧

- ユーザー登録関連
  - 新規登録機能
  - ログイン、ログアウト機能
  - ゲストユーザーログイン機能
  - Facebookログイン機能
  - Googleログイン機能
- 記事投稿関連 (CRUD)
  - 募集投稿の作成、編集、一覧、削除機能
- コメント機能
  - 募集に対してのコメント作成、一覧、削除機能
- ページネーション
  - 募集投稿一覧
- ユーザープロフィール編集機能
  - プロフィール画像
  - 自己紹介文
- パスワード変更機能
- カテゴリー機能
  - 機体コストの作成
  - コストカテゴリーごとの投稿一覧
- タグ機能
  - タグ自動補完機能
  - タグごとの投稿一覧
- フォロー機能
  - フォロー中/フォロワーのユーザー一覧
- 記事保存機能
  - 保存した投稿一覧
- 検索機能
  - タグ検索機能
- PHPUnitテスト

## インフラ構成図

![Untitled Diagram.png](https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/554122/33bc227b-187f-c9fe-aa53-1221439ea429.png)


## DB設計

### ER図

![b19bac3dce173537cfbdc2c85ff7d6ac.png](https://i.gyazo.com/b19bac3dce173537cfbdc2c85ff7d6ac.png)

**URL :** https://i.gyazo.com/b19bac3dce173537cfbdc2c85ff7d6ac.png

### 各テーブルについて

| テーブル名 |                      説明                       |
|:----------:|:-----------------------------------------------:|
|   users    |                登録ユーザー情報                 |
|   posts    |               ユーザーの投稿情報                |
|  follows   | フォロー中/フォロワーのユーザー情報 |
| categories |       ユーザー投稿のコストカテゴリー情報        |
|   likes    |                投稿への保存情報                 |
|    tags    |             ユーザー投稿のタグ情報              |
|  post_tag  |            postsとtagsの中間テーブル            |
|  comments  |          ユーザー投稿へのコメント情報           |

## その他

現在も開発中であり、順次実装予定です。
実装予定機能はissuesよりご確認いただけます。
<br>
[Issues · Yoshitaka2580/exvs-sns · GitHub](https://github.com/Yoshitaka2580/exvs-sns/issues)

## 作者

[Twitter](https://twitter.com/yossy2580)

**メールアドレス :** yoshitakanakashima0528@gmail.com
