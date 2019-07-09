<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> All Reports
        <small>Control panel</small>
      </h1>
    </section>
    <!-- <center>
      <div><a href="#" class="btn btn-primary btn-lg">Add 1 new report</a></div>
    </center> -->
          <div class="row">
          <div class="col-md-12">
              <!-- Advanced Tables -->
              <div class="panel panel-default">
                  <div class="panel-heading">
                       Reports
                  </div>
                  <div class="panel-body">
                      <div class="table-responsive" id="datatable">
                          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                  <tr>
                                      <th class="text-center">No</th>
                                      <th class="text-center">Name</th>
                                      <th class="text-center">Date</th>
                                      <th class="text-center">Approval</th>
                                  </tr>
                              </thead>
                              <tbody id="report_tbl">
                                  <?php
                                    if(!empty($userRecords))
                                    {
                                      $i=1;
                                        foreach($userRecords as $record)
                                        {
                                          
                                    ?>
                                    <tr id="tr<?php echo $record->id ?>">
                                      <td class="text-center"><?php echo $i ?></td>
                                      <td class="text-center">
                                        <a href="<?php echo base_url().'viewReport/'.$record->name.'/'.$record->date; ?>"><?php echo $record->name ?></a></td>
                                      <td class="text-center"><?php echo $record->date ?></td>
                                      <td class="text-center">
                                        <?php if($record->approval==0){ ?>
                                          <button id="approv.<?php echo $record->name ?>" type="button" onclick="approval(<?php echo $record->id ?>,1)" class="btn btn-default btn-circle"><i class="fa fa-check"></i>
                                          </button>
                                          <button class="btn btn-sm btn-danger deleteUser" onclick="deleteReport(<?php echo $record->id ?>)"><i class="fa fa-trash"></i></button>
                                        <?php 
                                          }else{
                                          ?>
                                          <button id="approv.<?php echo $record->name ?>" type="button" onclick="approval(<?php echo $record->id ?>,0)" class="btn btn-info btn-circle"><i class="fa fa-check"></i>
                                              </button>
                                              <button class="btn btn-sm btn-danger deleteUser" onclick="deleteReport(<?php echo $record->id ?>)"><i class="fa fa-trash"></i></button>
                                        <?php }?>
                                      </td>
                                    </tr>
                                    <?php
                                        $i++;
                                        }
                                    }
                                    ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!--End Advanced Tables -->
          </div>
      </div>
</div>
<script type="text/javascript">
      $(document).ready(function () {
        $("#report_num").change(function(){
            var ddlText = $("#report_num option:selected").text();
            var ddlValue = $("#report_num option:selected").val();
            var selected_val ={
              val : ddlValue
            }
            if (ddlValue=='0') {
              document.getElementById('viewNum').innerHTML="";
            }
            else{
              var number = 0;
              $.ajax({
                  url: '<?php echo base_url() ?>report_approval/viewRportNum', // point to server-side controller method
                  dataType: 'json', // what to expect back from the server
                  data : selected_val,
                  type: 'post',
                  success: function (response) {
                     for(var i in response){
                            number = response[i].number;
                        }
                       document.getElementById('viewNum').innerHTML=number;
                  },
                  error: function (response) {
                      $('#msg').html(response); // display error response from the server
                  }
              });
            }

        });
    
    });
    function approval(id,type) {
          
          var appro = {
            approval_id : id,
            approval_type : type
          }
          console.log(appro);
          $.ajax({
                url: '<?php echo base_url() ?>report_approval', // point to server-side controller method
                dataType: 'json', // what to expect back from the server
                data : appro,
                type: 'post',
                success: function (data) {
                      location.reload();
                },
                error: function (response) {
                    $('#msg').html(response); // display error response from the server
                }
            });
    }
    function deleteReport(id) {
      var Delete_id = {
            Del_id : id
          }
          $.ajax({
                url: '<?php echo base_url() ?>report_approval/deleteReport', // point to server-side controller method
                dataType: 'json', // what to expect back from the server
                data : Delete_id,
                type: 'post',
                success: function (response) {
                  // console.log(response);
                  location.reload();
                     // document.getElementById('tr'+id).style.display="none";
                },
                error: function (response) {
                    $('#msg').html(response); // display error response from the server
                }
            });
    }
</script>