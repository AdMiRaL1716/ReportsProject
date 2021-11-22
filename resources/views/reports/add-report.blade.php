@extends('layouts.app')
@section('title', __('reports.add'))
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('reports.add') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('reports')}}">{{ __('menu.reports') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('reports.add') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('reports')}}" class="btn btn-sm btn-neutral">{{ __('action.back') }}</a>
                        <a href="{{route('tests')}}" class="btn btn-sm btn-neutral">{{ __('menu.tests') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <form method="POST" action="{{'new-report'}}">
                        @csrf
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('reports.add') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('action.add') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">{{ __('reports.info') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('reports.name') }}</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="{{ __('reports.name') }} *" />
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('reports.start') }}</label>
                                            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required placeholder="{{ __('reports.start') }} *" />
                                            @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('reports.end') }}</label>
                                            <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" required placeholder="{{ __('reports.end') }} *" />
                                            @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('customers.customer') }}</label>
                                            <select name="id_customer" class="form-control @error('id_customer') is-invalid @enderror" required>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}">{{$customer->firstname}} {{$customer->lastname}}</option>
                                                @endforeach
                                            </select>
                                            @error('id_customer')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="number" name="id_user" class="form-control" value="{{Auth::user()->id}}" readonly hidden required />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
