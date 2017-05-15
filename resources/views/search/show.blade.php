@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Mobile</th>
                              </tr>
                            </thead>

                            @if($debtors)
                                <tbody>
                                @foreach( $debtors as $key=>$debtor)
                                  <tr>
                                    <td>{{ $debtor->names }}</td>
                                    <td>{{ $debtor->gender }}</td>
                                    <td>{{ $debtor->mobile }}</td>
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