<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Hospital $hospital)
    {
        $success = session('success');
        $error = session('error');
        $offers = $hospital->offers;
        return view('admin.offers.index',compact('hospital','offers','success','error'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hospital $hospital)
    {
        return view('admin.offers.create',compact('hospital'));
    }

    /**
     * Store a newly created resource in storage.
     */
   
   
   
   
   
   
    public function store(Request $request,Hospital $hospital)
    {
       
    
        $old_price = $request->old_price;
        $persantage_offer = $request->persantage_offer;

        $new_price = ($old_price * $persantage_offer)/100;
    
    $request->validate([
        'title' => ['required','string','max:255'],
        'old_price' => ['required','numeric'],
        'new_price' => ['required','numeric'],
        'offer_img'=>['image','dimensions:min_width=100,min_height=100' ,'nullable','mimes:jpeg,png,webp,svg'],
        'persantage_offer' =>['required','int'],
       
        ]);
   
      
      
      if($request->hasFile('offer_img')){
        $file = $request->file('offer_img');
        $img_name = uniqid(). '.' .$file->getClientOriginalExtension();
        $file->move(public_path('offer_imgs'),$img_name);
        $path ='offer_imgs/'.$img_name;
      }
      
        $created = Offer::create([
        'title' => $request->title,
        'old_price' => $request->old_price,
        'persantage_offer' => $request->persantage_offer,
        'new_price' => $new_price,
        'offer_img' =>$path ?? null,
        'hospital_id'=>$hospital->id,
        ]);
       
        if($created){
        
        return redirect()->route('admin.offers.index',$hospital->id)->with('success','offer added !');
        
        }else{
          
            return redirect()->route('admin.offers.index',$hospital->id)->with('error','offer not added !');
        }
        }

    
    
    
    
    
    
        /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital , Offer $offer)
    {
        return view('admin.offers.show',compact('hospital','offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital , Offer $offer)
    {
        return view('admin.offers.edit',compact('hospital','offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital , Offer $offer)
    {
        $old_img=$offer->offer_img;
    
       $old_price = $request->old_price;
        $persantage_offer = $request->persantage_offer;

        $new_price = ($old_price * $persantage_offer)/100;
    
      
      
      
        $request->validate([
        'title' => ['required','string','max:255'],
        'old_price' => ['required','numeric'],
        'new_price' => ['required','numeric'],
        'offer_img'=>['image','dimensions:min_width=100,min_height=100' ,'nullable','mimes:jpeg,png,webp,svg'],
        'persantage_offer' =>['required','int'],
       
        ]);
   
      
      
      if($request->hasFile('offer_img')){
      
       if($old_img && file_exists(public_path($old_img))){
        unlink(public_path($old_img));
       }
      
      $file = $request->file('offer_img');
        $img_name = uniqid(). '.' .$file->getClientOriginalExtension();
        $file->move(public_path('offer_imgs'),$img_name);
        $path ='offer_imgs/'.$img_name;
      }
      
        $updated = $offer->update([
        'title' => $request->title,
        'old_price' => $request->old_price,
         'persantage_offer' => $request->persantage_offer,
        'new_price' => $new_price,
        'offer_img' =>$path ?? $old_img,
        'hospital_id'=>$offer->hospital_id
        ]);
       
        if($updated){
        
        return redirect()->route('admin.offers.index',$hospital->id)->with('success','offer updated !');
        
        }else{
          
            return redirect()->route('admin.offers.index',$hospital->id)->with('error','offer not updated !');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital,Offer $offer)
    {
        $old_img = $offer->offer_img;
        $deleted = $offer->delete();
       
        if($old_img && file_exists(public_path($old_img))){
         unlink(public_path($old_img));
       }

         return redirect()->route('admin.offers.index',$hospital->id)->with('success','offer deleted !');
       }
}
