@extends('layouts.app') 	
@section('title', 'Home') 

@section('content')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<div class="flex-center position-ref full-height">
	<div class="content" style="padding-bottom: 300px">
		<div class="title m-b-md"></div>
		<!-- Home Page to display user who's logged in -->
		<h2 style="font-weight: 700">Welcome {{$model->getFirstName()}} {{$model->getLastName()}}</h2><br>
		<h2 style="font-weight: 700">Style your Profile!</h2>
		
	</div>
</div>
</html>
@endsection
