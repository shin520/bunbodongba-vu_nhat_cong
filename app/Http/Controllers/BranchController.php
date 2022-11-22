<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(){
        $data = Branch::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.branch.index',compact('data'));
    }
    public function add(){
        return view('be.branch.create');
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên chi nhánh đang bỏ trống !',
            'name.max' => 'Tên chi nhánh quá dài !',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
        ],$trans);
        $data = new Branch();
        $data->name = $request->name;
        $data->featured = $request->featured ?? false;
        $data->address = $request->address;
        $data->map = $request->map;
        $data->number = $request->number ?? true;
        $data->hideshow = $request->hideshow ?? true;
        $data->save();
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.branch.index');
    }
    public function edit($id){
        $data = Branch::find($id);
        return view('be.branch.edit',compact('data'));
    }
    public function update($id,Request $request){
        $trans = [
            'name.required' => 'Tên chi nhánh đang bỏ trống !',
            'name.max' => 'Tên chi nhánh quá dài !',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
        ],$trans);

        $data = Branch::find($id);
        $data->name = $request->name;
        $data->featured = $request->featured ?? false;
        $data->address = $request->address;
        $data->map = $request->map;
        $data->number = $request->number ?? true;
        $data->hideshow = $request->hideshow ?? true;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.branch.index');
    }
    public function destroy($id){
        $data = Branch::find($id);
        $data->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.branch.index');
    }

    public function hideshow(Request $request){
        $data = Branch::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
    
    public function featured(Request $request){
        $data = Branch::find($request->id);
        $data->featured = $request->featured;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = Branch::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
}
