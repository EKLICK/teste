<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audits;

class PDFController extends Controller
{
    public function index(){
        return view('pdfteste');
    }

    public function pdf_hist($id){
        $auditoria = Audits::find($id);
        return \PDF::loadView('historico_file.pdfHistorico', compact('auditoria'))->stream('PDF_historico'.'.pdf');
    }
}
