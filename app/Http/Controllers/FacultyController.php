<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\User;
use DB;
use Hash;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faculty.index', ['faculties' => Faculty::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'email|required',
            'password' => 'string|required|min:5',
            'employee_code' => 'string|required',
            'designation' => 'string|required',
        ]);
        $data['password'] = Hash::make($data['password']);
        DB::transaction(function () {
            $faculty = new Faculty();
            $faculty->fill($data);
            $faculty->save();
            $user = new User();
            $user->fill($data);
            $user->details()->associate($faculty)->save();
        }, 5);
        return ['message' => 'success'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        return $faculty;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $data = $request->validate([
            'name' => 'string|required',
            'employee_code' => 'string|required|unique:faculties,employee_code,' . $faculty->id . ',id',
            'designation' => 'string|required',
        ]);
        DB::transaction(function () {
            $faculty->fill($data);
            $user = $faculty->user;
            $user->fill($data);
            $user->save();
            $faculty->save();
        }, 5);
        return $faculty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        DB::transaction(function () {
            $faculty->user->delete();
            $faculty->delete();
        });
    }
}