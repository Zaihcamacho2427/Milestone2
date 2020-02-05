<?php
use App\Models\UserModel;
?>
@extends('layouts.app')
@section('title', 'Profile') 
@section('content')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <body>
       <div class="container emp-profile">
       
                <div class="row">
                    <div class="col-md-4">
                    <!-- In case we want to add profile photos -->
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">  
                           <!-- In case we want to put somthing in the profile header -->                                                                   
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary bold" href="{{ route('profileEdit', $model->getId()) }}">Edit Profile</a>
                    </div>
                </div>
                <div class="row">                  
                    <div class="col-md-6">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active center" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- Table to display all user's fields -->
                                          <div class="row">
                                            <div class="col-md-3 " style="color:Black">
                                                <label hidden>ID</label>
                                            </div>
                                            <div class="col-md-5 ">
                                                <p hidden>{{$model->getId()}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 " style="color:Black">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-5 ">
                                                <p>{{$model->getEmail()}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3" style="color:Black">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-5">
                                                <p>{{$model->getFirstName()}} {{$model->getLastName()}}</p>
                                            </div>
                                        </div>                                   
                                        <div class="row">
                                            <div class="col-md-3" style="color:Black">
                                                <label>Phone</label>
                                            </div>
                                            @if($model->getPhonenumber() != null)
                                            <div class="col-md-5">
                                                <p>{{$model->getPhonenumber()}}</p>
                                            </div>
                                            @else
                                             <div class="col-md-5">
                                                <p>No Phone Number yet!</p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3" style="color:Black">
                                                <label>Company</label>
                                            </div>
                                           @if($model->getCompany() != null)
                                            <div class="col-md-5">
                                                <p>{{$model->getCompany()}}</p>
                                            </div>
                                            @else
                                            <div class="col-md-5">
                                                <p>No Company Yet!</p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3" style="color:Black">
                                                <label>Website</label>
                                            </div>
                                           @if($model->getWebsite() != null)
                                            <div class="col-md-5">
                                                <p>{{$model->getWebsite()}}</p>
                                            </div>
                                            @else
                                            <div class="col-md-5">
                                                <p>No Website Yet!</p>
                                            </div>
                                            @endif
                                        </div>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-6">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active center" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-3 " style="color:Black">
                                                <label>Birth Date</label>
                                            </div>
                                            @if($model->getBirthdate() != null)
                                            <div class="col-md-5 ">
                                                <p>{{$model->getBirthdate()}}</p>
                                            </div>
                                            @else
                                             <div class="col-md-5 ">
                                                <p>No Birthdate Yet!</p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3" style="color:Black">
                                                <label>Gender</label>
                                            </div>
                                            @if($model->getGender() == 0)
                                            <div class="col-md-5">
                                                <p>Male</p>
                                            </div>
                                            @else
                                             <div class="col-md-5">
                                                <p>Female</p>
                                            </div>
                                            @endif
                                        </div>                                   
                                        <div class="row">
                                            <div class="col-md-3" style="color:Black">
                                                <label>Bio</label>
                                            </div>
                                           @if($model->getBio() != null)
                                            <div class="col-md-5">
                                                <p>{{$model->getBio()}}</p>
                                            </div>
                                            @else
                                              <div class="col-md-5">
                                                <p>No Bio Yet!</p>
                                            </div>
                                            @endif
                                    </div>                                      
                            </div>
                        </div>
                    </div>
                </div>         
        </div>     
    </body>
</html>
@endsection