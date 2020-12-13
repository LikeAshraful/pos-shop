<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Models\Purchase;
use App\Models\SubCategory;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $data['title'] = "Invoice";
        $data['invoices'] = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        //dd($data['products']);
        return view('backend.pages.invoice.index', $data);
    }



    //Fake
    public function invoice_design()
    {
        $data['title'] = "Invoice";
        return view('backend.pages.invoice.invoice_pdf');
    }

    public function invoice_print()
    {
        $data['title'] = "invoice_print";
        return view('backend.pages.invoice.invoice_print');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        $data['title'] = "Create Invoice";
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['sub_categories'] = SubCategory::all();
        $data['units'] = Unit::all();
        $data['products'] = Product::all();
        $data['customers'] = Customer::all();
        $data['date'] = date("Y-m-d");



        $invoice_data = Invoice::orderBy('id', 'desc')->first();
        if($invoice_data == null){
                $firstReg = '0';
                $data['invoice_no'] = $firstReg +1;
                //dd($invoice_no);
        } else{
            $invoice_data = Invoice::orderBy('id', 'desc')->first()->invoice_no;
            $data['invoice_no'] = $invoice_data +1;
        }

        return view('backend.pages.invoice.create', $data);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function postStore(Request $request)
    {
        if ($request->category_id == null){
            toast('Sorry you do not added any product !!', 'error');
            return redirect()->back();
        }else{
            //dd("Okay");
            if ($request->paid_amount > $request->estimated_amount){
                toast('Sorry paid amount will not bigger than line total !!', 'error');
                return redirect()->back();
            } else{

                $invoice                    = new Invoice();
                $invoice->date              = $request->date;
                $invoice->invoice_no        = $request->invoice_no;
                //$invoice->brand_id          = $request->brand_id;
                //$invoice->category_id       = $request->category_id;
                //$invoice->sub_category_id   = $request->sub_category_id;
                //$invoice->product_id        = $request->product_id;
                $invoice->unit_id           = $request->unit_id;
                $invoice->description       = $request->description;
                $invoice->status            = '0';
                $invoice->created_by        = Auth::user()->id;
                // Transaction start
                DB::transaction(function() use($request, $invoice)  {
                    if ($invoice->save()){
                        $count_category = count($request->category_id);
                        for ($i=0; $i <$count_category; $i++){
                            $invoice_details                    = new InvoiceDetail();
                            $invoice_details->invoice_id        = $invoice->id;
                            $invoice_details->brand_id          = $request->brand_id;
                            $invoice_details->category_id       = $request->category_id[$i];
                            $invoice_details->sub_category_id   = $request->sub_category_id[$i];
                            $invoice_details->product_id        = $request->product_id[$i];
                            $invoice_details->selling_qty       = $request->selling_qty[$i];
                            $invoice_details->unit_price        = $request->unit_price;
                            $invoice_details->selling_price     = $request->selling_price;
                            $invoice_details->status            = '1';
                            $invoice_details->save();
                        }
                    }
                });
                // Transaction end


            }
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)

    {
        $data['title'] = "Update Product";
        $data['suppliers'] = Supplier::all();
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['units'] = Unit::all();
        $data['product'] = Product::find($id);
        //dd($data['product']);
        if (!is_null($data)) {
            return view('backend.pages.product.edit', $data);
        } else {
            return redirect()->route('backend.pages.product.index');
        }
    }

    public function pendingList()
    {
        $data['title'] = "Pending Purchase";
        $data['products'] = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '0' )->get();
        return view('backend.pages.purchase.pending', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function purchaseApprove($id)
    {
        $purchase = Purchase::find($id);

        $product = Product::where('id', $purchase->product_id )->first();
        //dd($product);
        $purchase_qty = ((DOUBLE)($purchase->buying_qty))+((DOUBLE)($product->quantity));
        $product->quantity = $purchase_qty;

        if($product->save()){
            DB::table('purchases')->where('id',$id)->update(['status'=> 1]);
        }

        toast('Data has been approved successfully !!', 'success');
        return redirect()->route('purchase.pending.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function postDelete($id)
    {

        $delete_row = Purchase::find($id);
        //dd($delete_row);
        if (!is_null($delete_row)) {
            $delete_row->delete();
        }
        toast('Data deleted successfully !!', 'success');
        return back();
    }
}
