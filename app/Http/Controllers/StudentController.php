<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Topics covered:
 * 2 — Laravel Database (CRUD via Eloquent which uses DB under the hood)
 * 3 — Laravel Eloquent (mass assignment, soft delete, restore, withTrashed, onlyTrashed)
 * 6 — Laravel CRUD (list, view, create, edit, update, delete)
 * 7 — Laravel Validation (required fields, unique email, file validation)
 * 8 — Laravel File Upload (photo upload, replace, delete)
 * 9 — Laravel Sessions (flash messages)
 */
class StudentController extends Controller
{
    /**
     * Display a list of all students.
     */
    public function index()
    {
        // Topic 3: Eloquent — read all students with their course (eager loading)
        $students = Student::with('course')->latest()->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created student (with validation and file upload).
     */
    public function store(Request $request)
    {
        // Topic 7: Validation
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:students,email',
            'phone'     => 'nullable|string|max:20',
            'course_id' => 'required|exists:courses,id',
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Topic 8: File Upload — save photo if provided
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Topic 3: Eloquent — create with mass assignment using $fillable
        Student::create($validated);

        // Topic 9: Sessions — flash success message
        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully!');
    }

    /**
     * Display a single student.
     */
    public function show(Student $student)
    {
        // Topic 4: Relationships — load the course relationship
        $student->load('course');
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing a student.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified student.
     */
    public function update(Request $request, Student $student)
    {
        // Topic 7: Validation — unique email ignores the current student
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:students,email,' . $student->id,
            'phone'     => 'nullable|string|max:20',
            'course_id' => 'required|exists:courses,id',
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Topic 8: File Upload — replace old photo if a new one is uploaded
        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Topic 3: Eloquent — update
        $student->update($validated);

        // Topic 9: Sessions — flash success message
        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully!');
    }

    /**
     * Soft delete a student.
     */
    public function destroy(Student $student)
    {
        // Topic 3: Eloquent — soft delete
        $student->delete();

        // Topic 9: Sessions — flash message
        return redirect()->route('students.index')
                         ->with('success', 'Student moved to trash!');
    }

    /**
     * Show all trashed (soft-deleted) students.
     */
    public function trashed()
    {
        // Topic 3: Eloquent — onlyTrashed()
        $students = Student::onlyTrashed()->with('course')->latest()->get();
        return view('students.trashed', compact('students'));
    }

    /**
     * Restore a soft-deleted student.
     */
    public function restore($id)
    {
        // Topic 3: Eloquent — withTrashed() and restore()
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();

        // Topic 9: Sessions — flash message
        return redirect()->route('students.trashed')
                         ->with('success', 'Student restored successfully!');
    }

    /**
     * Permanently delete a trashed student.
     */
    public function forceDelete($id)
    {
        $student = Student::withTrashed()->findOrFail($id);

        // Topic 8: Delete photo file when permanently deleting
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        // Topic 3: Eloquent — forceDelete
        $student->forceDelete();

        // Topic 9: Sessions
        return redirect()->route('students.trashed')
                         ->with('success', 'Student permanently deleted!');
    }
}
