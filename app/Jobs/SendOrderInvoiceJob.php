<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoiceMail;

class SendOrderInvoiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function handle(): void
{
    $order = \App\Models\Order::with('items.product')
        ->find($this->orderId);

    if (!$order) return;

    // PDF generate
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('invoice', [
        'order' => $order
    ]);

    // safe path
    $path = storage_path('app/invoices/'.$order->order_no.'.pdf');

    if (!file_exists(storage_path('app/invoices'))) {
        mkdir(storage_path('app/invoices'), 0777, true);
    }

    $pdf->save($path);

    // send mail
    \Illuminate\Support\Facades\Mail::to($order->email)->send(
        new \App\Mail\OrderInvoiceMail($order, $path)
    );
}
}