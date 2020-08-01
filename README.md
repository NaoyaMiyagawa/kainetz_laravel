# Kainetz (Laravel)

## Requirements

- Docker 19.*
- Docker Compose 1.25.*
- PHP:7.4.*

## Build Local Development

```bash
git clone git@github.com:NaoyaMiyagawa/kainetz_laravel.git
cd kainetz_laravel

cp .env.example .env
vim .env

bin/compose up

bin/compose exec web composer install
bin/compose exec web php artisan key:generate
bin/compose init-db

yarn install
```

## Dev Tips

### Reset DB

```bash
bin/compose init-db
```

### Seeds

| ロール   | ID     | PW     |
| -------- | ------ | ------ |
| 管理者   | admin  | admin  |
| ユーザー | user01 | user01 |
| ユーザー | user02 | user02 |


## URLs

| Prefix         | URL                                | Name                       | Comment                |
| -------------- | ---------------------------------- | -------------------------- | ---------------------- |
| 【共通】       |                                    |                            |                        |
|                | /login                             | login                      | ログイン画面           |
| 【ユーザー側】 |                                    |                            |                        |
|                | /dashboard                         | dashboard                  | ダッシュボード         |
|                | /target-months/{id}                | target-month               | 対象月                 |
|                | /applications/apply                | application.apply          | 申請 - 登録            |
|                | /applications/edit/{id}            | application.edit           | 申請 - 編集            |
|                | /applications/reapply/{id}         | application.reapply        | 申請 - 再申請          |
| 【管理側】     |                                    |                            |                        |
| admin          | /dashboard                         | admin.dashboard            | ダッシュボード         |
| admin          | /target-months/{id}                | admin.target-month         | 対象月                 |
| admin          | /applications/apply                | admin.application.apply    | 申請 - 登録            |
| admin          | /applications/edit/{id}            | admin.application.edit     | 申請 - 編集            |
| admin          | /applications/return/{id}          | admin.application.return   | 申請 - 差し戻し        |
| admin          | /settings/target-months            | admin.target-month         | 設定 - 対象月          |
| admin          | /settings/target-months/edit/{id}  | admin.target-month         | 設定 - 対象月 - 編集   |
| admin          | /settings/account-titles           | admin.account-title        | 設定 - 勘定科目        |
| admin          | /settings/account-titles/create    | admin.account-title.create | 設定 - 勘定科目 - 登録 |
| admin          | /settings/account-titles/edit/{id} | admin.account-title.edit   | 設定 - 勘定科目 - 編集 |
| admin          | /settings/transports               | admin.transports           | 設定 - 交通手段        |
| admin          | /settings/transports/create        | admin.transports.create    | 設定 - 交通手段 - 登録 |
| admin          | /settings/transports/edit/{id}     | admin.transports.edit      | 設定 - 交通手段 - 編集 |
| admin          | /settings/target-months            | admin.target-month         | 設定 - 対象月          |
| admin          | /settings/target-months/edit/{id}  | admin.target-month.edit    | 設定 - 対象月 - 編集   |
