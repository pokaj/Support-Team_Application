@extends('layouts.main')

@section('activities')

<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->

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
                <h1>Manage Activities</h1>
                <!-- /col-lg-12 -->
                <div class="col-lg-12 mt">
                    <div class="row content-panel">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a data-toggle="tab" href="#add_activity">Add Activity</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#update_status" class="contact-map">Update Event Status</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#activity_details">Activity Details</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#activity_report">Activity Report</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /panel-heading -->
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="add_activity" class="tab-pane active">
                                    <div class="row">

                                        <!-- /col-md-6 -->
                                        <div class="col-md-12 detailed">
                                            <form class="form-horizontal style-form" id="create_event">
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Activity Title</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Activity Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea type="text" class="form-control"  rows="10"></textarea>
                                                        <span class="help-block">Provide a short description of the activity.</span>
                                                    </div>
                                                </div>


                                                <button class="float-right btn btn-theme pull-right">Submit</button>
                                            </form>
                                            <!-- /row -->
                                        </div>
                                        <!-- /col-md-6 -->
                                    </div>
                                    <!-- /OVERVIEW -->
                                </div>
                                <!-- /tab-pane -->
                                <div id="update_status" class="tab-pane">
                                    <div class="row">
                                        <!-- /col-md-6 -->
                                        <div class="col-md-10 detailed">
                                            <div class="col-md-12 col-md-offset-2 mt">
                                                <table class="table table-striped table-advance table-hover">
                                                    <h4>Update Activity Status</h4>
                                                    <hr>
                                                    <thead>
                                                    <tr>
                                                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Activity Title</th>
                                                        <th><i class="fa fa-bookmark"></i> Description</th>
                                                        <th><i class=" fa fa-edit"></i> Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>

                                                        <td class="hidden-phone">This is the title</td>
                                                        <td><i class="fas fa-eye"></i></td>
                                                        <td><span class="label label-warning label-mini">Pending</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /col-md-6 -->
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /tab-pane -->
                                <div id="activity_details" class="tab-pane">
                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2 detailed mt">
                                            <h4 class="mb">Search Activity</h4>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Select Activity</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="activity_selected">
                                                            <option value="1">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="mt-3 btn btn-theme" type="submit">View Details</button>
                                                    </div>
                                                </div>
                                        </div>
                                        <!-- /col-lg-8 -->
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /tab-pane -->
                                <!-- /tab-pane -->
                                <div id="activity_report" class="tab-pane">
                                    <div class="row">
                                        <!-- INLINE FORM ELELEMNTS -->
                                            <div class="col-lg-12">
                                                <div class="form-panel">
                                                    <h4 class="mb">Query Activities</h4>
                                                    <form class="form-inline" role="form">
                                                        <div class="form-group">
                                                            <label class="sr-only" for="exampleInputEmail2">Beginning Date</label>
                                                            <input type="datetime-local" class="form-control" id="beg_date" placeholder="Beginning Date">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="sr-only" for="exampleInputPassword2">Ending Date</label>
                                                            <input type="datetime-local" class="form-control" id="end_date" placeholder="Ending Date">
                                                        </div>
                                                        <button type="submit" class="btn btn-theme">Search</button>
                                                    </form>
                                                </div>
                                                <!-- /form-panel -->
                                            </div>
                                            <!-- /col-lg-12 -->

                                        <!-- /col-lg-8 -->
                                    </div>
                                    <!-- /row -->
                                </div>
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
@endsection
