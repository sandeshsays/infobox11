@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1 class="m-0">
                            {{ trans('menu.menu_management') }}
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">
                                    {{ trans('dashboard.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('menu.menu_management') }}</li>
                            <li class="breadcrumb-item active"> {{ trans('common.list') }}
                            </li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">

                        {{ trans('Menu.edit_menu') }}

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route($page_route.'.update',$menu->id) }}" enctype="multipart/form-data"
                                class="needs-validation" role="form" novalidate data-toggle="validator" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-4">

                                        <label for="" class=" text-danger">
                                            {{ trans('menu.menu_name_np') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control type_np" name="menu_name_np"
                                            value="{{ old('menu_name_np',$menu->menu_name_np) }}" required>
                                        <div class="invalid-feedback">
                                            {{ trans('menu.menu_name_np_required') }}
                                        </div>
                                        @error('menu_name_np')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">

                                        <label for="" class="text-danger">
                                            {{ trans('menu.menu_name') }}
                                            <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="menu_name"
                                            value="{{ old('menu_name',$menu->menu_name) }}" required>
                                        <div class="invalid-feedback">
                                            {{ trans('menu.menu_name_required') }}
                                        </div>
                                        @error('menu_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">

                                        <label for="" class=""> {{ trans('menu.parent_id') }}
                                        </label>
                                        <select name="parent_id" class="form-control select2" id="">
                                            <option value="">{{ trans('menu.parent_id') }}</option>
                                            @foreach (getParentMenus() as $menus)
                                                <option value="{{ $menus->id }}" @if($menu->parent_id == $menus->id) selected @endif>
                                                    {{ getLan() == 'np' ? $menus->menu_name_np : $menus->menu_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">

                                        <label for="" class="text-danger">
                                            {{ trans('menu.menu_controller') }}
                                            <span>*</span></label>
                                        <input type="text" class="form-control" name="menu_controller"
                                            value="{{ old('menu_controller',$menu->menu_controller) }}" required>
                                        <div class="invalid-feedback">
                                            {{ trans('menu.menu_controller_required') }}
                                        </div>
                                        @error('menu_controller')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="form-group col-md-4">

                                        <label for="" class="text-danger">
                                            {{ trans('menu.menu_link') }}
                                            <span>*</span></label>
                                        <input type="text" class="form-control" name="menu_link"
                                            value="{{ old('menu_link',$menu->menu_link) }}" required>
                                        <div class="invalid-feedback">
                                            {{ trans('menu.menu_link_required') }}
                                        </div>
                                        @error('menu_link')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">

                                        <label for="" class="text-danger">
                                            {{ trans('menu.menu_icon') }}
                                            <span>*</span></label>
                                        <input type="text" class="form-control" name="menu_icon"
                                            value="{{ old('menu_icon',$menu->menu_icon) }}" required>
                                        <div class="invalid-feedback">
                                            {{ trans('menu.menu_icon_required') }}
                                        </div>
                                        @error('menu_icon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">

                                        <label for="" class="text-danger"> {{ trans('common.status') }} <span
                                                class="text-danger">*</span> </label>
                                        <select name="menu_status" class="form-control select2" id="" required>
                                            <option value="">{{ trans('common.status') }}</option>
                                            <option value="1" @if($menu->menu_status == true)selected @endif>{{ trans('common.true') }} </option>
                                            <option value="0" @if($menu->menu_status == false)selected @endif>{{ trans('common.false') }}</option>
                                        </select>

                                        <div class="invalid-feedback">
                                            {{ trans('roles.status_required') }}
                                        </div>
                                        @error('menu_status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">

                                        <label for="" class="text-danger">
                                            {{ trans('menu.menu_order') }}
                                            <span>*</span></label>
                                        <input type="text" class="form-control" name="menu_order"
                                            value="{{ old('menu_order',$menu->menu_order) }}" required>
                                        <div class="invalid-feedback">
                                            {{ trans('menu.menu_order_required') }}
                                        </div>
                                        @error('menu_order')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                    {{ getLan() == 'np' ? 'सुरक्षित गर्नुहोस' : 'Save' }}</button>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </section>
    @endsection
