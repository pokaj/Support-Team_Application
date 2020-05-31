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
                <div class="col-lg-6">
                    <div class="row content-panel">

                        <!-- /col-md-4 -->
                        <div class="col-md-4 profile-text">
                            <h3>Sam Soffes</h3>
                            <h6>Main Administrator</h6>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
                            <br>
                        </div>
                        <!-- /col-md-4 -->
                        <div class="col-md-4 centered">
                            <div class="profile-pic">
                                <p><img src="img/ui-sam.jpg" class="img-circle"></p>
                                <p>
                                </p>
                            </div>
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
                                            <h4 class="mb">Personal Information</h4>
                                            <form role="form" class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">FIrst Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Enter First Name" id="fname" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Last Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Enter Last Name" id="lname" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Position</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="What is your current position in the company?" id="position" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label"> Avatar</label>
                                                    <div class="col-lg-6">
                                                        <input type="file" id="exampleInputFile" class="file-pos">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Bio</label>
                                                    <div class="col-lg-10">
                                                        <textarea rows="10" cols="30" class="form-control" id="bio" placeholder="Provide a short bio"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-6">
                                                        <button id="update" class="btn btn-theme pull-right">Update</button>
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
