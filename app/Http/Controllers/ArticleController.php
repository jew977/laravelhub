<?php
namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Attention;
use Auth;
use Validator;
use EndaEditor;
use Markdown;
use App\Category;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {  
        $articles=User::orderBy('created_at', 'DESC')->find($id)->hasManyArticles()->paginate(6);//列表分页
        $users=User::find($id);
        $following_count=$this->following($id);
        $followed_count=$this->followed($id);
        $Categorys=User::find($id)->hasManyCategorys;
        return view('article.list',array(
            'articles'=>$articles,
            'users'=>$users,
            'following_count'=>$following_count,
            'followed_count'=>$followed_count,
            'Categorys'=>$Categorys
            )); 
    }
    
    
    public function following($id){
        $following=User::where('id','=',$id)->find($id)->showFollowing;
        $following_count=count($following);
        return $following_count;
    }
    
    public function followed($id){
        $followed=User::where('id',$id)->find($id)->showFollowed;
        $followed_count=count($followed);
        return $followed_count;
    }
    
    public function showController(){
        $id=Auth::id();
        $following_count=$this->following($id);
        $followed_count=$this->followed($id);
        $Articles=User::find($id)->hasManyArticles;
        $articleTotal=count($Articles);
        //dd($articleTotal);
        return view('article.index',array(
            'following_count'=>$following_count,
            'followed_count'=>$followed_count,
            'articleTotal'=>$articleTotal,
            'articles'=>$Articles
            ));//home控制面板
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {   $id=Auth::id();
        $Categorys=User::find($id)->hasManyCategorys;
      // dd($Categorys);
        return view('article.create')->with('Categorys',$Categorys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
            $category=new Category();
            $category->typename=$request->typename;
            $category->userid=Auth::id();
            $category->save();
        //dd($category->id);
       //插入数据库
      $rules=[
          'title'=>'required',
          'content'=>'required',
          'typename'=>'required',
          // 'tags' => array('required', 'regex:/^\w+$|^(\w+,)+\w+$/'),
          'desc'=>'required'
          ];
          $data=[
              'title'=>$request->title,
              'content'=>EndaEditor::MarkDecode($request->content),
              'type'=>$request->type,
              'desc'=>$request->desc,
              'userid'=>Auth::id(),
              'author'=>Auth::user()->name,
              'typeid'=>$category->id
              ];

           $validator = Validator::make($request->all(),$rules);
          if($validator->passes()){
                $article = Article::create($data);
                //dd($article);
                $article->save();
                $id=Auth::id();
               return $this->index($id);//返回文章列表
              }else{
                  return redirect('/article/create');
              }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showArticle($aid)
    {
        $articles=Article::where('aid',$aid)->get();
        //$Categorys=User::find($id)->showCategory;
       return view('article.show',array(
           'articles_title'=>$articles[0]->title,
           'articles_content'=>EndaEditor::MarkDecode($articles[0]->content)
           ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($aid)
    {
     $articles=Article::where('aid',$aid)->get();
     //dd($articles);
      return view('article.edit')->with('articles',$articles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {  
        $article=Article::where('aid',$id)->delete();
       //dd($article);
       // $article->delete();
       if($article){
        return redirect('/home')->with('message',"删除成功");
       }else{
           return redirect('/home')->with('message',"删除失败");
       }
    }
}
