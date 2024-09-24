<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_faqs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->dropColumn('faq_type_id'); // Remove the old integer column
            $table->string('faq_type')->nullable(); // Add the new string column
            $table->string('display_name');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}
