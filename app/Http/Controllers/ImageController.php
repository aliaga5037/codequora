<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tour;

use App\Photo;

use Image;

use Validator;

use Illuminate\Http\UploadedFile;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $tour = Tour::findOrFail($id);
       return view('tours.images')->with('tour',$tour);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tour = Tour::findOrFail($id);
       return view('tours.imageadd')->with('tour',$tour);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        // $rules = array(
        //     'image' => 'required | mimes:jpeg,jpg,png | max:1000',
        // );

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     dd($validator);
        //     return back()
        //         ->withErrors($validator)
        //         ->withInput();

        // }

        $tour = Tour::findOrFail($id);

        if ($request->hasFile('image')) {

            $avatar = $request->file('image');
            for ($i=0; $i < count($avatar); $i++) {
            $filename = time() . '.' . $avatar[$i]->getClientOriginalName();
            Image::make($avatar[$i])->resize(300,300)->save(public_path('/uploads/images/'.$filename));

                $image =  $tour->photos()->create([
                    'file_name' => $filename,
                    'file_size' => $avatar[$i]->getClientSize(),
                    'file_mime' => $avatar[$i]->getClientMimeType(),
                    'file_path' => '/uploads/images/'.$filename,
                    'tour_id' => $tour->id,
                    'company_id' => auth()->guard('company')->user()->id

                ]);
            }

            return redirect("/$tour->id/images");
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , $imgId)
    {

        $photo = Photo::findOrFail($imgId);
        if (auth()->guard('company')->user()->id == $id) {
            $photo->delete();
            return back();
        }

        return back();
    }
}
