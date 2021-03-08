@extends('layouts.admin-app')

@section('admin-content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">DashBord</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Welcome to DashLite Dashboard Template.</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>Last 30 Days</span></a></li>
                                                            <li><a href="#"><span>Last 6 Months</span></a></li>
                                                            <li><a href="#"><span>Last 1 Years</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-xxl-8">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title"><span class="mr-2">Users</span> <a href="#" class="link d-none d-sm-inline">See History</a></h6>
                                            </div>
                                            <div class="card-tools">
                                                <ul class="card-tools-nav">
                                                    <li class="card-tools-nav-item" data-type="user"><a href="#"><span>User</span></a></li>
                                                    <li class="card-tools-nav-item" data-type="admin"><a href="?admin"><span>Admin</span></a></li>
                                                    <li class="card-tools-nav-item active" data-type="all"><a href="#"><span>All</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner p-0 border-top">
                                        <div class="nk-tb-list nk-tb-orders">
                                            <div class="nk-tb-item nk-tb-head">
                                                <div class="nk-tb-col"><span>No.</span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                                <div class="nk-tb-col tb-col-lg"><span>Email</span></div>
{{--                                                <div class="nk-tb-col"><span>Amount</span></div>--}}
                                                <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                                <div class="nk-tb-col"><span class="d-none d-sm-inline">Role</span></div>
                                                <div class="nk-tb-col"><span>&nbsp;</span></div>
                                            </div>

                                            @foreach($users as $user)
                                                <div class="nk-tb-item" >
                                                    <div class="nk-tb-col">
                                                        <span class="tb-lead"><a href="#">#{{ $user->id }}</a></span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-sm">
                                                        <div class="user-card">
                                                            <div class="user-avatar user-avatar-sm bg-purple">

                                                                <span>{{substr( $user->fname, 0, 1) }}{{substr( $user->lname, 0, 1) }}</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <span class="tb-lead">{{ $user->fname }} {{ $user->lname }} </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-md">
                                                        <span class="tb-sub">{{ $user->created_at }}</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-lg">
                                                        <span class="tb-sub text-primary">{{ $user->email }}</span>
                                                    </div>

                                                    <div class="nk-tb-col">
                                                        <span class="badge badge-dot badge-dot-xs @if($user->status == 'active') badge-success @endif">{{ $user->status }}</span>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <span class="badge badge-dot badge-dot-xs @if($user->status == 'active') badge-success @endif">{{ $user->role }}</span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-action">
{{--                                                        <div class="dropdown">--}}
{{--                                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>--}}
{{--                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">--}}
{{--                                                                <ul class="link-list-plain">--}}
{{--                                                                    <li><a href="#">View</a></li>--}}
{{--                                                                    <li><a href="#">Invoice</a></li>--}}
{{--                                                                    <li><a href="#">Print</a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-inner-sm border-top text-center d-sm-none">
                                        <a href="#" class="btn btn-link btn-block">See History</a>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-md-6 col-xxl-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner border-bottom">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Recent Activities</h6>
                                            </div>
                                            <div class="card-tools">
                                                <ul class="card-tools-nav">
                                                    <li><a href="#"><span>Cancel</span></a></li>
                                                    <li class="active"><a href="#"><span>All</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nk-activity">
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-success"><img src="./images/avatar/c-sm.jpg" alt=""></div>
                                            <div class="nk-activity-data">
                                                <div class="label">Keith Jensen requested to Widthdrawl.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-warning">HS</div>
                                            <div class="nk-activity-data">
                                                <div class="label">Harry Simpson placed a Order.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-azure">SM</div>
                                            <div class="nk-activity-data">
                                                <div class="label">Stephanie Marshall got a huge bonus.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-purple"><img src="./images/avatar/d-sm.jpg" alt=""></div>
                                            <div class="nk-activity-data">
                                                <div class="label">Nicholas Carr deposited funds.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-pink">TM</div>
                                            <div class="nk-activity-data">
                                                <div class="label">Timothy Moreno placed a Order.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-md-6 col-xxl-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">New Users</h6>
                                                </div>
                                                <div class="card-tools">
                                                    <a href="html/user-list-regular.html" class="link">View All</a>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($newUsers as $newUser)
                                            <div class="card-inner card-inner-md">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary-dim">
                                                    <span>{{substr( $newUser->fname, 0, 1) }}{{substr( $newUser->lname, 0, 1) }}</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ $newUser->fname }}</span>
                                                    <span class="sub-text">{{  $newUser->email }}</span>
                                                </div>
{{--                                                <div class="user-action">--}}
{{--                                                    <div class="drodown">--}}
{{--                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>--}}
{{--                                                        <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                            <ul class="link-list-opt no-bdr">--}}
{{--                                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>--}}
{{--                                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-lg-6 col-xxl-4">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner border-bottom">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Comments</h6>
                                            </div>
                                            <div class="card-tools">
                                                <a href="#" class="link">All Tickets</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nk-support">
                                        <li class="nk-support-item">
                                            <div class="user-avatar">
                                                <img src="./images/avatar/a-sm.jpg" alt="">
                                            </div>
                                            <div class="nk-support-content">
                                                <div class="title">
                                                    <span>Vincent Lopez</span><span class="badge badge-dot badge-dot-xs badge-warning ml-1">Pending</span>
                                                </div>
                                                <p>Thanks for contact us with your issues...</p>
                                                <span class="time">6 min ago</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-lg-6 col-xxl-4">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner border-bottom">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Today</h6>
                                            </div>
                                            <div class="card-tools">
                                                <a href="#" class="link">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <div class="timeline">
                                            <h6 class="timeline-head">November, 2019</h6>
                                            <ul class="timeline-list">
                                                <li class="timeline-item">
                                                    <div class="timeline-status bg-primary is-outline"></div>
                                                    <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                                                    <div class="timeline-data">
                                                        <h6 class="timeline-title">Submited KYC Application</h6>
                                                        <div class="timeline-des">
                                                            <p>Re-submitted KYC Application form.</p>
                                                            <span class="time">09:30am</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-status bg-primary"></div>
                                                    <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                                                    <div class="timeline-data">
                                                        <h6 class="timeline-title">Submited KYC Application</h6>
                                                        <div class="timeline-des">
                                                            <p>Re-submitted KYC Application form.</p>
                                                            <span class="time">09:30am</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-status bg-pink"></div>
                                                    <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                                                    <div class="timeline-data">
                                                        <h6 class="timeline-title">Submited KYC Application</h6>
                                                        <div class="timeline-des">
                                                            <p>Re-submitted KYC Application form.</p>
                                                            <span class="time">09:30am</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

@endsection
