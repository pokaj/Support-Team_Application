@extends('layouts.main')

@section('profile')

    <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->

    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->

    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row mt">
                <div class="col-lg-8">
                    <div class="row content-panel">
                    {{--                Success Message--}}
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                        <!-- /col-md-4 -->
{{-- 
                          <div class="col-md-4 centered">
                                <form method="post" enctype="multipart/form-data" action={{ route('change_avatar') }}>
                                    {{csrf_field()}}
                                    <div class="row">
                                        @if(Auth::user()->avatar != null)
                                            <div class="col-xs-6">
                                                <img src="/img/{{Auth::user()->avatar}}" height="50" class="img-fluid d-block rounded-circle">
                                            </div>
                                        @endif
                                        <div>
                                            @if(Auth::user()->avatar == null)
                                               <img src="img/no_image.png" height="90"/>
                                            @endif
                                            <p class="text-center text-muted">  Image Format: jpeg| jpg|  png</p>
                                        </div>
                                        <div class="col-xs-6 mt-3">
                                            <input class="form-control search-input" type="file" name="picture" required>
                                        </div>
                                        <div class="col-xs-6 mt-3">
                                            <button class="btn btn-primary float-right">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}

                        <div class="col-md-4 centered">
                            <div class="profile-pic">
                                @if(Auth::user()->avatar == null)
                                    <img src="img/no_image.png" class="rounded-circle mr-3">
                                @else
                                <img src="img/{{Auth::user()->avatar}}" alt="avatar" class="rounded-circle">
                                @endif                                
                        
                        
                            </div>

                            <form method="post" enctype="multipart/form-data" action={{ route('change_avatar') }}>
                            {{csrf_field()}}
                                <input type="file" name="picture" class="form-control" required>
                                <p class="mt-3 ml-5 text-center text-muted">  Image Format: jpeg| jpg|  png</p>
                                <button class="btn btn-primary pull-right">Update Avatar</button>
                            </form>

                        </div> 
                        

                        <!-- /col-md-4 -->
                        <div class="col-md-4 profile-text">
                            <h3><i class="fa fa-user"></i> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
                            @if(Auth::user()->position != null)
                            <h5><i class="fa fa-id-badge"></i> {{Auth::user()->position}}</h5>
                            @endif
                            @if(Auth::user()->bio != null)
                            <p>{{Auth::user()->bio}}</p>
                            @endif
                                <br>
                        </div>
                        <!-- /col-md-4 -->
                        <div class="col-md-4 profile-text">
                            <h3><i class="fa fa-phone"></i> 0{{Auth::user()->number}}</h3>
                            <p><i class="fa fa-envelope"></i> {{Auth::user()->email}}</p>
                            <br>
                        </div>
                        <!-- /col-md-4 -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /col-lg-12 -->
                <div class="col-lg-12 mt">
                    <div class="row content-panel">
                     <!-- /panel-heading -->
                        <div class="panel-body">
                            <div class="tab-content">
                               <!-- /tab-pane -->
                                <div>
                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2 detailed">
                                            <h4 class="mb">Edit Personal Information</h4>
                                            <form class="form-horizontal" id="edit_information">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">FIrst Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Enter First Name" id="fname" name="fname" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Last Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Enter Last Name" id="lname" name="lname" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Username</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Enter Last Name"  id="username"  name="username" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">E-mail</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Enter your E-mail" id="email"  name="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Position</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="What is your current position in the company?" id="position" name="position" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Number</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" placeholder="Enter your number" id="number"  name="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Bio</label>
                                                    <div class="col-lg-10">
                                                        <textarea rows="8" class="form-control" id="bio" name="bio" placeholder="Provide a short bio"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-6">
                                                        <button class="btn btn-theme pull-right">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /col-lg-8 -->
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /tab-pane -->

                                <!-- /tab-pane -->
                            </div>
                            <!-- /tab-content -->
                        </div>
                        <!-- /panel-body -->
                    </div>
                    <!-- /col-lg-12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </section>
        <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->

    <!--footer end-->
</section>
@endsection
