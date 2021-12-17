<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function store(Request $request){
        $articlesData = $request->all();

        $article = new Article();
        $article->title = $articlesData['title'];
        $article->description = $articlesData['description'];

        $article->save();

        return response([
            'message' => 'Artikel berhasil dibuat',
            'data' => $data
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
