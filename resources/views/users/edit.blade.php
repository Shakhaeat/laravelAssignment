@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('label.EDIT')</div>

                <div class="card-body">
                    {!! Form::open(['url' => url('users/'.$user->id), 'method' => 'patch', 'enctype' => 'multipart/form-data', 'file'=>'true']) !!}
                    <!--<form method="POST" action="{{url('users/'.$user->id)}}" enctype="multipart/form-data">-->
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">@lang('label.NAME')</label>

                        <div class="col-md-6">
                            {!!Form::text('name', $user->name, ['class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control', 'id' => 'name',  'placeholder' => 'Enter name', 'autofocus']) !!}

                                        <!--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" autocomplete="name" autofocus />-->

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">@lang('label.USERNAME')</label>

                        <div class="col-md-6">
                            {!!Form::text('username', $user->username, ['class' => ($errors->has('username')) ? 'form-control is-invalid' : 'form-control', 'id' => 'username',  'placeholder' => 'Enter username', 'autofocus']) !!}

                                    <!--<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username}}" autocomplete="name" autofocus />-->

                            
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('username')}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">@lang('label.EMAIL')</label>

                        <div class="col-md-6">
                            {!!Form::email('email', $user->email, ['class' => ($errors->has('email')) ? 'form-control is-invalid' : 'form-control', 'id' => 'email',  'placeholder' => 'Enter email', 'autofocus']) !!}

                                    <!--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" autocomplete="email" />-->

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">@lang('label.PASSWORD')</label>

                        <div class="col-md-6">
                            {!!Form::password('password', ['class' => ($errors->has('password')) ? 'form-control is-invalid' : 'form-control', 'id' => 'password',  'placeholder' => 'Enter new password', 'autofocus']) !!}

                                    <!--<input id="password" type="password" placeholder="Enter new password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" />-->

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('password')}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('label.CONFIRM_PASSWORD')</label>

                        <div class="col-md-6">
                            {!!Form::password('password_confirmation', ['class' => ($errors->has('password-confirm')) ? 'form-control is-invalid' : 'form-control', 'id' => 'password-confirm',  'placeholder' => 'Confirm password', 'autofocus']) !!}

                                    <!--<input id="password-confirm" type="password" placeholder="Confirm new password" class="form-control" name="password_confirmation" autocomplete="new-password">-->
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">@lang('label.PHONE')</label>

                        <div class="col-md-6">
                            {!!Form::text('phone', $user->phone, ['class' => 'form-control', 'id' => 'phone',  'placeholder' => 'Enter phone number', 'autofocus']) !!}

                                    <!--<input id="phone" type="text" placeholder="Enter Phone number" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{$user->phone}}" autocomplete="phone" autofocus />-->
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">@lang('label.GENDER')</label>

                        <div class="col-md-6 margin-top-8 radio-inline">
                            {!! Form::radio('gender', '1', ($user->gender != 4 & $user->gender == 1) ? true : false, ['id' => 'gender']) !!}&nbsp;@lang('label.MALE')&nbsp;&nbsp;
                            {!! Form::radio('gender', '2', ($user->gender != 4 & $user->gender == 2) ? true : false, ['id' => 'gender']) !!}&nbsp;@lang('label.FEMALE')&nbsp;&nbsp;
                            {!! Form::radio('gender', '3', ($user->gender != 4 & $user->gender == 3) ? true : false, ['id' => 'gender']) !!}&nbsp;@lang('label.OTHERS')&nbsp;&nbsp;
                          
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hobby" class="col-md-4 col-form-label text-md-right">@lang('label.HOBBY')</label>

                        <div class="col-md-6">
                            {!!  Form::select('hobby_id', $hobbyList,  $user->hobby_id, ['class' => 'form-control js-states' ]) !!}
                           
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <img width="200" height="170" class="img-thumbnail" src="{{asset('public/uploads/images/users/' . $user->image)}}" id="img_url" alt="your image" /> 
                          <!-- <img src="" id="img_url" alt="your image"> -->
                            <!-- <br>
                            <input type="file" id="img_file" onChange="img_pathUrl(this);"> -->
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">@lang('label.IMAGE')</label>

                        <div class="col-md-6">
                            {!!Form::file('image', ['class' => ($errors->has('image')) ? 'form-control is-invalid' : 'form-control', 'onChange' => 'img_pathUrl(this);','id' => 'image', 'autofocus']) !!}

                            <!--<input id="image" type="file" name="image" onChange="img_pathUrl(this);" class="@error('image') is-invalid @enderror" autocomplete="image" autofocus />-->
                            <!--<input type="hidden" name="prev_image" value="{{$user->image}}" />--> 

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('image')}}</strong>
                            </span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="checkAddress" class="col-md-4 col-form-label text-md-right">@lang('label.ADDRESS')<sub> @lang('label.SUBSCRIPT')</sub></label>                           
                        <div class="col-md-6 margin-top-8">
                            {!! Form::checkbox('address_id', '1', ($user->address_flag == 1) ? true : false, ['id' => 'checkAddress']) !!}&nbsp;@lang('label.YES')&nbsp;&nbsp;
                                    <!--<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value=""  autocomplete="phone" autofocus  />-->
                            
                        </div>
                    </div>

                    <!--Address-->
                    <div id="addressVar">
                        <div class="form-group row">
                            <label for="division" class="col-md-4 col-form-label text-md-right">@lang('label.DIVISION')</label>

                            <div class="col-md-6">
                                {!!  Form::select('division_id',$divisionList, !empty($selectedDivision->id)?$selectedDivision->id:0, ['class' => 'form-control js-states','id' => 'divisionId']) !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right">@lang('label.DISTRICTS')</label>
                            <div class="col-md-6">
                                {!!  Form::select('district_id',$districtList, !empty($selectedDistrict->id)?$selectedDistrict->id:0,['id' => 'districtId','class' => 'form-control js-states' ]) !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thana" class="col-md-4 col-form-label text-md-right">@lang('label.THANA')</label>

                            <div class="col-md-6">
                                {!!  Form::select('thana_id', $thanaList,  $user->thana_id, ['id' => 'thanaId', 'class' => 'form-control js-states' ]) !!}

                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                @lang('label.UPDATE_BUTTON')
                            </button>
                        </div>
                    </div>
                    <!--                        </div>
                                        </div>-->
                    {!! Form::close() !!}
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customJs')
<script type="text/javascript">
//Address div hide and show
    $(document).ready(function () {
        if ($('#checkAddress').prop("checked")) {
            $("#addressVar").show();
        } else {
            $("#addressVar").hide();
        }
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