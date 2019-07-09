<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User report
        <!-- <small>Add, Edit, Delete</small> -->
      </h1>
    </section>
        <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <div class="form-group input-group">
                        <input type="text" id="title" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" onclick="findReport()"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <div  class="row" style="display: flex;justify-content: center;" >
                        <div id="result" style="display: none">no search result</div>
                    </div>
                    <a id="new" class="btn btn-primary" style="display: none" href="<?php echo base_url(); ?>NewReport"><i class="fa fa-plus"></i>NewReport</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="showReport" class="col-md-12">
                </div>
        </div>
                              <div  class="panel-body">
                        <div style="display: flex;justify-content: center">
                          <div><h1>Top 20 report</h1></div>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover">
                              <thead>
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
                                        <a href="<?php echo base_url().'viewReport/'.$top->rname; ?>"><?php echo $top->rname ?></a></td>
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
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
   $(this).ready( function() {  
            $("#title").autocomplete({  
//                 alert("dsfdsf");
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "<?php echo base_url(); ?>report_search/get_autocomplete/",  
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
    var name = document.getElementById('title').value;
    var indexName = {
        searchName : name
    }
    $.ajax({  
             url: "<?php echo base_url(); ?>report_search/findReport/",  
             dataType: 'json',  
             type: 'POST',  
             data: indexName,  
             success:      
                 function(data){  
                    if (data.length == 0 ) {
                        document.getElementById('new').style.display='inline';
                        document.getElementById('new').innerHTML='<i class="fa fa-plus">NewReport</i>';
                        document.getElementById('result').style.display='inline';
                        document.getElementById('showReport').style.display='none';

                    }else{
                        document.getElementById('new').style.display='inline';
                        document.getElementById('new').innerHTML='<i class="fa fa-plus">Addnew</i>';
                        document.getElementById('result').style.display='none';
                        document.getElementById('showReport').style.display='inline';

                        var row = []
                    for(var i in data){
                        row += "<div  class='panel panel-primary'><div class='panel-heading'>"+data[i].date+"</div>";
                        row += "<div class='panel-body'><div class='col-md-6'><div class='col-md-6'>Name  :</div> <div class='col-md-6'>"+data[i].name+"</div></div>";
                        row += "";
                        row += "<div class='col-md-6'><div class='col-md-6'>Platform  :</div> <div class='col-md-6'>"+data[i].src+"</div></div>";
                        row += "<div class='col-md-6'><div class='col-md-6'>Screenshot  :</div> <div class='col-md-6'>";
                        row += "<img id='myImg' src='<?php echo base_url().'/assets/uploads/'?>"+data[i].img_src+"' style='width:100%;max-width:300px;'>";
                        row += "</div></div><div class='col-md-6'><div class='col-md-6'>comment  :</div> <div class='col-md-6'>"+data[i].comment+"</div></div></div>";
                        row += "<div class='panel-footer'></div></div>"
                    }
                    document.getElementById('showReport').innerHTML = row;
                    }
                    
                  },  
                });  
   }
</script>
                            
                           
                                    