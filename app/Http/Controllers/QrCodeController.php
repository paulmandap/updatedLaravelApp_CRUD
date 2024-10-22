<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index()
    {
        // Generate the QR code and store it as a data URI
        $qrcode = QrCode::size(300)->generate('Your QR Code Data');

        // Pass the QR code to the view
        return view('qr_code', compact('qrcode'));
    }
}
