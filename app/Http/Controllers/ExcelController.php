<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export() 
    {
        return Excel::download(new UsersExport, 'audits.xlsx');
    }

    public function import() 
    {
        return Excel::import(new UsersImport, 'users.xlsx');
    }
}
