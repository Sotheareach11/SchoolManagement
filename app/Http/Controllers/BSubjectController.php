<?php
namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class BSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::paginate(10); // This will retrieve subjects with pagination
        return view('Backend.pages.subject.index', compact('subjects'));
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
            'major_name' => 'required|string|min:2',
            'major_description' => 'nullable|string|min:2',
            'active' => 'required|string',
        ]);

        $validated['active'] = $validated['active'] === 'on';

        Subject::create($validated);

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