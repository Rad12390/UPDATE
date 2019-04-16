<?php

namespace SocialNet\Http\Controllers;
use SocialNet\User;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;
       
class HomeformsController extends Controller
{
public function index()
    {
        return view('homeform');
    }

public function homeforms()
    {
    	return \DataTables::of(User::query())->make(true);
      /*//  $ Users::all();   $users =  User::all();
          $Datatables =  Datatables::of(User::query())->make(true);
         return view('homeform', compact('Datatables'));*/
    }

public function downloadPDF($id){
      $user = UserDetail::find($id);

      $pdf = PDF::loadView('pdf', compact('user'));
      return $pdf->download('data.pdf');

    }
}
