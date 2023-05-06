<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\ImageUploadRequest;

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
        $liste=$art->all();
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
        $art=Article::find($id);
        $cat=Categorie::find($art['categorie']);
        return view('fiche', ["article"=>$art, "categorie"=>$cat]);
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
    public function update(Request $request, $id)
    {
        $new=Article::find($id);
        $new['titre']=$request->input("titre");
        $new['resume']=$request->input("resume");
        $new['categorie']=$request->input("cat");
        $new['contenu']=$request->input("contenu");
        print_r($new);
        $new->update();
        // $new->update();
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
        $filename=time().'.'.$request->image->extension();
        $request->image->move('images', $filename);
        return $filename;
    }
}
