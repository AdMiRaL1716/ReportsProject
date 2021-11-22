@extends('layouts.app')
@section('title', __('menu.settings'))
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('menu.settings') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('menu.settings') }}</li>
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
                        <h3 class="mb-0">{{ __('settings.table') }}</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">{{ __('settings.setting') }}</th>
                                <th scope="col" class="sort text-right">{{ __('action.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a class="avatar rounded-circle mr-3 bg-primary">
                                                <i class="ni ni-key-25 text-white"></i>
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ __('settings.change_password') }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="text-right">
                                        <a href="{{route('change-password')}}" class="btn btn-sm btn-primary text-white">{{ __('action.change') }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a class="avatar rounded-circle mr-3 bg-primary">
                                                <i class="ni ni-single-02 text-white"></i>
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ __('settings.change_name') }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="text-right">
                                        <a href="{{route('change-username')}}" class="btn btn-sm btn-primary text-white">{{ __('action.change') }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a class="avatar rounded-circle mr-3 bg-primary">
                                                <i class="ni ni-email-83 text-white"></i>
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ __('settings.change_email') }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="text-right">
                                        <a href="{{route('change-email')}}" class="btn btn-sm btn-primary text-white">{{ __('action.change') }}</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
