@extends('header')
@section('content')
@php
    $newses = DB::table('news')->get();
@endphp      
<!-------------------------- Welcome Section --------------------->
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome to NewsBox</h3>
                    <h6 class="font-weight-normal mb-0">All Latest News are Here. <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today- 23 Nov 2023
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-------------------------- End Welcome Section --------------------->
<!-------------------------- Please Change Me here --------------------->

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
        <div class="card-people mt-auto">
            <img src="{{asset('contents/backend')}}/images/dashboard/people.svg" alt="people">
            <div class="weather-info">
            <div class="d-flex">
                <div>
                <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                </div>
                <div class="ml-2">
                <h4 class="location font-weight-normal">Dhaka</h4>
                <h6 class="font-weight-normal">Bangladesh</h6>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
        <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
            <div class="card-body">
                <p class="mb-4">Today’s International News</p>
                <p class="fs-30 mb-2">4006</p>
                <p>10.00% (30 days)</p>
            </div>
            </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
            <div class="card-body">
                <p class="mb-4">Today’s National News</p>
                <p class="fs-30 mb-2">61344</p>
                <p>22.00% (30 days)</p>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
            <div class="card-body">
                <p class="mb-4">Today’s Sports News</p>
                <p class="fs-30 mb-2">34040</p>
                <p>2.00% (30 days)</p>
            </div>
            </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
            <div class="card-body">
                <p class="mb-4">Today’s Political News</p>
                <p class="fs-30 mb-2">47033</p>
                <p>0.22% (30 days)</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <p class="card-title mb-0">Pending News</p>
            <div class="table-responsive">
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>News Title</th>
                      <th>News Image</th>
                      <th>Status</th>
                      <th class="text-center" colspan= "2">Action</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach($newses as $row)
                    <tr>
                        <td>{{$row->news_id}}</td>
                        <td class="font-weight-bold">{{$row->news_title_bn}}</td>
                        <td><img src="{{asset('img/'.$row->img)}}" alt=""></td>
                        <td class="font-weight-medium">
                            <div class="dropdown">
                                <button class="btn btn-danger btn-sm" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                        if ($row->status==1){ echo "Active"; }else{ echo "Pending";}
                                    ?>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
            <p class="card-title">News Report</p>
            <a href="#" class="text-info">View all</a>
            </div>
            <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
            <canvas id="sales-chart"></canvas>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
        <div class="card-body">
            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                    <div class="ml-xl-4 mt-3">
                    <p class="card-title">Detailed News</p>
                        <h1 class="text-primary">15</h1>
                        <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                        <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                    </div>  
                    </div>
                    <div class="col-md-12 col-xl-9">
                    <div class="row">
                        <div class="col-md-6 border-right">
                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                            <table class="table table-borderless report-table">
                            <tr>
                                <td class="text-muted">Illinois</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">713</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Washington</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">583</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Mississippi</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">924</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">California</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">664</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Maryland</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">560</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Alaska</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">793</h5></td>
                            </tr>
                            </table>
                        </div>
                        </div>
                        <div class="col-md-6 mt-3">
                        <canvas id="north-america-chart"></canvas>
                        <div id="north-america-legend"></div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                    <div class="ml-xl-4 mt-3">
                    <p class="card-title">Detailed News</p>
                        <h1 class="text-primary">34040</h1>
                        <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                        <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                    </div>  
                    </div>
                    <div class="col-md-12 col-xl-9">
                    <div class="row">
                        <div class="col-md-6 border-right">
                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                            <table class="table table-borderless report-table">
                            <tr>
                                <td class="text-muted">Illinois</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">713</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Washington</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">583</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Mississippi</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">924</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">California</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">664</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Maryland</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">560</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Alaska</td>
                                <td class="w-100 px-0">
                                <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">793</h5></td>
                            </tr>
                            </table>
                        </div>
                        </div>
                        <div class="col-md-6 mt-3">
                        <canvas id="south-america-chart"></canvas>
                        <div id="south-america-legend"></div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
        </div>
    </div>
</div>

<!----------------- content-wrapper ends ----------------------------------------->
    @include('footer')
<!-- partial -->    
@endsection