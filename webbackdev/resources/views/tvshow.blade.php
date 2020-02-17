@extends('layout.main')

@section('style')

@endsection 
@section('title')
Favourite TV Show 
@endsection
@section('content')
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">                             
                  <div class="row align-items-center">
                      <div class="col-3">
                          <h5 class="card-title mb-0">Favourite TV shows List</h5>
                      </div>
                      <div class="col-3">
                      
                        
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addshow">
                        Favourite Tv Add Show
                        </button>


                      </div>
                      <div class="col-9">
                        
                      </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="table_data">
                    @include('tvshow_data')
                    </div>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                  
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
    </div>
    <!-- Modal -->
    <!-- add monthly model body--->
  <!-- The Modal -->
  <div class="modal" id="addshow">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Favourite Tv Show</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <section class="panel panel-default">
          <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
         </div>

          <form  method="post" id="formaddshow">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                  <input type="text" class="form-control" name="season" value="" placeholder="Enter Season Name" value="{{ old('season') }}" />
                  <span class="text-danger">{{ $errors->first('season') }}</span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="episode" value="" placeholder="Enter Episode" value="{{ old('episode') }}" />
                  <span class="text-danger">{{ $errors->first('episode') }}</span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="quote" value="" placeholder="Enter Quote" value="{{ old('quote') }}" />
                  <span class="text-danger">{{ $errors->first('quote') }}</span>
                </div>
                
              </div>
            
          </section>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-success" type="submit" id="addtvshow" name="addtvshow">Add</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- update tv show box  -->
  <!-- The Modal -->
  <div class="modal" id="updatetvshowDialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update tv show </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <section class="panel panel-default">
          <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
         </div>

            @csrf
            <input type="hidden" value="" name="tvshowid" />
            <div class="panel-body">
                <div class="form-group">
                  <input type="text" class="form-control" name="useason" value="" placeholder="Enter Season Name"  />
                 
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="uepisode" value="" placeholder="Enter Episode"  />
                  
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="uquote" value="" placeholder="Enter Quote"  />
                 
                </div>
                
              </div>
            
          </section>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button class="btn btn-success" type="button" id="updatetvshow" name="saveplan">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- delete model box -->
<!-- delte model box -->
<div class="modal" tabindex="-1" role="dialog" id="deletemodel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Favourite Tv Delete Show<span class="planname"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you Sure you want to delete </p>
        <input type="hidden" value="" id="showtvid">
      </div>
      <div class="modal-footer">
        <button type="button" id="tvshowdelete" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script>
$(document).ready(function() {
 // add new plan ajax
  $(document).on('submit', '#formaddshow', function(e) {
      e.preventDefault();
      $.ajax({
            type: 'post',
            url: '/formaddshow',
            data: {
                '_token': $('input[name=_token]').val(),
                season: $('input[name="season"]').val(),
                episode: $('input[name="episode"]').val(),
                quote: $('input[name="quote"]').val(),
            },
            success: function(data) {
              if($.isEmptyObject(data.error)){
                    $(".print-error-msg").css('display','none');
                    $("table tbody").prepend("<tr  class='show" + data.id + "'><td>" + data.id + "</td><td>" + data.season + "</td><td>" + data.episode + "</td><td>" + data.quote + "</td><td><img src="+data.image+"></td><td><a data-toggle='modal' data-target='#updatetvshowDialog' data-id="+ data.id +" data-season="+data.season+" data-episode="+data.episode+" data-quote="+data.quote+" class='open-updatetvshowDialog btn btn-primary '><span>Edit</span></td><td><span class=' btn btn-danger deleteplan' onclick='return confirm('Are you sure?')' data-del-id="+ data.id +">Delete</span></td></tr>");
                    $("#addshow").modal('hide'); 
                    $(".emptyshowdata").hide(); 
                    
                }else{

                      printErrorMsg(data.error);
                } 
            }
      });

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
     }
  });

  // update  show data
  $(document).on("click", ".open-updatetvshowDialog", function () {
      $('input[name="tvshowid"]').val($(this).data('id'));
      $('input[name="useason"]').val($(this).data('season'));
      $('input[name="uquote"]').val($(this).data('quote'));
      $('input[name="uepisode"]').val($(this).data('episode'));
  });

  // update  jquery ajax
  $('.modal-footer').on('click', '#updatetvshow', function() {
      $.ajax({
          type: 'post',
          url: '/tvshow-edit',
          data: {
              '_token': $('input[name=_token]').val(),
              id: $('input[name="tvshowid"]').val(),
              season: $('input[name="useason"]').val(),
              quote: $('input[name="uquote"]').val(),
              episode: $('input[name="uepisode"]').val(),
          },
          success: function(data) {
            $('.show' + data.id).replaceWith("<tr  class='show" + data.id + "'><td>" + data.id + "</td><td>" + data.season + "</td><td>" + data.episode + "</td><td>" + data.quote + "</td><td><img src="+data.image+"></td><td><a data-toggle='modal' data-target='#updatetvshowDialog' data-id="+ data.id +" data-season="+data.season+" data-episode="+data.episode+" data-quote="+data.quote+" class='open-updatetvshowDialog btn btn-primary'><span>Edit</span></td><td><span class=' btn btn-danger deleteplan' onclick='return confirm('Are you sure?')' data-del-id="+ data.id +">Delete</span></td></tr>");
            $("#updatetvshowDialog").modal('hide');  
          }
        });
    });

  // delete model box
  $(document).on('click', '#deletetvshow', function() { 
      $('#showtvid').val($(this).data('del-id'));
  });

  // Delete Show
  $('.modal-footer').on('click', '#tvshowdelete', function() {

      $.ajax({
          type: 'post',
          url: '/tvshow-delete',
          data: {
              '_token': $('input[name=_token]').val(),
              'id': $('#showtvid').val()
          },
          success: function(data) {
              $('.show' + $('#showtvid').val()).remove();
              $("#deletemodel").modal('hide'); 
          }
      });

  });

});
</script>
@endsection