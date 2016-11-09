 <div class="form-group">
        						     <label>Pulsa</label>
            						  <select class="form-control" name="paket">
           							   <option value="0" >Pilih Paket Pulsa</option>
          							     <?php foreach($paket->result() as $op):?>
       							       <option value="<?php echo $op->id_operator_paket; ?>"><?php echo $op->nominal; ?></option>
       								    <?php endforeach;?>
         							    </select>
           							 </div>