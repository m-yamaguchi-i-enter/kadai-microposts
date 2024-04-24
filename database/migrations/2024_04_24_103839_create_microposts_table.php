<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
    {
        Schema::create('microposts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('content');
            $table->timestamps();
            
            // unsignedBigIntegerは「0~18446744073709551615」までの値を
            // 格納できるデータ型のことで、言い換えると「符号なしBIGINTカラム」
            // 外部キーのデータ型に使われる

            // 外部キー制約(user_idはusersテーブルのidを参照)
            // $table->foreign(外部キー制約を設定するカラム名)->references(参照されるカラム名)->on(参照されるテーブル名);
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microposts');
    }
};
