<?php

namespace App\Http\Controllers;
use App\Models\PostType;
use Illuminate\Http\Request;

class PostTypeController extends Controller
{
    public function index(){
        $data = PostType::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.posttype.index',compact('data'));
    }
    public function add(){
        return view('be.posttype.create');
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên khóa học đang bỏ trống !',
            'name.max' => 'Tên khóa học quá dài !',
            'img.image' => 'Chỉ được upload hình ảnh',
            'img.mimes'=> 'Định dạng cho phép là jpeg, png, jpg, gif, svg',
            'img.max' => 'Kích thước ảnh tối đa là 5MB',
            'file.max'=> 'Kích thước tệp tối đa là 10MB',
            'file.mimes'=> 'Định dạng tệp cho phép là jpeg, png, jpg',
            'slug.required' => 'Đường dẫn không được để trống',
            'slug.unique' => 'Đường dẫn đã tồn tại',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'max:10240|mimes:zip,pdf,jpeg,png,jpg',
            'slug' => "required|unique:post_types,slug"
        ],$trans);
        $data = new PostType();
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->slug = $request->slug;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->number = $request->number ?? true;
        $data->hideshow = $request->hideshow;
        $data->img = $filename ?? 'placeholder.png'
;
        $data->save();
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.posttype.index');
    }
    public function edit($id){
        $data = PostType::find($id);
        return view('be.posttype.edit',compact('data'));
    }
    public function update($id,Request $request){
        $trans = [
            'name.required' => 'Tên khóa học đang bỏ trống !',
            'name.max' => 'Tên khóa học quá dài !',
            'img.image' => 'Chỉ được upload hình ảnh',
            'img.mimes'=> 'Định dạng cho phép là jpeg, png, jpg, gif, svg',
            'img.max' => 'Kích thước ảnh tối đa là 5MB',
            'file.max'=> 'Kích thước tệp tối đa là 10MB',
            'file.mimes'=> 'Định dạng tệp cho phép là jpeg, png, jpg',
            'slug.required' => 'Đường dẫn không được để trống',
            'slug.unique' => 'Đường dẫn đã tồn tại',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'max:10240|mimes:zip,pdf,jpeg,png,jpg',
            'slug' => "required|unique:post_types,slug,$id,id"
        ],$trans);
        $data = PostType::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->slug = $request->slug;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->number = $request->number ?? true;
        $data->hideshow = $request->hideshow;
        $data->img = $filename ?? $data->img;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.posttype.index');
    }
    public function destroy($id){
        $data = PostType::find($id);
        $data->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.posttype.index');
    }

    public function hideshow(Request $request){
        $data = PostType::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = PostType::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
}
