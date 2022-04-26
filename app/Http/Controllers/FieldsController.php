<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use DB;

class FieldsController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return view('fields.index', compact('fields'));
    }

    public function create()
    {
        return view('fields.create');
    }

    public function store(Request $request)
    {
        Field::create($request->all());
        return redirect()->route('fields.index');
    }
}
