<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function store(Request $request){
        $articlesData = $request->all();

        if(!is_null($request->file('picture'))){
            $file = $request->file('picture');
            $fileName = time()."_".$file->getClientOriginalName();
            $folder = 'article_pictures';
            $file->move($folder, $fileName);
        }else{
            $fileName = 'no_image.png';
        }

        $article = new Article();
        $article->title = $articlesData['title'];
        $article->description = $articlesData['description'];
        $article->picture = $fileName;

        $article->save();

        return response([
            'message' => 'Artikel berhasil dibuat'
        ]);
    }

    public function display(){
        $article = Article::all();

        if(!is_null($article)){
            return response([
                'data' => $article
            ], 200);
        }

        return response([
            'data' => null
        ], 404);
    }

    public function destroy($id){
        $article = Article::find($id);

        if($article->delete()){
            return response([
                'message' => 'Artikel berhasil dihapus'
            ], 200);
        }
    }
}
