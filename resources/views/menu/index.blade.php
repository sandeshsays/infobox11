@extends('layouts.app')
<style type="text/css">
    body.dragging,
    body.dragging * {
        cursor: move !important;
    }

    .dragged {
        position: absolute;
        opacity: 0.7;
        z-index: 2000;
    }

    .draggable-menu {
        padding: 0 0 0 0;
        margin: 0 0 0 0;
    }

    .draggable-menu li ul {
        margin-top: 6px;
    }

    /* .draggable-menu li div {
        padding: 5px;
        border: 1px solid #cccccc;
        background: #eeeeee;
        cursor: move;
    } */

    .draggable-menu li .is-dashboard {
        background: #b5e2e2;
    }

    .draggable-menu li .icon-is-dashboard {
        color: #ffb600;
    }

    .draggable-menu li {
        list-style-type: none;
        margin-bottom: 4px;
        min-height: 35px;
        background: #f4f6f9;
    }

    .draggable-menu li.placeholder {
        position: relative;
        border: 1px dashed #b7042c;
        background: #6dbdf3;
        /* More li styles */
    }

    .draggable-menu li.placeholder:before {
        position: absolute;
        /* Define arrowhead */
    }

    .list-group-item {

        border-top-width: thin !important;
    }
</style>
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
                            <li class="breadcrumb-item active"> {{ trans('menu.menu_management') }}
                            </li>
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
                        {{-- <a class="btn btn-sm btn-success {{ setFont() }}" href="{{ route('menumanagement.create') }}"
                            title="{{ trans('message.button.add') }}">
                            <i class="fas fa-plus-circle"></i>
                            {{ trans('message.button.add') }}
                        </a> --}}

                    </div>
                    <div class="card-body">
                        <div class="row">


                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        {{ trans('menu.active_menus') }}
                                    </div>
                                    <div class="card-body">
                                        <ul id="menu-list" class="list-group draggable-menu draggable-menu-active"
                                            style="border:1px solid #cccccc">
                                            @foreach ($menus as $menu)
                                                @include('menu.menu_item', ['data' => $menu])
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        {{ trans('menu.add_menu') }}

                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('menumanagement.store') }}" enctype="multipart/form-data"
                                            class="needs-validation" role="form" novalidate data-toggle="validator"
                                            method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-4">

                                                    <label for="" class=" text-danger">
                                                        {{ trans('menu.menu_name_np') }}
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control type_np" name="menu_name_np"
                                                        value="{{ old('menu_name_np') }}" required>
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
                                                        value="{{ old('menu_name') }}" required>
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
                                                        @foreach (getParentMenus() as $menu)
                                                            <option value="{{ $menu->id }}">
                                                                {{ getLan() == 'np' ? $menu->menu_name_np : $menu->menu_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">

                                                    <label for="" class="text-danger">
                                                        {{ trans('menu.menu_controller') }}
                                                        <span>*</span></label>
                                                    <input type="text" class="form-control" name="menu_controller"
                                                        value="{{ old('menu_controller') }}" required>
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
                                                        value="{{ old('menu_link') }}" required>
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
                                                        value="{{ old('menu_icon') }}" required>
                                                    <div class="invalid-feedback">
                                                        {{ trans('menu.menu_icon_required') }}
                                                    </div>
                                                    @error('menu_icon')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">

                                                    <label for="" class="text-danger"> {{ trans('common.status') }}
                                                        <span class="text-danger">*</span> </label>
                                                    <select name="menu_status" class="form-control select2"
                                                        id="" required>
                                                        <option value="">{{ trans('common.status') }}</option>
                                                        <option value="1">{{ trans('common.true') }} </option>
                                                        <option value="">{{ trans('common.false') }}</option>
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
                                                        value="{{ old('menu_order') }}" required>
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
                    </div>

                </div>
            </div>
        </section>


    </div>
@endsection
