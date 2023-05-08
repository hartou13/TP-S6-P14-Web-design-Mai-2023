<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Http\Requests\ImageUploadRequest;
// use App\Http\Controllers\Cache;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $art=new Article();
        $liste=Article::paginate(2);
        foreach ($liste as $key => $value) {
            $value['slug']=Str::slug($value->titre);
        }
        return view('card', ["article"=>$liste]);
    }

    public function recherche(Request $request){
        $recherche=$request->input("search");
        $recherche="%".$recherche."%";
        $liste=Article::where('titre', 'like', $recherche)->orWhere('resume','like', $recherche)->paginate(2);
        foreach ($liste as $key => $value) {
            $value['slug']=Str::slug($value->titre);
        }
        return view('card', ["article"=>$liste]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=new Categorie();
        return view('insertionArticle', ["cat"=>$cat->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageUploadRequest $upload)
    {
        $new=new Article();
        $new['titre']=$request->input("titre");
        $new['contenu']=$request->input("contenu");
        $new['resume']=$request->input("resume");
        $new['categorie']=$request->input("cat");
        $new->img=$this->upload($upload);
        $new->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Cache::has('showarticle-'.$id)){
            $art=Article::find($id);
            $cat=Categorie::find($art->categorie);
            $view=view('fiche', ["article"=>$art, "categorie"=>$cat])->render();
            Cache::put('showarticle-'.$id, $view);
        }

        return Cache::get('showarticle-'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=new Categorie();
        $art=Article::find($id);
        $cat=$cat->all();
        return view('update', ["article"=>$art, "categorie"=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ImageUploadRequest $upload)
    {
        $new=Article::find($id);
        $new['titre']=$request->input("titre");
        $new['resume']=$request->input("resume");
        $new['categorie']=$request->input("cat");
        $new['contenu']=$request->input("contenu");
        print_r($new);
        $new->img=$this->upload($upload);
        $new->update();
        // $new->update();
         if(Cache::has('showarticle-'.$id)){

            Cache::forget('showarticle-'.$id);
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old=Article::find($id);
        $old->delete();
        return redirect('/');
    }
    public function upload(ImageUploadRequest $request){
        if($request->image!=null){
            $filename=time().'.'.$request->image->extension();
            // $request->image->move(public_path('images'), $filename);
            $contents = file_get_contents($request->image->getRealPath());
            $base64 = base64_encode($contents);
            return $base64;
        }
    }
}
