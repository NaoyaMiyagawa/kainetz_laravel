<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Initial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Users ユーザー
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('name')->comment('ユーザー名');
            $table->text('password')->comment('パスワード'); // FSSO認証回避
            $table->rememberToken()->comment('Rememberトークン');
            $table->integer('employee_code')->unique()->comment('社員番号');
            $table->boolean('admin_flg')->default(false)->comment('管理者フラグ');
            $table->boolean('retire_flg')->default(false)->comment('退職フラグ');

            $table->softDeletes();
            $table->timestamps();
        });

        /**
         * AccountTitles 勘定科目
         */
        Schema::create('account_titles', function (Blueprint $table) {
            $table->id();
            $table->text('name')->comment('勘定科目名');
            $table->integer('account_code')->comment('仕分けコード');
            $table->integer('form_group')->comment('様式グループ');
            $table->integer('display_order')->comment('表示順');
            $table->boolean('user_permission_flg')->default(false)->comment('ユーザー選択権限フラグ');
            $table->boolean('admin_permission_flg')->default(false)->comment('管理者選択権限フラグ');

            $table->softDeletes();
            $table->timestamps();
        });

        /**
         * Transports 交通手段
         */
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->text('name')->comment('交通手段名');
            $table->foreignId('account_title_id')->comment('勘定科目ID');
            $table->integer('display_order')->comment('表示順');
            $table->boolean('user_permission_flg')->default(false)->comment('ユーザー選択権限フラグ');
            $table->boolean('admin_permission_flg')->default(false)->comment('管理者選択権限フラグ');

            $table->softDeletes();
            $table->timestamps();
        });

        /**
         * TargetMonths 対象月
         */
        Schema::create('target_months', function (Blueprint $table) {
            $table->id();
            $table->year('year')->comment('対象年');
            $table->integer('month')->comment('対象月');
            $table->boolean('year_end_flg')->default(false)->comment('期末フラグ');
            $table->boolean('announce_flg')->default(false)->comment('通知フラグ');
            $table->date('closed_date')->nullable()->comment('締め日');
            $table->integer('status')->comment('対象月状態');

            $table->softDeletes();
            $table->timestamps();
        });

        /**
         * Applications 申請
         */
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('ユーザーID');
            $table->foreignId('target_month_id')->constrained()->comment('対象月ID');
            $table->date('used_date')->comment('使用日');
            $table->date('submitted_date')->comment('申請日');
            $table->foreignId('account_title_id')->constrained()->comment('勘定科目ID');
            $table->text('project_visit')->nullable()->comment('案件／訪問先');
            $table->foreignId('transport_id')->nullable()->comment('交通手段ID');
            $table->text('departure')->nullable()->comment('出発地');
            $table->text('destination')->nullable()->comment('目的地');
            $table->boolean('roundtrip_flg')->default(false)->comment('往復フラグ');
            $table->text('project_client')->nullable()->comment('案件／相手／人数');
            $table->text('payee')->nullable()->comment('支払先');
            $table->text('purpose_content')->nullable()->comment('目的／内容');
            $table->text('description')->nullable()->comment('摘要');
            $table->integer('price')->comment('金額');
            $table->integer('total_price')->comment('合計金額');
            $table->text('comment')->nullable()->comment('備考');
            $table->integer('status')->comment('申請状態');
            $table->text('return_message')->nullable()->comment('差戻メッセージ');
            $table->boolean('confirm_flg')->default(false)->comment('確認フラグ');
            $table->boolean('admin_submit_flg')->default(false)->comment('管理者申請フラグ');

            $table->softDeletes();
            $table->timestamps();

            $table->index(['user_id', 'target_month_id']);
        });

        /**
         * ClosingNotificationSettings 締め&通知日設定
         */
        Schema::create('closing_notification_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('month')->comment('対象月');
            $table->integer('closing_date')->nullable()->comment('締め日');
            $table->integer('notification_date')->nullable()->comment('通知日');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('account_titles');
        Schema::dropIfExists('transports');
        Schema::dropIfExists('target_months');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('closing_notification_settings');
    }
}
