<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{

    public function prodmasterlist(Request $request){
        $productlist = $request->session()->get('product',[]);
        $search = $request->input('search');
            if (!empty($search)) {
                $filtered = [];
                foreach ($productlist as $product) {
                    if (strpos(strtolower($product['name']), strtolower($search)) !== false ) {
                        $filtered[] = $product;
                    }
                }

                $productlist = $filtered;
            }

            return view('ProductInfo', compact('productlist'));
    }

    public function addProduct(Request $request){
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'categ'=>'required',
            'qty'=>'required',
            'price'=>'required'
        ]);

        $productlist = $request->session()->get('product',[]);

        $productlist[] = [
            'id'=>$request->id,
            'name'=>$request->name,
            'categ'=>$request->categ,
            'qty'=>$request->qty,
            'price'=>$request->price
        ];

        $request->session()->put('product',$productlist);

        return redirect()->route('product.list');
    }

    public function editProduct(Request $request, $index){
        $productlist = $request->session()->get('product',[]);
        if (!isset($productlist[$index])){
            return redirect()->route('product.list');
        }
        $product = $productlist[$index];

        return view('ProductInfoEdit', compact('product','index'));
    }

    public function updateProduct(Request $request, $index){
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'categ'=>'required',
            'qty'=>'required',
            'price'=>'required'
        ]);

        $productlist = $request->session()->get('product',[]);

        if (isset($productlist[$index])){
            $productlist[$index] = [
                'id'=>$request->id,
                'name'=>$request->name,
                'categ'=>$request->categ,
                'qty'=>$request->qty,
                'price'=>$request->price
            ];

            $request->session()->put('product', $productlist);
        }


        return redirect()->route('product.list')->with('success', 'Product updated successfully.');
    }   

    public function deleteProduct(Request $request, $index){
        $productlist = $request->session()->get('product',[]);

        if (isset($productlist[$index])){
            unset($productlist[$index]);
            $request->session()->put('product', array_values($productlist));
        }

        return redirect()->route('product.list')->with('success', 'Product deleted successfully.');
    }
}

?>