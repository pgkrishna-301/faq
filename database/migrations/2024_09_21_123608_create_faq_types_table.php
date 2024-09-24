<?php
/// database/migrations/xxxx_xx_xx_xxxxxx_create_faq_types_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTypesTable extends Migration
{
    public function up()
    {
        Schema::create('faq_types', function (Blueprint $table) {
            $table->id();
            $table->string('display_name')->nullable(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_types');
    }
}
