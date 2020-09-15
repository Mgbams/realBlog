@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-3 pt-5">
        <img src="/images/codecamp.png" alt="freecodecamp image" class="rounded-circle" style="height: 100px; width: 100px;" />
    </div>

    <div class="col-9 pt-5">
        <div class="d-flex justify-content-between align-items-baseline">
            <h1>{{$user->username}}</h1>
            <a href="#">add new posts</a>
        </div>
        <div class="d-flex">
            <div class="pr-5"><strong>153</strong> posts</div>
            <div class="pr-5"><strong>23k</strong> followers</div>
            <div class="pr-5"><strong>212</strong> following</div>
        </div>
        <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
        <div>{{$user->profile->description}}</div>
        <div><a href="#">{{$user->profile->url ?? "N/A"}}</a></div>
    </div>

    <div class="row pt-5">
    <div class="col-4">
        <img src="https://camo.githubusercontent.com/60c67cf9ac2db30d478d21755289c423e1f985c6/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f66726565636f646563616d702f776964652d736f6369616c2d62616e6e65722e706e67" style="height:200px;" class="w-100" />
    </div>

    <div class="col-4">
        <img src="https://cdn-media-1.freecodecamp.org/images/0*2lwlomgyQBSf47Ug.png" style="height:200px;" class="w-100" />
    </div>

    <div class="col-4">
        <img src="https://res.cloudinary.com/teepublic/image/private/s--KRv-PU6K--/c_crop,x_10,y_10/c_fit,w_924/c_crop,g_north_west,h_972,w_1127,x_-101,y_-326/l_misc:transparent_1260/fl_layer_apply,g_north_west,x_-167,y_-468/c_mfit,g_north_east,u_misc:tapestry-l-l-gradient/e_displace,fl_layer_apply,x_0,y_19/l_upload:v1507037316:production:blanks:knoqtwkqk9vucfsy8ke0/fl_layer_apply,g_north_west,x_0,y_0/b_rgb:0f1b2e/c_limit,f_jpg,h_630,q_90,w_630/v1448280487/production/designs/287524_2.jpg" style="height:200px;" class="w-100" />
    </div>
</div>


    {{--<div>
            @if(count($user) > 0)
            @foreach($user as $user)
            <div class="col-9 pt-5">
                <div>
                    <h1>{{ $user->username}}</h1>
</div>
<div class="d-flex">
    <div class="pr-5"><strong>153</strong> posts</div>
    <div class="pr-5"><strong>23k</strong> followers</div>
    <div class="pr-5"><strong>212</strong> following</div>
</div>

<div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
<div>{{$user->profile->description}}</div>
<div><a href="#">www.freecodecamp.org</a></div>
</div>
@end
@endif
</div>

<div class="row pt-5">
    <div class="col-4">
        <img src="https://camo.githubusercontent.com/60c67cf9ac2db30d478d21755289c423e1f985c6/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f66726565636f646563616d702f776964652d736f6369616c2d62616e6e65722e706e67" />
    </div>

    <div class="col-4">
        <img src="https://cdn-media-1.freecodecamp.org/images/0*2lwlomgyQBSf47Ug.png" />
    </div>

    <div class="col-4">
        <img src="https://res.cloudinary.com/teepublic/image/private/s--KRv-PU6K--/c_crop,x_10,y_10/c_fit,w_924/c_crop,g_north_west,h_972,w_1127,x_-101,y_-326/l_misc:transparent_1260/fl_layer_apply,g_north_west,x_-167,y_-468/c_mfit,g_north_east,u_misc:tapestry-l-l-gradient/e_displace,fl_layer_apply,x_0,y_19/l_upload:v1507037316:production:blanks:knoqtwkqk9vucfsy8ke0/fl_layer_apply,g_north_west,x_0,y_0/b_rgb:0f1b2e/c_limit,f_jpg,h_630,q_90,w_630/v1448280487/production/designs/287524_2.jpg" />
    </div>
</div>--}}
</div>
@endsection