@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <h1 align="center"> Welcome to GreenShoe Debtor Portal</h1>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 text-center">

                            <a href="{{ url('/') }}">
                                <button type="button" class="btn btn-primary btn-lg">
                                    <span class="glyphicon glyphicon-search"></span>
                                    Search Records
                                </button>
                            </a>

                            <br><br>

                            <a href="{{ url('/show') }}">
                                <button type="button" class="btn btn-success btn-lg">
                                    <span class="glyphicon glyphicon-download"></span>
                                    Download Records
                                </button>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
