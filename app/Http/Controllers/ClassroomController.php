<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Http\Requests\ClassroomRequest;
// use App\Http\Request\ClassroomRequest;
// use App\Http\Requests\ClassroomRequest as ClassroomRequest;
use Illuminate\Http\RedirectResponse;
use Iluminate\View\View;


class ClassroomController extends Controller
{
    private ClassroomInterface $classroom;

    // construct untuk menjadikan model menjadi sebuah object
    public function __construct(ClassroomInterface $classroom)
    {
        $this->classroom = $classroom;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = $this->classroom->get();
        return view('student.classroom', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request, Classroom $classroom)
    {
        $this->classroom->store($request->validated());

        return back()->with('success', 'berhasil menambah data!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        $this->classroom->update($classroom->id, $request->validated());
        
        return back()->with('success', 'berhasil memperbarui data!');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $this->classroom->delete($classroom->id);
        return back()->with('success', "berhasil menghapus data");
    }
}
