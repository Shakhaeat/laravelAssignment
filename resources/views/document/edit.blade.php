@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">@lang('label.CREATE_DOCUMENT')</div>

                <div class="card-body">
                    {!! Form::open(['url' => url('document/'.$doc->id), 'method' => 'patch', 'enctype' => 'multipart/form-data', 'file'=>'true']) !!}
                    <!--<form method="POST" action="{{url('users')}}" enctype="multipart/form-data">-->
                    @method('PATCH')
                    @csrf

                    <div class="form-group required row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">@lang('label.DOCUMENT_NAME')</label>

                        <div class="col-md-6">
                            {!!Form::text('name', $doc->name, ['class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control', 'id' => 'name',  'placeholder' => 'Enter name', 'autofocus']) !!}
                            <!--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus />-->

                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group required row">
                        <label for="excel" class="col-md-4 col-form-label text-md-right">@lang('label.DOCUMENT_EXCEL')</label>

                        <div class="col-md-6">
                            {!!Form::file('excel', ['class' => ($errors->has('excel')) ? 'form-control is-invalid' : 'form-control', 'id' => 'excel', 'autofocus']) !!}
                            <!--<input id="image" type="file" class=" @error('image') is-invalid @enderror" name="image" value=""  autocomplete="phone" autofocus />-->

                            <span class="invalid-feedback" role="alert"> 
                                <strong>{{$errors->first('excel')}}</strong>
                            </span>
                             <span>This file should be an excel file and less than 2MB.</span>
                        </div>
                        <a href="{{url('document/excel/'.$doc->id)}}"><i class="far fa-file-excel"></i></a>

                    </div>

                    <div class="form-group required row">
                        <label for="pdf" class="col-md-4 col-form-label text-md-right">@lang('label.DOCUMENT_PDF')</label>

                        <div class="col-md-6">
                            {!!Form::file('pdf', ['class' => ($errors->has('pdf')) ? 'form-control is-invalid' : 'form-control', 'id' => 'pdf', 'autofocus']) !!}
                            <!--<input id="image" type="file" class=" @error('image') is-invalid @enderror" name="image" value=""  autocomplete="phone" autofocus />-->

                            <span class="invalid-feedback" role="alert"> 
                                <strong>{{$errors->first('pdf')}}</strong>
                            </span>
                             <span>This file should be an pdf file and less than 2MB.</span>
                        </div>
                        <a class="doc-icon" href="{{url('document/pdf/'.$doc->id)}}"><i class="far fa-file-pdf"></i></a>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                @lang('label.UPDATE_BUTTON')
                            </button>
                        </div>
                        <div class="col-md-4 offset-1">
                            <a class="btn btn-primary" href="{{url('document')}}">@lang('label.CANCEL_BUTTON')</a>
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