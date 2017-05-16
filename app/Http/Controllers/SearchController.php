<?php

namespace App\Http\Controllers;

use App\Debtor;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        return view('search.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show() {

        //$debtors = Debtor::all();
        $debtors = DB::table('tbl_due_listing')->get();

        return view('search.show', compact('debtors'));
    }


    /**
     *
     */
    public function download() {

        //$debtors = DB::table('debtors')->get();

        //get debtor list from database
        //$debtors = Debtor::all();
        $debtors = DB::table('tbl_due_listing')->get();

        dd($debtors);
        $debtorsArray = [];

        $debtorsArray[] = ['id', 'Names', 'ID_number', 'Account No', 'Loan amount', 'Loan balance', 'Loan Issue date', 'Loan Due date', 'Mobile'];

        foreach ($debtors as $debtor){
            $debtorsArray[] = $debtor;
        }

        //dd($debtorsArray);

        Excel::create('debtors', function($excel) use ($debtorsArray) {

            // Set the spreadsheet title, creator, and description
//            $excel->setTitle('Debtors');
//            $excel->setCreator('John')->setCompany('Nada');
//            $excel->setDescription('debtors file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($debtorsArray) {
                $sheet->fromArray($debtorsArray, null, 'A1', false, false);
            });

        })->download('csv');


    }

    /**
     * @param Request $request
     * @return Response
     */
    public function livesearch(Request $request)
    {
        if ($request->ajax()){
            $output = "";

            $debtors = DB::table('tbl_due_listing')->where('cust_id', 'LIKE', '%'.$request->search.'%')
                                           ->orWhere('cust_mobile_number', 'LIKE', '%'.$request->search.'%')->get();

            if ($debtors){

                foreach ($debtors as $key => $debtor){
                    $output.='<tr>'.
                        '<td>'.$debtor->id.'</td>'.
                        '<td>'.$debtor->cust_name.'</td>'.
                        '<td>'.$debtor->cust_id.'</td>'.
                        '<td>'.$debtor->cust_acno.'</td>'.
                        '<td>'.$debtor->loan_amount.'</td>'.
                        '<td>'.$debtor->loan_balance.'</td>'.
                        '<td>'.$debtor->loan_issue_date.'</td>'.
                        '<td>'.$debtor->loan_due_date.'</td>'.
                        '<td>'.$debtor->cust_mobile_number.'</td>'.
                        '<tr>';
                }

            }

            return Response($output);
        }
    }

}
