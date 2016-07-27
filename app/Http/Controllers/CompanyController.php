<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Company;

use Illuminate\Support\Facades\Redirect;

use DB;


class CompanyController extends Controller
{

    public function index(){

      return view('dizayn.companypage');

    }

    public function login(){
      if(auth()->guard('')->user() or auth()->guard('company')->user() ){

                return view('dizayn.index');
      }

      return view('/login');



    }

    public function postLogin(Request $request){


      $onoff = DB::table('companies')->select('onoff')->where('email', '=', $request->email)->get();
      //$onoff = Company::where('onoff', '1');


      $validator = validator($request->all(),[

            'email' => 'required|min:3',
            'password' => 'required|min:3',


        ]);
            if($validator->fails() )
            {

              return redirect('/login');

            }

            $melumatlar = ['email'=>$request->get('email'),'password'=>$request->get('password')];



            if($onoff[0]->onoff ==1 ){

              if(auth()->guard('company')->attempt($melumatlar))
              {


                return redirect('/');

              }else{

                  return redirect('/login');

              }

            }else{

                return redirect('/login');
            }





    }

    public function logout ()
    {
          auth()->guard('company')->logout();
          return back();

    }

    protected function validator(Request $request)
    {
        $validator = validator($request->all(),[
            'founderName' => 'required|max:255',
            'founderSurname' => 'required|max:255',
            'companyName' => 'required|max:255|unique:company',
            'companyDate' => 'required',
            'companyAbout' => 'required|max:255',
            'email' => 'required|email|max:255|unique:company',
            'password' => 'required|min:6',
        ]);
    }


    protected function addComp(Request $request)
    {
        Company::create([
            'founderName' => $request['founderName'],
            'founderSurname' => $request['founderSurname'],
            'companyName' => $request['companyName'],
            'companyDate' => $request['companyDate'],
            'companyAbout' => $request['companyAbout'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);


      return  Redirect::to('/companyreg')->with('message', 'Siz qeydiyyatdan keçdiniz,adminstrasiya tərəfindən yoxlanışdan sonra sizə bildiri. gelecek');
    }
    public function tours(Company $company)
    {
      
      return view('auth.tours')->with('company',$company);
    }


}
