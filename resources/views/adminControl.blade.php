@extends('layouts.app')
@section('title', 'User table Page')

@section('content')

  	<div>
  	<!-- Table to display user attributes -->
  		<div class="table-responsive bg-light">
  		<table class="table" style="color: black">
  				<tr style="display:inline-flex;">
  					<th style="width: auto">Email</th>
  					<th style="width: auto">First Name</th>
  					<th style="width: auto">Last Name</th>
  					<th style="width: auto">Company</th>
  					<th style="width: auto">Phone Number</th>
  					<th style="width: auto">Website</th>
  					<th style="width: auto">Birthday</th>
  					<th style="width: auto">Gender</th>
  					<th style="width: auto">Bio</th>
  					<th style="width: auto">Role</th>
  					
  				</tr>
  			</table>
  			<!-- foreach to loop through users in database -->
  		@foreach ($model as $user)
  			<table class="table" style="color: black">
  				<tr style="text-align: center">
  					<th style="width: 10%">{{$user->getEmail()}}</th>
  					<!-- Retrieve user information -->
  					<th>{{$user->getFirstname()}}</th>
  					<th>{{$user->getLastname()}}</th> 		
  					<th>{{$user->getCompany()}}</th>
  					<th>{{$user->getPhonenumber()}}</th>				
  					<th>{{$user->getWebsite()}}</th>
  					<th>{{$user->getBirthdate()}}</th>
  					<th>{{$user->getGender()}}</th>
  					<th>{{$user->getBio()}}</th>
  					<th>{{$user->getRole()}}</th>
  					<th><a class="btn btn-primary bold" style="width: 80px; height: 25px; font-size: 10px" href="{{ route('profileEdit', $user->getId()) }}">Edit Profile</a></th>
  					<!-- Check what state of suspension user is in -->
  					<!-- If user suspend == 0, display suspend button for they are not suspended currently -->
  					@if($user->getSuspend() == 0)
  					<th><a class="btn btn-primary bold" style="width: 80px; height: 25px; font-size: 10px"  href="{{URL::to('/suspendUser/'.$user->getId()) }}">Suspend</a></th>
  					<!-- If user suspend == 1, display unsuspend button for they are currently suspended -->
  					@elseif($user->getSuspend() == 1)
  					<th><a class="btn btn-primary bold" style="width: 80px; height: 25px; font-size: 10px"  href="{{URL::to('/unSuspendUser/'.$user->getId()) }}">UnSuspend</a></th>
  					@endif
  					<th><a class="btn btn-primary bold confirm" style="width: 80px; height: 25px; font-size: 10px"  href="{{URL::to('/terminateUser/'.$user->getId()) }}">Delete</a></th>
  				</tr>
  			</table>
  		@endforeach
  		</div>
  	</div>
 	<!-- Check if user wants to delete user -->
    <script type="text/javascript">
    $(function() {
        $('.confirm').click(function() {
            return window.confirm("Are you sure?");
        });
    });
    </script>
@endsection