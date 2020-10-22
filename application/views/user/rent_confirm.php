

<div class="container-fluid">
    <div class=" card mb-4 header-right box">
        <h4 class="text-dark pb-3">Confirm your order!</h4>
        <form  action="<?= base_url(); ?>user/rent_confirm/<?= $car[0]->idcar;?>" method="POST">
            <?php
                if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div><?php
                }
                ?>
            <div class="form-group">
                <input type="text" readonly class="form-control" name="email" value="<?= $user['email'];?>">
            </div>
            <div class="form-group">
                <input type="text" hidden class="form-control" name="idcar" value="<?= $car[0]->idcar;?>">
                <input type="text"  readonly class="form-control" name="car_name" value="<?= $car[0]->car_name;?>">
            </div>
            <div class="form-group">
                <input type="text" readonly disabled class="form-control" name="price" id="price" value="<?= $car[0]->price;?>">
            </div>
            <div class="form-group">
                <input type="text" name="city_id" hidden value="<?= $city[0]->id;?>">
                <input type="text" readonly class="form-control" name="city" id="city" value="<?= $city[0]->province_name;?>">
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <select class="form-control" id="pick_up" name="pick_up" required>
                      <option selected value="<?= $pickup_loc[0]->id; ?>"><?= $pickup_loc[0]->location_name; ?></option>
                      <?php
                      foreach ($locations1 as $row) {
                        echo "<option value='".$row->id."'>".$row->location_name."</option>";
                      }?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <div class="input-group dates-wrap">                                          
                      <input id="datepick" class="dates form-control" value="<?= $book_data['datepick']?>" name="datepick" placeholder="Date & time" type="text" required>                        
                      <div class="input-group-prepend" >
                        <span class="input-group-text" style="border-bottom-right-radius: 0.35rem; border-top-right-radius: 0.35rem;"><span class="lnr lnr-calendar-full"></span></span>
                      </div>											
                    </div>	
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <select class="form-control " id="drop_off" name="drop_off" required>
                        <option selected value="<?= $dropoff_loc[0]->id; ?>"><?= $dropoff_loc[0]->location_name; ?></option>
                        <?php
                        foreach ($locations2 as $row) {
                            echo "<option value='".$row->id."'>".$row->location_name."</option>";
                        }?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <div class="input-group dates-wrap">                                          
                      <input id="datedrop" class="dates form-control" value="<?= $book_data['datedrop']?>" name="datedrop" placeholder="Date & time" type="text" required>                        
                      <div class="input-group-prepend" >
                        <span class="input-group-text" style="border-bottom-right-radius: 0.35rem; border-top-right-radius: 0.35rem;"><span class="lnr lnr-calendar-full"></span></span>
                      </div>											
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <h6 class="text-dark float-left">Total</h6>
                </div>
                <div class="col-6">
                    <h7 class="text-dark float-right text-right" >Rp. <span class="text-lg font-weight-bold" style="font-size: 25px; " id="totalharga"></span></h7>
                    <input type="text" hidden readonly class="form-control " name="total" id="total">
                </div>
                
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="btn bg-merah btn-lg btn-block text-center text-uppercase" id="Search">RENT</button>
                </div>
            </div>
        </form>
        </div>    
    </div>

      
<script>
$(document).ready(function(){

    var datepicker1 = "<?= $book_data['datepick']; ?>"
    var datepicker2 = "<?= $book_data['datedrop']; ?>"
    calcTotal();

    $( function() {
        $( "#datepick" ).datepicker();
        $( "#datedrop" ).datepicker();
        
    });
    
    function CalcDiff(){
        var a = new Date($('#datepick').val());
        var b = new Date($('#datedrop').val());
        var timeDiff = Math.abs(b - a);
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

        return diffDays;
    }
    function calcTotal(){
        var a = $('#price').val();
        var b = a*CalcDiff();

        $('#total').val(b);
        $("#totalharga").html(b);
    }

    $("#datepick").datepicker({
      onSelect: function(){
        var date1 = new Date($('#datepick').val());
        var date2 = new Date($('#datedrop').val());
        
        if(date1 > date2 ){
            alert('Date Pick is greater than Date Drop Off');
            $("#datepick").val(datepicker1);
            calcTotal();
        }
        else {
            calcTotal();
        }
      }
    });

    $("#datedrop").datepicker({
      onSelect: function(){
        var date1 = new Date($('#datepick').val());
        var date2 = new Date($('#datedrop').val());
        
        if(date1 > date2 ){
            alert('Date Pick is greater than Date Drop Off');
            $("#datepick").val(datepicker1);
            calcTotal();
        }
        else {
            calcTotal();
        }
      }
    });

});
</script>