<?php

namespace App\Http\Controllers;

use App\Models\CalidaToken;
use App\Http\Requests\CalidaTokenRequest;

/**
 * Class CalidaTokenController
 * @package App\Http\Controllers
 */
class CalidaTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calidaTokens = CalidaToken::all();

        return view('calida-token.index', compact('calidaTokens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $calidaToken = new CalidaToken();
        return view('calida-token.create', compact('calidaToken'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CalidaTokenRequest $request)
    {
        CalidaToken::create($request->validated());

        return redirect()->route('calida-tokens.index')
            ->with('success', 'CalidaToken created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $calidaToken = CalidaToken::find($id);

        return view('calida-token.show', compact('calidaToken'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $calidaToken = CalidaToken::find($id);

        return view('calida-token.edit', compact('calidaToken'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CalidaTokenRequest $request, CalidaToken $calidaToken)
    {
        $calidaToken->update($request->validated());

        return redirect()->route('calida-tokens.index')
            ->with('success', 'CalidaToken updated successfully');
    }

    public function destroy($id)
    {
        CalidaToken::find($id)->delete();

        return redirect()->route('calida-tokens.index')
            ->with('success', 'CalidaToken deleted successfully');
    }
}
