<!-- resources/views/manage-permissions.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Permissions</h1>

        <form action="{{ route('update.permissions') }}" method="POST">
            @csrf

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Menu</th>
                        @foreach($roles as $role)
                            <th>{{ $role->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->menu_name }}</td>
                            @foreach($roles as $role)
                                @php
                                    $permission = $permissions->where('role_id', $role->id)->where('menu_id', $menu->id)->first();
                                @endphp
                                <td>
                                    <input type="checkbox" name="permissions[{{ $role->id }}][{{ $menu->id }}][allow_index]" value="1" {{ $permission && $permission->allow_index ? 'checked' : '' }}> Index
                                    <input type="checkbox" name="permissions[{{ $role->id }}][{{ $menu->id }}][allow_add]" value="1" {{ $permission && $permission->allow_add ? 'checked' : '' }}> Add
                                    <input type="checkbox" name="permissions[{{ $role->id }}][{{ $menu->id }}][allow_edit]" value="1" {{ $permission && $permission->allow_edit ? 'checked' : '' }}> Edit
                                    <input type="checkbox" name="permissions[{{ $role->id }}][{{ $menu->id }}][allow_delete]" value="1" {{ $permission && $permission->allow_delete ? 'checked' : '' }}> Delete
                                    <input type="checkbox" name="permissions[{{ $role->id }}][{{ $menu->id }}][allow_show]" value="1" {{ $permission && $permission->allow_show ? 'checked' : '' }}> Show
                                </td>
                            @endforeach
                        </tr>

                        @if($menu->children)
                            @foreach($menu->children as $childMenu)
                                <tr>
                                    <td>-- {{ $childMenu->menu_name }}</td>
                                    @foreach($roles as $role)
                                        @php
                                            $permission = $permissions->where('role_id', $role->id)->where('menu_id', $childMenu->id)->first();
                                        @endphp
                                        <td>
                                            <input type="checkbox" name="permissions[{{ $role->id }}][{{ $childMenu->id }}][allow_index]" value="1" {{ $permission && $permission->allow_index ? 'checked' : '' }}> Index
                                            <input type="checkbox" name="permissions[{{ $role->id }}][{{ $childMenu->id }}][allow_add]" value="1" {{ $permission && $permission->allow_add ? 'checked' : '' }}> Add
                                            <input type="checkbox" name="permissions[{{ $role->id }}][{{ $childMenu->id }}][allow_edit]" value="1" {{ $permission && $permission->allow_edit ? 'checked' : '' }}> Edit
                                            <input type="checkbox" name="permissions[{{ $role->id }}][{{ $childMenu->id }}][allow_delete]" value="1" {{ $permission && $permission->allow_delete ? 'checked' : '' }}> Delete
                                            <input type="checkbox" name="permissions[{{ $role->id }}][{{ $childMenu->id }}][allow_show]" value="1" {{ $permission && $permission->allow_show ? 'checked' : '' }}> Show
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif

                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Update Permissions</button>
        </form>
    </div>
@endsection
