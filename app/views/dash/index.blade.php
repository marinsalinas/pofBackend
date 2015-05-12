@extends('layouts.dash')

@section('members')


{{$i=1}}
 @foreach($admins as $admin)
        {{--<div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-users"></i> {{ link_to ("admins/{$admin->username}/edit", $admin->username)}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul>
                    <li>{{$admin->email}}</li>
                    <li>{{$admin->fullname}}</li>
                    <li>{{$admin->phone}}</li>
                </ul>
            </div>
            <!-- /.panel-body -->
        </div>
--}}

                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/profile/{{$i}}.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">{{ link_to ("admins/{$admin->username}/edit", $admin->username)}}</a><br/>
                      		   <muted>{{$admin->email}}</muted>
                      		</p>
                      	</div>
                      </div>
{{$i++}}
      @endforeach

<!-- First Member -->
                    {{--  <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/ui-divya.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">{{ link_to ("admins/{$admin->username}/edit", $admin->username)}}</a><br/>
                      		   <muted>{{$admin->email}}</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Second Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/ui-sherman.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">DJ SHERMAN</a><br/>
                      		   <muted>I am Busy</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Third Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/ui-danro.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">DAN ROGERS</a><br/>
                      		   <muted>Available</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Fourth Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/ui-zac.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">Zac Sniders</a><br/>
                      		   <muted>Available</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Fifth Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="assets/img/ui-sam.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">Marcel Newman</a><br/>
                      		   <muted>Available</muted>
                      		</p>
                      	</div>
                      </div>--}}


@stop