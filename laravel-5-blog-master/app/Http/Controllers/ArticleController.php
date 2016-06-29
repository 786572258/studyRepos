<?php namespace App\Http\Controllers;

use App\Components\EndaPage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Tag;
use Illuminate\Http\Request;

use App\Model\ArticleStatus;
use App\Model\Article;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       /* echo '打印：：';
        $article = Article::find(1);
        //debug($article);
        echo $article->title;*/

        /*$article = Article::where('id', 1)->first();
        echo $article->title;
        //查询出所有文章并循环打印出所有标题
        $articles = Article::all(); // 此处得到的 $articles 是一个对象集合，可以在后面加上 '->toArray()' 变成多维数组。
        foreach ($articles as $article) {
            echo $article->title;
        }*/

      /*  //查找 id 在 10~20 之间的所有文章并打印所有标题
        $articles = Article::where('id', '>', 10)->where('id', '<', 20)->get();
        foreach ($articles as $article) {
            echo $article->title;
        }*/

        /*//查询出所有文章并循环打印出所有标题，按照 updated_at 倒序排序
        $articles = Article::where('id', '>', 10)->where('id', '<', 20)->orderBy('updated_at', 'desc')->get();
        foreach ($articles as $article) {
            echo $article->title;
        }
        exit;*/

        //
        $article = Article::getNewsArticle(8);
        viewInit();
        $page = new EndaPage($article['page']);
        return homeView('index', array(
            'articleList' => $article,
            'page' => $page
        ));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::getArticleModelByArticleId($id);

        ArticleStatus::updateViewNumber($id);
        $data = array(
            'article' => $article,
        );
        viewInit();
        return homeView('article', $data);
    }

}
