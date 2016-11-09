 <section class="content-header">
                    <h1>
                        Operator
                        
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
                                            <th>Config</th>
                                        </tr>
                                        <?php $no=1;?>
                                           <?php foreach($operator->result() as $op):?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $op->nama_operator; ?></td>
                                            <td><a href="#" data-toggle="modal" data-target="#editop<?php echo $op->id_operator;?>"><button class="btn btn-info btn-flat btn-sm" ><i class="fa fa-pencil"></i>&nbsp Edit</button></a>
                                                <a href="<?php echo base_url(); ?>administrator/dashboard/hapus_operator/<?php echo $op->id_operator; ?>"><button class="btn btn-danger btn-flat btn-sm"><i class="fa fa-pencil"></i>&nbsp Delete</button></a>
                                            </td>  
                                        </tr>
    <div class="modal fade" id="editop<?php echo $op->id_operator;?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
         <?php 
    $attributes = array('class'=>'form-signin','role'=>'form');
    echo form_open('administrator/dashboard/edit_operator',$attributes);?>
        <div class="modal-content">
          <div class="modal-header">
           
           <h2>edit operator</h2>
          </div>
           <?php echo form_hidden('id',$op->id_operator);?>
          <div class="modal-body">
            <div class="form-group">
             <label>Nama Operator</label>
             <input type="text" class="form-control"  name="operator" value="<?php echo $op->nama_operator;?>">
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
    echo form_open('administrator/dashboard/tambah_operator',$attributes);?>
        <div class="modal-content">
          <div class="modal-header">
           
           <h2>tambah operator</h2>
          </div>
          <div class="modal-body">
            <div class="form-group">
             <label>Nama Operator</label>
             <input type="text" class="form-control"  name="operator">
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