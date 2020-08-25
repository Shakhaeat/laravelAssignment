@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('label.REGISTER')</div>

                <div class="card-body">
                    {!! Form::open(['url' => url('users'), 'method' => 'post', 'enctype' => 'multipart/form-data', 'file'=>'true']) !!}
                    <!--<form method="POST" action="{{url('users')}}" enctype="multipart/form-data">-->
                    @csrf
                  
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">@lang('label.NAME')</label>

                        <div class="col-md-6">
                            {!!Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control', 'id' => 'name',  'placeholder' => 'Enter name', 'autofocus']) !!}
                            <!--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus />-->

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">@lang('label.USERNAME')</label>

                        <div class="col-md-6">
                            {!!Form::text('username', null, ['class' => ($errors->has('username')) ? 'form-control is-invalid' : 'form-control', 'id' => 'username',  'placeholder' => 'Enter username', 'autofocus']) !!}
                             <!--<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="" required autocomplete="name" autofocus />-->

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('username')}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">@lang('label.EMAIL')</label>

                        <div class="col-md-6">
                            {!!Form::email('email', null, ['class' => ($errors->has('email')) ? 'form-control is-invalid' : 'form-control', 'id' => 'email',  'placeholder' => 'Enter email', 'autofocus']) !!}
                            <!--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value=""  autocomplete="email" required />-->

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">@lang('label.PASSWORD')</label>

                        <div class="col-md-6">
                            {!!Form::password('password', ['class' => ($errors->has('password')) ? 'form-control is-invalid' : 'form-control', 'id' => 'password',  'placeholder' => 'Enter password', 'autofocus']) !!}
                           <!--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" required />-->

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('password')}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('label.CONFIRM_PASSWORD')</label>

                        <div class="col-md-6">
                            {!!Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm',  'placeholder' => 'Confirm password', 'autofocus']) !!}
                            
 <!--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" required />-->
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">@lang('label.PHONE')</label>

                        <div class="col-md-6">
                            {!!Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone',  'placeholder' => 'Enter phone number', 'autofocus']) !!}

                                <!--<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value=""  autocomplete="phone" autofocus  />-->
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">@lang('label.GENDER')</label>

                        <div class="col-md-6 margin-top-8 radio-inline">
                            {!! Form::radio('gender', '1', true, ['id' => 'gender']) !!}&nbsp;@lang('label.MALE')&nbsp;&nbsp;
                            {!! Form::radio('gender', '2', false, ['id' => 'gender']) !!}&nbsp;@lang('label.FEMALE')&nbsp;&nbsp;
                            {!! Form::radio('gender', '3', false, ['id' => 'gender']) !!}&nbsp;@lang('label.OTHERS')&nbsp;&nbsp;
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hobby" class="col-md-4 col-form-label text-md-right">@lang('label.HOBBY')</label>

                        <div class="col-md-6">
                            {!!  Form::select('hobby_id', $hobbyList,  null, ['class' => 'form-control js-states' ]) !!}
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">@lang('label.IMAGE')</label>

                        <div class="col-md-6">
                            {!!Form::file('image', ['class' => ($errors->has('image')) ? 'form-control is-invalid' : 'form-control', 'id' => 'image', 'autofocus']) !!}
                            <!--<input id="image" type="file" class=" @error('image') is-invalid @enderror" name="image" value=""  autocomplete="phone" autofocus />-->

                            <span class="invalid-feedback" role="alert"> 
                                <strong>{{$errors->first('image')}}</strong>
                            </span>
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="checkAddress" class="col-md-4 col-form-label text-md-right">@lang('label.ADDRESS')<sub> @lang('label.SUBSCRIPT')</sub></label>                           
                        <div class="col-md-6 margin-top-8">
                            {!! Form::checkbox('address_id', '1', false, ['id' => 'checkAddress']) !!}&nbsp;@lang('label.YES')&nbsp;&nbsp;
                                    <!--<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value=""  autocomplete="phone" autofocus  />-->
                            
                        </div>
                    </div>
                    <!--Address-->
                    <div id="addressVar">
                        <div class="form-group row">
                            <label for="division" class="col-md-4 col-form-label text-md-right">@lang('label.DIVISION')</label>

                            <div class="col-md-6">
                                {!!  Form::select('division_id',$divisionList, null, ['class' => 'form-control js-states','id' => 'divisionId']) !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right">@lang('label.DISTRICTS')</label>
                            <div class="col-md-6">
                                {!!  Form::select('district_id',$districtList,null,['id' => 'districtId','class' => 'form-control js-states' ]) !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thana" class="col-md-4 col-form-label text-md-right">@lang('label.THANA')</label>

                            <div class="col-md-6">
                                {!!  Form::select('thana_id', $thanaList,  null, ['id' => 'thanaId', 'class' => 'form-control js-states' ]) !!}

                            </div>
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                @lang('label.CREATE_BUTTON')
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('customJs')
<script>
//Address div hide and show
    $(document).ready(function () {
        $("#addressVar").hide();
        $(document).on('click', "#checkAddress", function () {
            if ($(this).prop("checked")) {
                $("#addressVar").show(300);
                $(".js-states").select2({width: '100%'});
            } else {
                $("#addressVar").hide(200);
            }
        });


        //AJAX For Address
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //GET district when click division
        $(document).on('change', '#divisionId', function () {
            var divisionId = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{url('users/district')}}",
                data: {
                    division_id: divisionId
                },
                success: function (result) {
                    $('#districtId').html(result.html);
                    $('#thanaId').html(result.htmlThana);
                    $(".js-states").select2({width: '100%'});
                }
            });
        });

        //GET thana when click district
        $(document).on('change', '#districtId', function () {
            var districtId = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{url('users/thana')}}",
                data: {
                    district_id: districtId
                },
                success: function (result) {
                    $('#thanaId').html(result.html);
                    $(".js-states").select2({width: '100%'});
                }
            });
        });



    });
</script>
@endsection