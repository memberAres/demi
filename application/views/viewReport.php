<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i>Report
        <!-- <small>Add, Edit, Delete</small> -->
      </h1>
    </section>
    <section class="content">
        <?php
            foreach ($reports as $report) {
         ?> 
        <div class="row">
            <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php echo $report->date; ?>
                        </div>
                        <div class="panel-body">
                            
                            <div class="col-md-6">
                                    <img src="<?php echo base_url().'uploads/'.$report->img_src ?>" style='width:100%;height:300px'>
                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">

                                      <!-- The Close Button -->
                                      <span class="close_modal">&times;</span>

                                      <!-- Modal Content (The Image) -->
                                      <img class="modal-content" id="img01">

                                      <!-- Modal Caption (Image Text) -->
                                      <div id="caption"></div>
                                    </div>
                                    
                            </div>
                            <div class="col-md-6"> 
                                <div>
                                  <?php echo $report->name; ?>
                                </div>
                                <div style="margin-top: 20px;display: flex">
                                  <!-- <input type="text" class="form-control" id="r_url" placeholder="URL" name="r_url" value="<?php echo $report->src; ?>" style="border:none;padding:0px"> -->
                                  <div class="col-sm-9" id="editable" style="padding:0px;overflow: hidden;margin-top: auto;
                                      margin-bottom: auto;"><a href="<?php echo $report->src; ?>" target="_blank"><?php echo $report->src; ?></a></div>
                                  <div class="col-sm-3">
                                    <input type="button" id="url_val" style="min-width: 50px;" class="btn btn-sm btn-info" value="Edit" onclick="edit('<?php echo $report->id; ?>','<?php echo $report->src; ?>')"></input>
                                  </div>
                                  <!--  -->
                                </div>
                                <div style="margin-top: 20px;">
                                 <?php echo $report->comment; ?>

                                  <!-- <?php echo $report->comment; ?> -->
                                    
                                  </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
                </div>
        </div>
        <?php } ?>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close_modal")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
          modal.style.display = "none";
        }
    $(document).ready(function () {
    var $sfield = $('#title').autocomplete({
        source: function(request, response){
            var url = "<?php echo site_url('autocomplete/control_areas'); ?>";
              $.post(url, {data:request.term}, function(data){
                response($.map(data, function(countries) {
                    return {
                        value: countries.name_en
                    };
                }));
              }, "json");  
        },
        minLength: 2,
        autofocus: true
    });
});
    function edit(id,url){
      value = document.getElementById("url_val").value;
      if (value=='Edit') {
        editurl(id,url);
      }else{
        saveurl(id);
      }
    }
    function editurl(id,url){
      var row;
      row = "<input type='text' class='form-control' id='r_url' placeholder='URL' name='r_url' value='"+url+"' >";
      document.getElementById("editable").innerHTML=row;
      document.getElementById("url_val").value = "Save";
    }
    function saveurl(id){
      var editdata = $("#r_url").val();
      document.getElementById("url_val").value = "Edit";
      
      var Edited_data = {
            edit_id : id,
            edit_url : editdata
          }
          $.ajax({
                url: '<?php echo base_url() ?>editurl', // point to server-side controller method
                dataType: 'json', // what to expect back from the server
                data : Edited_data,
                type: 'post',
                success: function () {
                 var row;
                  row = "<a href='"+editdata+"' target='_blank'>"+editdata+"</a>";
                  document.getElementById("editable").innerHTML=row;
                },
                error: function (response) {
                    alert("s") // display error response from the server
                }
            });
    }
</script>