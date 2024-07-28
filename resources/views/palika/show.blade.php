@extends('layouts.app')

@section('template_title')
    {{ $palika->name ?? __('Show') . " " . __('Palika') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Palika</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('palikas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Code:</strong>
                                    {{ $palika->code }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $palika->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name Ne:</strong>
                                    {{ $palika->name_ne }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status:</strong>
                                    {{ $palika->status }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
