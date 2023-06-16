<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
// use App\Models\Category;

class BlogController extends Controller
{
      // view users
    public function index()
    {
        $data['blogs'] = Blog::orderBy('id', 'DESC')->get();
        return view('blogs.view' , $data);
    }
            // users
    public function create()
    {
        //   $data['categories'] = Category::orderBy('id', 'DESC')->get();
        return view('blogs.create');
    }

    
    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->blog_title = $request->blog_title;
        $blog->meta_title = $request->meta_title;
      	$blog->keywords = $request->keywords;
       	$blog->meta_description = strip_tags($request->meta_description);
        $blog->long_description = $request->long_description;
        $blog->status = "Publish";

        if ($request->file('image') != null) {
            $imageName = time().'.'.$request->image->extension();
            $result = $request->image->move(public_path('/assets/images/blogs/'), $imageName);
            $blog->image ="/assets/images/blogs/".$imageName;
        }
        $save = $blog->save();

        if($save){
           return redirect()->route('blogs')->with('success','Blog created successfully.');
        }
        else{
            return redirect()->back()->with('error','Something went wrong.');;
        }
    }
    public function destroy($id)
    {

        $blog = Blog::find($id)->delete();
        return redirect('blogs')->with('delete', 'Record has been deleted');
    }
    
    public function editBlogs($id){
        
        $data['blog'] = Blog::where('id',$id)->first();
        // $data['categories'] = Category::All();
    
        return view('blogs.update', $data);
    }
    
    public function updateBlogs(Request $request)
    {
        $id = $request->id;
        $blog = Blog::find($id);

         $blog->blog_title = $request->blog_title;
        $blog->meta_title = $request->meta_title;
      	$blog->keywords = $request->keywords;
       	$blog->meta_description = strip_tags($request->meta_description);
        $blog->long_description = $request->long_description;
        $blog->status = "Publish";

        if ($request->file('image') != null) {

          $imageName = time().'.'.$request->image->extension();
          $result = $request->image->move(public_path('/assets/images/blogs/'), $imageName);
          $blog->image ="/assets/images/blogs/".$imageName;
        }

        $save = $blog->update();
        if($save){
              return redirect()->route('blogs')->with('success', "Blog Updated Successfully");
        }
        else{
              return back()->with('error', "Something went wrong");
        }
    }
    public function allBlogs(){
         $data = Blog::orderBy('id', 'DESC')->get();
      	 return response()->json(['data' => $data, 'success' => true,'status' => 200]);
    }
  	public function getSingleBlog($blog_id){
      
      $blog = Blog::find($blog_id); 
      if($blog){
        return response()->json(['data' => $blog, 'success' => true,'status' => 200]);
      }
      else{
        return response()->json(['message' => 'No records found']);
      }
    }
}
