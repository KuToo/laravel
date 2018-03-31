<?php

namespace App\Http\Controllers\Web;

use Illuminate\Routing\Controller as BaseController;


class Index extends BaseController
{
    public function index()
    {
        return view('index.index');
    }

    public function main()
    {
        return view('index.main');
    }
}
