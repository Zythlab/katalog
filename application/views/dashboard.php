<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<style type="text/css">
.kecil{
    min-height: 40px;
}
.products-list .product-info {
    margin-left: 0px;
    font-size: 16px;
    }
.label{
    font-size: 100%;
}
</style>
<div class="row">
    <div class="col-lg-4 col-xs-12">
        <div class="callout callout-warning">   
            <h4>Stok Tabung Refill</h4>
        </div>
    </div>
    <div class="col-lg-4 col-xs-12">
        <div class="callout callout-danger">   
            <h4>Stok Tabung Plus Isi</h4>
        </div>
    </div>
    <div class="col-lg-4 col-xs-12">
        <div class="callout callout-info">   
            <h4>Stok Spare Part</h4>
        </div>
    </div>
</div>
 <div class="row">
    <?php foreach ($stok_refill as $refill) { ?>
     <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3> <?= $refill->jumlah ?></h3>
                <p style="font-family: 'Oswald', sans-serif;"><?= $refill->jenis_isi ?></p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
           <a href="<?php echo base_url('BarangMasuk/content/2')?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <?php } ?>
       
</div>
<div class="row">
    <?php foreach ($stok_tabung as $tabung) { ?>
     <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3> <?= $tabung->jumlah ?></h3>
                <p style="font-family: 'Oswald', sans-serif;"><?= $tabung->jenis_isi ?></p>
            </div>
            <div class="icon">
                <i class="ion-compose"></i>
            </div>
           <a href="<?php echo base_url('BarangMasuk/content/1')?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <?php } ?>
       
</div>
<div class="row">
     <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3> <?= $jumlah_sp ?></h3>
                <p style="font-family: 'Oswald', sans-serif;">Jumlah Spare Part</p>
            </div>
            <div class="icon">
                <i class="ion-compose"></i>
            </div>
           <a href="<?php echo base_url('BarangMasuk/content/1')?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
       
</div>

<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Grafis Penjualan 5 Produk Terakhir</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                   

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" width="900" height="400"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <script type="text/javascript">
        $(function () {

  'use strict';

 var barData = {
    labels: [
    <?php foreach ($produk as $produk) { ?>
    
    '<?=$produk->nama_barang?>', 

    <?php }?>
    ],
    datasets: [
       
        {
            label: 'Penjualan Produk',
            fillColor: '#7BC225',
            data: [
            <?php foreach ($produk2 as $produk2) { ?>
            <?=$produk2->qty?>, 
            <?php } ?>
            ]
        }
    ]
};

var context = document.getElementById('salesChart').getContext('2d');
var clientsChart = new Chart(context).Bar(barData);
  //-----------------------

  
});
      </script>