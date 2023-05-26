<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateEmoticonItemTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emoticon_item', function (Blueprint $table) {
            $table->unsignedInteger('id', true)->comment('表情包详情ID');
            $table->unsignedInteger('emoticon_id')->default(0)->comment('表情分组ID');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID（0：代码系统表情包）');
            $table->string('describe', 20)->default('')->comment('表情描述');
            $table->string('url', 255)->default('')->comment('图片链接');
            $table->string('file_suffix', 10)->default('')->comment('文件后缀名');
            $table->unsignedBigInteger('file_size')->default(0)->comment('文件大小（单位字节）');
            $table->dateTime('created_at')->nullable()->comment('创建时间');
            $table->dateTime('updated_at')->nullable()->comment('更新时间');

            $table->charset   = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->comment('表情包详情表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emoticon_item');
    }
}
