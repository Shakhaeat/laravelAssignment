@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">@lang('label.CREATE_DOCUMENT')</div>

                <div class="card-body">
                    {!! Form::open(['url' => url('document'), 'method' => 'post', 'enctype' => 'multipart/form-data', 'file'=>'true']) !!}
                    <!--<form method="POST" action="{{url('users')}}" enctype="multipart/form-data">-->
                    @csrf

                    <div class="form-group required row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">@lang('label.DOCUMENT_NAME')</label>

                        <div class="col-md-6">
                            {!!Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control', 'id' => 'name',  'placeholder' => 'Enter document name', 'autofocus']) !!}
                            <!--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus />-->

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group required row">
                        <label for="excel" class="col-md-4 col-form-label text-md-right">@lang('label.DOCUMENT_EXCEL')</label>

                        <div class="col-md-6">
                            {!!Form::file('excel', ['accept' => '.xlsx,.xls,.xlx','class' => ($errors->has('excel')) ? 'form-control is-invalid' : 'form-control', 'id' => 'excel', 'autofocus']) !!}
                            <!--<input id="image" type="file" class=" @error('image') is-invalid @enderror" name="image" value=""  autocomplete="phone" autofocus />-->

                            <span class="invalid-feedback" role="alert"> 
                                <strong>{{$errors->first('excel')}}</strong>
                            </span>
                            <span>This file should be an excel file and less than 2MB.</span>
                        </div>
                    </div>

                    <div class="form-group required row">
                        <label for="pdf" class="col-md-4 col-form-label text-md-right">@lang('label.DOCUMENT_PDF')</label>

                        <div class="col-md-6">
                            {!!Form::file('pdf', ['accept' => 'application/pdf', 'class' => ($errors->has('pdf')) ? 'form-control is-invalid' : 'form-control', 'id' => 'pdf', 'autofocus']) !!}
                            <!--<input id="image" type="file" class=" @error('image') is-invalid @enderror" name="image" value=""  autocomplete="phone" autofocus />-->

                            <span class="invalid-feedback" role="alert"> 
                                <strong>{{$errors->first('pdf')}}</strong>
                            </span>
                            <span>This file should be an pdf file and less than 2MB.</span>
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