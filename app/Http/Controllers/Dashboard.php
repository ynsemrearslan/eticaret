<?php

namespace App\Http\Controllers;

use App\Products;
use App\Categories;
use App\Customer;
use App\Role;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Dashboard extends Controller
{
    public function index(){
      return view('back.dashboard');
    }
    public function product(){
      $categories=Categories::all();
      return view('back.product',compact('categories'));
    }
    public function customer(){
      return view('back.customer');
    }
    public function categories(){
      return view('back.categories');
    }
    public function login(){
      return view('back.login');
    }
    public function adminUser(){
      return view('back.adminUser');
    }
    public function allProduct(){
      $products=Products::orderBy('created_at','DESC')->get();
      return view('back.allProduct',compact('products'));
    }
    public function allCustomer(){
      $customers=Customer::orderBy('created_at','DESC')->get();
      return view('back.allCustomer',compact('customers'));
    }
    public function allCategories(){
      $categories=Categories::orderBy('created_at','DESC')->get();
      return view('back.allCategories',compact('categories'));
    }

    public function customerPost(Request $request){
      $customer=new Customer();
      $customer->name=$request->name;
      $customer->email=$request->mail;
      $customer->phone=$request->phone;
      $customer->status=$request->status;
      $customer->created_at=now();
      $customer->updated_at=now();
      $customer->save();
      return redirect()->route('customer')->with('success','Müşteri başarıyla oluşturuldu.');
    }
    public function adminPost(Request $request){
      $user=new Admin;
      $user->name=$request->name;

      $user->email=$request->mail;
      $user->role=$request->role;
      $user->status=$request->status;
      $user->created_at=now();
      $user->updated_at=now();
      $user->save();
      return redirect()->route('admin')->with('success','Admin kullanıcısı başarıyla oluşturuldu.');
    }
    public function categoriesPost(Request $request){
      $categories=new Categories();
      $categories->name=$request->name;
      if ($request->hasFile('image')) {
        $imageName=Str::slug($request->name).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('categories'),$imageName);
        $categories->photo='categories/'.$imageName;
      }
      $categories->status=$request->status;
      $categories->description=$request->content;
      $categories->created_at=now();
      $categories->updated_at=now();
      $categories->save();
      return redirect()->route('categories')->with('success','Kategori başarıyla oluşturuldu.');
    }
    public function productPost(Request $request)
    {
      $request->validate([
        'name'=>'min:3',
        'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'
      ]);
        $product=new Products;
        $product->name=$request->name;
        $product->category_id=$request->category;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->description=$request->content;
        if ($request->hasFile('image')) {
          $imageName=Str::slug($request->name).'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('uploads'),$imageName);
          $product->photo='uploads/'.$imageName;
        }
        $product->save();
        return redirect()->route('product')->with('success','Ürün başarıyla oluşturuldu.');
    }
    public function register(){
      return view('back.register');
    }
    public function registerPost(Request $request)
    {
      $request->validate([
        'new'=>'min:8',
      ]);
        $product=new Products;
        $product->name=$request->name;
        $product->category_id=$request->category;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->description=$request->content;
        if ($request->hasFile('image')) {
          $imageName=Str::slug($request->name).'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('uploads'),$imageName);
          $product->photo='uploads/'.$imageName;
        }
        $product->save();
        return redirect()->route('product')->with('success','Ürün başarıyla oluşturuldu.');
    }

}
