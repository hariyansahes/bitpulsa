 <section class="content-header">
                    <h1>
                        Paket Pulsa
                        
                    </h1>
                    
                </section>
<!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header"><br>
                                   &nbsp&nbsp <a href="#" data-toggle="modal" data-target="#tambahop"><button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp Tambah Operator</button></a>
                                   
                                </div><!-- /.box-header -->
                                <br>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Operator</th>
                                            <th>Nominal Pulsa</th>
                                            <th>Harga (USD)</th>
                                            <th>Config</th>
                                        </tr>
                                        <?php $no=1;?>
                                           <?php foreach($paket->result() as $pa):?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $pa->nama_operator; ?></td>
                                             <td><?php echo $pa->nominal; ?>&nbsp Rupiah</td>
                                             <td><?php echo $pa->harga; ?>&nbsp USD</td>
                                            <td><a href="#" data-toggle="modal" data-target="#editop<?php echo $pa->id_operator_paket;?>"><button class="btn btn-info btn-flat btn-sm" ><i class="fa fa-pencil"></i>&nbsp Edit</button></a>
                                                <a href="<?php echo base_url(); ?>administrator/dashboard/hapus_paket/<?php echo $pa->id_operator_paket; ?>"><button class="btn btn-danger btn-flat btn-sm"><i class="fa fa-pencil"></i>&nbsp Delete</button></a>
                                            </td>  
                                        </tr>
    <div class="modal fade" id="editop<?php echo $pa->id_operator_paket;?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
         <?php 
    $attributes = array('class'=>'form-signin','role'=>'form');
    echo form_open('administrator/dashboard/edit_paket',$attributes);?>
        <div class="modal-content">
          <div class="modal-header">
           
           <h2>edit paket</h2>
          </div>
           <?php echo form_hidden('id',$pa->id_operator_paket);?>
          <div class="modal-body">

            <div class="form-group">
             <label>Nama Operator</label>
             <select class="form-control" name="operator">
              <option value="0" >Pilih Operator</option>
               <?php foreach($operator->result() as $op):?>
               <?php if ($op->id_operator==$pa->id_operator) {
                 $select="selected";
               }else{
                 $select="";
               }?>
              <option value="<?php echo $op->id_operator; ?>" <?php echo $select;?> ><?php echo $op->nama_operator; ?></option>
           <?php endforeach;?>
             </select>
            </div>

            <div class="form-group">
             <label>Nama Operator</label>
             <input type="text" class="form-control"  name="nominal" value="<?php echo $pa->nominal;?>">
            </div>
            <div class="form-group">
             <label>Harga (USD)</label>
             <input type="text" class="form-control"  name="harga" value="<?php echo $pa->harga;?>">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">update</button>
          </div>
        </div>
        </form>
      </div>
    </div>

                                        <?php 
                                        $no++;
                                        endforeach;?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           
                             <div class="box-footer clearfix">
                                    <?php echo $halaman;?>
                                </div>
                        </div>
                    </div>
    <div class="modal fade" id="tambahop" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
         <?php 
    $attributes = array('class'=>'form-signin','role'=>'form');
    echo form_open('administrator/dashboard/tambah_paket',$attributes);?>
        <div class="modal-content">
          <div class="modal-header">
           
           <h2>tambah paket</h2>
          </div>
          <div class="modal-body">
            <div class="form-group">
             <label>Nama Operator</label>
             <select class="form-control" name="operator">
              <option value="0" >Pilih Operator</option>
               <?php foreach($operator->result() as $op):?>
              <option value="<?php echo $op->id_operator; ?>"><?php echo $op->nama_operator; ?></option>
           <?php endforeach;?>
             </select>
            </div>
            <div class="form-group">
             <label>Nominal Pulsa</label>
             <input type="text" class="form-control"  name="nominal">
            </div>
            <div class="form-group">
             <label>Harga (USD)</label>
             <input type="text" class="form-control"  name="harga">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">tambah</button>
          </div>
        </div>
        </form>
      </div>
    </div>

                </section><!-- /.content -->