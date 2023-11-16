@extends('header')
@section('content')      
<!-------------------------- Welcome Section --------------------->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome to News Page</h3>
                        <h6 class="font-weight-normal mb-0">All Latest News are Here. <span class="text-primary">3 unread alerts!</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (01 November 2023)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-------------------------- End Welcome Section --------------------->
<!-------------------------- Please Change Me here --------------------->
          <div class="row">
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All News</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Category Name</th>
                          <th>Sub-Cate. Name</th>
                          <th>News Title</th>
                          <th>News Image</th>
                          <th>News Tags</th>
                          <th class="text-center" colspan= "2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($newses as $row)
                        <tr>
                          <td>{{$row->news_id}}</td>
                          <td>{{$row->cat_name_en}} || {{$row->cat_name_bn}}</td>
                          <td>{{$row->subcat_name_bn}}</td>
                          <td>{{$row->news_title_bn}}</td>
                          <td><img src="{{asset('img/'.$row->img)}}" alt=""></td>
                          <td>{{$row->news_tags_bn}}</td>
                          <td>
                            <button type="button" class="btn btn-primary" style="float: right;"><a href="{{url('edit.news/'.$row->news_id)}}"><i class="ti ti-pencil text-light"></i></a>
                            </button>  
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger"><a href="{{url('delete/news/'.$row->news_id)}}"><i class="ti ti-trash text-light"></i></a>
                            </button>  
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!----------------- content-wrapper ends ----------------------------------------->
        </div>
    @include('footer')
<!-- partial -->    
@endsection