<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutiBawahanController extends Controller
{
    public function index()
    {
        return inertia('Bawahan/Cuti');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}