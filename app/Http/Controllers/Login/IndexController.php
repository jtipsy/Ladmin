<?php
namespace App\Http\Controllers\Login;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use UserRepository;
use Auth;


class IndexController extends Controller
{
    /**
     * datatable 多语言
     * 
     * @itas
     * @DateTime 2016-09-07
     * @return   [type]     [description]
     */
    public function dataTableI18n()
    {
        return trans('pagination.i18n');
    }
}
