<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Support\Facades\Storage;
// use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Http;
use App\Models\color;
use App\Models\size;

class ProductController extends Controller
{

    protected function saveImgBase64($param, $folder)
    {
        list($extension, $content) = explode(';', $param);
        $tmpExtension = explode('/', $extension);
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
        $content = explode(',', $content)[1];
        $storage = Storage::disk('local');

        $checkDirectory = $storage->exists($folder);

        if (!$checkDirectory) {
            $storage->makeDirectory($folder);
        }

        $storage->put($folder . '/' . $fileName, base64_decode($content), 'public');

        return $fileName;
    }
    public function index()
    {
        // $img = imgEdited::all();
        $data = Product::all();
        $countColor = color::count();
        $countSize = size::count();
        return view('client.product.index', compact('data', 'countColor', 'countSize'));
    }
    public function create()
    {


        return view('client.product.create', compact('dataColor', 'dataSize'));
    }
    public function categories()
    {
        return view('client.category.index');
    }

    //==========================================================================
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->has('before') && $request->has('after')) {
            $file_before = $request->before;
            $ext = $request->before->extension();
            $file_name = time() . '-' . 'product_before' . '.' . $ext;
            $file_before->move(public_path('uploads/product'), $file_name);
            //
            $file_after = $request->after;
            $ext = $request->after->extension();
            $file_names = time() . '-' . 'product_after' . '.' . $ext;
            $file_after->move(public_path('uploads/product'), $file_names);

            $request->merge(['image_before' => $file_name]);
            $request->merge(['image_after' => $file_names]);
        }


        Product::create($request->all());
        $newProduct =  Product::latest('id')->first();
            $sku = new Sku;
            $sku->productid = $newProduct->id;
            $sku->sku = $request->sku; 
            $sku->save();
        
        $tblSku = Sku::all();
        foreach ($tblSku as $key => $value) {
            if(isset($value->sku) || $value->sku != $request->sku){
                $skuProduct = Sku::where('sku',$request->sku)->first();
                $updateProductdefault = Product::find($skuProduct->productid);
                $updateProductdefault->default = 1;
                $updateProductdefault->save();
            }
        }



        return redirect()->route('san-pham')->with('success', 'Thêm thành công');
    }
    //==========================================================================
    public function edit($id)
    {
        $colorDetail = color::all();
        $sizeDetail = size::all();
        $data = Product::find($id);
        return view('client.editimg', compact('data', 'colorDetail', 'sizeDetail'));
    }
    //==========================================================================
    public function update(Request $request, $id)
    {
    }
    //==========================================================================
    public function media()
    {
        return view('');
    }

    //==========================================================================

    public function delete($id)
    {
        $delete = Http::post("https://phamxuanduc.000webhostapp.com/api/image/delete/" . $id);
        return redirect()->route('mystore');
    }

    //==========================================================================

    public function postWp(Request $request)
    {
        dd($request->all());
    }

    //==========================================================================
    public function creates(Request $request)
    {
        return view('client.product.creates');
    }
    //==========================================================================
    public function createAddColor(Request $request)
    {
        // dd($request->all());
        color::create($request->all());
        return back();
        // redirect()->route('san-pham')->with('success', 'Thêm thành công');
    }
    //==========================================================================
    public function productdetail($id)
    {
        $colorDetail = color::all();
        $sizeDetail = size::all();
        $productDetail = Product::find($id);
        return view('client.product.detailProduct', compact('productDetail', 'colorDetail', 'sizeDetail'));
    }
    //==========================================================================
    public function setting()
    {
        return view('client.set.setting');
    }
}
