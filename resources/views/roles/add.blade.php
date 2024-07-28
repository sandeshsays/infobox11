@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ trans('dashboard.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('roles.roles') }}</li>
                            <li class="breadcrumb-item active"> {{ trans('common.edit') }}
                            </li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3> {{ trans('roles.roles') }} {{ trans('common.add') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="{{ route('roles.store') }}" enctype="multipart/form-data" class="needs-validation"
                                role="form" novalidate data-toggle="validator" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="form-group col-md-3">

                                        <label for="" class=" text-danger">
                                            {{ trans('roles.role_name_nepali') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control type_np" name="name_np"
                                            value="{{ old('name_np') }}" required>
                                        <div class="invalid-feedback">
                                            {{ trans('roles.role_name_nepali_required') }}
                                        </div>
                                        @error('name_np')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">

                                        <label for="" class="text-danger"> {{ trans('roles.role_name') }} <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="name_en"
                                            value="{{ old('name_np') }}" required>
                                        <div class="invalid-feedback">
                                            {{ trans('roles.role_name_required') }}
                                        </div>
                                        @error('name_np')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">

                                        <label for="" class="text-danger"> {{ trans('roles.role_module') }} <span
                                                class="text-danger">*</span> </label>
                                        <select name="role_module" class="form-control select2" id="" required>
                                            <option value="">{{ trans('roles.role_module') }}</option>
                                            @foreach (getModules() as $key => $value)
                                                <option value="{{ $key }}">{{  $value }}</option>
                                            @endforeach
                                        </select>

                                        <div class="invalid-feedback">
                                            {{ trans('roles.role_module_required') }}
                                        </div>
                                        @error('role_module')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">

                                        <label for="" class="text-danger"> {{ trans('common.status') }} <span
                                                class="text-danger">*</span> </label>
                                        <select name="status" class="form-control select2" id="" required>
                                            <option value="">{{ trans('common.status') }}</option>
                                            <option value="1">{{ trans('common.true') }} </option>
                                            <option value="0">{{ trans('common.false') }}</option>
                                        </select>

                                        <div class="invalid-feedback">
                                            {{ trans('roles.status_required') }}
                                        </div>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    
                                </div>



                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                    {{ getLan() == 'np' ? 'सुरक्षित गर्नुहोस' : 'Save' }}</button>
                            </form>
                        </div>

                        <span class="float-right {{ setFont() }}"></span>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
