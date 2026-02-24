<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::with('user')
            ->latest()
            ->paginate(10);

        return Inertia::render('Listings/Index', [
            'listings' => $listings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Listings/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        $listing = $request->user()->listing()->create(
            $request->validated()
        );

        return redirect()
            ->route('listings.show', $listing)
            ->with('success', 'Объявление создано');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $listing->load('user');

        return Inertia::render('Listings/Show', [
            'listing' => $listing,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        abort_if(
            $listing->user_id !== auth()->id(),
            403,
            'Вы не можете редактировать это объявление'
        );

        return Inertia::render('Listings/Edit', [
            'listing' => $listing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        abort_if(
            $listing->user_id !== auth()->id(),
            403
        );

        $listing->update($request->validated());

        return redirect()
            ->route('listings.show', $listing)
            ->with('success', 'Объявление обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        abort_if(
            $listing->user_id !== auth()->id(),
            403
        );

        $listing->delete();

        return redirect()
            ->route('listings.index')
            ->with('success', 'Объявление удалено');
    }
}
