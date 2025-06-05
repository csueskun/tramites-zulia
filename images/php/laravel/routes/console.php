<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('dev:hash {value}', function ($value) {
    $hashedValue = Hash::make($value);
    $this->comment("Hash: $hashedValue");
})->purpose('Hash the given value');
