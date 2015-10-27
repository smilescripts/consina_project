

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     State
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                        <li><a href="<?=base_index();?>state">State</a></li>
                        <li class="active">Detail State</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail State</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="State Name" class="control-label col-lg-2">State Name</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->STATE_NAME;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

                   
                    </form>
                    <a href="<?=base_index();?>state" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
