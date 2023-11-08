@extends('header')
@section('content')
<!-------------------------- Welcome Section --------------------->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome to Sub-Categories Page</h3>
                        <h6 class="font-weight-normal mb-0">All Sub-Categories are Here. <span class="text-primary">3 unread alerts!</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (02 November 2023)
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
        <div class="row justify-content-center">
            <div class="col-lg-8 stretch-card">
              <div class="card">
                <div class="card-body">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub-Category</h5>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{url('update.subCategory/'.$subCategory->subcat_id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="sub_category">Category Name English</label>
                            <input type="text" class="form-control" id="sub_category" value="{{$subCategory->cat_id}}" name="cat_id" required="">
                            <label for="category">Sub-Category Name English</label>
                            <input type="text" class="form-control" id="sub_category" value="{{$subCategory->subcat_name_en}}" name="subcat_name_en" required="">
                            <label for="category">Sub-Category Name Bangla</label>
                            <input type="text" class="form-control" id="sub_category" value="{{$subCategory->subcat_name_bn}}" name="subcat_name_bn" required="">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
<!----------------- content-wrapper ends ----------------------------------------->
    </div>
    @include('footer')
<!-- partial -->    
@endsection