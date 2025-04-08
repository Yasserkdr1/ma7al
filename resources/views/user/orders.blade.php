@extends('layouts.app')
@section('content')
@php
    $categories = \App\Models\Category::all();
@endphp
<style>
    .table> :not(caption)>tr>th {
        padding: 0.625rem 1.5rem .625rem !important;
        background-color: #6a6e51 !important;
    }

    .table>tr>td {
        padding: 0.625rem 1.5rem .625rem !important;
    }

    .table-bordered> :not(caption)>tr>th,
    .table-bordered> :not(caption)>tr>td {
        border-width: 1px 1px;
        border-color: #6a6e51;
    }

    .table> :not(caption)>tr>td {
        padding: .8rem 1rem !important;
    }

    .bg-success {
        background-color: #40c710 !important;
    }

    .bg-danger {
        background-color: #f44032 !important;
    }

    .bg-warning {
        background-color: #f5d700 !important;
        color: #000;
    }
</style>
<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Orders</h2>
        <div class="row">
            <div class="col-lg-2">
                @include('user.account-nav')
            </div>

            <div class="col-lg-10">
                <div class="wg-table table-all-user">
                    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 80px">OrderNo</th>
                                    <th class="text-center" style="width:100px !important">Name</th>
                                    <th class="text-center" style="width:140px !important">Phone</th>
                                    <th class="text-center"  style="width:110px !important">Subtotal</th>
                                    <th class="text-center">Tax</th>
                                    <th class="text-center"  style="width:110px !important">Total</th>

                                    <th class="text-center">Status</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Items</th>
                                    <th class="text-center">Delivered On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $o)
                                <tr>
                                    <td class="text-center">{{$o->id}}</td>
                                    <td class="text-center">{{$o->name}}</td>
                                    <td class="text-center">{{$o->phone}}</td>
                                    <td class="text-center">${{$o->subtotal}}</td>
                                    <td class="text-center">${{$o->tax}}</td>
                                    <td class="text-center">${{$o->total}}</td>

                                    <td class="text-center">{{$o->status}}</td>
                                    <td class="text-center">{{$o->created_at}}</td>
                                    <td class="text-center">{{$o->orderItems->count()}}</td>
                                    <td class="text-center">{{$o->delivered_date}}</td>
                                    <td></td>
                                    
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{$orders->links('pagination::bootstrap-5')}} 

                </div>
            </div>

        </div>
    </section>
</main>

@endsection