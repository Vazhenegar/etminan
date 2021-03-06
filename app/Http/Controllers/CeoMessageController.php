<?php

namespace App\Http\Controllers;

use App\Models\CeoMessage;
use Illuminate\Http\Request;

class CeoMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('PageElements.Dashboard.Setting.CeoMessage');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CeoMessage  $ceoMessage
     * @return \Illuminate\Http\Response
     */
    public function show(CeoMessage $ceoMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CeoMessage  $ceoMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(CeoMessage $ceoMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CeoMessage  $ceoMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CeoMessage $ceoMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CeoMessage  $ceoMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CeoMessage $ceoMessage)
    {
        //
    }
}
