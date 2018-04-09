<?php
namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use App\model\User as userModel;

class User extends BaseController
{
    public function getAvatars(Request $request)
    {
        $ids=explode(',',trim($request['ids'],','));
        $avatars=DB::table('users')->where('id', 'in',$ids)->pluck('icon');
        return $avatars;
    }

}