<div id="gallery" style="background: #fff;padding-top: 0px">
  <div class="col-md-12" style="margin-top: 0px;margin-bottom: 0px;">
        <div class="text-center" style="margin-top: 0px;margin-bottom: 0px;padding: 0px">
          <h3 style="font-size: 25px;letter-spacing: 0px; word-spacing: 0cm;   color: #062038;
      text-shadow: 2px 2px 2px #0b1925;">Digital Ethiopia</h3>
        </div>
      </div>
    <div class="s01" style="min-height: 0vh">
            <div class="form">
              <div class="inner-form">
              <div class="input-field first-wrap">
                <input id="search" type="text" placeholder="First search the name you want to report!" />
              </div>
                <div class="input-field third-wrap">
                  <button id="start_search" class="btn-search" type="button" onclick="findReport()">Search</button>
                </div>
              </div>
            </div>
            <div id="error" class="modal fade" role="dialog">
              <div class="modal-content" style="height: auto;max-height: none;">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Reports</h4>
                </div>
                <div id="error_alert" class="modal-body">
                  This field is required
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" data-dismiss="modal">CLOSE</button>
                </div>
              </div>
            </div>
          <script>
            var input = document.getElementById("search");
            input.addEventListener("keyup", function(event) {
              if (event.keyCode === 13) {
               event.preventDefault();
               document.getElementById("start_search").click();
              }
            });
            </script>
        </div>
        <div id="showReport" style="display: none;">
          <div id="result" style="display: flex;justify-content: center;">
            <div><h3>No search result...</h3></div>
          </div>
          <div style="display: flex;justify-content: center;">
            <div id="new" class="btn btn-info btn-lg"  data-toggle="modal"  style="padding: 10px 50px 10px 50px"><i class="fa fa-plus"></i>NewReport</div>
          </div>
        </div>

    <div class="container" style="width: 100%">
      <div class="col-md-12 wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
        <div class="text-center" style="margin-top: 0px;margin-bottom: 0px;">
          <h3 style="font-size: 25px;letter-spacing: 0px;word-spacing: 0cm;    color: #062038;
      text-shadow: 2px 2px 2px #0b1925;margin-top: 0px;margin-bottom: 0px;">Top 20 Reports</h3>
        </div>
      </div>
      <div class="row">

                      <div class="table-responsive col-md-12" id="datatable">
                          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead style="background-color:#0BA9F9 ">
                                  <tr>
                                      <th class="text-center">No</th>
                                      <th class="text-center">Name</th>
                                      <th class="text-center">number of report</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    if(!empty($topreports))
                                    {
                                      $i=1;
                                        foreach($topreports as $top)
                                        {
                                          
                                    ?>
                                    <tr>
                                      <td class="text-center"><?php echo $i ?></td>
                                      <td class="text-center">
                                        <a onclick="findTopReport('<?php echo $top->rname ?>')"><?php echo $top->rname ?></a></td>
                                      <td class="text-center"><?php echo $top->num ?></td>
                                    </tr>
                                    <?php
                                        $i++;
                                        if ($i==21) {
                                          break;
                                        }
                                        }
                                    }
                                    ?>
                              </tbody>
                          </table>
                      </div>
            </div>
    </div>
  </div>
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog-lg">

    <!-- Modal content-->
    <div class="modal-content" style="height: auto;max-height: none;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <div>
          <div class="panel-body row">
          <div class="col-md-2"></div>
          <div class="col-md-8" data-wow-offset="0" data-wow-delay="0.6s" style="display:;justify-content: center">
            <div class="img_upload" style="margin-bottom: 15px;">
                        <!-- image-preview-filename input [CUT FROM HERE]-->
                <div class="input-group image-preview">
                    <input id="img_src" type="text" class="form-control image-preview-filename" disabled="disabled" placeholder="Please upload image"> <!-- don't give a name === doesn't send on POST/GET -->
                    <span class="input-group-btn">
                        <!-- image-preview-clear button -->
                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                            <span class="glyphicon glyphicon-remove"></span> Clear
                        </button>
                        <!-- image-preview-input -->
                        <div class="btn btn-default image-preview-input" style="position: relative;overflow: hidden;margin: auto;    color: #333;background-color: #fff;border-color: #ccc;  ">
                            <span class="glyphicon glyphicon-folder-open"></span>
                            <span class="image-preview-input-title" style="margin-left:2px;">Browse</span>
                            <input type="file" id="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" style="position: absolute;top: 0;right: 0;margin: 0;padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha(opacity=0);" /> <!-- rename it -->
                        </div>
                        <button id="upload" type="button" class="btn btn-default image-preview-clear">
                            <span class="glyphicon glyphicon-upload"></span> Upload
                        </button>
                    </span>
                </div><!-- /input-group image-preview [TO HERE]--> 
            </div>
            <form action="" method="post" role="form" class="contactForm" id="editReportForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Url" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea id="comment" class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Comment here..."></textarea>
                <div class="validation"></div>
              </div>
            </form>
            <div id="fielderror" style="color: red;display: none;">
              You need to fill name field.
            </div>
          </div>
          </div>
        </div>

      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-theme pull-left" onclick="sendReport()" >SEND REPORT</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
      </div>
    </div>

  </div>
</div>
<div id="myModalResult" class="modal fade" role="dialog">
  <div class="modal-dialog-lg">

    <!-- Modal content-->
    <div class="modal-content" style="height: auto;max-height: none;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reports</h4>
      </div>
      <div id="searchresult" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-theme pull-left" data-dismiss="modal" onclick="AddnewReport()" >ADD REPORT</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
      </div>
    </div>

  </div>
</div>
<div id="success" class="modal fade" role="dialog">
  <div class="modal-dialog-lg">

    <!-- Modal content-->
    <div class="modal-content" style="height: auto;max-height: none;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reports</h4>
      </div>
      <div id="success_alert" class="modal-body">
        Your report is successfully submitted it will be available once our administrator approved it
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" data-dismiss="modal">CLOSE</button>
      </div>
    </div>

  </div>
</div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>

  <script type="text/javascript">
    $(document).ready(function (e) {
                $('#new').on('click', function(){
                  $("#myModal").modal();
                  document.getElementById('showReport').style.display='none';
                });
                $('#upload').on('click', function () {
                    // alert("sddsf");
                    var img_src = $('#img_src').val();
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    // alert(form_data);
                    $.ajax({
                        url: '<?php echo base_url() ?>Upload/upload_file', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#img_src').val(img_src);
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the server
                        }
                    });
                });
            });

   $(this).ready( function() {  
            $("#search").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "<?php echo base_url(); ?>pages/get_autocomplete",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        },  
                    });  
                },  
                     
            });  
        });  
   function findReport(){
    var name = document.getElementById('search').value;
    var indexName = {
        searchName : name
    }
    if (name!="") {
    $.ajax({  
             url: "<?php echo base_url(); ?>report_search/findReport/",  
             dataType: 'json',  
             type: 'POST',  
             data: indexName,  
             success:      
                 function(data){  
                    if (data == 0 ) {
                         document.getElementById('showReport').style.display='inline';

                    }else{
                      

                        document.getElementById('showReport').style.display='none';

                        var row = []
                    for(var i in data){
                        row += "<div class='col-sm-12' style='background-color:#f6f6f6;padding:5px;border-radius:10px;    border: 5px solid;border-color: #ddd;margin-bottom:5px;'><div><div class='col-sm-7' style ='border:3px solid'><img src='<?php echo base_url().'uploads/'?>"+data[i].img_src+"' style='width:100%;height:300px'></div>";
                        row += "<div class='col-sm-5'><div style=''>"+data[i].date+"</div><div style='margin-top:20px;'>"+data[i].name+"</div><div style='margin-top:20px;'><a href="+data[i].src+"  target='_blank'>"+data[i].src+"</a></div>";
                        row += "</div></div>";
                        row +="<div class='col-sm-12' style='margin-top:10px'><textarea type='text' style='width:100%;height:150px;border:none;  ' disabled='disabled'>"+data[i].comment+"</textarea></div></div>";
                    }
                    document.getElementById('searchresult').innerHTML = row;
                    $("#myModalResult").modal();
                    }
                      
                    
                  },  
                });  
        }else{
          $("#error").modal();
        }
   }
   function findTopReport(value){
    var indexName = {
        searchName : value
    }
    $.ajax({  
             url: "<?php echo base_url(); ?>report_search/findReport/",  
             dataType: 'json',  
             type: 'POST',  
             data: indexName,  
             success:      
                 function(data){  
                    if (data == 0 ) {
                      // alert("null");
                      //    document.getElementById('showReport').style.display='inline';

                    }else{
                        // document.getElementById('showReport').style.display='none';

                        var row = []
                    for(var i in data){
                        row += "<div class='col-sm-12' style='background-color:#f6f6f6;padding:5px;border-radius:10px;    border: 5px solid;border-color: #ddd;margin-bottom:5px;'><div><div class='col-sm-7'><img  src='<?php echo base_url().'uploads/'?>"+data[i].img_src+"' style='width:100%;height:300px'></div>";
                        row += "<div class='col-sm-5'><div style=''>"+data[i].date+"</div><div style='margin-top:20px;'>"+data[i].name+"</div><div style='margin-top:20px;'><a href="+data[i].src+" target='_blank'>"+data[i].src+"</a></div>";
                        row += "</div></div>";
                        row +="<div class='col-sm-12' style='margin-top:10px'><textarea type='text' style='width:100%;height:150px;border:none; ' disabled='disabled'>"+data[i].comment+"</textarea></div></div>";
                    }
                    document.getElementById('searchresult').innerHTML = row;
                    $("#myModalResult").modal();
                    }
                      
                    
                  },  
                });  
   }
</script>
<script type="text/javascript">
  $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
function sendReport(){
  var img_src = $("#img_src").val();
  var name = $("#name").val();
  var subject = $("#subject").val();
  var comment = $("#comment").val();
  if (name=="") {
      $("#fielderror").css("display", "block").fadeOut(4000);;
  }
  else{
    var reportData = {
        rimg_src : img_src,
        rname : name,
        rsubject : subject,
        rcomment :comment
    }
  $.ajax({  
             url: "<?php echo base_url(); ?>addNewreport",  
             dataType: 'json',  
             type: 'POST',  
             data: reportData,  
             success:      
                 function(data){  
                      $("#myModal").modal('hide');
                      $("#success").modal();
                      document.getElementById('showReport').style.display='none';
                      $("#search").val("");
                      $("#img_src").val("");
                      $("#name").val("");
                      $("#subject").val("");
                      $("#comment").val("");
                  },  
                }); 
  }
}
function AddnewReport(){
  $("#myModal").modal();
  
}
</script>

