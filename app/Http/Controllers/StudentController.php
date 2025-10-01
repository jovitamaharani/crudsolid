<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\StudentInterface;
use App\Http\Request\StudentRequest;
use App\Http\Requests\StudentRequest as RequestsStudentRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Iluminate\View\View;

use Illuminate\Http\Request;
   // controller mengatur alur kerja

class StudentController extends Controller
{
    private StudentInterface $student;

    // construct untuk menjadikan model menjadi sebuah object
    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->student->get();
        return view('student.student', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestsStudentRequest $request): RedirectResponse
    {
        $this->student->store($request->validated());

        return back()->with('success', 'berhasil menambah data!');
    }

    public function update(RequestsStudentRequest $request, Student $student): RedirectResponse
    {
        $this->student->update($student->id, $request->validated());
        
        return back()->with('success', 'berhasil memperbarui data!');
    }
    
    public function destroy(Student $student): RedirectResponse
    {
        $this->student->delete($student->id);
        return back()->with('success', "berhasil menghapus data");
    }
}
