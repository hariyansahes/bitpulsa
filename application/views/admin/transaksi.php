 <section class="content-header">
                    <h1>
                        transaksi
                        
                    </h1>
                    
                </section>
<!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header"><br>
                                
                                </div><!-- /.box-header -->
                                <br>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No</th>
                                      
                                            <th>Kode</th>
                                            <th>Tangal</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Nomor</th>
                                            <th>Operator</th>
                                            <th>Pulsa</th>
                                            <th>Bitcoin(BTC)</th>
                                            <th>Blockchain URL</th>
                                            <th>Log</th>
                                        </tr>
                                        <?php $no=1;?>
                                           <?php foreach($transaksi->result() as $op):?>
                                        <tr>
                                            <?php $btc=$op->total/100000000;?>
                                            <td><?php echo $no;?></td>
                                       
                                            <td><?php echo $op->transaksi_code; ?></td>
                                            <td><?php echo $op->tanggal; ?></td>
                                            <td><?php echo $op->username; ?></td>
                                            <td><?php echo $op->status; ?></td>
                                            <td><?php echo $op->nomor; ?></td>
                                            <td><?php echo $op->id_operator; ?></td>
                                            <td><?php echo $op->nominal; ?></td>
                                            <td><?php echo $btc; ?></td>
                                            <td> <a href="https://blockchain.info/tx/<?php echo $op->hash; ?>" target="_blank"><?php echo substr($op->hash,9).".."; ?></a> </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#editop<?php echo $op->id_transaksi;?>"><button class="btn btn-warning btn-flat btn-sm" >LOG</button></a>
                                            </td>  
                                        </tr>
   <div class="modal fade" id="editop<?php echo $op->id_transaksi;?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
         <?php 
    $attributes = array('class'=>'form-signin','role'=>'form');
    echo form_open('#',$attributes);?>
        <div class="modal-content">
          <div class="modal-header">
           
           <h2>Log</h2>
          </div>
          <div class="modal-body">
            <div class="form-group">
             <textarea class="form-control" rows="5"><?php echo $op->log; ?></textarea>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
   

                </section><!-- /.content -->