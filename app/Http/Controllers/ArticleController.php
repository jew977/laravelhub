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
        $user1_id=Auth::id();//关注id
        $user2_id=$id;//被关注id*/
        $articles=User::orderBy('created_at', 'DESC')->find($id)->hasManyArticles()->paginate(6);//列表分页
        $users=User::find($id);
        $following_count=$this->following($id);
        $followed_count=$this->followed($id);
        $Categorys=User::find($id)->hasManyCategorys;
        //dd($Categorys);
        $attention=Attention::where('user1_id',$user1_id) //互相关注
        ->where('user2_id',$user2_id)
        ->first();

        $lastArticles=$this->lastPublicArticles($id);//获取最近的发表的6篇文章
        //dd($lastArticles);
        return view('article.list',array(
            'articles'=>$articles,
            'users'=>$users,
            'following_count'=>$following_count,
            'followed_count'=>$followed_count,
            'Categorys'=>$Categorys,
            'attention'=>$attention,
            'lastArticles'=>$lastArticles
            )); 
    }
    
    //主动关注
    public function following($id){
        $following=User::find($id)->showFollowing;
        $following_count=count($following);
        return $following_count;
    }
    //被动关注
    public function followed($id){
        $followed=User::where('id',$id)->find($id)->showFollowed;
        $followed_count=count($followed);
        return $followed_count;
    }
    public function hasMany_articles_total($id){
        dd(Category::find(1));
    }
    //主控制页面
    public function showController(){
        $id=Auth::id();
        $following_count=$this->following($id);
        $followed_count=$this->followed($id);
        $Articles=User::find($id)->hasManyArticles;
        $articleTotal=count($Articles);
        return view('article.index',array(
            'following_count'=>$following_count,
            'followed_count'=>$followed_count,
            'articleTotal'=>$articleTotal,
            'articles'=>$Articles
            ));//home控制面板
        
    }
    //近期文章
    public function lastPublicArticles($userid){
    $lastArticles=User::orderBy('created_at', 'DESC')->find($userid)->hasManyArticles->take(6);
    return $lastArticles;
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
            $catefory_result=Category::where('typename',$category->typename)
            ->where('userid',$category->userid)
            ->first();
            if(!$catefory_result){

                $category->save();
            }
 
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
              'typeid'=>$catefory_result->id
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
        $user1_id=Auth::id();//关注id
        $user2_id=$aid;//被关注id*/
        $articles=Article::where('aid',$aid)->get();
        $id=$articles->toArray()[0]['userid']; //通过文章的id查找属于用户的id
        $following_count=$this->following($id);
        $followed_count=$this->followed($id);
        $users=User::find($id);
        $Categorys=User::find($id)->hasManyCategorys;
        $attention=Attention::where('user1_id',$user1_id)
        ->where('user2_id',$user2_id)
        ->first();
        $lastArticles=$this->lastPublicArticles($id);//获取最近的发表的6篇文章
       return view('article.show',array(
           'articles_title'=>$articles[0]->title,
           'articles_content'=>EndaEditor::MarkDecode($articles[0]->content),
           'following_count'=>$following_count,
           'followed_count'=>$followed_count,
           'users'=>$users,
           'Categorys'=>$Categorys,
           'attention'=>$attention,
           'lastArticles'=>$lastArticles
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
