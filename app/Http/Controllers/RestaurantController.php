<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\AdsRequest;
use App\Models\restaurant;
use App\Models\Category;
use App\Models\Image;
use App\Models\RestaurantCategory;
use App\Models\Review;
use App\Models\User;
use App\Notifications\AdminNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use phpDocumentor\Reflection\Types\Null_;

use function PHPUnit\Framework\returnSelf;

class RestaurantController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'restaurant_name' => 'required',
            'location' => 'required',
            'area' => 'required',
            'home_delivery' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'breakfast' => 'required',
            'hitea' => 'required',
            'lunch_buffet' => 'required',
            'dinner_buffet' => 'required',
            'alacate' => 'required',
            'contact' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);
        $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
        if($restaurant != NULL){
            return redirect()->back()->with('message', "Already Owned a restaurant");
        }


        $added = restaurant::create($request->all());
        $i = 0;
        if($request->hasFile('file'))
            {
                $file=$request->file;
                $extension=$file->getClientOriginalExtension();
                $filename=time().$i.'.'.$extension;
                $file->move('assets/restaurant/', $filename);
                $request->file = $filename;
                Image::create([
                    'file_name' => $filename,
                    'restaurant_id' => $added->id,
                    'image_for' => 4
                ]);
            }
        if($request->category_id != null){
            for($i = 0; $i < count($request->category_id); $i++)
            {
                RestaurantCategory::create(['category_id' =>$request->category_id[$i],'restaurant_id' => $added->id]);
            }
        }
        $request->session()->flash('message', 'Category was successfully added!');
        return redirect('restaurants');
    }
    public function create()
    {
        $restaurantlist = restaurant::where('user_id',Auth::user()->id)->first();
        if(isset($restaurantlist)){
            $data       = restaurant::find($restaurantlist->id);
            $categories = Category::all();
            $image = Image::where('restaurant_id',$restaurantlist->id)->where('image_for',4)->first();
            return view('restaurant.updaterestaurant',compact('data','categories','image'));
        }
        $categories = Category::all();
        return view('restaurant.addrestaurant',compact('categories'));
    }
    public function index()
    {
        $restaurantlist = restaurant::where('user_id',Auth::user()->id)->get();
        return view('restaurant.view_restaurant',compact('restaurantlist'));
    }
    public function edit($id)
    {
        $data       = restaurant::find($id);
        $categories = Category::all();
        return view('restaurant.updaterestaurant',compact('data','categories'));

    }
    public function update(Request $request)
    {

        $restaurant =  restaurant::where('user_id',Auth::user()->id)->first();
        restaurant::where('id',$request->id)->update(['location' => $request->location,
        'restaurant_name' => $request->restaurant_name,'area' => $request->area,'home_delivery' =>$request->home_delivery,
        'description' => $request->description,'breakfast' => $request->breakfast
        ,'hitea' => $request->hitea,'lunch_buffet' => $request->lunch_buffet,'dinner_buffet' => $request->dinner_buffet,
        'alacate' => $request->alacate,'contact' => $request->contact,'brunch_menu' => $request->brunch_menu,"cellno" => $request->cellno]);
        $i = 0;
        if($request->hasFile('file'))
            {
                $file=$request->file;
                $extension=$file->getClientOriginalExtension();
                $filename=time().$i.'.'.$extension;
                $file->move('assets/restaurant/', $filename);
                $request->file = $filename;
                Image::where('restaurant_id',$restaurant->id)->where('image_for',4)->update(['file_name'=> $filename]);
            }
            if($request->category_id != null){
                $deleted =  RestaurantCategory::where('restaurant_id', $restaurant->id)
                                    ->whereNotIn("category_id",$request->category_id)
                                    ->get();
                foreach($deleted as $del){
                    $del->delete();
                }

                for($i = 0; $i < count($request->category_id); $i++)
                {
                    $cntrest = RestaurantCategory::where('category_id',$request->category_id[$i])
                                        ->where('restaurant_id', $restaurant->id)
                                        ->get();
                    if(count($cntrest) > 0){

                    }else{
                        RestaurantCategory::create(['category_id' =>$request->category_id[$i],'restaurant_id' => $restaurant->id]);
                    }

                }
            }

        return redirect()->back();
    }
    public function destroy(Request $request,$id)
    {
        $model = restaurant::find($id);
        $model->delete();
        $request->session()->flash('message','restaurant successfully deleted');
         return redirect()->back();
    }
    public function profile(){
        $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
        $profile_iamges = Image::where('restaurant_id',$restaurant->id ?? 0)->where('image_for', 5)->get();
        return view('restaurant.profile',compact('profile_iamges'));
    }

    public function profile_destroy(Image $image){
        $status = Image::where('id',$image->id)->delete();
        $image_path = public_path('assets/restaurant').'/'.$image->file_name;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        return redirect()->back();
    }

    public function profile_add(Request $request){
            for($i = 0;$i< count($request->file_name); $i++){
                $file=$request->file_name[$i];
                $extension=$file->getClientOriginalExtension();
                $filename=time().$i.'.'.$extension;
                $file->move('assets/restaurant/', $filename);
                $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
                Image::create(['file_name' => $filename,'restaurant_id' =>$restaurant->id,'image_for' => 5]);
            }
        return redirect()->back();
    }
    public function menu(){
        $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
        $menus = Image::where('restaurant_id',$restaurant->id ?? 0)->where('image_for', 1)->get();
        return view('restaurant.menu',compact('menus'));
    }

    public function menu_add(Request $request){
        for($i = 0;$i< count($request->file_name); $i++){
            $file=$request->file_name[$i];
            $extension=$file->getClientOriginalExtension();
            $filename=time().$i.'.'.$extension;
            $file->move('assets/restaurant/', $filename);
            $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
            Image::create(['file_name' => $filename,'restaurant_id' =>$restaurant->id,'image_for' => 1]);
        }
        return redirect()->back();
    }
    public function menu_destroy(Image $image){
        $status = Image::where('id',$image->id)->delete();
        $image_path = public_path('assets/restaurant').'/'.$image->file_name;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        return redirect()->back();
    }
    public function buffet(){
        $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
        $menus = Image::where('restaurant_id',$restaurant->id)->where('image_for', 2)->get();
        return view('restaurant.buffet',compact('menus'));
    }
    public function hitea(){
        $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
        $menus = Image::where('restaurant_id',$restaurant->id)->where('image_for', 3)->get();
        return view('restaurant.hitea',compact('menus'));
    }
    public function brunch(){
        $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
        $menus = Image::where('restaurant_id',$restaurant->id)->where('image_for', 6)->get();
        return view('restaurant.brunch',compact('menus'));
    }
    public function buffet_add(Request $request){
        for($i = 0;$i< count($request->file_name); $i++){
            $file=$request->file_name[$i];
            $extension=$file->getClientOriginalExtension();
            $filename=time().$i.'.'.$extension;
            $file->move('assets/restaurant/', $filename);
            $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
            Image::create(['file_name' => $filename,'restaurant_id' =>$restaurant->id,'image_for' => 2]);
        }
        return redirect()->back();
    }
    public function hitea_add(Request $request){
        for($i = 0;$i< count($request->file_name); $i++){
            $file=$request->file_name[$i];
            $extension=$file->getClientOriginalExtension();
            $filename=time().$i.'.'.$extension;
            $file->move('assets/restaurant/', $filename);
            $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
            Image::create(['file_name' => $filename,'restaurant_id' =>$restaurant->id,'image_for' => 3]);
        }
        return redirect()->back();
    }
    public function brunch_add(Request $request){
        for($i = 0;$i< count($request->file_name); $i++){
            $file=$request->file_name[$i];
            $extension=$file->getClientOriginalExtension();
            $filename=time().$i.'.'.$extension;
            $file->move('assets/restaurant/', $filename);
            $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
            Image::create(['file_name' => $filename,'restaurant_id' =>$restaurant->id,'image_for' => 6]);
        }
        return redirect()->back();
    }
    public function restaurant_details($slug){
        $restaurant = restaurant::where('slug',$slug)->first();
        restaurant::where('slug',$slug)->update(["count" => $restaurant->count +1]);
        $data = Category::all();
        $reviews = Review::where('restaurant_id',$restaurant->id)->get();
        $recommended_restaurants = restaurant::where('id', '!=' , $restaurant->id)
                                                ->limit(6)
                                                ->inRandomOrder()
                                                ->get();
//  return $restaurant;
       //return $recommended_restaurants;
        return view('restaurant.details',compact('data','restaurant','reviews','recommended_restaurants'));
    }
    public function admin_restaurant(){

        $restaurantlist = restaurant::all();
        return view('admin.admin_restaurant',compact('restaurantlist'));

    }
    public function make_feature(restaurant $restaurant){
        $value = ( $restaurant->isfeature == 0) ? 1:0;
        restaurant::where('id',$restaurant->id)->update(['isfeature' => $value]);
        return redirect()->back();
    }
    public function add_review(Request $request){
        Review::create([
            'name' =>$request->name,
            'review' => $request->review,
            'restaurant_id' =>$request->id
        ]);
        return redirect()->back();
    }

    public function update_password(Request $request)
    {

      $oldpassword = $request->oldpassword;

      if (Hash::check($oldpassword, Auth::user()->password)) {

        Auth::user()->update(['password'=>bcrypt($request->newpassword)]);
        return back()->with('message','password chnaged successfully.');

      } else {
        return back()->with('message_error','Please Enter Correct Old Password.');
      }


    }
    public function unpublish($id){
        restaurant::where('id',$id)->update(['publish'=> 1]);
        return redirect()->back();
    }

    public function publish($id){

        $res = restaurant::find($id);
        $images  = Image::where('restaurant_id',$id)->where('image_for',1)->get();
        if(count($images)  == 0){
            return view('frontend.layout.alert');
        }
        restaurant::where('id',$id)->update(['publish'=> 0]);
        $data = [
            'restaurant_id' => $id,
            'new' => 'new',
            'user_id' => 1,
            'name' => $res->restaurant_name,
        ];
        try{
            Notification::send(User::find(1),new AdminNotification($data));
        }catch(\Throwable $ex){

        }
        return redirect()->back();
    }
    public function viewsinglerestaurant($id){
        $restaurantlist = restaurant::where('id',$id)->get();
        return view('admin.admin_restaurant',compact('restaurantlist'));
    }
    public function readall(){
        Auth::user()
            ->unreadNotifications
            ->markAsRead();
        return redirect()->back();
    }
    public function bannerad(){
        $ads = Ads::all();
        return view('admin.banner',compact('ads'));
    }
    public function bannerads(Request $request){
        $i = 0;
        $file=$request->file_name;
        $extension=$file->getClientOriginalExtension();
        $filename=time().$i.'.'.$extension;
        $file->move('assets/restaurant/', $filename);
        $request->file_name = $filename;
        Ads::create(['file_name' => $filename, 'adtype' => $request->adtype,'daysfor' => $request->daysfor,'url' => $request->url]);
        return redirect()->back();
    }
    public function ads_delete($id){
        $model = Ads::find($id);
        $model->delete();
        return redirect('bannerad');
    }
    public function publisad($id){
        $model = Ads::find($id);
        Ads::where('adtype',$model->adtype)->update(['publish' => 0]);
        $model->publish = 1;
        $model->save();
        return redirect('bannerad');
    }
    public function unpublisad($id){
        $model = Ads::find($id);
        $model->publish = 0;
        $model->save();
        return redirect('bannerad');
    }
    public function checkout(Request $request){
        $packagedata = new User();
        $packagedata->adtype = $request->adtype;
        $packagedata->price = $request->price;
        $packagedata->package_name = $request->package_name;
        $packagedata->days = $request->days;
        $data = Category::all();
        return view('frontend.checkout',compact('packagedata','data'));
    }
    public function purchasePackage(Request $request){
        $i = 1;
        if(isset($request->file_name)){
            $file=$request->file_name;
            $extension=$file->getClientOriginalExtension();
            $filename=time().$i.'.'.$extension;
            $file->move('assets/restaurant/', $filename);
            $request->file_name = $filename;
            $ads = AdsRequest::create($request->all());
            AdsRequest::where('id',$ads->id)->update(['file_name' => $filename]);
        }

        //Upload Buzz in town
        if(isset($request->buzzintownmenu)){
            $i++;
            $file=$request->buzzintownmenu;
            $extension=$file->getClientOriginalExtension();
            $filename=time().$i.'.'.$extension;
            $file->move('assets/restaurant/', $filename);
            $request->buzzintownmenu = $filename;
            AdsRequest::where('id',$ads->id)->update(['buzzintownmenu' => $filename]);
        }

        return redirect()->route('user_pending_requests');

    }
    public function user_pending_requests(){
        $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
        $data = AdsRequest::where('restaurant_id',$restaurant->id)
                                ->where('ad_status',0)
                                ->orderby('created_at','desc')
                                ->get();
        return view('Requests.userpendingrequests',compact('data'));
    }
    public function accepted_request(){
        $restaurant = restaurant::where('user_id',Auth::user()->id)->first();
        $data = AdsRequest::where('restaurant_id',$restaurant->id)
                    ->where('ad_status',1)
                    ->orderby('ad_date','desc')
                    ->get();
        return view('Requests.acceptedrequest',compact('data'));
    }
    public function pending_requests_admin(){
        $data = AdsRequest::where('ad_status',0)->orderby('created_at','desc')->get();
        return view('Requests.userpendingrequests',compact('data'));
    }
    public function accepted_request_admin(){
        $data = AdsRequest::where('ad_status','!=',0)->orderby('ad_date','desc')->get();
        foreach($data as $ad){
            $date = Carbon::parse($ad->ad_date);
            $now = Carbon::now();
            $diff = $date->diffInDays($now);
            $ad->days_past = $diff;
        }
        return view('Requests.acceptedrequest',compact('data'));
    }
    public function change_payment_status(Request $request){
        $status = $request->accept == 'Accept' ? 1: 0;
        AdsRequest::where('id',$request->id)->update(['payment_status' =>$status ]);
        return redirect()->back();
    }
    public function change_ad_status(Request $request){
        $status = $request->accept == 'Publish' ? 1: 0;
        $ads = AdsRequest::find($request->id);
        if($ads->adtype == 1 && $ads->buzzintownmenu == null){
            restaurant::where('id',$ads->Ads[0]->id)->update(['isfeature' => 1]);
        }
        AdsRequest::where('id',$request->id)->update(['ad_status' =>$status,'ad_date' => Carbon::now() ]);
        return redirect()->back();
    }
    public function stop_advertisement(AdsRequest $ad){
        $ad->ad_status = 2;
        if($ad->adtype == 1 && $ad->buzzintownmenu == null){
            restaurant::where('id',$ad->Ads[0]->id)->update(['isfeature' => 0]);
        }
        $ad->save();
        return redirect()->back();
    }
    public function delete_request(AdsRequest $ad){
        $ad->delete();
        return redirect()->back();
    }

}

