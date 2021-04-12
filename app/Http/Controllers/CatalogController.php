<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('fecha');
    }

    public function create(Request $request)
    {
        return view('catalog/create');
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'bookName' => 'required|max:255',
            'bookAuthor' => 'required|max:255',
            'bookYear' => 'numeric|digits_between:1, 4',
            'bookGenre' => 'required|max:255',
            'bookEdited' => 'required',
            'bookPages' => 'required|numeric|digits_between: 0,5'
        ]);

        if ($validation->fails()) {
            return redirect('catalog/create')->withErrors($validation)->withInput();
        } else {
            return view('catalog/createOK');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'bookName' => 'required|max:255',
            'bookAuthor' => 'required|max:255',
            'bookYear' => 'numeric|digits_between:0, 2021',
            'bookGenre' => 'required|max:255',
            'bookEdited' => 'required',
            'bookPages' => 'required|numeric|digits_between: 0,50000'
        ]);

        return view('catalog/index');
    }

    public function delete()
    {
        return view('catalog/delete');
    }

    public function edit($id)
    {
        return view('catalog/edit')->with('id', $id);
    }
}
