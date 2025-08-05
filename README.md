## 初期環境構築後

① QRトークン用モデル＆マイグレーション

PHPをインストールするところから始めた

ユーザーごとにQRコードを発行しておくためのテーブル<br>
`php artisan make:model QrToken -m`

```
Schema::create('qr_tokens', function (Blueprint $table) {
    $table->id();
    $table->uuid('token')->unique();       // QRに埋め込む用 (推測されにくいUUID)
    $table->foreignId('user_id')          // 誰のQRか
          ->constrained()
          ->onDelete('cascade');
    $table->timestamps();
});
```
```
┌──────────────┐            ┌──────────────┐
│   users      │            │   stores     │
├──────────────┤            ├──────────────┤
│ id           │◄────────┐  │ id           │
│ name         │         │  │ name         │
│ email        │         │  │ ...          │
│ password     │         │  └──────────────┘
│ qr_uuid      │         │
│ exp          │         │
│ ...          │         │
└──────────────┘         │
                         │
                         │
         ┌──────────────▼─────────────┐
         │        visit_logs           │
         ├─────────────────────────────┤
         │ id                          │
         │ user_id     (FK → users.id) │
         │ store_id    (FK → stores.id)│
         │ visited_at                  │
         └─────────────────────────────┘
```
