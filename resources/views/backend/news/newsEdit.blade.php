@extends('header')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-------------------------- Welcome Section --------------------->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome to News Edit Page</h3>
                        <h6 class="font-weight-normal mb-0">All News are Here. <span class="text-primary">3 unread alerts!</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (07 November 2023)
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
                    <div class="card-body">
                      <h4 class="card-title">News Edit Here</h4>
                      <form class="form-sample" action="{{url('/update/news/'.$news->news_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-6">
                            <label class="col-form-label">Title English :</label>
                            <input type="text" class="form-control" name="news_title_en" value="{{$news->news_title_en}}" />
                          </div>
                          <div class="col-md-6">
                            <label class="col-form-label">Title Bangla :</label>
                            <input type="text" class="form-control" name="news_title_bn" value="{{$news->news_title_bn}}" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="col-form-label">Category :</label>
                            <select name="cat_id" class="form-control" >
                              <option selected="" disabled="">Choose Category</option>
                                @foreach ($category as $row)
                                  <option value="{{$row->cat_id}}"
                                    <?php if($row->cat_id == $news->cat_id){ echo 'selected';} ?>>
                                    {{$row->cat_name_bn}}
                                  </option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label class="col-form-label">Sub-Category :</label>
                            <select name="subcat_id" class="form-control" id="subcat_id">
                              <option selected="" disabled="">
                                @foreach ($subCat as $row)
                                  <option value="{{$row->subcat_id}}"
                                    <?php if($row->subcat_id == $news->subcat_id){ echo 'selected';} ?>>
                                    {{$row->subcat_name_bn}}
                                  </option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <label class="col-form-label">File upload :</label>
                                <div class="input-group">
                                    <input type="file" id="" name="img" class="form-control file-upload-default" placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Choose File</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Old Image :</label>
                                <br>
                                <img src="{{URL::to('img/'.$news->img)}}" alt="photo" style="height: 80px; width: 100px;">
                                <input type="hidden" id="" name="oldimg" class="form-control file-upload-default" value="{{$news->img}}" />
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="col-form-label">Tags English :</label>
                            <input type="text" class="form-control" name="news_tags_en" value="{{$news->news_tags_en}}" />
                          </div>
                          <div class="col-md-6">
                            <label class="col-form-label">Tags Bangla :</label>
                            <input type="text" class="form-control" name="news_tags_bn" value="{{$news->news_tags_bn}}" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <label class="col-form-label">News Details English :</label>
                            <textarea class="textarea" placeholder="Place some text here" name="news_details_en"
                            style="width: 100px; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$news->news_details_en}}</textarea>
                          </div>
                          <div class="col-md-12">
                            <label class="col-form-label">News Details Bangla :</label>
                            <textarea class="textarea" placeholder="Place some text here" name="news_details_bn"
                            style="width: 100px; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$news->news_details_bn}}</textarea>
                          </div>
                        </div>
                        <hr>
                        <h4 class="text-center">Extra Option</h4>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label" for="bnews">
                                <input type="checkbox" class="form-check-input" name="breaking_news" id="bnews" value="1"
                                    <?php
                                        if ($news->breaking_news==1){ echo "checked"; }
                                    ?>>
                                Breaking News
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label" for="fsection">
                                <input type="checkbox" class="form-check-input" name="first_section" id="fsection" value="1"
                                    <?php
                                        if ($news->first_section==1){ echo "checked"; }
                                    ?>>
                                First Section
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label" for="fsectiont">
                                <input type="checkbox" class="form-check-input" name="first_section_thumbnail" id="fsectiont" value="1" 
                                    <?php
                                        if ($news->first_section_thumbnail==1){ echo "checked"; }
                                    ?>>
                                First Section Thumbnail
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label" for="bthumb">
                                <input type="checkbox" class="form-check-input" name="big_thumbnail" id="bthumb" value="1" 
                                    <?php
                                        if ($news->big_thumbnail==1){ echo "checked"; }
                                    ?>>
                                Big Thumbnail 
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label" for="ssectiont">
                                <input type="checkbox" class="form-check-input" name="second_section_thumbnail" id="ssectiont" value="1" 
                                    <?php
                                        if ($news->second_section_thumbnail==1){ echo "checked"; }
                                    ?>>
                                Second Section Thumbnail
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label" for="status">
                                <input type="checkbox" class="form-check-input" name="status" id="status" value="1" 
                                    <?php
                                        if ($news->status==1){ echo "checked"; }
                                    ?>>
                                Status 
                              </label>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <br>
                        <div class="row justify-content-center">
                          <button type="submit" class="btn btn-primary mr-2">Update</button>
                          <button class="btn btn-danger">Cancel</button>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
<!----------------- content-wrapper ends ----------------------------------------->
        </div>
    @include('footer')
    <script type="text/javascript">
      $(document).ready(function(){
        $('select[name="cat_id"]').on('change', function(){
          var cat_id=$(this).val();
            $.ajax({
              url:"{{url('get/subcat/')}}/"+cat_id,
              Method:"GET",
              dataType:"json",
              success:function(data){
                $("#subcat_id").empty();
                  $.each(data,function(key,value){
                    $("#subcat_id").append('<option value="'+value.subcat_id+'">'+value.subcat_name_en+'</option>');
              });
            },
          });
        });
      });
    </script>
  
@endsection
