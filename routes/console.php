<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('mci:status', function () {
    $this->info('Bharatiya Swatantra Shikshan Sangh application is ready.');
})->purpose('Check the MCI application console');
