<section class="content-header">
                    <h1>
                        Konfirmasi
                    </h1>
                 
                </section>

                <div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <i class="fa fa-warning"></i>
                        <b>Note:</b> Pastikan nomor yang dimasukkan sudah benar.
                    </div>
                </div>

                <!-- Main content -->
                <section class="content invoice">
                    <!-- title row -->
                  
         

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor</th>
                                        <th>Operator</th>
                                        <th>Nominal Pulsa</th>
                                    
                                        <th>Subtotal(BTC)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $nomor; ?></td>
                                          <?php foreach($paket->result() as $pa):?>
                                        <td><?php echo $pa->nama_operator; ?></td>
                                        <td><?php echo $pa->nominal; ?>&nbsp Rupiah</td>
                                     
                                        <td><?php 
                                            $harga=$pa->harga;
                                            $rates = $this->coinbase_api->getExchangeRate();
                                             $harga_btc=round($rates->btc_to_usd ,2, PHP_ROUND_HALF_UP);
                                             $btc=$harga/$harga_btc;
                                             $bayar=round($btc,7, PHP_ROUND_HALF_UP);
                                             echo $bayar." BTC";
                                         ?></td>
                                       
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        
                        <div class="col-xs-6">
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td><?php echo $bayar." BTC" ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Total:</th>
                                        <td><?php echo $bayar." BTC" ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                               <?php $code=$this->coinbase_api->createButton("Pulsa", $harga, "USD",$nomor."_".$pa->id_operator_paket."_".$this->session->userdata('id'))->button->code; ?>
                        <a class="coinbase-button" data-code="<?php echo $code;?>" data-button-style="custom_large" href="https://www.coinbase.com/checkouts/<?php echo $code;?>">Bayar Dengan Bitcoin</a><script src="https://www.coinbase.com/assets/button.js" type="text/javascript"></script>
                         
                        </div>
                    </div>
                       <?php endforeach;?>
                </section><!-- /.content -->