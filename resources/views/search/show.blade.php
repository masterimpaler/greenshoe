@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div style="width: 100%;">
                <div class="panel panel-default">
                    <div class="panel-heading">Entire Debtor Report</div>

                    <div class="panel-body">
                        <a href=" {{ url('/download') }}" class="">
                            <button type="button" class="btn btn-success">
                                <span class="glyphicon glyphicon-download-alt"></span>
                                Download Report
                            </button>
                        </a>
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>ID Number</th>
                                <th>Account Number</th>
                                <th>Loan Amount</th>
                                <th>Loan Balance</th>
                                <th>Issue date</th>
                                <th>Due date</th>
                                <th>Mobile</th>
                              </tr>
                            </thead>

                            @if($debtors)
                                <tbody>
                                @foreach( $debtors as $key=>$debtor)
                                  <tr>
                                    <td>{{ $debtor->id }}</td>
                                    <td>{{ $debtor->cust_name }}</td>
                                    <td>{{ $debtor->cust_id }}</td>
                                    <td>{{ $debtor->cust_acno }}</td>
                                    <td>{{ $debtor->loan_amount }}</td>
                                    <td>{{ $debtor->loan_balance }}</td>
                                    <td>{{ $debtor->loan_issue_date }}</td>
                                    <td>{{ $debtor->loan_due_date }}</td>
                                    <td>{{ $debtor->cust_mobile_number }}</td>
                                  </tr>
                                @endforeach
                                </tbody>
                            @endif
                         </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection