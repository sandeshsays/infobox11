@php $key =  $data->id; @endphp
<li class="list-group-item" data-id="{{ $data->id }}" >
    {{ getLan() == 'np' ? $data->menu_name_np : $data->menu_name }}
    <span class="pull-right rounded-circle"><a class="text-info" href="{{route('menumanagement.edit',hashIdGenerate($data->id))}}" title="Edit"><i class="fa fa-pencil-alt "></i></a>&emsp;

        <a title="Delete" class="text-danger"  data-toggle="modal" data-target="#deleteModal{{ $key }}"
        data-placement="top" title="{{ trans('message.button.delete') }}">
       <i class="fa fa-trash"></i></a></span>

    

   
                                                   
    @if ($data->children->isNotEmpty())
        <ul>
            @foreach ($data->children as $child)
                @include('menu.menu_item', ['data' => $child])
            @endforeach
        </ul>
    @endif
</li>
@include('modal.delete')