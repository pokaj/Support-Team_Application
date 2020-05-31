@extends('layouts.main')

@section('content')
<section class="wrapper">
            <div class="row">
                <div class="col-lg-9 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="border-head">
                        <h3>DASHBOARD</h3>
                    </div>


                    <!-- /row -->
                    <div class="row">
                        <!-- WEATHER PANEL -->
                        <div class="col-md-4 mb">
                            <div class="weather pn">
                                <i class="fa fa-cloud fa-4x"></i>
                                <h2>11º C</h2>
                                <h4>BUDAPEST</h4>
                            </div>
                        </div>
                        <!-- /col-md-4-->
                        <!-- DIRECT MESSAGE PANEL -->
                        <div class="col-md-8 mb">
                            <div class="message-p pn">
                                <div class="message-header">
                                    <h5>DIRECT MESSAGE</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 centered hidden-sm hidden-xs">
                                        <img src="img/ui-danro.jpg" class="img-circle" width="65">
                                    </div>
                                    <div class="col-md-9">
                                        <p>
                                            <name>Dan Rogers</name>
                                            sent you a message.
                                        </p>
                                        <p class="small">3 hours ago</p>
                                        <p class="message">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                        <form class="form-inline" role="form">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputText" placeholder="Reply Dan">
                                            </div>
                                            <button type="submit" class="btn btn-default">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Message Panel-->
                        </div>
                        <!-- /col-md-8  -->
                    </div>
                    <div class="row">

                        <!-- /col-md-4 -->
                        <div class="col-md-4 mb">
                            <!-- WHITE PANEL - TOP USER -->
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <h5>TOP USER</h5>
                                </div>
                                <p><img src="img/ui-zac.jpg" class="img-circle" width="50"></p>
                                <p><b>Zac Snider</b></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="small mt">MEMBER SINCE</p>
                                        <p>2012</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="small mt">TOTAL SPEND</p>
                                        <p>$ 47,60</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /col-md-4 -->
                    </div>
                    <!-- /row -->

                    <!-- /row -->
                </div>
                <!-- /col-lg-9 END SECTION MIDDLE -->

            </div>
            <!-- /row -->
        </section>
        @endsection
