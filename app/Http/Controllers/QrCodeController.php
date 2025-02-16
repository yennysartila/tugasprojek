<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    // Menampilkan form input dan QR Code (jika ada)
    public function showQrForm(Request $request)
    {
        $qrCode = null;
        $data = null;

        // Jika ada data yang di-submit, generate QR Code
        if ($request->isMethod('post')) {
            $request->validate([
                'data' => 'required|string|max:255',
            ]);

            $data = $request->input('data');
            $qrCode = QrCode::size(300)->generate($data);
        }

        // Tampilkan view dengan form dan QR Code
        return view('qrku', compact('qrCode', 'data'));
    }
}