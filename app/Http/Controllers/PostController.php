<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Advert;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Contactform;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function admin_dashboard(Request $request){
        if(auth()->check()){
            $post = Post::all();
            $context = [
                "post"=>$post
            ];
            return view("admin_dashboard",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function admin_create_post(Request $request){
            $category = Category::offset(0)->limit(4)->get();
            $latestpost1 = Post::latest()->offset(0)->limit(1)->get();
            $latestpost2 = Post::latest()->offset(1)->limit(6)->get();
            $latestads1 = Advert::latest()->offset(0)->limit(1)->get();
            $latestads2 = Advert::latest()->offset(1)->limit(4)->get();
            $allcategory = Category::all();
            $tag = Tag::all();
            $allpost1 = Post::latest()->offset(0)->limit(1)->get();
            $allpost2 = Post::latest()->offset(1)->limit(count(Post::all()))->get();

            
            $context = [
        
                "latestpost1"=>$latestpost1,
                "latestpost2"=>$latestpost2,
                "category"=>$category,
                "tag"=>$tag,
                "allcategory"=>$allcategory,
                "allpost1"=>$allpost1,
                "allpost2"=>$allpost2,
                "latestads1"=>$latestads1,
                "latestads2"=>$latestads2,

            ];

            return view("admin_create_post",$context);
        
    }


    
    public function view_all_post(Request $request){
        if(auth()->check()){
            $post = Post::all();
            $context = [
                "post"=>$post
            ];
            return view("view_all_post",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login to Create a Post");
        }
    }



    public function upload_post(Request $request){
        if(auth()->check()){
            $category = Category::all();
            $tag = Tag::all();
            return view("upload_post",["category"=>$category,"tag"=>$tag]);
        }else{
            return redirect("/user_login")->with("message","Please Login to Create a Post");
        }
        
    }



    public function create_category(Request $request){
        if(auth()->check()){
            return view("create_category");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function register_category(Request $request){
        if(auth()->check()){
            $data = $request->validate([
            "category_name"=>"required",
            "category_description"=>"required"
            ]);
            Category::create($data);
            return redirect("/create_category")->with("message","Category Created Successfully");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function send_post(Request $request){
        if(auth()->check()){
            $title = $request->input("title");
            $data = $request -> validate([
                "title"=>"required",
                "content"=>"required",
                "image"=>"required|mimes:jpeg,png"
            ]);
            $category = Category::where("id",$request->input("category"));
            $arrName = explode(" ",$title);
            $slugged = implode("-",$arrName);
            $data["slug"] = $slugged;
            $filename = uniqid().".".$request->image->extension();
            $data["image"] = $filename;
            $data["category_id"] = $request->input("category");
            $data["user_id"] = auth()->user()->id;
            $arrtag = explode(",",$request->input("tag2"));
            $data["tags"] = $arrtag[0];
            $data["tags2"] = $arrtag[1];
            $data["tags3"] = $arrtag[2];
            $tagarray = array($arrtag[0],$arrtag[1],$arrtag[2]);
            $alltag = Tag::all();
            foreach($tagarray as $tag){
                if(Tag::where("tag_name",$tag)->exists()){

                }else{
                    
                Tag::insert([
                    "tag_name"=>$tag
                ]);
                }
            }
            Post::create($data);
            $request->image->move(public_path("images"),$filename);
            return redirect("/upload_post")->with("message","uploaded successfully");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



public function edit_post(Request $request, int $id){
    if(auth()->check()){
        $post = Post::where("id",$id)->get();
        $category = Category::all();
        $context = [
            "post"=>$post,
            "category"=>$category
        ];
        return view("edit_post",$context);
    }else{
        return redirect("/user_login")->with("message","Please Login");
    }
}



    public function update_post(Request $request){
    if(auth()->check()){
    $data = $request -> validate([
        "title"=>"required",
        "category"=>"required",
        
        "content"=>"required",
        "image"=>"required|mimes:jpeg,png"
    ]);
    if($request->input("category") == "Choose a Category"){
        return redirect("/edit_post"."/".$request->input("pid"))->with("message","Please Choose a category");
    }
    
    $post = Post::where("id",$request->input("pid"))->get();
    foreach($post as $post){
        $user_id = $post['user_id'];
    }
    // if(auth()->user()->id !== $user_id){
    //     return redirect("/");
    // }
    $post->title = $request->input("title");
    $post->content = $request->input("content");
    $post->user_id = auth()->user()->id;
    $post->category_id = $request->input("category");

    $filename = uniqid().".".$request->image->extension();
    $post->image = $filename;

    $arrName = explode(" ",$request->input("title"));
    $slugged = implode("-",$arrName);
    $post->slug = $slugged;
    $post->tags = $request->input("tag2");

    $arrtag = explode(",",$request->input("tag2"));
    $alltag = Tag::all();
    foreach($arrtag as $tag){
        if(Tag::where("tag_name",$tag)->exists()){

        }else{
           Tag::insert([
               "tag_name"=>$tag
           ]);
        }
    }

    $post->save();
    $request->image->move(public_path("images"),$filename);
    return redirect("/upload_post")->with("message","uploaded successfully");
}else{
    return redirect("/user_login")->with("message","Please Login");
}

}



    public function read_article(Request $request, int $id,string $slug){
        $post = Post::where("id","=",$id)->get();
        $allcategory = Category::all();
        $tag = Tag::all();
        $getcategory = Post::where("id","=",$id)->get();
        $latestads1 = Advert::latest()->offset(0)->limit(1)->get();
        $latestads2 = Advert::latest()->offset(1)->limit(4)->get();
        $context = [
            "post"=>$post,
            "category"=>$allcategory,
            "tag"=>$tag,
            "latestads1"=>$latestads1,
            "latestads2"=>$latestads2
        ];
        return view("read_article",$context);
        
    }



    public function contact(Request $request){
        $category = Category::all();
        $context = [
        "category"=>$category
        ];
        return view("contact",$context);
    }


public function send_contact(Request $request){
    if(auth()->check()){
        $data = $request -> validate([
            "name"=>"required",
            "email"=>"required",
            "subject"=>"required",
            "message"=>"required"
        ]);
        Contactform::create($data);
        return redirect("/contact")->with("message","Request Sent successfully, You will be Communicated Soon");
    }else{
        return redirect("/user_login")->with("message","Please Login");
    }
}



    public function search_post(Request $request){
        $search = strip_tags($request->input("search"));
        $post = Post::where("title","LIKE","%{$search}%")->get();
        $allcategory = Category::all();
        $latestads1 = Advert::latest()->offset(0)->limit(1)->get();
        $latestads2 = Advert::latest()->offset(1)->limit(4)->get();
        $alltag = Tag::all();
        $context = [
            "post"=>$post,
            "category"=>$allcategory,
            "search"=>$search,
            "alltag"=>$alltag,
            "latestads1"=>$latestads1,
            "latestads2"=>$latestads2
        ];
        return view("search2",$context);
    }



    public function tag_search(Request $request, string $tag){
        $post = Post::where("tags", $tag)->orWhere("tags2",$tag)->orWhere("tags3",$tag)->get();
        $allcategory = Category::all();
        $latestads1 = Advert::latest()->offset(0)->limit(1)->get();
        $latestads2 = Advert::latest()->offset(1)->limit(4)->get();
        $alltag = Tag::all();
        $context = [
            "post"=>$post,
            "category"=>$allcategory,
            "search"=>$tag,
            "alltag"=>$alltag,
            "latestads1"=>$latestads1,
            "latestads2"=>$latestads2
        ];
        return view("search_post",$context);
    }



    public function post_ads(Request $request){
        if(auth()->check()){
            $category = Category::all();
            $tag = Tag::all();
            


        return view("upload_ads",["category"=>$category,"tag"=>$tag]);
        }else{
            return redirect("/user_login")->with("message","Please Login to Create Advert");
        }
        
    }



    public function send_ads(Request $request){
        if(auth()->check()){
            $title = $request->input("title");
            $link = $request->input("link");
            $data = $request -> validate([
                "title"=>"required",
                "link"=>"required",
                "image"=>"required|mimes:jpeg,png"
            ]);
            $filename = uniqid().".".$request->image->extension();
            $data["image"] = $filename;
            Advert::create($data);
            $request->image->move(public_path("ads"),$filename);
            return redirect("all_ads")->with("message","uploaded successfully");
        }else{
            return redirect("/user_login")->with("message","Please Login ");
        }
    }



    public function all_ads(Request $request){
        if(auth()->check()){
            $ads = Advert::all();
            $context = [
            "ads"=>$ads
            ];
            return view("view_all_ads",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }

    

    public function user_message(Request $request){
        if(auth()->check()){
            $message = Contactform::all();
            $context = [
            "message"=>$message
            ];
            return view("view_all_message",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function view_all_category(Request $request){
        if(auth()->check()){
            $category = Category::all();
            $context = [
            "category"=>$category
            ];
            return view("view_all_category",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");

        }
    }



    public function edit_category(Request $request, int $id){
        if(auth()->check()){
            $category = Category::where("id",$id)->get();
            $context = [
            "category"=>$category
            ];
            return view("edit_category",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function delete_category(Request $request, int $id){
        if(auth()->check()){
            $category = Category::where("id",$id)->first()->delete();
            return redirect("/view_all_category");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function delete_message(Request $request, int $id){
        if(auth()->check()){
            $category = Contactform::where("id",$id)->first()->delete();
            return redirect("/user_message");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function delete_post(Request $request, int $id){
        if(auth()->check()){
            $post = Post::where("id",$id)->first()->delete();
        return redirect("/view_all_post");
        }else{
            return redirect("/user_login")->with("message","Please Login");

        }
    }



    public function delete_ads(Request $request, int $id){
        if(auth()->check()){
            $ads = Advert::where("id",$id)->first()->delete();
            return redirect("/all_ads");
        }else{
            return redirect("/user_login")->with("message","Please Login");

        }
    }
    
    
    
    public function update_category(Request $request){
        if(auth()->check()){
            $category = Category::where("id",$request->input("cid"))->first();
            $category->category_name = $request->input("category_name");
            $category->category_desccription = $request->input("category_description");
            $category->save();
            return redirect("/view_all_category")->with("message","Updated successfully");
        
        }else{
            return redirect("/user_login")->with("message","Please Login");

        }
    }



    public function edit_ads(Request $request, int $id){
        if(auth()->check()){
            $ads = Advert::where("id",$id)->get();
            $context = [
                "ads"=>$ads
            ];
            return view("edit_ads",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");

        }
    }    
    


    public function update_ads(Request $request){
        if(!auth()->check()) {  
            return redirect("/");
        }
        $ads = Advert::where("id",$request->input("aid"))->first();
        
        $ads->title = $request->input("title");
        $ads->link = $request->input("link");
       
    
        $filename = uniqid().".".$request->image->extension();
        $ads->image = $filename;
    
        $ads->save();
        $request->image->move(public_path("ads"),$filename);
        return redirect("/all_ads")->with("message","uploaded successfully");
    }
}

