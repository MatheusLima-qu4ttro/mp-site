<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Product extends Controller
{
    public static function productForm(Request $request)
    {
        $categories = DB::table('categories')->get();

        // Converter os resultados em um array associativo com o ID como chave
        $categoriesById = [];
        foreach ($categories as $category) {
            $categoriesById[$category->id] = $category;
            $category->fullName = $category->name; // Inicializa fullName
        }

        // Construir a árvore de nomes
        foreach ($categoriesById as $category) {
            $parentId = $category->parent_id;
            while ($parentId != null) {
                if (isset($categoriesById[$parentId])) {
                    $parent = $categoriesById[$parentId];
                    $category->fullName = $parent->name . ' > ' . $category->fullName;
                    $parentId = $parent->parent_id;
                } else {
                    break; // Encerra o loop se o parent_id não existir no array (evita loop infinito)
                }
            }
        }

        if($request->productId){
            $product = DB::table('products')->where('id', $request->productId)->first();
        }

        return view('admin.product.form', [
            'page' => 'product_form',
            'categories' => $categories,
            'product' => $product ?? null
        ]);
    }

    public static function productCreate(Request $request)
    {
        try{
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id
            ];

            if($request->productId){
                DB::table('products')->where('id', $request->productId)->update($data);
                return Redirect::to('product_form?productId='.$request->productId)->with('success', 'Produto editado com sucesso!');
            }else{
                $productId = DB::table('products')->insertGetId($data);
                return Redirect::to('product_form?productId='.$productId)->with('success', 'Produto criado com sucesso!');
            }

        }catch (\Exception $e) {
            return redirect()->route('product_form')->with('error', 'Erro ao criar produto, Contate o administrador do sistema!');
        }
    }

    public static function productVariantCreate(Request $request)
    {
        try{
            $data = [
                'product_id' => $request->productId,
                'price' => self::decimalSave($request->price),
                'promotional_price' => self::decimalSave($request->promotionalPrice),
                'description' => $request->description,
                'color_name' => $request->colorName,
                'color_code' => $request->colorCode,
                'model' => $request->model,
                'voltage' => $request->voltage,
            ];

            if($request->productId && $request->variantId){
                DB::table('product_variants')->where('id', $request->productId)->update($data);
                return Redirect::to('product_form?productId='.$request->productId)->with('success', 'Variante editada com sucesso!');
            }else{
                $productId = DB::table('product_variants')->insertGetId($data);
                return Redirect::to('product_form?productId='.$productId)->with('success', 'Variante criada com sucesso!');
            }

        }catch (\Exception $e) {
            dd($e);
            return redirect()->route('product_form')->with('error', 'Erro ao criar variante, Contate o administrador do sistema!');
        }
    }
}
