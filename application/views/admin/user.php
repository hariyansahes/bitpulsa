 <section class="content-header">
                    <h1>
                        User Management
                        
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
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Config</th>
                                        </tr>
                                        <?php $no=1;?>
                                           <?php foreach($user->result() as $op):?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $op->nama; ?></td>
                                            <td><?php echo $op->username; ?></td>
                                            <td><?php echo $op->email; ?></td>
                                            <td><a href="#" data-toggle="modal" data-target="#editop<?php echo $op->id_user;?>"><button class="btn btn-info btn-flat btn-sm" ><i class="fa fa-pencil"></i>&nbsp Edit</button></a>
                                                <a href="<?php echo base_url(); ?>administrator/dashboard/hapus_user/<?php echo $op->id_user; ?>"><button class="btn btn-danger btn-flat btn-sm"><i class="fa fa-pencil"></i>&nbsp Delete</button></a>
                                            </td>  
                                        </tr>
    <div class="modal fade" id="editop<?php echo $op->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
         <?php 
    $attributes = array('class'=>'form-signin','role'=>'form');
    echo form_open_multipart('administrator/dashboard/edit_user',$attributes);?>
        <div class="modal-content">
          <div class="modal-header">
           
           <h2>edit user</h2>
          </div>
           <?php echo form_hidden('id',$op->id_user);?>
          <div class="modal-body">
          
            <div class="form-group">
             <label> <img src="<?php echo base_url();?>/adm/img/<?php echo $op->photo;?>" class="img-circle" alt="User Image" height="50" width="50" /></label>
             <input type="file" class="form-control" name="userfile">
            </div>

            <div class="form-group">
             <label>Nama</label>
             <input type="text" class="form-control" name="nama" value="<?php echo $op->nama; ?>">
            </div>

             <div class="form-group">
             <label>Username</label>
             <input type="text" class="form-control" name="username" value="<?php echo $op->username; ?>">
            </div>

            <div class="form-group">
             <label>Email</label>
             <input type="text" class="form-control" name="email" value="<?php echo $op->email; ?>">
            </div>

            <div class="form-group">
             <label>Password</label>
             <input type="password" class="form-control" name="password"> <font size="3" color="red">(* kosong jika tidak mengganti password</font>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">update</button>
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