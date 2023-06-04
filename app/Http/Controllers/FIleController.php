<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Payment;
use App\Models\Result;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\PDF;


class FIleController extends Controller
{
    public function convertPdf(){

        $pdf = PDF::loadView('pdf.test-card-pdf',[
            'payments' => Payment::select('payments.created_at', 'schedules.date_test')
            ->join('schedules' , 'schedules.id', '=' ,'payments.schedule_id')
            ->where('user_id', auth()->user()->id)
            ->get(), 
            
            'users' => User::select('users.name', 'identities.birth_date', 'identities.phone')
            ->join('identities' ,'identities.user_id' ,'=' ,'users.id')
            ->where('user_id', auth()->user()->id)
            ->get(),

            'identities' => Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get(),
        ]);
        return $pdf->download('test-card-pdf.pdf');
        // $path = public_path('pdf_docs/');
        // $fileName = time().'.'.'pdf';
        // $pdf->save($path.'/'.$fileName);
        // $generated_pdf_link = url('pdf_docs/'.$fileName);
        // return response()->jason($generated_pdf_link);
       
    }
}
