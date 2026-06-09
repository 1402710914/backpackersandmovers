<?php

namespace App\Services;

use App\Models\Order;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

class TrekDeclarationPdfService
{
    public function generateAndStore(Order $order): string
    {
        $order->loadMissing(['user', 'tour']);

        $html = view('pdf.trek-declaration', [
            'order' => $order,
            'declaration' => config('trek-declaration'),
        ])->render();

        $options = new Options;
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();

        $path = 'orders/declarations/'.$order->reference.'.pdf';
        Storage::disk('public')->put($path, $dompdf->output());

        return $path;
    }
}
