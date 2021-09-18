<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function (Request $r) {
    $podatekDochodowy = 0.2;
    $kwotaWolnaOdPodatku = 5000;
    $dodatekVotujacy = 1000;
    $wysokiPodatek = 100000;

    $metoda = $r->post('metoda');
    $dochod = (float)$r->post('dochod');

    if (!is_numeric($r->post('dochod')) || $dochod < 0) {
        throw new Exception('Zly dochód');
    }

    $tax = 0.0;

    if ($metoda === 'one') {
        $kwotaDoOpodatkowania = $dochod;
    }

    if ($metoda === 'two') {
        $kwotaDoOpodatkowania = $dochod - $kwotaWolnaOdPodatku;

        if ($kwotaDoOpodatkowania < 0) {
            $kwotaDoOpodatkowania = 0;
        }

        if ($dochod >= $wysokiPodatek) {
            $podatekDochodowy *= 2;
        }
    }

    if ($kwotaDoOpodatkowania <= 0) {
        if ($dochod <= 2000) {
            $tax -= $dodatekVotujacy;
        }
    } else {
        $tax = $podatekDochodowy * $kwotaDoOpodatkowania;
    }

    return view('welcome', [
        'tax' => $tax,
        'metoda' => $metoda,
        'dochod' => $dochod
    ]);
});
