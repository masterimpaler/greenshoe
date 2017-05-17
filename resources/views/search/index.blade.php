@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-4">
                                <a href="{{ url('/home') }}">
                                <button type="button" class="btn btn-primary center-block">Home</button>
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-4"></div>
                            <div class="col-xs-6 col-md-4">
                                <a href="{{ url('/show') }}">
                                <button type="button" class="btn btn-primary center-block" >Download</button>
                                </a>
                            </div>

                        </div>
                        <!-- search box container starts  -->
                        <div class="search">
                            <h3 class="text-center title-color">GreenShoe Debtor search portal</h3>
                            <p>&nbsp;</p>
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="input-group">
                                        {{ csrf_field() }}
                                        <span class="input-group-addon" style="color: white; background-color: #4dff64;">ID/MOBILE SEARCH</span>
                                        <input type="text" autocomplete="off" id="search" name="search" class="form-control input-lg" placeholder="Enter ID or Mobile number">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <!-- This file displays a search form that filters through records as an ID or mobile bumber
                              is entered by the user in real time.-->
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

<!-- This ajax code listens for keyups and takes in the value that's already been entered and sends it
       to the search controller in real time-->
@section('script')
    $('#search').on('keyup', function () {
    $value = $(this).val();
    $.ajax({
    type : 'get',
    url  : '{{URL::to('search') }}',
    data : {'search':$value},
    success:function (data) {
    if(data.length > 0) {
    console.log(data);
    } else {
    console.log('Nothing in the DB');
    }
    }
    })
    })
@endsection
