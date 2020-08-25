@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @include ('users.message')
            <div class="card">
                <div class="card-header">
                    <strong class="card-title display-3">@lang('label.USERS')</strong>

                    <a class="btn btn-float doc-icon" href="{{url('pdf')}}"><i class="far fa-file-pdf"></i></a>
                    <a class="btn btn-float doc-icon" href="{{url('export')}}"><i class="far fa-file-excel"></i></a>
                    <a class="btn btn-float doc-icon" href="{{url('print')}}"><i class="fas fa-print"></i></a>
                    <a href="{{url('users/create')}}" class="btn btn-primary btn-float">@lang('label.CREATE_BUTTON')</a>
                </div> 
                <div class="card-body">
                    {!! Form::open(['url' => url('users/filter'), 'method' => 'post', 'class' => 'search-form']) !!}
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label class="offset-1 col-md-3">@lang('label.SEARCH')</label> 
                                <div class="col-md-8">
                                    {!! Form::text('filter_text', Request::get('filter_text'), ['class' => 'form-control col-md-8', 'id' => 'filter_text',  'placeholder' => 'Username/phone', 'autofocus']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-form-label">@lang('label.GENDER')</label> 
                                <div class="col-md-8">
                                    {!! Form::select('gender', ['0' =>  __('label.SELECT_GENDER_OPT')] + ['1' =>  __('label.MALE'),'2'=>  __('label.FEMALE'),'3'=>  __('label.OTHERS')], Request::get('gender'), ['class'=>'form-control']) !!}                                                           <!--<input class="form-control mr-sm-2" type="text" placeholder="Username" aria-label="Search">-->
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-2">-->
                        <div class="form"> 
                            <button class="btn btn-primary" type="submit">@lang('label.SEARCH_BUTTON')</button>
                        </div>
                        <!--                        </div>-->
                    </div>
                    {!! Form::close() !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">@lang('label.SERIAL')</th>
                                            <th scope="col">@lang('label.NAME')</th>
                                            <th scope="col">@lang('label.USERNAME')</th>
                                            <th scope="col">@lang('label.EMAIL')</th>
                                            <th scope="col">@lang('label.PHONE')</th>
                                            <!--<th>@lang('label.HOBBY')</th>-->
                                            <th scope="col">@lang('label.GENDER')</th>
                                            <th scope="col">@lang('label.IMAGE')</th>
                                            <th scope="col" colspan = 2>@lang('label.ACTION')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $var = (($users->currentPage() - 1) * $users->perPage()) + 1;
                                        @endphp
                                        @if(!empty($users) && $users->count())
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$var++}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <!--<td>{{ !empty($hobby->name)?$hobby->name:'' }} </td>-->
                                            @if($user->gender==1)
                                            <td>@lang('label.MALE')</td>
                                            @elseif($user->gender==2)
                                            <td>@lang('label.FEMALE')</td>
                                            @elseif($user->gender==3)
                                            <td>@lang('label.OTHERS')</td>
                                            @endif
                                            <td><img width="80" height="40" src="{{asset('public/uploads/images/users/' . $user->image)}}" /></td>
                                            <td>
                                                <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-primary">@lang('label.EDIT_BUTTON')</a>
                                            </td>
                                            <td>
                                                {!! Form::open(['url' => 'users/'.$user->id]) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                <button class="btn btn-danger remove"  type="submit">@lang('label.DELETE_BUTTON')</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="4">No data found.</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">  
                <div class="col-lg-12">
                    <!--{{ $users->links() }}-->
                    {{ $users->appends($data)->links() }}
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('customJs')
<!--    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (event) {
            window.print();
        });
    </script>-->
    @endsection