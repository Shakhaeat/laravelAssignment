<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title display-3">@lang('label.USERS')</strong>
                </div> 
                <div class="card-body">


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
                                            <!--<th scope="col" colspan = 2>@lang('label.ACTION')</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $var = 1;
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
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function (event) {
        window.print();
    });
</script>
