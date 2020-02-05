<?php
use App\Models\UserModel;
?>
@extends('layouts.app')
@section('title', 'ProfileEdit') 
@section('content')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<body>
	<div class="container emp-profile">
			<!-- Stores user entered information for controller to use using POST method -->
		<form method="post" action="{{route('refurbishUser')}}">
			<input type="hidden" name="_token" value="<?php echo csrf_token()?>" />
			<div class="row">
<!-- 				<div class="col-md-2"> -->
					<!-- For Later Use of profile photo
<!-- 				  <div class="col-md-2"> -->
<!--                         <div class="profile-head">   -->
                           <!-- In case we want to put somthing in the profile header -->                                                                   
<!--                         </div> -->
<!--                     </div> -->
					<div class="col-sm-3"></div>
				    <div class="col-sm-3"></div>
                    <div class="col-sm-4" style="margin-left: 80px">                
                         <input type="submit" value="Save Changes" class="btn btn-primary bold">	     
                          <a class="btn btn-primary bold" href="{{ route('profile', $model->getId()) }}">Cancel Changes</a>                                                      
				 </div>
			</div>
			<div class="row" style="margin-top: 30px;">
				<div class="col-md-6">
					<div class="tab-content profile-tab" id="myTabContent">
						<div class="tab-pane fade show active center" id="home"
							role="tabpanel" aria-labelledby="home-tab">
							<div class="row">
								<div class="col-md-3 " style="color: Black">
									<label hidden>Id</label>
								</div>
								<div class="col-md-5 ">
									<div class="input-group form-group" style="width:300px">
										<input type="text" class="form-control bold"
											value="{{$model->getId()}}" name="id" hidden>
									</div>
								</div>
							</div>
							<!-- Rows to allow user to edit any information -->
							<div class="row">
								<div class="col-md-3 " style="color: Black">
									<label>Email</label>
								</div>
								<div class="col-md-5 ">
									<div class="input-group form-group" style="width:300px">
										<input type="text" class="form-control bold"
											value="{{$model->getEmail()}}" name="email">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3" style="color: Black">
									<label>First Name</label>
								</div>
								<div class="col-md-5">
								<div class="input-group form-group" style="width:300px">
									<input type="text" class="form-control bold"
										value="{{$model->getFirstName()}}" name="firstname">
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3" style="color: Black">
									<label>Last Name</label>
								</div>
								<div class="col-md-5">
								<div class="input-group form-group" style="width:300px">
									<input type="text" class="form-control bold"
										value="{{$model->getLastName()}}" name="lastname">
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3" style="color: Black">
									<label>Phone</label>
								</div>
								@if($model->getPhonenumber() != null)
								<div class="col-md-5">
								<div class="input-group form-group" style="width:300px">
									<input type="text" class="form-control bold"
										value="{{$model->getPhonenumber()}}" name="phonenumber">
								</div>
								</div>
								@else
								<div class="col-md-5">
								<div class="input-group form-group" style="width:300px">
									<input type="text" class="form-control bold"
										Placeholder="Insert A PhoneNumber" name="phonenumber">

								</div>
								</div>
								@endif
							</div>
							<div class="row">
								<div class="col-md-3" style="color: Black">
									<label>Company</label>
								</div>
								@if($model->getCompany() != null)
								<div class="col-md-5">
								<div class="input-group form-group" style="width:300px">
									<input type="text" class="form-control bold"
										value="{{$model->getCompany()}}" name="company">
								</div>
								</div>
								@else
								<div class="col-md-5">
								<div class="input-group form-group" style="width:300px">
									<input type="text" class="form-control bold"
										Placeholder="Insert A Company" name="company">
								</div>
								</div>
								@endif
							</div>
							<div class="row">
								<div class="col-md-3" style="color: Black">
									<label>Website</label>
								</div>
								@if($model->getWebsite() != null)
								<div class="col-md-5">
								<div class="input-group form-group" style="width:300px">
									<input type="text" class="form-control bold"
										value="{{$model->getWebsite()}}" name="website">
								</div>
								</div>
								@else
								<div class="col-md-5">
								<div class="input-group form-group" style="width:300px">
									<input type="text" class="form-control bold"
										Placeholder="Insert A Website" name="website">
								</div>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="tab-content profile-tab" id="myTabContent">
						<div class="tab-pane fade show active center" id="home"
							role="tabpanel" aria-labelledby="home-tab">
							<div class="row">
								<div class="col-md-3 " style="color: Black">
									<label>Birth Date</label>
								</div>
								@if($model->getBirthdate() != null)
								<div class="col-md-5 ">
								<div class="input-group form-group" style="width:300px">
										<input type="text" class="form-control bold"
										value="{{$model->getBirthdate()}}" name="birthdate">
								</div>
								</div>
								@else
								<div class="col-md-5 ">
								<div class="input-group form-group" style="width:300px">
									<input type="text" class="form-control bold"
										Placeholder="Insert a Birth Date" name="birthdate">
								</div>
								</div>
								@endif
							</div>
							<div class="row">
								<div class="col-md-3" style="color: Black">
									<label>Gender</label>
								</div>
								@if($model->getGender() == 0)
								<div class="col-md-3">
								<div class="input-group form-group" style="width:300px">
									<select name="gender" class="form-control bold">    
                                      <option class="bold" value=0 selected>Male</option>
                                      <option class="bold" value=1>Female</option>
                                    </select>
                   		     </div>
								</div>
								@else
								<div class="col-md-3">
								<div class="input-group form-group">
									<select name="gender" class="form-control bold">
                                      <option value="">Select...</option>
                                      <option class="bold" value=0>Male</option>
                                      <option class="bold" value=1 selected>Female</option>
                                    </select>
                     			   </div>
								</div>
								@endif
							</div>
							<div class="row">
								<div class="col-md-3" style="color: Black">
									<label>Bio</label>
								</div>
								@if($model->getBio() != null)
								<div class="col-md-6">
								<div class="input-group form-group" style="width:300px">
									<textarea cols="50" id="bio" class="bold" name="bio"  rows="5">{{$model->getBio()}}</textarea>
								</div>
								</div>
								@else
								<div class="col-md-6">
								<div class="input-group form-group" style="width:300px">
									<textarea cols="50" class="bold" name="bio" Placeholder="Insert a New Bio" rows="5"></textarea>
								</div>
								</div>
								@endif
							</div>
							<!-- If statement to check if user's role is 2 to more prieveleges  -->
							@if(Session::get('role') == 2)
							<div class="row">
								<div class="col-md-3" style="color: Black">
									<label>Role</label>
								</div>	
								<div class="col-md-3">
								<div class="input-group form-group" style="width:300px">
									<select name="role" class="form-control bold">  
									@if($model->getRole() == 0)
									<option class="bold" value="0" selected>Default</option> 
									<option class="bold" value=1>Moderator</option>
                                    <option class="bold" value=2>Administator</option>
									@elseif($model->getRole() == 1)
									 <option class="bold" value=0>Default</option>
								    <option class="bold" value=1 selected>Moderator</option> 
								    <option class="bold" value=2>Administator</option>
                                    @elseif($model->getRole() == 2)
                                    <option class="bold" value=0>Default</option>
								    <option class="bold" value=1>Moderator</option> 
                                    <option class="bold" value=2 selected>Administator</option>
                                    @endif
                                    </select>
                   		         </div>
								</div>
								@endif
							</div>
				</div>
			</div>
		</form>
	</div>
	</body>
</html>
@endsection
