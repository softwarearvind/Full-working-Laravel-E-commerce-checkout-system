<?php
use Illuminate\Mail\Mailables\Attachment;

class OrderInvoiceMail extends Mailable
{
    public $order;
    public $pdfPath;

    public function __construct($order, $pdfPath)
    {
        $this->order = $order;
        $this->pdfPath = $pdfPath;
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPath)
                ->as('invoice.pdf')
                ->withMime('application/pdf'),
        ];
    }

    public function build()
    {
        return $this->view('emails.order-invoice');
    }
}