<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentItem;
use Illuminate\Http\Request;

class DocumentItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Document $document)
    {
        $document->items()->create($request->all());
        return redirect(route('documents.edit', [$document->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentItem  $documentItem
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentItem $documentItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentItem  $documentItem
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentItem $documentItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentItem  $documentItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentItem $documentItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentItem  $documentItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentItem $documentItem)
    {
        //
    }
}
