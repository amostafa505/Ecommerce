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
        Schema::table('admins', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('brand')->nullable();
            $table->string('category')->nullable();
            $table->string('product')->nullable();
            $table->string('slider')->nullable();
            $table->string('coupon')->nullable();
            $table->string('shippingarea')->nullable();
            $table->string('orders')->nullable();
            $table->string('report')->nullable();
            $table->string('allusers')->nullable();
            $table->string('blog')->nullable();
            $table->string('site')->nullable();
            $table->string('review')->nullable();
            $table->string('adminuserrole')->nullable();
            $table->integer('type')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('brand');
            $table->dropColumn('category');
            $table->dropColumn('product');
            $table->dropColumn('slider');
            $table->dropColumn('coupon');
            $table->dropColumn('shippingarea');
            $table->dropColumn('orders');
            $table->dropColumn('report');
            $table->dropColumn('allusers');
            $table->dropColumn('blog');
            $table->dropColumn('site');
            $table->dropColumn('review');
            $table->dropColumn('adminuserrole');
            $table->dropColumn('type');
        });
    }
};
