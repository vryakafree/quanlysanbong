<?php

namespace App\Http\Controllers;

use App\Models\Field;
use DB;
use Illuminate\Http\Request;

class FieldsController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return view('fields.index', compact('fields'));
    }

    public function store(Request $request)
    {
        Field::create($request->all());
        return redirect()->route('fields.index');
    }

    public function create()
    {
        return view('fields.create');
    }
}
