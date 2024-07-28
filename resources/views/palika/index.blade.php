@extends('layouts.app')

@section('template_title')
    Palikas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Palikas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('palikas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Code</th>
									<th >Name</th>
									<th >Name Ne</th>
									<th >Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($palikas as $palika)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $palika->code }}</td>
										<td >{{ $palika->name }}</td>
										<td >{{ $palika->name_ne }}</td>
										<td >{{ $palika->status }}</td>

                                            <td>
                                                <form action="{{ route('palikas.destroy', $palika->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('palikas.show', $palika->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('palikas.edit', $palika->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $palikas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
