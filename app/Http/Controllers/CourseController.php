<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

/**
 * Topic 6: Laravel CRUD — Course management
 * Topic 7: Validation
 * Topic 9: Sessions — flash messages
 */
class CourseController extends Controller
{
    /**
     * Display a list of all courses.
     */
    public function index()
    {
        $courses = Course::withCount('students')->latest()->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created course.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'code'        => 'required|string|max:20|unique:courses,code',
            'description' => 'nullable|string|max:1000',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')
                         ->with('success', 'Course created successfully!');
    }

    /**
     * Display a single course with its students.
     */
    public function show(Course $course)
    {
        $course->load('students');
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing a course.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified course.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'code'        => 'required|string|max:20|unique:courses,code,' . $course->id,
            'description' => 'nullable|string|max:1000',
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')
                         ->with('success', 'Course updated successfully!');
    }

    /**
     * Delete a course.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
                         ->with('success', 'Course deleted successfully!');
    }
}
