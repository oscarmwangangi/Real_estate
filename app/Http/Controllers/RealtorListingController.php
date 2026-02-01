<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RealtorListingController extends Controller
{
        public function __construct()
    {
         Gate::authorize(Listing::class, 'listing');
    }

     public function index(Request $request)
    {
        $filters = [
             'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        return inertia(
            'Realtor/Index',
            [
                'listings' => Auth::user()
                    ->listings()
                    //->mostRecent()
                    ->filter($filters)
                    ->get()
            ]
        );
    }
    public function Delete(Request $request, $id){
        $listing = Auth::user()->listings()->where('id', $id)->firstOrFail();
        $listing->delete();
        return redirect()->back('realtor.index')->with('success', 'Listing deleted successfully.');
    }
}
