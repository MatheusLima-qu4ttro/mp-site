<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Category extends Controller
{
    public static function categoryList(Request $request)
    {
        $category = DB::table('categories')->get();
        return view('admin.category.list', [
            'page' => 'category_list',
            'category' => $category
        ]);
    }
    public static function categoryForm(Request $request)
    {
        $category = DB::table('categories')->where('id', $request->categoryId)->first();

        return view('admin.category.form', [
            'page' => 'category_form',
            'category' => $category,
        ]);
    }

    public static function categoryDelete(Request $request)
    {

        if(DB::table('products')->where('category_id', $request->categoryId)->exists()){
            return Redirect::to('category_list')->with('error', 'Existem produtos vinculados a essa categoria, remova o vinculo e tente novamente!');
        }

        try {
            DB::table('categories')->where('id', $request->categoryId)->delete();
            return Redirect::to('category_list')->with('success', 'Categoria deletada com sucesso!');
        }catch (\Exception $e){
            return Redirect::to('category_list')->with('error', 'Erro ao deletar categoria, Contate o administrador do sistema!');
        }

    }
    public static function categoryCreate(Request $request)
    {
        try{
            $data = [
                'name' => $request->name,
            ];

            if($request->categoryId){
                DB::table('categories')->where('id', $request->categoryId)->update($data);
                return Redirect::to('category_list?categoryId='.$request->categoryId)->with('success', 'Categoria editada com sucesso!');
            }else{
                $categoryId = DB::table('categories')->insertGetId($data);
                return Redirect::to('category_list?categoryId='.$categoryId)->with('success', 'Categoria criada com sucesso!');
            }

        }catch (\Exception $e) {
            return redirect()->route('category_form')->with('error', 'Erro ao criar categoria, Contate o administrador do sistema!');
        }
    }
}
