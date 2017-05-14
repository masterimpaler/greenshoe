<?php

namespace App\Http\Controllers;

use App\Debtor;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
