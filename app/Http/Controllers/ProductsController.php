<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Kategori;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportProduk;
use Validator;
use Image;


class ProductsController extends Controller
{
     public function index(Request $request)
    {
        $kategori = Kategori::all();

        return view('produk', compact('kategori'));
    }

    public function data(Request $request)
    {
        $user = Auth::user();

        if ($request->kategori == "all") {
            
            $product = Products::select('products.*', 'kategori.name as kategori')
                ->leftJoin('kategori', 'products.kategori_id', '=', 'kategori.id')
                ->get();
        }else{

            $product = Products::select('products.*', 'kategori.name as kategori')
                ->leftJoin('kategori', 'products.kategori_id', '=', 'kategori.id')
                ->where('products.kategori_id', $request->kategori)
                ->get();

        }

        return Datatables::of($product)->make(true);
    }

    public function tambah(Request $request)
    {

        date_default_timezone_set('Asia/Jakarta');

        $savedetail = new Products();
        $savedetail->name = $request->nama;
        $savedetail->kategori_id = $request->kategori_id;
        $savedetail->harga_beli = $request->harga_beli;
        $savedetail->harga_jual = $request->harga_jual;
        $savedetail->stok = $request->stok;
        $savedetail->gambar = $request->gambar;
        $savedetail->save();

        $data = '1';

        return response()->json($data);
    }

    public function hapus(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $prod = Products::where('id', $request->id)
            ->delete();

        return response()->json($prod);
    }

   public function excel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        //dd($request->kategori_id);
        
       return (new ExportProduk())->download('DataProduk'.date('dMYHis').'.xlsx');
    }

    public function upload(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $user = Auth::user();

        $validation = Validator::make($request->all(), [
            'file' => 'mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp',
        ]);

        if($validation->passes()) {

            $image = $request->file('file');
            $input['imagename'] = rand() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('assets/gambar');

            $img = Image::make($image->getRealPath());
            $img->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            return response()->json([
                'message'  => 'Upload Anda Tersimpan',
                'icon' => 'success',
                'name' => $input['imagename'],
                'status' => '1',
            ]);

        } else {

            return response()->json([
                'message' => $validation->errors()->all(),
                'icon' => 'error',
                'status' => '0',
            ]);
        }
    }
}
