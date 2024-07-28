<div class="modal fade"
     id="searchModal"
     data-keyboard="false"
     data-backdrop="static"
>
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn-primary rounded-pill">
                <h4 class="modal-title {{setFont()}}">
                    <i class="fa fa-filter"></i>
                    {{trans('message.button.filter')}}
                </h4>
                @include('backend.components.buttons.closeIcon')
            </div>


            {!! Form::open(['method'=>'get',
                 'url'=>$page_url,
                 'autocomplete'=>'off'])
            !!}
            <div class="modal-body">
                <div class="row {{setFont()}}">
                    @if(systemAdmin())
                        <div class="form-group col-md-6 {{setFont()}}">
                            {!!Form::select('client_id',   appClientList()->pluck('name','id'),
                                Request::get('client_id'),
                                ['class'=>'form-control select2',
                                'style'=>'width: 100%;','placeholder'=>
                                trans('common.select_local_body')])
                            !!}
                        </div>
                    @endif

                    @if(isAdminLayerUser())
                        <div class="form-group col-md-6 {{setFont()}}">
                            {{ Form::select(
                               'branch_id',
                               $branchList->pluck('name','id'),
                               Request::get('gender'),
                               [
                                   'class' => 'form-control select2',
                                   'style' => 'width: 100%',
                                   'placeholder' => trans('employee.select_current_branch'),
                               ],
                             ) }}
                        </div>
                    @endif
                    @if(isAdminLayerUser())
                        @if(systemAdmin())
                            <div class="form-group col-md-6">
                                {{ Form::number('ward_no', Request::get('ward_no'), [
                                 'class' => 'form-control',
                                 'style' => 'width: 100%',
                                 'placeholder' => trans('employee.select_ward'),
                                 'type' => 'number',
                             ]) }}
                            </div>
                        @else
                            <div class="form-group col-md-6">
                                {{ Form::select(
                        'ward_no',
                      getWardListByLocalBodyCode(localBodyCode()),
                        Request::get('ward_no'),
                        [
                            'class' => 'form-control select2',
                            'style' => 'width: 100%',
                            'placeholder' => trans('employee.select_ward'),
                        ],
                    ) }}
                            </div>
                        @endif
                    @endif

                    <div class="form-group col-md-6">
                        {!!Form::select('role_id',
                                $roleList->pluck('name','id'),
                                Request::get('role_id'),
                                ['class'=>'form-control select2 selected',
                                'style'=>'width: 100%;','placeholder'=>trans('message.pages.role_access.select_user_type')])
                        !!}
                    </div>

                    <div class="form-group col-md-6">
                        {!!Form::select('status',dataStatus(),
                            Request::get('status'),
                            ['class'=>'form-control select2 selected',
                            'style'=>'width: 100%;','placeholder'=>
                            trans('message.pages.users_management.select_user_status')])
                        !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!!Form::email('email',
                            Request::get('email'),
                            ['class'=>'form-control f-arial',
                            'autocomplete'=>'off',
                            'width'=>'100%',
                            'placeholder'=>trans('message.pages.users_management.login_email_address')])
                            !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!!Form::text('login_user_name',
                            Request::get('login_user_name'),
                            ['class'=>'form-control f-arial',
                            'autocomplete'=>'off',
                            'width'=>'100%',
                            'placeholder'=>trans('message.pages.users_management.login_user_name')])
                        !!}
                    </div>
                    <div class="form-group  col-md-6 {{ setFont() }}">
                        {!! Form::text('mobile_no', null, [
                            'class' => 'form-control f-arial mobileNo',
                            'placeholder' => trans('appointment.mobile_no'),
                            'autocomplete' => 'off',
                        ]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!!Form::text('full_name',
                        Request::get('full_name'),
                        ['class'=>'form-control',
                        'autocomplete'=>'off',
                        'width'=>'100%',
                        'placeholder'=>trans('message.pages.roles.name')])
                        !!}
                    </div>
                    @if(isAdminLayerUser())
                        <div class="form-group col-md-6 {{ setFont() }}">
                            {!! Form::select('user_level_type', userLevelType(), Request::get('user_level_type'), [
                                'class' => 'form-control select2',
                                'style' => 'width: 100%;',
                                'placeholder' => trans('common.select_user_level_type'),
                            ]) !!}
                        </div>
                    @endif
                    @if(isAdminLayerUser())
                        <div class="form-group col-md-6 {{ setFont() }}">
                            {!! Form::select('view_user_type', vieUserType(), Request::get('view_user_type'), [
                                'class' => 'form-control select2',
                                'style' => 'width: 100%;',
                                'placeholder' => 'View User Type',
                            ]) !!}
                        </div>
                    @endif

                    <div class="col-md-12">
                        <div class="modal-footer justify-content-center {{setFont()}}">

                            @include('backend.components.buttons.filterAction')
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
