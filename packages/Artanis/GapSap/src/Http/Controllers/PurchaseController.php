<?php

namespace Artanis\GapSap\Http\Controllers;

use Artanis\GapSap\Repositories\PurchaseRepository;
use Codedge\Fpdf\Facades\Fpdf;
use Mpdf\Mpdf;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use PDF;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;

/**
 * Customer controlller for the customer basically for the tasks of customers
 * which will be done after customer authenticastion.
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class PurchaseController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * OrderrRepository object
     *
     * @var Object
     */
    protected $orderRepository;

    /**
     * InvoiceRepository object
     *
     * @var Object
     */
    protected $invoiceRepository;

    /**
     * PurchaseRepository object
     *
     * @var Object
     */
    protected $purchaseRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Order\Repositories\OrderRepository   $orderRepository
     * @param  \Webkul\Order\Repositories\InvoiceRepository $invoiceRepository
     * * @param  \Artanis\AdminCustom\Repositories\PurchaseRepository $purchaseRepository
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        InvoiceRepository $invoiceRepository,
        PurchaseRepository $purchaseRepository
    )
    {
        $this->middleware('customer');

        $this->_config = request('_config');

        $this->orderRepository = $orderRepository;

        $this->invoiceRepository = $invoiceRepository;

        $this->purchaseRepository = $purchaseRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View 
    */
    public function index()
    {
        return view($this->_config['view']);
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View 
     */
    public function view($id)
    {
        // $order = $this->orderRepository->findOneWhere([
        //     'customer_id' => auth()->guard('customer')->user()->id,
        //     'id' => $id
        // ]);

        // if (! $order)
        //     abort(404);
        $purchase = $this->purchaseRepository->findOrFail($id);
            
        return view($this->_config['view'], compact('purchase'));
    }

    /**
     * Print and download the for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $invoice = $this->purchaseRepository->findOrFail($id);
        $purchase = $this->purchaseRepository->findOrFail($id);
        $pdf = PDF::loadView('gapsap::customers.account.purchase.pdf', compact(['purchase']))->setPaper('a4');

        return $pdf->download('invoice-' . $invoice->created_at->format('d-m-Y') . '.pdf');

        
        // $path = app()->publicpath().'/assets/templates/examination_level100_certificate.pdf';

        // $curl_handle=curl_init();
        // curl_setopt($curl_handle, CURLOPT_URL,asset('themes/pokli-default/assets/templates/pwm.pdf'));
        // curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        // curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        // $path = curl_exec($curl_handle);
        // curl_close($curl_handle);

        // $path = asset('themes/pokli-default/assets/templates/pwm.pdf');
        // $pdf = new Mpdf();
        // add a page
        // $pdf->AddPage();
        // set the source file
        // $pdf->setSourceFile(asset('themes/pokli-default/assets/templates/pwm.pdf'));
        // $pdf->setSourceFile($path);
        // // import page 1
        // $tplIdx = $pdf->importPage(1);
        // // use the imported page and place it at position 10,10 with a width of 100 mm
        // $pdf->useTemplate($tplIdx, 5, 5, 200);
        // $pdf->Output('Withdrawal Form '.date('d/m/Y').'.pdf', 'D');
        // Fpdf::AddPage();
        // Fpdf::SetFont('Courier', 'B', 18);
        // Fpdf::Cell(50, 25, 'Hello World!');
        // Fpdf::Output();

        // return $pdf->download('invoice-' . $invoice->created_at->format('d-m-Y') . '.pdf');
    }
}