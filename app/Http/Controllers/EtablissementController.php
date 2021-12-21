<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtablissementController extends Controller
{
    public function index()
    {
        $etablissements = DB::table('etablissements')->select()
        ->get();

        $data = array(
            'breadcumb' => 'Etablissement',
            'link' => 'etablissements',
            'title' => 'Etablissement',
            'page_header' => 'Tous les etablissement',
        );

        return view('etablissement.index',compact('etablissements','data'));
    }

    public function create()
    {
        return view('etablissement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($logo = $request->file('logo')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $profileImage);
            $input['logo'] = "$profileImage";
        }
        Etablissement::create($input);

        return redirect()->route('liste-etab')
                        ->with('success','Etablissement created successfully.');
    }
}
