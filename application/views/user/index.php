

        <!-- Begin Page Content -->
      <div class="container-fluid">
          <!-- Page Heading -->
        <div class="mb-3">
          <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="jumbotron s">
          <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
              <div class="banner-content pr-5 pl-5 col-lg-6 col-md-6 ">
                <h6 class="text-white ">Your Journey COmpanion</h6>
                <h1 class="text-white text-uppercase">
                  Relaxed Journey Ever				
                </h1>
                <p class="pt-20 pb-20 text-white">
                Genggam tanganku, kita lawan bersama dingin & panas dunia.
Perjalanan kita masih panjang, namun saat kaki telah lemah, kita saling menopang. Dunia memang keras, namun bukankah menjadi mudah jika kita menaklukannya bersama.
                </p>
                <a href="#" class="primary-btn text-uppercase" hidden>Rent Car Now</a>
              </div>

              <!-- INI FORM -->
              <div class="col-lg-5 col-md-6 header-right">
                <form  action="<?= base_url(); ?>user" method="POST">
                  <h4 class="text-white pb-3">Book Your Vehicle Today!</h4>
                  <?php
                    if(validation_errors()){?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                      </div><?php
                    }
                  ?>
                  <div class="form-group">
                    <select class="form-control" id="type" name="type" required>
                      <option disabled selected hidden value="1">TYPE</option>
                      <option value="1">CAR</option>
                      <option value="2">MOTORCYCLE</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control" id="city" name="city" required>
                      <option disabled selected hidden value="1">CITY</option>
                      <?php
                      foreach ($province as $row) {
                        echo "<option value='".$row->id."'>".$row->province_name."</option>";
                      }?>
                    </select>
                  </div>  
                  <div class="row">
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-group">
                        <select class="form-control" id="pick_up" name="pick_up" required>
                          <option disabled selected  id="item_pick" value="1">PICK UP</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-group">
                        <div class="input-group dates-wrap">                                          
                          <input id="datepick" class="dates form-control" value="<?php echo set_value('datepick'); ?>" name="datepick" placeholder="Date & time" type="text" required>                        
                          <div class="input-group-prepend" >
                            <span class="input-group-text" id="datepick" style="border-bottom-right-radius: 0.35rem; border-top-right-radius: 0.35rem;"><span class="lnr lnr-calendar-full"></span></span>
                          </div>											
                        </div>	
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-group">
                        <select class="form-control " id="drop_off" name="drop_off" required>
                          <option disabled selected  id="item_pick" value="1">DROP OFF</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-group">
                        <div class="input-group dates-wrap">                                          
                          <input id="datedrop" class="dates form-control" value="<?php echo set_value('datedrop'); ?>" name="datedrop" placeholder="Date & time" type="text" required>                        
                          <div class="input-group-prepend" >
                            <span class="input-group-text" style="border-bottom-right-radius: 0.35rem; border-top-right-radius: 0.35rem;"><span class="lnr lnr-calendar-full"></span></span>
                          </div>											
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group row">
							        <div class="col-md-12">
							            <button type="submit" class="btn bg-merah btn-lg btn-block text-center text-uppercase" id="Search">SEARCH</button>
							        </div>
							    </div>
                </form>
              </div>										
            </div>
          </div> 
        </div>
      </div>
    </div>
      <!-- End of Main Content -->
      
<script>
$(document).ready(function(){
    $('#city').change(function(){ 
        var id=$(this).val();
        $('#cobainput').val(id);
        $.ajax({
            url : "<?= base_url();?>user/get_location",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;
                if(data != "0"){
                  for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+' id="item_pick">'+data[i].location_name+'</option>';
                  }
                  $('#pick_up').html(html);
                  $('#drop_off').html(html);
                }else{
                  $('#pick_up').html(html);
                }
            }
        });
        return false;
    });
    $( function() {
      $( "#datepick" ).datepicker({
      });
      $( "#datedrop" ).datepicker({
      });
  } );

  

  $("#datepick").datepicker({
      onSelect: function(){
        var date1 = new Date($('#datepick').val());
        var date2 = new Date($('#datedrop').val());
        
        if(date1 > date2 ){
            alert('Date Pick is greater than Date Drop Off');
            $("#datepick").val("");
        }
      }
    });

    $("#datedrop").datepicker({
      onSelect: function(){
        var date1 = new Date($('#datepick').val());
        var date2 = new Date($('#datedrop').val());
        
        if(date1 > date2 ){
            alert('Date Pick is greater than Date Drop Off');
            $("#datepick").val("");
            calcTotal();
        }
      }
    });
});
</script>