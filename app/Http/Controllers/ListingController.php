<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Gate;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'bed', 'bath', 'areaFrom', 'areaTo'
        ]);
        

        return inertia(
            'Listings/Index',
            [
                'filters' => $filters,
                'listings' => Listing::MostRecent()
                ->filter($filters)
                    ->paginate(10)->withQueryString()
            ]
        );
    }

    
     // Show the form for creating a new resource.
     public function show(Listing $listing)
    {
       // if (auth()->user()->can('view', $listing)) {
         //    abort(403);
       // }
       Gate::authorize('view', $listing);
      
         return inertia('Listings/Show', [
                'listing' => $listing,
            ]);
    }
       
  
    /**
     * Remove the specified resource from storage.
     */
   // public function destroy(Listing $listing)
   // {
    //    $listing->delete();
   //     return redirect()->back()->with('success', 'listing was deleted');
 //   }
}
