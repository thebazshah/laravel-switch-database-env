<?php

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $this->createArticlesTable($table);
        });
        Schema::create('dev_articles', function (Blueprint $table) {
            $this->createArticlesTable($table);
        });
        Schema::create('comments', function (Blueprint $table) {
            $this->createCommentsTable($table);
        });
        Schema::create('dev_comments', function (Blueprint $table) {
            $this->createCommentsTable($table);
        });
        Schema::create('tags', function (Blueprint $table) {
            $this->createTagsTable($table);
        });
        Schema::create('dev_tags', function (Blueprint $table) {
            $this->createTagsTable($table);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('current_env')->default('prod');
        });
    }

    public function createArticlesTable(Blueprint $table)
    {
        $table->id();
        $table->string('title');
        $table->string('text');
        $table->foreignIdFor(User::class, 'userId');
        $table->timestamps();
    }

    public function createCommentsTable(Blueprint $table)
    {
        $table->id();
        $table->string('text');
        $table->foreignIdFor(Article::class, 'articleId');
        $table->timestamps();
    }

    public function createTagsTable(Blueprint $table)
    {
        $table->id();
        $table->string('title');
        $table->foreignIdFor(Article::class, 'articleId');
        $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dev_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('dev_comments');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('dev_articles');
        Schema::dropIfExists('articles');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('current_env');
        });
    }
};
