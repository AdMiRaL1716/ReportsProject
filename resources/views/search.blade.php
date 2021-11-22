@extends('layouts.app')
@section('title', __('menu.search'))
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('menu.search') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('menu.search') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('tests')}}" class="btn btn-sm btn-neutral">{{ __('menu.tests') }}</a>
                        <a href="{{route('reports')}}" class="btn btn-sm btn-neutral">{{ __('menu.reports') }}</a>
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
                        <h3 class="mb-0">{{ __('tests.table') }}</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">{{ __('customers.customer') }}</th>
                                <th scope="col" class="sort">{{ __('methods.method') }}</th>
                                <th scope="col" class="sort">{{ __('units.unit') }}</th>
                                <th scope="col" class="sort text-right">{{ __('action.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @if(count($results) != 0)
                                @foreach($results as $result)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a class="avatar rounded-circle mr-3 bg-primary">
                                                    <i class="ni ni-single-copy-04 text-white"></i>
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">
                                                        {{$result->firstname}} {{$result->lastname}}
                                                    </span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            @foreach($methods as $method)
                                                @if($method->id == $result->id_method)
                                                    {{$method->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="budget">
                                            @foreach($units as $unit)
                                                @if($unit->id == $result->id_unit)
                                                    {{$unit->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="edit-test/{{$result->id}}">{{ __('action.change') }}</a>
                                                    <a class="dropdown-item open-modal" href="#delete" data-toggle="modal" data-name="delete-test/" data-id="{{$result->id}}">{{ __('action.delete') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td class="budget">
                                    0 {{ __('action.results') }}
                                </td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                {{ $results->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('forms/delete-modal')
@endsection
