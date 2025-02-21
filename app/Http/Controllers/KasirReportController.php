<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class KasirReportController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->with('product')->latest()->paginate(10);
        return view('reports_kasir.index', compact('transactions'));
    }

    public function generate()
    {
        $transactions = Transaction::with('user', 'product')->get();
    
        // ✅ Load View & Generate PDF
        $pdf = Pdf::loadView('reports_kasir.pdf', compact('transactions'))
            ->setPaper('A4', 'portrait');
    
        // ✅ Fix Headers & Response
        return Response::make($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Transaction_Report.pdf"'
        ]);
    }
}


