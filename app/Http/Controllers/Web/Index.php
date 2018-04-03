<?php

namespace App\Http\Controllers\Web;

use Illuminate\Routing\Controller as BaseController;
use DB;
use libs\neteaseim\NeteaseCloud;

class Index extends BaseController
{
    public function index()
    {

        $nim_config = config('app.netnease');
        return view('index.index')->with('appkey',$nim_config['App_key']);
    }

    public function main()
    {
        return view('index.main');
    }
}
