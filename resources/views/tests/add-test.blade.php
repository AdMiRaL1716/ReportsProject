@extends('layouts.app')
@section('title', __('tests.add'))
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('tests.add') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('tests')}}">{{ __('menu.tests') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('tests.add') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('tests')}}" class="btn btn-sm btn-neutral">{{ __('action.back') }}</a>
                        <a href="{{route('reports')}}" class="btn btn-sm btn-neutral">{{ __('menu.reports') }}</a>
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
                    <form method="POST" action="{{'new-test'}}">
                        @csrf
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('tests.add') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('action.add') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">{{ __('tests.info') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('elements.element') }}</label>
                                            <select name="id_element" class="form-control @error('id_element') is-invalid @enderror" required>
                                                @foreach($elements as $element)
                                                    <option value="{{$element->id}}">{{$element->name}}, {{$element->symbol}}</option>
                                                @endforeach
                                            </select>
                                            @error('id_element')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('methods.method') }}</label>
                                            <select name="id_method" class="form-control @error('id_method') is-invalid @enderror" required>
                                                @foreach($methods as $method)
                                                    <option value="{{$method->id}}">{{$method->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('id_method')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('units.unit') }}</label>
                                            <select name="id_unit" class="form-control @error('id_unit') is-invalid @enderror" required>
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('id_unit')
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
                                    <input type="number" name="id_user" readonly required hidden value="{{Auth::user()->id}}">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('tests.result') }} 1</label>
                                            <input type="text" name="result_one" class="form-control @error('result_one') is-invalid @enderror" value="{{ old('result_one') }}" required placeholder="{{ __('tests.result') }} 1*"/>
                                            @error('result_one')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('tests.result') }} 2</label>
                                            <input type="text" name="result_two" class="form-control @error('result_two') is-invalid @enderror" value="{{ old('result_two') }}" required placeholder="{{ __('tests.result') }} 2*"/>
                                            @error('result_two')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">{{ __('tests.result') }} 3</label>
                                            <input type="text" name="result_three" class="form-control @error('result_three') is-invalid @enderror" value="{{ old('result_three') }}" required placeholder="{{ __('tests.result') }} 3*"/>
                                            @error('result_three')
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
