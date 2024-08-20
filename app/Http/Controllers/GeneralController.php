<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GeneralController extends Controller
{
    public function showImportForm()
    {
        return view('import');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        Excel::import(new UsersImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Imported Successfully');
    }
}
