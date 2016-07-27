<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Company;

use App\Tour;

use App\Basket;

use DB;

use Carbon\Carbon;

class linksController extends Controller
{
      public function tourlink($link){
                if(auth()->guard('')->user() or auth()->guard('company')->user() or auth()->guard('')->guest()){

                  $tourlink = Tour::where(['latin'=> $link , 'onoff' => 1])->first();
                  $photos = $tourlink->photos->all();

                  $a = $tourlink->start;
                  $b = $tourlink->end;

                  // $originalDate = $vaxt;
                  // $newDate = date("F j, Y,", strtotime($originalDate));
                  setlocale(LC_TIME, 'az_AZ');
                  $vaxt= Carbon::parse($a)->formatLocalized('%A %d %B %Y');
                  $vaxtdan= Carbon::parse($b)->formatLocalized('%A %d %B %Y');




                    $turBasket = Tour::with('Basket')->get();




                                  return view('dizayn.xeberardi', compact('tourlink','photos','turBasket','vaxt','vaxtdan'));
                }

        }

        public function tourindex(){

          if(auth()->guard('')->user() or auth()->guard('company')->user() or auth()->guard('')->guest()){

            $tourindex = Tour::where('onoff' , 1)->orderBy('id', 'desc')->paginate(12);
             $slide = Tour::orderBy('id', 'desc')->limit(5)->get();
                            return view('dizayn.index', compact('tourindex' , 'slide'));
          }

        }


        public function addtobasket(Request $request,$tourid,$userid){

              $tap = Tour::find($tourid);




              $saxla =   $tap->basket()->create([

                      'tour_id' => $tourid,
                      'user_id' => $userid,

                  ]);



              return back()->with('saxla',$saxla);

        }


        public function tourbuy(){

              $buy = Tour::with('Basket')->get();

            return view('tours.tourbuy',compact('buy'));

        }

        public function tourdel($id){

              $del = Basket::find($id);

              $del->delete();

            return back();

        }



        // public function test(){
        //
        //
        //     $all = Tour::select('start')->where('id','=',22)->get();
        //
        //     //$all->start;
        //
        //
        //
        //     //dd($interval->format('%d'));
        //
        //     return view('dizayn.test',compact('a'));
        //
        //
        // }










}
