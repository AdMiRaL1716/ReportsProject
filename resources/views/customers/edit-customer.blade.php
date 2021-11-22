@extends('layouts.app')
@section('title', __('customers.change'))
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('customers.change') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('customers')}}">{{ __('customers.customer') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('customers.change') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('customers')}}" class="btn btn-sm btn-neutral">{{ __('action.back') }}</a>
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
                    <form method="POST">
                        @csrf
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('customers.change') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('action.change') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">{{ __('customers.info') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('customers.code') }}</label>
                                            <input type="number" name="code" maxlength="11" minlength="11" min="0" class="form-control @error('code') is-invalid @enderror" value="{{ $customer->code }}" required placeholder="{{ __('customers.code') }} *" />
                                            @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('customers.firstname') }}</label>
                                            <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ $customer->firstname }}" required placeholder="{{ __('customers.firstname') }} *" />
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('customers.lastname') }}</label>
                                            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ $customer->lastname }}" required placeholder="{{ __('customers.lastname') }} *" />
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('customers.address') }}</label>
                                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $customer->address }}" required placeholder="{{ __('customers.address') }} *" />
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('customers.phone') }}</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $customer->phone }}" required placeholder="{{ __('customers.phone') }} *" />
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('customers.email') }}</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $customer->email }}" required placeholder="{{ __('customers.email') }} *" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
