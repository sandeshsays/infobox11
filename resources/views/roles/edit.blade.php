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
                        <h3>{{getLan() == 'np' ? $role->name_np : $role->name_en}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="" class="text-danger"> {{ trans('roles.role_name_nepali') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control type_np" name="name_np"
                                    value="{{ old('name_np', $role->name_np) }}" required>
                                @error('name_np')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <label for="" class="text-danger"> {{ trans('roles.role_name') }} <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="name_en"
                                    value="{{ old('name_en', $role->name_en) }}" required>
                                @error('name_np')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <br>
                          

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="">{{trans('common.menu')}}</th>
                                            <th><input type="checkbox" id="check-all-index"> Index</th>
                                            <th><input type="checkbox" id="check-all-add"> Add</th>
                                            <th><input type="checkbox" id="check-all-edit"> Edit</th>
                                            <th><input type="checkbox" id="check-all-delete"> Delete</th>
                                            <th><input type="checkbox" id="check-all-show"> Show</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menus as $menu)
                                            @php
                                                $userRole = $permissions->get($menu->id);
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{getLan() == 'np' ? $menu->menu_name_np : $menu->menu_name}}
                                                    <br>
                                                    <label>
                                                        <input type="checkbox" class="check-all-permissions"
                                                            data-menu-id="{{ $menu->id }}"
                                                            {{ $userRole && $userRole->allow_index && $userRole->allow_add && $userRole->allow_edit && $userRole->allow_delete && $userRole->allow_show ? 'checked' : '' }}>
                                                            {{getLan() == 'np' ?'सबै' : 'All'}}
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="hidden"
                                                        name="permissions[{{ $menu->id }}][allow_index]" value="0">
                                                    <input type="checkbox"
                                                        name="permissions[{{ $menu->id }}][allow_index]" value="1"
                                                        class="allow-index allow-index-{{ $menu->id }}"
                                                        {{ $userRole && $userRole->allow_index ? 'checked' : '' }}>
                                                </td>
                                                <td>
                                                    <input type="hidden"
                                                        name="permissions[{{ $menu->id }}][allow_add]" value="0">
                                                    <input type="checkbox"
                                                        name="permissions[{{ $menu->id }}][allow_add]" value="1"
                                                        class="allow-add allow-add-{{ $menu->id }}"
                                                        {{ $userRole && $userRole->allow_add ? 'checked' : '' }}>
                                                </td>
                                                <td>
                                                    <input type="hidden"
                                                        name="permissions[{{ $menu->id }}][allow_edit]" value="0">
                                                    <input type="checkbox"
                                                        name="permissions[{{ $menu->id }}][allow_edit]" value="1"
                                                        class="allow-edit allow-edit-{{ $menu->id }}"
                                                        {{ $userRole && $userRole->allow_edit ? 'checked' : '' }}>
                                                </td>
                                                <td>
                                                    <input type="hidden"
                                                        name="permissions[{{ $menu->id }}][allow_delete]"
                                                        value="0">
                                                    <input type="checkbox"
                                                        name="permissions[{{ $menu->id }}][allow_delete]"
                                                        value="1"
                                                        class="allow-delete allow-delete-{{ $menu->id }}"
                                                        {{ $userRole && $userRole->allow_delete ? 'checked' : '' }}>
                                                </td>
                                                <td>
                                                    <input type="hidden"
                                                        name="permissions[{{ $menu->id }}][allow_show]" value="0">
                                                    <input type="checkbox"
                                                        name="permissions[{{ $menu->id }}][allow_show]" value="1"
                                                        class="allow-show allow-show-{{ $menu->id }}"
                                                        {{ $userRole && $userRole->allow_show ? 'checked' : '' }}>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{getLan() == 'np' ?'अधावधि गर्नुहोस' : 'Update'}}</button>
                            </form>
                        </div>

                        <span class="float-right {{ setFont() }}"></span>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            // Function to toggle all checkboxes for a specific permission type
            function toggleAllCheckboxes(permissionClass, isChecked) {
                $('.' + permissionClass).prop('checked', isChecked);
            }

            // Event listeners for "check all" checkboxes
            $('#check-all-index').change(function() {
                toggleAllCheckboxes('allow-index', $(this).prop('checked'));
            });

            $('#check-all-add').change(function() {
                toggleAllCheckboxes('allow-add', $(this).prop('checked'));
            });

            $('#check-all-edit').change(function() {
                toggleAllCheckboxes('allow-edit', $(this).prop('checked'));
            });

            $('#check-all-delete').change(function() {
                toggleAllCheckboxes('allow-delete', $(this).prop('checked'));
            });

            $('#check-all-show').change(function() {
                toggleAllCheckboxes('allow-show', $(this).prop('checked'));
            });

            // Event listener for per-menu "check/uncheck all" checkbox
            $('.check-all-permissions').change(function() {
                var menuId = $(this).data('menu-id');
                var isChecked = $(this).prop('checked');
                $('.allow-index-' + menuId).prop('checked', isChecked);
                $('.allow-add-' + menuId).prop('checked', isChecked);
                $('.allow-edit-' + menuId).prop('checked', isChecked);
                $('.allow-delete-' + menuId).prop('checked', isChecked);
                $('.allow-show-' + menuId).prop('checked', isChecked);
            });
        });
    </script>
@endsection
