<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Image::all();
        return response()->json($data);
    }
    protected function saveImgBase64($param)
    {
        list($extension, $content) = explode(';', $param);
        $tmpExtension = explode('/', $extension);
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
        $content = explode(',', $content)[1];
        $storage = Storage::disk('public');
        $storage->put($fileName, base64_decode($content));
        return $fileName;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
      
        if ($request->has('front')) {
            $front = $this->saveImgBase64($request->front);
            $request->merge(['front' => $front]);
        };
        if($request->has('back')){
            $back = $this->saveImgBase64($request->back);
            $request->merge(['back' => $back]);
        };

        $color[] = $request->input('color');
        $size[] = $request->input('size');
        foreach($color as $item){
            foreach($size as $item2){
                $Image = new Image();
                $Image ->name = $request->input('name');
                $Image ->front = $front;
                $Image ->parent_id = 1;
                $Image ->back = $back;
                $Image ->description = $request->input('description');
                $Image ->price = $request->input('price');
                $Image ->sku= 'name'.rand(10,10000);
                $Image ->color = $item;
                $Image ->size = $item2;
                $Image ->price = $request->input('price');
                $Image ->save();
            }
        }
        
             return Response()->json([
             "success" => true,
              ]);   
    }
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);
        return response()->json($image);
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
    public function delete(Request $request, $id)
    {
        $data = Image::find($id);
        $data->delete();
        return response()->json(null,204);
    }
    
}

