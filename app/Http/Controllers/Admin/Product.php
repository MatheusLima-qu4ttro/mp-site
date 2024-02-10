<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Product extends Controller
{
    public static function productList(Request $request)
    {
        $products = DB::table('products')->get();
        return view('admin.product.list', [
            'page' => 'product_list',
            'products' => $products
        ]);
    }
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
            $variants = DB::table('product_variants')->where('product_id', $request->productId)->get();
            //pega todas as fotos de cada variante da tabela product_images pelo product_variant_id e adiciona no objeto da variante
            foreach ($variants as $variant) {
                $variant->image = DB::table('product_images')->select('path as image')->where('product_variant_id', $variant->id)->get();
            }
        }

        return view('admin.product.form', [
            'page' => 'product_form',
            'categories' => $categories,
            'product' => $product ?? null,
            'variants' => $variants ?? []
        ]);
    }

    public static function productDelete(Request $request)
    {
        try {
            DB::table('products')->where('id', $request->productId)->delete();
            return Redirect::to('product_list')->with('success', 'Produto deletado com sucesso!');
        }catch (\Exception $e){
            return Redirect::to('product_list')->with('error', 'Erro ao deletar produto, Contate o administrador do sistema!');
        }

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
                DB::table('product_variants')->where('id', $request->variantId)->update($data);

                //apaga as imagens da pasta referente a variante
                $files = glob(public_path('uploads/products/'.$request->productId.'/'.$request->variantId));
                foreach ($files as $file) {
                   if (is_dir($file)) {
                       self::deleteDirectory($file);
                   }
                }

                DB::table('product_images')->where('product_variant_id', $request->variantId)->delete();
                $photos = [];
                if($request->hasFile('imagem_produto')){
                    foreach ($request->file('imagem_produto') as $photo) {
                        $photoName = md5(uniqid(rand(), true)).'_'.$request->productId.'_'.$request->variantId;
                        $photo->move(public_path('uploads/products/'.$request->productId.'/'.$request->variantId), $photoName);
                        $photos[] = $photoName;
                    }
                }
                foreach ($photos as $key => $photo) {
                    $isMain = false;

                    if($key == 0) {
                        $isMain = true;
                    }

                    DB::table('product_images')->insert([
                        'product_variant_id' => $request->variantId,
                        'path' => 'uploads/products/'.$request->productId.'/'.$request->variantId.'/'.$photo,
                        'is_main' => $isMain
                    ]);
                }

                return Redirect::to('product_form?productId='.$request->productId)->with('success', 'Variante editada com sucesso!');
            }else{
                $variantId = DB::table('product_variants')->insertGetId($data);

                DB::table('product_images')->where('product_variant_id', $variantId)->delete();
                $photos = [];
                if($request->hasFile('imagem_produto')){
                    foreach ($request->file('imagem_produto') as $photo) {
                        $photoName = md5(uniqid(rand(), true)).'_'.$request->productId.'_'.$variantId;
                        $photo->move(public_path('uploads/products/'.$request->productId.'/'.$request->variantId), $photoName);
                        $photos[] = $photoName;
                    }
                }
                foreach ($photos as $key => $photo) {
                    $isMain = false;

                    if($key == 0) {
                        $isMain = true;
                    }

                    DB::table('product_images')->insert([
                        'product_variant_id' => $variantId,
                        'path' => 'uploads/products/'.$request->productId.'/'.$request->variantId.'/'.$photo,
                        'is_main' => $isMain
                    ]);
                }

                return Redirect::to('product_form?productId='.$request->productId)->with('success', 'Variante criada com sucesso!');
            }

        }catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('product_form')->with('error', 'Erro ao criar variante, Contate o administrador do sistema!');
        }
    }

    public static function productVariantDelete(Request $request)
    {
        try {
            DB::table('product_variants')->where('id', $request->variantId)->delete();
            return Redirect::to('product_form?productId='.$request->productId)->with('success', 'Variante criada com sucesso!');
        }catch (\Exception $e){
            return Redirect::to('product_form?productId='.$request->productId)->with('error', 'Erro ao deletar variante, Contate o administrador do sistema!');
        }

    }

}
