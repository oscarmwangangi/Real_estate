<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Listing::class);
        return inertia('Listings/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bed' => 'required|numeric',
            'bath' => 'required|numeric',
            'area' => 'required|numeric',
            'city' => 'required|string',
            'code' => 'required|string',
            'street' => 'required|string',
            'street_nr' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Listing::create($validated);

        return redirect()->route('listings.index')->with('success', 'listing was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
       // if (auth()->user()->can('view', $listing)) {
         //    abort(403);
       // }
       $this->authorize('view', $listing);
      
         return inertia('Listings/Show', [
                'listing' => $listing,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia('Listings/Edit',

           
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', Listing::class);
        $validated = $request->validate([
            'bed' => 'required|numeric',
            'bath' => 'required|numeric',
            'area' => 'required|numeric',
            'city' => 'required|string',
            'code' => 'required|string',
            'street' => 'required|string',
            'street_nr' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $listing = Listing::findOrFail($id);
        $listing-> update($request->all());
        return redirect()->route('listings.index')->with('success', 'listing was updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('success', 'listing was deleted');
    }
}
