<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Configuration extends Controller
{
    public static function websiteForm(Request $request)
    {
        $general = DB::table('generals')->first();
        $slides = DB::table('slides')->orderBy('order', 'asc')->get();

        return view('admin.general.form', [
            'page' => 'website_form',
            'website' => $general,
            'slides' => $slides
        ]);
    }

    public static function websiteEdit(Request $request)
    {
        try{
            $data = [
                'company'              => $request->company,
                'size'                 => $request->size,
                'font'                 => $request->font,
                'company_description'  => $request->description,
                'facebook_url'         => $request->facebook_url,
                'instagram_url'        => $request->instagram_url,
                'linkedin_url'         => $request->linkedin_url,
                'twitter_url'          => $request->twitter_url,
                'tiktok_url'           => $request->tiktok_url,
                'address'              => $request->address,
                'email'                => $request->email,
                'whatsapp'             => $request->whatsapp,
                'terms_and_conditions' => $request->terms_and_conditions,
                'lgpd'                 => $request->lgpd
            ];

            if($request->websiteId){
//                general
                if($request->hasFile('logo_path')) {
                    //apaga as imagens da pasta referente a variante
                    $files = glob(public_path('uploads/general/' . $request->websiteId));

                    foreach ($files as $file) {
                        if (is_dir($file)) {
                            self::deleteDirectory($file);
                        }
                    }

                    $logo = $request->file('logo_path');
                    $logoName = md5(uniqid(rand(), true)) . '_' . $request->websiteId;
                    $logo->move(public_path('uploads/general/' . $request->websiteId), $logoName);

                    $data['logo_path'] = 'uploads/general/'.$request->websiteId.'/'.$logoName;
                }

                DB::table('generals')->where('id', $request->websiteId)->update($data);
//                end general

//                slides
                if($request->hasFile('path')) {
                    //apaga as imagens da pasta referente a variante
                    $slideFiles = glob(public_path('uploads/general/slides/' . $request->websiteId));

                    foreach ($slideFiles as $slideFile) {
                        if (is_dir($slideFile)) {
                            self::deleteDirectory($slideFile);
                        }
                    }

                    DB::table('slides')->delete();

                    foreach ($request->file('path') as $slide) {
                        $slideName = md5(uniqid(rand(), true)).'_'.$request->websiteId;
                        $slide->move(public_path('uploads/general/slides/'.$request->websiteId), $slideName);
                        $slides[] = $slideName;
                    }

                    foreach ($slides as $key => $slide) {
                        DB::table('slides')->insert([
                            'name' => $slide,
                            'path' => 'uploads/general/slides/'.$request->websiteId.'/'.$slide,
                            'order' => $key + 1
                        ]);
                    }
                }
//                end slides

                return Redirect::to('website_form?websiteId='.$request->websiteId)->with('success', 'Website editado com sucesso!');
            }else{
//                $categoryId = DB::table('categories')->insertGetId($data);
//                return Redirect::to('category_list?categoryId='.$categoryId)->with('success', 'Categoria criada com sucesso!');
            }

        }catch (\Exception $e) {
            return redirect()->route('website_form')->with('error', 'Erro ao editar o Website, Contate o administrador do sistema!');
        }
    }
}
