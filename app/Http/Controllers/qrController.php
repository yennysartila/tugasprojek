<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class qrController extends Controller
{
    public function generate()
    {
        $data = "Digital Signature Data"; // Data yang akan dienkripsi
        $qrCode = QrCode::size(200)->generate($data);
        return view('qr', compact('qr'));
    }
}
