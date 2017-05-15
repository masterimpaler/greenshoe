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

        $debtors = Debtor::all();

        return view('search.show', compact('debtors'));
    }


    /**
     *
     */
    public function download() {

        //$debtors = DB::table('debtors')->get();

        //get debtor list from database
        $debtors = Debtor::all();

        $debtorsArray = [];

        $debtorsArray[] = ['id', 'names', 'ID_number', 'mobile', 'amount', 'gender', 'created_at', 'updated_at'];

        foreach ($debtors as $debtor){
            $debtorsArray[] = $debtor->toArray();
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

            $debtors = DB::table('debtors')->where('ID_number', 'LIKE', '%'.$request->search.'%')
                                           ->orWhere('mobile', 'LIKE', '%'.$request->search.'%')->get();

            if ($debtors){

                foreach ($debtors as $key => $debtor){
                    $output.='<tr>'.
                        '<td>'.$debtor->names.'</td>'.
                        '<td>'.$debtor->gender.'</td>'.
                        '<td>'.$debtor->ID_number.'</td>'.
                        '<td>'.$debtor->mobile.'</td>'.
                        '<tr>';
                }

            }

            return Response($output);
        }
    }

}
