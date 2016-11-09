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
                                            
                                            <th>Status</th>
                                            <th>Nomor</th>
                                            <th>Operator</th>
                                            <th>Pulsa</th>
                                            <th>Bitcoin(BTC)</th>
                                            <th>Blockchain URL</th>
                                          
                                        </tr>
                                        <?php $no=1;?>
                                           <?php foreach($transaksi->result() as $op):?>
                                        <tr>
                                            <?php $btc=$op->total/100000000;?>
                                            <td><?php echo $no;?></td>
                                       
                                            <td><?php echo $op->transaksi_code; ?></td>
                                            <td><?php echo $op->tanggal; ?></td>
                                            
                                            <td><?php echo $op->status; ?></td>
                                            <td><?php echo $op->nomor; ?></td>
                                            <td><?php echo $op->id_operator; ?></td>
                                            <td><?php echo $op->nominal; ?></td>
                                            <td><?php echo $btc; ?></td>
                                            <td> <a href="https://blockchain.info/tx/<?php echo $op->hash; ?>" target="_blank"><?php echo substr($op->hash,9).".."; ?></a> </td>
                                            
                                        </tr>


                                        <?php 
                                        $no++;
                                        endforeach;?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           
                             
                        </div>
                    </div>
   

                </section><!-- /.content -->