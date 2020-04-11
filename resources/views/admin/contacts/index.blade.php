@extends('layouts.master-layouts')
@section('css')
    <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">


@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4 class="font-size-18">{{__('front.Contacts')}}</h4>

            </div>
        </div>
    </div>
    <div class="row">

        @include('admin.contacts.create')

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>{{__('front.First Name')}}</th>
                            <th>{{__('front.Last Name')}}</th>
                            <th>{{__('front.phone')}}</th>
                            <th>{{__('front.Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->f_name}}</td>
                                <td>{{$contact->l_name}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>

                                    <a data-toggle="modal" data-target="#myModal" class=" update"
                                       data-slug="{{$contact->id}}" href="#">
                                        <i class=" mdi mdi-pencil font-size-17 align-middle mr-1"></i>
                                    </a>
                                    <a href="#" data-slug="{{$contact->id}}"  id="{{$contact->slug}}"
                                       class="delete"><i
                                                class="mdi mdi-delete font-size-17 align-middle mr-1 "></i></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>


                    </table>
                    @include('admin.contacts.model')

                </div>
            </div> <!-- end row -->
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection

