<?php

namespace SocialNet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;
use PDF;
use SocialNet\User;
use DB;
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
    public function downloadPDF($id){
      $user = User::find($id);
     
      $pdf = PDF::loadView('datatablepdf', compact('user'));
      return $pdf->download('data.pdf');

    }
    public function updateuser(Request $request){
        
      DB::table('users')
        ->where('id', $request->userid)  // find your user by their email
        ->update(array('name' => $request->username,'email' => $request->email,'password' => $request->password));  
    // return response()->json(['success'=>'Data is successfully added']);
      }
}