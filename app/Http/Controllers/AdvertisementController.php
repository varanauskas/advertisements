<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Http\Requests\StoreAdvertisement;
use App\Http\Requests\UpdateAdvertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Instantiate a new controller instance.
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of advertisements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::orderByDesc('created_at')->paginate(9);
        return view('advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new advertisement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Advertisement::class);
        return view('advertisements.create');
    }

    /**
     * Store a newly created advertisement in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertisement  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisement $request)
    {
        $advertisement = Auth::user()->advertisements()->create($request->all());
        return redirect()
            ->route('advertisements.show', $advertisement->id)
            ->with('success', 'Advertisement posted!');
    }

    /**
     * Display the specified advertisement.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        $this->authorize('view', $advertisement);
        return view('advertisements.show', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified advertisement.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        $this->authorize('update', $advertisement);
        return view('advertisements.edit', compact('advertisement'));
    }

    /**
     * Update the specified advertisement in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertisement  $request
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisement $request, Advertisement $advertisement)
    {
        $advertisement->update($request->all());
        return redirect()
            ->route('advertisements.show', $advertisement->id)
            ->with('success', 'Advertisement updated!');
    }

    /**
     * Remove the specified advertisement from storage.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $this->authorize('delete', $advertisement);
        $advertisement->delete();
        return back()->with('success', 'Advertisement deleted!');
    }
}
