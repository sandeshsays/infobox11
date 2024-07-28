@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Client Setting</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    @if (sizeof($roles) > 0)
                        <div class="card-body">
                            <table id="example2"
                                class="table table-bordered table-striped dataTable dtr-inline {{ setFont() }}">
                                <thead class="th-header">
                                    <tr class="{{ setFont() }}">
                                        <th>
                                            S.N
                                        </th>

                                        <th>
                                            नाम

                                        </th>
                                        <th>
                                            Name

                                        </th>




                                        <th width="14%">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $data)
                                        <tr>

                                            <th scope=row {{ setFont() }}>
                                                {{ ($roles->currentpage() - 1) * $roles->perpage() + $key + 1 }}
                                            </th>

                                            <td class="{{ setFont() }}">
                                                {{ $data->name_np }}

                                            </td>
                                            <td class="{{ setFont() }}">
                                                {{ $data->name_en }}

                                            </td>

                                            <td class="{{ setFont() }}">
                                                &nbsp;
                                                <a href="{{ route($page_route . '.' . 'show', hashIdGenerate($data->id)) }}"
                                                    class="btn btn-secondary btn-xs rounded-pill {{ setFont() }}"
                                                    title="{{ trans('message.button.show') }}">
                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <a href="{{ route($page_route . '.' . 'edit', hashIdGenerate($data->id)) }}"
                                                    class="btn btn-info btn-xs rounded-pill {{ setFont() }}"
                                                    title="{{ trans('message.button.edit') }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>


                                                @if ($data->status == 1 && allowDelete())
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs rounded-pill {{ setFont() }}"
                                                        data-toggle="modal" data-target="#deleteModal{{ $key }}"
                                                        data-placement="top" title="{{ trans('message.button.delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endif
                                               


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <span class="float-right {{ setFont() }}">
                                {{ $roles->appends(request()->except('page'))->links() }}
                            </span>
                        </div>
                    @else
                        <div class="col-md-12 {{ setFont() }}" style="padding-top: 10px">
                            <label class="form-control badge badge-pill" style="text-align:  center; font-size: 18px;">
                                <i class="fas fa-ban" style="margin-top: 6px"></i>
                                {{ trans('message.commons.no_record_found') }}
                            </label>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
