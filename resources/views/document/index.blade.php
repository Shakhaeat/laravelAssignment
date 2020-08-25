@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            @include ('users.message')
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title display-3">@lang('label.DOCUMENT_LIST')</strong>
                        <a href="{{url('document/create')}}" class="btn btn-primary btn-float">@lang('label.CREATE_BUTTON')</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('label.SERIAL')</th>
                                    <th scope="col">@lang('label.NAME')</th>
                                    <th scope="col">@lang('label.ACTION')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $var = 1;
                                @endphp
                                @if(!empty($docs))
                                @foreach($docs as $doc)
                                <tr>
                                    <th scope="row">{{ $var++ }}</th>
                                    <td>{{$doc->name}}</td>
                                    <td class="doc-icon">
                                        <a class="btn" href="{{url('document/'.$doc->id.'/edit')}}"><i class="far fa-edit"></i></a>
                                        <a class="btn" href="{{url('document/excel/'.$doc->id)}}"><i class="far fa-file-excel"></i></a>
                                    
                                        <a class="btn" href="{{url('document/pdf/'.$doc->id)}}"><i class="far fa-file-pdf"></i></a>
                                        <div class="btn-group">
                                        {!! Form::open(['url' => 'document/'.$doc->id]) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button class="btn del-font remove"  type="submit"><i class="fas fa-trash-alt"></i></button>
                                        {!! Form::close() !!}
                                        </div>
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


@endsection
