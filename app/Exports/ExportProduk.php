<?php

namespace App\Exports;

use App\Models\Products;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportProduk implements FromView
{
    use Exportable;

    /*private $kategori;

    public function __construct($kategori)
    {
        $this->kategori = $kategori;
    }*/

    public function view(): View
    {
        $product = Products::select('products.*', 'kategori.name as kategori')
                ->leftJoin('kategori', 'products.kategori_id', '=', 'kategori.id')
                ->get();

        return view('excel', ['product' => $product]);
    }
}
