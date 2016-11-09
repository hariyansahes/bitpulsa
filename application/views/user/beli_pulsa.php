<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
 <section class="content-header">
                    <h1>
                        Beli Pulsa
                      
                    </h1>
                    
                </section>
                 <section class="content">
                 	<div class="row">
                 		 <div class="col-xs-6 col-xs-offset-3">
                 		 	<div class="box box-success">
                 		 		  <?php 
    $attributes = array('class'=>'form-signin','role'=>'form');
    echo form_open('user/dashboard/beli_pulsa_submit',$attributes);?>
    								<div class="box-body">

    									 <div class="form-group">
          								   <label>Nomor Tujuan</label>
            								 <input type="text" class="form-control" name="nomor">
        								</div>

           							 <div class="form-group">
        						     <label>Nama Operator</label>
            						  <select class="form-control" name="operator" id="operator_id">
           							   <option value="0" >Pilih Operator</option>
          							     <?php foreach($operator->result() as $op):?>
       							       <option value="<?php echo $op->id_operator; ?>"><?php echo $op->nama_operator; ?></option>
       								    <?php endforeach;?>
         							    </select>
           							 </div>

           							 	 <div class="form-group" id="paket">
        						     <label>Pulsa</label>
            						  <select class="form-control">
           							   <option value="0" >Pilih Operator Dahulu</option>    								
         							    </select>
           							 </div>



           							 </div>

           							  <div class="modal-footer">
        							    <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i>&nbsp Beli</button>
         							 </div>
    							</form>
                 		 	</div>	
                 		 </div>
                 	</div>
                 </section>

                    <script type="text/javascript">
        $("#operator_id").change(function(){
                var operator_id = {operator_id:$("#operator_id").val()};
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('user/dashboard/select_paket')?>",
                        data: operator_id,
                        success: function(msg){
                            $('#paket').html(msg);
                        }
                    });
        });
       </script>