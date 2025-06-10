<?php

namespace App\Http\Controllers;

use App\Models\CalidaCredential;
use App\Http\Requests\CalidaCredentialRequest;

/**
 * Class CalidaCredentialController
 * @package App\Http\Controllers
 */
class CalidaCredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calidaCredentials = CalidaCredential::all();

        return view('calida-credential.index', compact('calidaCredentials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $calidaCredential = new CalidaCredential();
        return view('calida-credential.create', compact('calidaCredential'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CalidaCredentialRequest $request)
    {
        CalidaCredential::create($request->validated());

        return redirect()->route('calida-credentials.index')
            ->with('success', 'CalidaCredential created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $calidaCredential = CalidaCredential::find($id);

        return view('calida-credential.show', compact('calidaCredential'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $calidaCredential = CalidaCredential::find($id);

        return view('calida-credential.edit', compact('calidaCredential'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CalidaCredentialRequest $request, CalidaCredential $calidaCredential)
    {
        $calidaCredential->update($request->validated());

        return redirect()->route('calida-credentials.index')
            ->with('success', 'CalidaCredential updated successfully');
    }

    public function destroy($id)
    {
        CalidaCredential::find($id)->delete();

        return redirect()->route('calida-credentials.index')
            ->with('success', 'CalidaCredential deleted successfully');
    }
}
