@extends('layouts.app')
@section('title', 'User table Page')

@section('content')
<!-- Same view as adminConrol view except this role cannot suspend, unsuspend or delete user -->
  	<div class="main-body-content w-100">
  		<div class="table-responsive bg-light">
  		<table class="table" style="color: black">
  				<tr>
  					<th>Email</th>
  					<th>First Name</th>
  					<th>Last Name</th>
  					<th>Company</th>
  					<th>Phone Number</th>
  					<th>Website</th>
  					<th>Birthday</th>
  					<th>Gender</th>
  					<th>Bio</th>
  					
  				</tr>
  			</table>
  		@foreach ($model as $user)
  			<table class="table" style="color: black">
  				<tr>
  					<th>{{$user->getEmail()}}</th>
  					<th>{{$user->getFirstname()}}</th>
  					<th>{{$user->getLastname()}}</th> 		
  					<th>{{$user->getCompany()}}</th>
  					<th>{{$user->getPhonenumber()}}</th>				
  					<th>{{$user->getWebsite()}}</th>
  					<th>{{$user->getBirthdate()}}</th>
  					<th>{{$user->getGender()}}</th>
  					<th>{{$user->getBio()}}</th>
  					<th><a class="btn btn-primary bold" href="{{ route('profileEdit', $user->getId()) }}">Edit Profile</a></th>					
  				</tr>
  			</table>
  		@endforeach
  		</div>
  	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
    $(function() {
        $('.confirm').click(function() {
            return window.confirm("Are you sure?");
        });
    });
    </script>
@endsection