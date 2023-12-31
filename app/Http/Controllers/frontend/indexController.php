<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use Barryvdh\DomPDF\PDF;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use PDF;

class indexController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        $sliders = Slider::where('status' , 1)->orderBy('id' , 'DESC')->limit(3)->get();
        $products = Product::where('status' , 1)->orderBy('id' , 'DESC')->get();
        $featured = Product::where('featured' , 1)->where('status' , 1)->orderBy('id' , 'DESC')->limit(6)->get();

        return view('frontend.index' , compact('categories' , 'sliders' , 'products', 'featured'));
    }//end index

    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }//end userLogout

    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard' , compact('user'));
    }//end userProfile

    public function editProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.edit_profile' , compact('user'));
    }//end EditProfile

    public function updateProfile(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->hasFile('profile_photo_path')){
            //checking the old image it there one
            if(!file_exists(public_path('uploads/user_images/'.$user->profile_photo_path))){
                //if there is an image this will delete the old image to decrease the space
                unlink(public_path() .  'uploads/user_images/'.$user->profile_photo_path);
            }else{
                $file = $request->file('profile_photo_path');
                $exten = $file->getClientOriginalExtension();
                $newname = uniqid(). '.' .$exten;
                $destenationpath = 'uploads/user_images/';
                // $newname = Storage::disk('s3')->put($destenationpath , $file);
                $file->move($destenationpath , $newname);
                $user->profile_photo_path = $newname;
            }
        }
        $user->save();
        toastr()->success('Profile Updated Successfully');
        return view('dashboard' , compact('user'));
    }//end updateProfile

    public function userEditPassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.edit_password' , compact('user'));
    }//end userPassword

    public function userUpdatePassword(Request $request){

        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user = User::find(Auth::user()->id);
        $hashedpassword = $user->password;
        if(Hash::check($request->oldpassword , $hashedpassword)){
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }

    }//end update password function

    public function productDetails($id,$slug){
        $product = Product::findOrfail($id);

        $color_en = $product->product_color_en;
        $productColorEn= explode(',' , $color_en);

        $color_ar = $product->product_color_ar;
        $productColorAr= explode(',' , $color_ar);

        $size_en = $product->product_size_en;
        $productSizeEn= explode(',' , $size_en);

        $size_ar = $product->product_size_ar;
        $productSizeAr= explode(',' , $size_ar);
        $productCategory =$product->category_id;
        $relatedProducts = Product::where('category_id',$productCategory)->where('id' , '!=' , $id)->orderBy('id' , 'DESC')->get();
        $multiImg = MultiImg::where('product_id' , $id)->get();
        //getting all the reviews for showing comments and summary
        $reviews = Review::where('product_id' , $id)->where('status',1)->orderBy('id' , 'DESC')->get();
        //getting all the sum of the review stars so after this can get the
        $reviews_sum = Review::where('product_id' , $id)->orderBy('id' , 'DESC')->sum('stars');
        //getting the stars avarage and if there is now reviews yet show that the item getting the 5 stars
        if($reviews->count() >= 1 && $reviews_sum > 0){
            $reviewValue = $reviews_sum/$reviews->count();
        }else{
            $reviewValue = 5;
        }
        return view('frontend.product.product-details',compact('product' , 'multiImg' , 'productColorEn', 'productColorAr','productSizeEn','productSizeAr','relatedProducts','reviews' ,
    'reviewValue'));
    }//end Product Details Function



    public function productTags($tag){
        $products = Product::where('product_tags_en' , $tag)->orWhere('product_tags_ar' , $tag)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(6);
        // dd($products);
        // $colors = Product::where('product_tags_en' , $tag)->where('product_tags_ar' , $tag)->where('status' , 1)->orderBy('id' , 'DESC')->get();
        $brands = Brand::latest()->orderBy('id' , 'DESC')->get();
        $categories = Category::latest()->get();
        return view('frontend.tags.tagsView' , compact('products' , 'categories','brands'));
    }//end product Tags Function


    public function categoryProducts($id,$slug){
        $products = Product::where('category_id' , $id)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(6);
        $brands = Brand::latest()->orderBy('id' , 'DESC')->get();
        $categories = Category::latest()->get();
        return view('frontend.product.productFilters' , compact('products' , 'categories','brands'));
    }//end product CategoryProducts Function

    public function subCategoryProducts($id,$slug){
        $products = Product::where('subcategory_id' , $id)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(6);
        $brands = Brand::latest()->orderBy('id' , 'DESC')->get();
        $categories = Category::latest()->get();
        return view('frontend.product.productFilters' , compact('products' , 'categories','brands'));
    }//end product subCategoryProducts Function

    public function subSubCategoryProducts($id,$slug){
        $products = Product::where('subsubcategory_id' , $id)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(6);
        $brands = Brand::latest()->orderBy('id' , 'DESC')->get();
        $categories = Category::latest()->get();
        return view('frontend.product.productFilters' , compact('products' , 'categories','brands'));
    }//end product subsubCategoryProducts Function

    public function productModalAjax($id){
        $product = Product::with('category', 'brand')->findOrfail($id);

        $color_en = $product->product_color_en;
        $productColor= explode(',' , $color_en);

        $size_en = $product->product_size_en;
        $productSize= explode(',' , $size_en);

        return response()->json(array(
            'product' => $product,
            'color' => $productColor,
            'size' => $productSize,
        ));
    }//end productModalAjax


    ////////////////////// Order Section //////////////////////
    public function userOrders(){
        $orders = Order::where('user_id' , Auth::user()->id)->orderBy('id' , 'DESC')->get();
        return view('frontend.orders.userOrders' , compact('orders'));
    }//end function userOrders

    public function userOrderDetails($order_id){
        $order = Order::with('country', 'city')->where('id' , $order_id)->where('id',$order_id)->first();
        $order_items = OrderItem::with('product')->where('order_id' , $order_id)->orderBy('id' , 'DESC')->get();
        return view('frontend.orders.userOrderDetails' , compact('order', 'order_items'));
    }//end function userOrders

    public function userOrderDownload($order_id){
        $order = Order::with('country','city','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	// return view('frontend.profile.order_invoice',compact('order','orderItem'));
        // dd($orderItem);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('frontend.orders.order_invoice' , compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }//end function userOrderDownload


    public function returnOrder(Request $request , $order_id){
        order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1
        ]);
        return redirect()->route('user.orders')->with('Done Send Return Order Request');
    }// end method returnOrder

    public function userReturnedOrder(){
        $orders = Order::where('user_id' , Auth::user()->id)->where('return_reason','!=' ,NULL)->orderBy('id' , 'DESC')->get();
        return view('frontend.orders.userReturnedOrders' , compact('orders'));
    }//end function userOrders

    public function userCanceledOrder(){
        $orders = Order::where('user_id' , Auth::user()->id)->where('cancel_date','!=' ,NULL)->orderBy('id' , 'DESC')->get();
        return view('frontend.orders.userCanceledOrders' , compact('orders'));
    }//end function userOrders

    public function orderTracking(Request $request){
        $invoice = $request->code;
        $order = Order::where('invoice_no' ,$invoice)->first();
        return view('frontend.orders.trackOrders' ,compact('order'));
    }//end function orderTracking


    public function productSearch(Request $request){
        $brands = Brand::latest()->orderBy('id' , 'DESC')->get();
        $search = $request->search;
        $products = Product::where('product_name_en' ,'LIKE' , "%$search%")->paginate(6);
        $categories = Category::latest()->get();
        return view('frontend.product.productFilters' , compact('products' , 'categories','brands'));
    }//end function productSearch


    public function productSearchAjax(Request $request){
        $search = $request->search;
        $products = Product::where('product_name_en','LIKE',"%$search%")->select('product_name_en','product_thambnail','selling_price','id','product_slug_en')->limit(5)->get();
        return view('frontend.product.productSearch' , compact('products'));
    }
}
