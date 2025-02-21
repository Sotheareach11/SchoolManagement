<?php
namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class BTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with(['gender', 'schedule', 'major', 'course', 'subject'])->paginate(10);
        return view('Backend.pages.teacher.index', compact('teachers'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.pages.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:teachers',
            'biography' => 'nullable|string',
            'address' => 'nullable|string',
            'file' => 'nullable|mimes:jpg,png,pdf|max:2048'
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('teachers', 'public');
        }

        Teacher::create([
            'teacher_code' => 'CUR' . now()->format('YmdHis') . '-' . strtoupper(bin2hex(random_bytes(3))),
            'teacher_name' => $request->teacher_name,
            'gender' => 'Male', // You can change this to dynamic selection
            'dob' => $request->dob,
            'phone' => $request->phone,
            'email' => $request->email,
            'biography' => $request->biography,
            'address' => $request->address,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Teacher created successfully');
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