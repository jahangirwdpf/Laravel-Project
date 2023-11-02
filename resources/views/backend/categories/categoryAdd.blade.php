@extends('header')
@section('content')      
<!-------------------------- Welcome Section --------------------->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome to Categories Page</h3>
                        <h6 class="font-weight-normal mb-0">All Categories are Here. <span class="text-primary">3 unread alerts!</span></h6>
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
        <div class="row">
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
                    Add New
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="forms-sample" action="{{url('addcat')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="category">Category Name English</label>
                                    <input type="text" class="form-control" id="category" placeholder="category" name="n_cat_name" required="">
                                    
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <h4 class="card-title">Categories Details</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Categories Name English
                          </th>
                          <th>
                            Categories Name Bangla
                          </th>
                          <th class="text-center" colspan= "2">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="table-warning">
                          <td>1</td>
                          <td>International</td>
                          <td>International</td>
                          <td>
                            <button type="button" class="btn btn-primary" style="float: right;"><i class="ti ti-pencil"></i>
                            </button>  
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger"><i class="ti ti-trash"></i>
                            </button>  
                          </td>
                        </tr>
                        <tr class="table-danger">
                          <td>2</td>
                          <td>National</td>
                          <td>National</td>
                          <td>
                            <button type="button" class="btn btn-primary" style="float: right;"><i class="ti ti-pencil"></i>
                            </button>  
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger"><i class="ti ti-trash"></i>
                            </button>  
                          </td>
                        </tr>
                        <tr class="table-success">
                          <td>3</td>
                          <td>Intertainment</td>
                          <td>Intertainment</td>
                          <td>
                            <button type="button" class="btn btn-primary" style="float: right;"><i class="ti ti-pencil"></i>
                            </button>  
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger"><i class="ti ti-trash"></i>
                            </button>  
                          </td>
                        </tr>
                        <tr class="table-primary">
                          <td>4</td>
                          <td>Education</td>
                          <td>Education</td>
                          <td>
                            <button type="button" class="btn btn-primary" style="float: right;"><i class="ti ti-pencil"></i>
                            </button>  
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger"><i class="ti ti-trash"></i>
                            </button>  
                          </td>
                        </tr>
                        <tr class="table-warning">
                          <td>5</td>
                          <td>Sports</td>
                          <td>Sports</td>
                          <td>
                            <button type="button" class="btn btn-primary" style="float: right;"><i class="ti ti-pencil"></i>
                            </button>  
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger"><i class="ti ti-trash"></i>
                            </button>  
                          </td>
                        </tr>
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