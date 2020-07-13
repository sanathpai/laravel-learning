<?php

namespace App\Http\Controllers;

use App\SubModule;
use App\Module;
use Illuminate\Http\Request;

class SubModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Module $module)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Module $module)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Module $module)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubModule  $subModule
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module, SubModule $subModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubModule  $subModule
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module, SubModule $subModule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubModule  $subModule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module, SubModule $subModule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubModule  $subModule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module, SubModule $subModule)
    {
        //
    }
}
