<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (Auth::check()) {
            $courses = Course::all();
            return view('courses', ['courses' => $courses], ['user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('course_create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $data = $request->only('title', 'description', 'date', 'start_time', 'end_time');

        $course = new Course();
        $course->title = $data['title'];
        $course->description = $data['description'];
        $course->date = $data['date'];
        $course->start_time = $data['start_time'];
        $course->end_time = $data['end_time'];
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Corso aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $user = Auth::user();
        return view('course_detail', ['course' => $course], ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses_update', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->only('title', 'description', 'date', 'start_time', 'end_time');
        $course->update($data);

        return redirect()->route('courses.show', $course)->with('success', 'Corso aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Corso eliminato con successo!');
    }
}
