<?php

namespace SocialNet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;
use SocialNet\User;

class DataTableController extends Controller
{    
    public function datatable()
    {
        return view('datatable');
    }

    public function getPosts()
    {
        return \DataTables::of(User::query())->make(true);
    }
}