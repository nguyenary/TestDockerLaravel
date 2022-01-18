<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function show(): string
    {
        return 'Trang chu Nguyen';
    }

    public function test(): string
    {
        return 'test';
    }
}
