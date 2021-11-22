@extends('layouts.app')
@section('title', __('menu.reports'))
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('menu.reports') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('menu.reports') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('add-report')}}" class="btn btn-sm btn-neutral">{{ __('action.add') }}</a>
                        <a href="{{route('tests')}}" class="btn btn-sm btn-neutral">{{ __('menu.tests') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">{{ __('reports.table') }}</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">{{ __('reports.report') }}</th>
                                <th scope="col" class="sort">{{ __('customers.customer') }}</th>
                                <th scope="col" class="sort">{{ __('reports.contributor') }}</th>
                                <th scope="col" class="sort text-right">{{ __('action.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($reports as $report)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a class="avatar rounded-circle mr-3 bg-primary">
                                                <i class="ni ni-briefcase-24 text-white"></i>
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$report->name}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        {{$report->customer->firstname}} {{$report->customer->lastname}}
                                    </td>
                                    <td class="budget">
                                        {{$report->user->name}}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item open-modal" href="#delete" data-toggle="modal" data-name="new-pdf/" data-id="{{$report->id}}">{{ __('action.download') }}</a>
                                                <a class="dropdown-item open-modal" href="#delete" data-toggle="modal" data-name="delete-report/" data-id="{{$report->id}}">{{ __('action.delete') }}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                {{ $reports->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('forms/delete-modal')
@endsection
