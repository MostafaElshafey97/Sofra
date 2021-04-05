<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
      $offers = Offer::with('restaurant')->paginate(20);
      return view('admin.offers.index',compact('offers'));
    }
  

    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect()->route('offer.index', ['restaurant_id' => $offer->restaurant])->with('success' , 'offer is deleted successfully');
    }
}
