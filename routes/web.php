
<?php
// routes/web.php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Las rutas de posts se borran de aquí porque ya viven en api.php