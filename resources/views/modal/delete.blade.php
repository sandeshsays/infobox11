<div class="modal fade"
     id="deleteModal{{$key}}"
     aria-hidden="true"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog {{getLan() =='np' ? 'modal-dialog-centered': 'modal-sm modal-dialog-centered'}}">
        <div class="modal-content text-center modal-content-radius">
            <div class="modal-header btn-primary">
                <h4 class="modal-title {{setFont()}}">
                    @if(systemSetting())
                        {{getLan() == 'np' ? systemSetting()->app_short_name_np : systemSetting()->app_short_name }}
                    @else
                        {{trans('common.app_name')}}
                    @endif
                </h4>
            </div>
            <form action="{{ route($route.'.destroy', $data->id) }}" method="POST">
                @csrf
                @method('Delete')


            <div class="modal-body" style="color: #212529">
                <h5 class="{{setFont()}}">
                    {{trans('message.commons.are_you_sure_you_want_to_delete')}}
                </h5>
            </div>
            <div class="modal-footer justify-content-center {{setFont()}}">
                <button type="submit"
                        class="btn btn-primary"
                >
                    <i class="fa fa-check-circle"></i>
                    {{trans('message.button.yes')}}
                </button> &nbsp; &nbsp;
                <button type="button"
                        class="btn btn-danger"
                        data-dismiss="modal"
                >
                    <i class="fa fa-times-circle"></i>
                    {{trans('message.button.no')}}
                </button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
