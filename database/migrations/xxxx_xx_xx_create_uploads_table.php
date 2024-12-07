<?php
public function up()
{
    Schema::create('uploads', function (Blueprint $table) {
        $table->id();
        $table->string('file_name')->unique();
        $table->timestamps();
    });
}
?>