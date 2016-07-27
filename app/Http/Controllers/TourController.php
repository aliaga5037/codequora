<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Company;

use App\Tour;

use Image;

use Illuminate\Http\UploadedFile;

use Carbon\Carbon;

use Input;



class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $id)
    {

      return view('auth.tours')->with('company',$id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('tours.touradd')->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {

          $comp = Company::findOrFail($id);
          $tour = new Tour;


          $unwanted_array = array(' ' => '-', 'Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
          'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
          'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
          'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
          'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Ğ' => 'G',
          'ğ' => 'g', 'Ü' => 'U', 'ü' => 'u', 'Ş' => 'Sh', 'ş' => 'sh', 'ı' => 'i', 'Ə' => 'E', 'ə' => 'e', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO',
          'Ж' => 'ZH', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S',
          'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E',
          'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z',
          'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
          'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', '"' => "1",'/'=>"", ':'=>'-','?'=>'1');

            $latinad = strtolower(strtr($request['tourName'], $unwanted_array));

            $datetime1 = new Carbon($request->start);
            $datetime2 = new Carbon($request->end);
            $interval = $datetime1->diff($datetime2)->format('%a');
            $down = array(


              'tourName' => $request['tourName'],
              'start' => $request['start'],
              'end' => $request['end'],
              'country' => $request['country'],
              'price' => $request['price'],
              'flyPoint' => $request['flyPoint'],
              'about' => $request['about'],
              'days' => $interval,
              'latin' => $latinad,
              'hotel' => $request['hotel'],

            );





            $comp->tours()->create($down);

            $tur = Tour::find($comp->tours->last()->id);

            if ($request->hasFile('image')) {

            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalName();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/images/'.$filename));

                $image =  $tur->photos()->create([
                    'file_name' => $filename,
                    'file_size' => $avatar->getClientSize(),
                    'file_mime' => $avatar->getClientMimeType(),
                    'file_path' => '/uploads/images/'.$filename,
                    'tour_id' => $tur->id,
                    'company_id' => auth()->guard('company')->user()->id

                ]);
          }
               return redirect("/$id/tours");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$tourId)
    {
        $tour = Tour::findOrFail($tourId);
        return view('tours.touredit')->with('tour',$tour);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$tourId)
    {

        $tour = Tour::findOrFail($tourId);
        $tour->update($request->all());

        return redirect("/$id/tours");

    }

    //dssdfds
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($compid ,$tourId)
    {

        $id = Tour::findOrFail($tourId);
        if ($id->company_id == $compid) {

           $id->delete();
           return back();
        }
        return back();
    }
}
