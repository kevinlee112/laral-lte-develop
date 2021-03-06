@extends('admin.layouts.base')

@section('content')

    <link href="https://fonts.lug.ustc.edu.cn/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        .page-content {
            height: 100%;
        }

        .page-content {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 120px;
        }
    </style>



    @include('admin.partials.errors')
    @include('admin.partials.success')

    <div class="container">
        <div class="content">
            <div class="title">DashBoard</div>
        </div>
    </div>


@stop

@section('js')


@endsection
