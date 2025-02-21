<?php
namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class BMajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.major', [
            'majors' => Major::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.major-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'major_name'        => 'required|string|min:2',
            'major_description' => 'nullable|string|min:2',
            'active'            => 'required|string',
        ]);

        $validated['active'] = $validated['active'] === 'on';

        Major::create($validated);

        return redirect('/backend/majors')->with('message', 'Major successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
