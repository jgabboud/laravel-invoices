<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //-- create plans table
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issuer_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('invoice_status_id');
            $table->string('number')->unique();
            $table->date('issue_date');
            $table->json('description')->nullable();
            $table->string('currency', 3);             
            $table->integer('trial_duration')->default(0); #free trial period
            $table->string('trial_duration_type')->default('day');
            $table->integer('package_duration')->default(0); #how a much the subscription lasts
            $table->string('package_duration_type')->default('month');
            $table->integer('subscriptions_limit')->nullable();
            $table->date('issue_date')->nullable();
            $table->integer('sort_order')->default(0);    
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['slug']);
        });      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
