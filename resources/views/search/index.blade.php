@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        <!-- search box container starts  -->
                        <div class="search">
                            <h3 class="text-center title-color">GreenShoe Debtor search portal</h3>
                            <p>&nbsp;</p>
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="color: white; background-color: #4dff64;">ID/MOBILE SEARCH</span>
                                        <input type="text" autocomplete="off" id="search" name="search" class="form-control input-lg" placeholder="Enter ID or Mobile number">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <table class="table table-bordered">
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
                            <tbody>


                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    $('#search').on('keyup', function () {
    $value = $(this).val();
    $.ajax({
    type : 'get',
    url  : '{{URL::to('search') }}',
    data : {'search':$value},
    success:function (data) {
    $('tbody').html(data);
    }
    })
    })
@endsection
