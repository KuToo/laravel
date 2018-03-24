<?php

namespace App\Http\Controllers\Home;

use Illuminate\Routing\Controller as BaseController;


class Index extends BaseController
{
    public function index()
    {
        return view('index.index');
    }
}
