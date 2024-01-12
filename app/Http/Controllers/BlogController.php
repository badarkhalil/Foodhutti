<?php

namespace App\Http\Controllers;

use App\Mail\CntactEmail;
use App\Models\AdsRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;

class BlogController extends Controller
{

    public function index(){
        $data = Category::all();
        $restaurants = restaurant::inRandomOrder()->where('publish',0)->get();

        $feature_restaurants = restaurant::where('isfeature',1)->where('publish',0)->orderby('updated_at','desc')->get();

        $newly_added = restaurant::where('publish',0)->orderby('created_at','desc')->get();
       // return $restaurants;
        return view('frontend.home',compact('data','restaurants','feature_restaurants','newly_added'));
    }

    public function About(){
        return view('frontend.About');
    }

    public function Contact(){
        $data = Category::all();
        return view('frontend.Contact',compact('data'));
    }

    public function searchbycategory($id){
        $ids = DB::table('restaurants')
                    ->join('restaurant_categories', 'restaurant_categories.restaurant_id', '=', 'restaurants.id')
                    ->where('restaurant_categories.category_id', $id)
                    ->where('restaurants.publish',0)
                    ->select('restaurants.*')
                    ->get()
                    ->pluck('id');
        $datasearch = restaurant::whereIn('id',$ids)->orderBy('created_at','desc')->orderBy('isfeature','asc')->paginate(20);
        $data = Category::all();
        return view('frontend.filtered_restaurant',compact('datasearch','data'));
    }
    public function image(){
        $image = Image::all();
        return view('frontend.image',compact('image'));
    }
    public function search_filter(Request $request){
        $restaurants = Null;
        $city = $request->city == 0 ? 'city' : $request->city;
        $name = $request->name == null ? 'name' : $request->name;
        $area = $request->area == null ? 'area' : $request->area;

        $val = 0;

        if($city != 'city'){
            $val++;
        }
        if($name != 'name'){
            $val++;
        }
        if($request->lat != -1){
            $val++;
        }
        $restaurants = [];
        $distance = 5;
        $ids= array();
        $data = DB::table('restaurants')
                    ->select(DB::raw('*,
                        ( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians(lat) ) ) ) AS distance'))
                    ->having('distance', '<', $distance)
                    ->orderBy('distance', 'asc')
                    ->setBindings([$request->lat, $request->lng, $request->lat])
                    ->get();
        for($i = 0;$i<count($data);$i++){
            array_push($ids,$data[$i]->id);
        }
        if($val == 1){
            if($city != 'city'){
                $restaurants = restaurant::where('publish',0)
                ->where('location',$city)
                ->orderby('isfeature','desc')
                ->orderby('created_at','desc')
                ->paginate(20);
            }
            if($name != 'name'){
                $restaurants = restaurant::where('restaurant_name', 'like','%'.$name.'%')
                                ->where('publish',0)
                                ->orderby('isfeature','desc')
                                ->orderby('created_at','desc')
                                ->paginate(20);
            }
            if($request->lat != -1){
                $restaurants = restaurant::where('publish',0)
                                            ->WhereIn('id',$ids)
                                            ->orderby('isfeature','desc')
                                            ->orderby('created_at','desc')
                                            ->paginate(20);

            }

        }else if($val == 2){

            if($city != 'city' && $name != 'name'){
                $restaurants = restaurant::where('restaurant_name', 'like', '%' . $name . '%')
                                ->where('publish',0)
                                ->Where('location', 'like', '%' . $city . '%')
                                ->orderby('isfeature','desc')
                                ->orderby('created_at','desc')
                                ->paginate(20);

            }else if($city != 'city' && $area != 'area'){
                $restaurants = restaurant::where('location', 'like', '%' . $city . '%')
                                ->where('publish',0)
                                ->WhereIn('id',$ids)
                                ->orderby('isfeature','desc')
                                ->orderby('created_at','desc')
                                ->paginate(20);

            }else if($area != 'area' && $name != 'name'){
                $restaurants = restaurant::where('restaurant_name', 'like', '%' . $name . '%')
                            ->where('publish',0)
                            ->WhereIn('id',$ids)
                            ->orderby('isfeature','desc')
                            ->orderby('created_at','desc')
                            ->paginate(20);

            }
        }else if($val == 3){
            $restaurants = restaurant::where('restaurant_name', 'like', '%' . $name . '%')
                                        ->where('publish',0)
                                        ->where('location', 'like', '%' . $city . '%')
                                        ->orWhereIn('id',$ids)
                                        ->orderby('isfeature','desc')
                                        ->orderby('created_at','desc')
                                        ->paginate(20);
        }

        $restaurants->appends(['lat' => $request->lat]);
        $restaurants->appends(['lng' => $request->lng]);
        $restaurants->appends(['name' => $request->name]);
        $restaurants->appends(['city' => $request->city]);
        $restaurants->appends(['area' => $request->area]);
        $data = Category::all();
        return view('frontend.filtered_restaurant',compact('restaurants','data'));
    }
    public function searchcategorysearch(Request $request,$id){


        /*$restaurants = Null;
        $city = $request->city == 0 ? 'kjkljslkfjskld' : $request->city;
        $name = $request->name == null ? ';asdajkldasld' : $request->name;
        $area = $request->area == null ? 'alksdjlaslkj' : $request->area;

        $rest = restaurant::where('restaurant_name', 'like', '%' . $name . '%')
                                ->where('publish',0)
                                ->orWhere('location', 'like', '%' . $city . '%')
                                ->orWhere('area', 'like', '%' . $area . '%')
                                ->orderby('isfeature','desc')
                                ->orderby('created_at','desc')
                                ->get();

        $restaurants = [];
        for($i = 0; $i < count($rest); $i++){
            for($j = 0; $j < count($rest[$i]->category); $j++){
                if($rest[$i]->category[$j]->category_id == $id){
                    array_push($restaurants,$rest[$i]);
                }
            }
        }
        $data = Category::all();*/
        $restaurants = Null;
        $city = $request->city == 0 ? 'city' : $request->city;
        $name = $request->name == null ? 'name' : $request->name;
        $area = $request->area == null ? 'area' : $request->area;

        $val = 0;

        if($city != 'city'){
            $val++;
        }
        if($name != 'name'){
            $val++;
        }
        if($request->lat != -1){
            $val++;
        }
        $restaurants = [];
        $distance = 5;
        $ids= array();
        //return DB::select();
        $data = DB::table('restaurants')
                ->select(DB::raw('*,
                    ( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians(lat) ) ) ) AS distance'))
                ->having('distance', '<', $distance)
                ->orderBy('distance', 'asc')
                ->setBindings([$request->lat, $request->lng, $request->lat])
                ->get();
        for($i = 0;$i<count($data);$i++){
            array_push($ids,$data[$i]->id);
        }
        if($val == 1){
            if($city != 'city'){
                $restaurants = restaurant::where('publish',0)
                ->where('location',$city)
                ->where('publish',0)
                ->orderby('isfeature','desc')
                ->orderby('created_at','desc')
                ->paginate(20);
            }
            if($name != 'name'){
                $restaurants = restaurant::where('restaurant_name', 'like','%'.$name.'%' )
                                ->where('publish',0)
                                ->orderby('isfeature','desc')
                                ->orderby('created_at','desc')
                                ->paginate(20);
            }
            if($request->lat != -1){
                $restaurants = restaurant::where('publish',0)
                                            ->WhereIn('id',$ids)
                                            ->orderby('isfeature','desc')
                                            ->orderby('created_at','desc')
                                            ->paginate(20);

            }

        }else if($val == 2){

            if($city != 'city' && $name != 'name'){
                $restaurants = restaurant::where('restaurant_name', 'like', '%' . $name . '%')
                                ->where('publish',0)
                                ->Where('location', 'like', '%' . $city . '%')
                                ->orderby('isfeature','desc')
                                ->orderby('created_at','desc')
                                ->paginate(20);

            }else if($city != 'city' && $request->lat != -1){
                $restaurants = restaurant::where('location', 'like', '%' . $city . '%')
                                ->where('publish',0)
                                ->WhereIn('id',$ids)
                                ->orderby('isfeature','desc')
                                ->orderby('created_at','desc')
                                ->paginate(20);

            }else if($request->lat != -1 && $name != 'name'){
                $restaurants = restaurant::where('restaurant_name', 'like', '%' . $name . '%')
                            ->where('publish',0)
                            ->WhereIn('id',$ids)
                            ->orderby('isfeature','desc')
                            ->orderby('created_at','desc')
                            ->paginate(20);

            }
        }else if($val == 3){
            $restaurants = restaurant::where('restaurant_name', 'like', '%' . $name . '%')
                                        ->where('publish',0)
                                        ->where('location', 'like', '%' . $city . '%')
                                        ->orWhereIn('id',$ids)
                                        ->orderby('isfeature','desc')
                                        ->orderby('created_at','desc')
                                        ->paginate(20);
        }
        //return $restaurants;
        $data = Category::all();
         $restaurants_new = [];
        for($i = 0; $i < count($restaurants); $i++){
            for($j = 0; $j < count($restaurants[$i]->category); $j++){
                if($restaurants[$i]->category[$j]->category_id == $id){
                    array_push($restaurants_new,$restaurants[$i]);
                }
            }
        }
        $restaurants =  $restaurants_new;
        return view('frontend.filtered_restaurant',compact('restaurants','data'));
    }
    public function contactemail(Request $request){
        $data = ['name' => $request->name,'email' =>$request->email,'message' => $request->message];
        Mail::to("foodhutti777@gmail.com")
            ->bcc([$request->email])
            ->send(new CntactEmail($data));
            return redirect()->back();
    }
    public function packages(){
        $data = Category::all();
        return view('frontend.packages',compact('data'));
    }

    public function howitworks(){
        $data = Category::all();
        return view('frontend.howitworks',compact('data'));
    }
    public function buzzintown(Request $request){
        $lat = 45.46;
        $lng = -75.5;
        $distance = 100;
        $ip = request()->ip();
        $ip = "31.192.212.130"; //for testing ucomment this line otherwise error on localhost
        $url = 'http://ip-api.com/json/'.$ip;
        $client = new Client();
        $response = $client->get($url);
        $response = json_decode($response->getBody());

        $lat =  $response->lat;
        $lng =  $response->lon;

        $distance = 100;
        $ids= array();

        $data = DB::select(DB::raw('SELECT *, ( 3959 * acos( cos( radians(' . $lat  . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $lng  . ') ) + sin( radians(' . $lat  .') ) * sin( radians(lat) ) ) ) AS distance FROM restaurants HAVING distance < ' . $distance . ' ORDER BY distance asc') );
        for($i = 0;$i<count($data);$i++){
            array_push($ids,$data[$i]->id);
        }
        $restaurants =  AdsRequest::where('ad_status',1)
                        ->where('adtype','!=',1)
                        ->orWhereIn('restaurant_id',$ids)
                        ->whereNull('buzzintownmenu')
                        ->get();
        $feature_restaurants = AdsRequest::where('ad_status',1)->whereNotNull('buzzintownmenu')->orWhereIn('restaurant_id',$ids)->get();
        $data = Category::all();
      //  return $feature_restaurants;
        return view('frontend.buzzintown',compact('data','restaurants','feature_restaurants'));
    }
}
