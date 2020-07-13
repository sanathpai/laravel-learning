<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use DB;
use Hash;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Student::class, 'faculty');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', ['students'=>Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string|required',
            'email' => 'email|required|unique:users,email',
            'password' => 'string|required|min:5',
            'usn' => 'string|required|unique:students,usn',
        ]);
        $data['password'] = Hash::make($data['password']);
        DB::transaction(function () use($data) {
            $student = new Student();
            $student->fill($data);
            $student->save();
            $user = new User();
            $user->fill($data);
            $user->details()->associate($student)->save();
        }, 5);
        return redirect(route('students.index'))->with(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', ['student'=> $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', ['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'string|required',
            'usn' => 'string|required|unique:students,usn,' . $student->id . ',id',
        ]);
        DB::transaction(function () use($data, $student) {
            $student->fill($data);
            $user = $student->user;
            $user->fill($data);
            $user->save();
            $student->save();
        }, 5);
        return redirect(route('students.index'))->with(['message' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        DB::transaction(function () use($student){
            $student->user->delete();
            $student->delete();
        });
        return redirect(route('students.index'))->with(['message' => 'success']);
    }
}
