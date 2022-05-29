<?php

namespace App\Http\Controllers;

use App\Models\BookField;
use App\Models\Type;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class BookFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookfields = BookField::all();
        return view('user_stuff.timetable', compact('bookfields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $attributes = [
            'field_id' => $request->input('field_id'),
            'start_at' => $request->input('start_at'),
        ];

        // return existing reservation if exists
        $bookfield = BookField::where($attributes)->first();

        if ($bookfield !== null) {
            return redirect()->route('fields.index');
        }

        $attributes = [
            'field_id' => $request->input('field_id'),
            'user_id' => $request->input('user_id'),
            'start_at' => $request->input('start_at'),
            'end_at' => $request->input('end_at'),
            'phone'=> $request->input('phone'),
            'paid'=> $request->input('paid'),
            'bill_cost'=> $request->input('bill_cost')
        ];
        // else create a new one
        $bookfield =  BookField::create($attributes);

        // reload model
        $bookfield =  BookField::find($bookfield->id);


        return redirect()->route('bookfields.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();
        return view('dashboard', ['type' => $type]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
