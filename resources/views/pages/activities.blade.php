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
                                            <form class="form-horizontal style-form" id="create_activity">
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Activity Title</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="title" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Activity Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea type="text" class="form-control" id="description" name="description" rows="10"></textarea>
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
                                                    @if(count($activities) > 0)
                                                    @foreach($activities as $activity)
                                                    <tr>
                                                        <td class="hidden-phone">{{$activity->activity_title}}</td>
                                                        <td><a href="" data-toggle="modal" data-target="#{{$activity->id}}"><i class="fas fa-eye"></i></a></td>
                                                        <td><span class="label
                                                            @if($activity->activity_status == 'pending')
                                                                label-warning @else label-success @endif
                                                                label-mini">{{$activity->activity_status}}</span></td>
                                                        <td>
                                                            <a href="" data-toggle="modal" data-target="#{{$activity->id}}{{Auth::user()->id}}"><i class="fa fa-edit"></i></a>
                                                            <a href="" data-toggle="modal" data-target="#{{Auth::user()->id}}{{$activity->id}}"><i class="fa fa-trash text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                    <!-- beginning of modal for activity description-->
                                                    <div class="modal fade" id="{{$activity->id}}">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <strong>Description</strong><p>{{$activity->activity_description}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- beginning of modal to change activity status-->
                                                    <div class="modal fade" id="{{$activity->id}}{{Auth::user()->id}}">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <h4>{{$activity->activity_title}}</h4>
                                                                    @if($activity->activity_status == 'pending')
                                                                    <button onclick="complete({{$activity->id}})" class="btn btn-success">complete</button>
                                                                    @else
                                                                    <p>Are you sure ou want to revert the status of this activity?</p>
                                                                    <button onclick="pending({{$activity->id}})"  class="btn btn-danger">revert</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- beginning of modal to delete activity-->
                                                    <div class="modal fade" id="{{Auth::user()->id}}{{$activity->id}}">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this activity?</p>
                                                                    <button onclick="delete_activtiy({{$activity->id}})" class="btn btn-danger">Delete</button>
                                                                    <button class="btn btn-mute" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                    @endif

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
