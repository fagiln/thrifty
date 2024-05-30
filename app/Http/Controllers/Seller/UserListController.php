<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\user\UserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index(UserDataTable $dataTable){
        return $dataTable->render('seller.userlist');
    }
}
