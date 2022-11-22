<?php

namespace App\Http\Controllers;
use App\Models\Page;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Slide;
use App\Models\StaticContent;
use App\Models\Branch;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\FeedBack;
use App\Models\ProductCategory1;

use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(){
        $data['about_image_1'] = StaticContent::where('type', 'about_image_1')->first()->content;
        $data['about_image_2'] = StaticContent::where('type', 'about_image_2')->first()->content;
        $data['about_middle_content'] = StaticContent::where('type', 'about_middle_content')->first()->content;
        $data['feedback_content'] = StaticContent::where('type', 'feedback_content')->first()->content;
        $data['product_type'] = ProductCategory1::where('featured', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->limit(2)->get();
        $data['branch_index'] = Branch::where('featured', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->limit(1)->get();
        $data['feedback_index'] = FeedBack::where('featured', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->limit(5)->get();
        $data['slider'] = Slide::orderBy('number', 'ASC')->orderBy('id', 'DESC')->get();
        $data['gallery_about'] = Gallery::where('parent_id', 4)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->limit(1)->get();
       
        return view('index.home.index', compact('data'));
    }
    public function get_location(Request $request){
            $data = Branch::find($request->id);
            return $data;
    }

    public function product($slug){
        $data = Product::where('slug', $slug)->FirstOrFail();
        $datarelated = Product::where('parent_id', $data->parent_id)->orderBy("number", 'asc')->orderBy("id", 'desc')->get()->take(4);
        return view('index.page.product-detail', compact("data", "datarelated"));
    }
    public function post($slug){
        $data = Post::where('slug', $slug)->FirstOrFail();
        $datarelated = Post::where('parent_id', $data->parent_id)->orderBy("number", 'asc')->orderBy("id", 'desc')->get()->take(4);
        return view('index.page.post-detail', compact("data", "datarelated"));
    }
    
    
    public function store_contact_form(Request $request)
    {
            $secret_key = Setting::first()->captcha_secret;
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $remoteip = $_SERVER['REMOTE_ADDR'];
            $data = [
                    'secret' => $secret_key,
                    'response' => $request->recaptcha,
                    'remoteip' => $remoteip
                  ];
            $options = [
                    'http' => [
                      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                      'method' => 'POST',
                      'content' => http_build_query($data)
                    ]
                ];
                    $context = stream_context_create($options);
                    $result = file_get_contents($url, false, $context);
                    $resultJson = json_decode($result);
            if ($resultJson->success != true) {
                    alert()->error('Lỗi','Captcha đã hết hạn');
                    return back()->withErrors(['captcha' => 'Captcha đã hết hạn']);
                    }
            if ($resultJson->score >= 0.3) {
                $lang = [
                    'name.required' => "Tên không được bỏ trống !",
                    'phone.required' => "Số điện thoại không được bỏ trống !",
                    'date.required' => "Thời gian không được bỏ trống !",
                    // 'people.required' => "Số lượng người không được bỏ trống !",
                ];
                $request->validate([
                    'name' => 'required',
                    'phone' => 'required|unique:contacts',
                    'date' => 'required|date:contacts',
                    // 'people' => 'required|people:contacts',
  
                ], $lang);
                        $data_info = [
                            'number' => $request->true ?? true,
                            'name' => $request->name,
                            'phone' => $request->phone,
                            'date' => $request->date,
                            'people' => $request->people,
                            'read' => $request->read,
                        ];
                        $contact = Contact::create($data_info);
                    alert()->success('Đã gửi thư','Chúng tôi sẽ phản hồi lại cho bạn ngay');
                    return back();
            } else {
                    alert()->success('Lỗi','Đã có lỗi xảy ra !');
                    return back()->withErrors(['captcha' => 'Captcha đã hết hạn']);
            }
    }
 

    public function page($slug){
        $data = Page::where('slug',$slug)->FirstOrFail();
        switch($data->type){
            case('about');
            return view('index.page.about-us', compact('data'));
            break;
            case('contact');
            $content = StaticContent::where('type', 'contact_content')->first();
            return view('index.page.contact', compact('data', 'content'));
            break;
            case('all-post');
            $items = Post::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->paginate(6);
            return view('index.page.post', compact('data', 'items'));
            case('all-product');
            $items = Product::where('hideshow', true)->orderBy('number', 'ASC')->orderBy('id', 'DESC')->paginate(8);
            return view('index.page.product', compact('data', 'items'));
            break;
        }
    }
}

