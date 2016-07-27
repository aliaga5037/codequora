<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Company;
use Mail;

use App\Tour;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
      return view('admin.admin');
    }

    public function login()
    {
      if(auth()->guard('admin')->user() or auth()->guard('')->user() or auth()->guard('company')->user() ){

            return redirect('/');

      }

      return view('auth.adminlog');
    }

    public function postLogin(Request $request)
    {


      $validator = validator($request->all(),[

            'email' => 'required|min:3',
            'password' => 'required|min:3',


        ]);
            if($validator->fails() )
            {

              return redirect('/admin/adminlog');

            }

            $melumatlar = ['email'=>$request->get('email'),'password'=>$request->get('password')];

            if(auth()->guard('admin')->attempt($melumatlar))
            {

              return view('admin.admin');

            }else{

                return redirect('/admin/adminlog');

            }
    }


    public function logout ()
    {
          auth()->guard('admin')->logout();
          return redirect('admin/adminlog');

    }


    public function companyList(){

      $companyList = Company::paginate(10);


      return view('admin.companylist',compact('companyList'));

    }


    public function companyListPost(Request $request,$id){




            $data = $request->input();
            $sirket = Company::find($id);
            $sirketMail = $sirket->email;

            $sirket ->onoff = 1;

            $sirket ->save();

              Mail::send('mail',[],function($mail) use($sirketMail) {

                $mail->to($sirketMail)->subject('tesdiqlendi');
              });




            return redirect('admin/companylist');

    }

    public function tours($id)
    {

      $company = Company::findOrFail($id);
      $tour = $company->tours;

      return view('admin.turs',compact('company','tour'));
    }
}
