<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKMvouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KMvouchers', function (Blueprint $table) {
            // php artisan make:migration create_vouchers_table --create=vouchers
            $table->bigInteger('km_id')->unsigned();
            $table->foreign('km_id')->references('km_id')->on('khuyenmai')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('vc_id')->unsigned();
            $table->foreign('vc_id')->references('vc_id')->on('vouchers')->onDelete('CASCADE')->onUpdate('CASCADE');;
            $table->integer('kmvc_giatri');
            $table->integer('kmvc_soluong');

            // tạo khóa chính
            $table->primary(['km_id','vc_id']);
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
        Schema::dropIfExists('KMvouchers');
    }
}
