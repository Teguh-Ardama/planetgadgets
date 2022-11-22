<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="wp-admin/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="wp-admin/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="wp-admin/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="wp-admin/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="wp-admin/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="wp-admin/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="wp-admin/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="wp-admin/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="wp-admin/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="wp-admin/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="wp-admin/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="wp-admin/pages/widget/amchart/amcharts.min.js"></script>
<script src="wp-admin/pages/widget/amchart/serial.min.js"></script>
<!-- Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
  var ctx = document.getElementById('myChart').getContext('2d');
  var myDoughnutChart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'doughnut',

      // The data for our dataset
      data: {
        datasets: [{
            data: [<?php echo $trxpending; ?>, <?php echo $trxdibayar; ?>, <?php echo $trxsukses; ?>],
            backgroundColor: [
            '#FFBB58',
            '#59A6FF',
            '#44DCBE'
            ],
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Pending',
            'Dibayar',
            'Sukses'
        ]
      },

      // Configuration options go here
      options: {}
  });
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script>
        Morris.Bar({
          element: 'graph',
          data: <?php echo $dstatik;?>,
          xkey: 'transaksi_tgl',
          ykeys: ['transaksi_total'],
          labels: ['Total']
        });
    </script>
<!-- Todo js -->
<script type="text/javascript " src="wp-admin/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="wp-admin/pages/dashboard/custom-dashboard.min.js"></script>
<script type="text/javascript" src="wp-admin/js/script.js"></script>
<script type="text/javascript " src="wp-admin/js/SmoothScroll.js"></script>
<script src="wp-admin/js/pcoded.min.js"></script>
<script src="wp-admin/js/vartical-demo.js"></script>
<script src="wp-admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    function goBack() {
        window.history.back();
    }

    function addlist(obj, out) {
      var grup = obj.form[obj.name];
      var len = grup.length;
      var list = new Array();

      if (len > 1) {
         for (var i = 0; i < len; i++) {
            if (grup[i].checked) {
               list[list.length] = grup[i].value;
            }
         }
      } else {
         if (grup.checked) {
            list[list.length] = grup.value;
         }
      }

      document.getElementById(out).value = list.join(', ');

      return;
   }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#prov').change(function() {
      var prov = $('#prov').val();
      var province = prov.split(',');
      $.ajax({
        url: "admin/city",
        method: "POST",
        data: { prov : province[0] },
        success: function(obj) {
          $('#kota').html(obj);
        }
      });
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: "700px",
      callbacks: {
        onImageUpload: function(image) {
          uploadImage(image[0]);
        },
        onMediaDelete: function(target) {
          deleteImage(target[0].src);
        }
      }
    });

    function uploadImage(image) {
      var data = new FormData();
      data.append("image", image);
      $.ajax({
        url: "admin/upload_image",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(url) {
          $('#summernote').summernote("insertImage", url);
        },
        error: function(data) {
          console.log(data);
        }
      });
    }
    function deleteImage(src) {
      $.ajax({
        data: {src:src},
        type: "POST",
        url: "admin/delete_image",
        cache: false,
        success: function(response) {
          console.log(response);
        }
      });
    }
  });
</script>
<script>

    var i = 2;

    $(document).on('click', '.btn_remove', function(){  

       var button_id = $(this).attr("id");
       $('#photo'+button_id+'').remove();  
       i--;

       if(i == 0){
        $(".form-control").prop('required',true);
       }

     });  

    $('#addKolom').click(function(){  

      i++;  

      $('#konten-photo').append('<div id="photo'+i+'"><b>#'+i+'</b> <a id="'+i+'" class="btn btn-danger btn-mini btn_remove text-white">Hapus</a><div class="row"><div class="form-group col-md-12"><label>Foto</label><input type="file" class="form-control" name="files[]" required></div></div></div>');  
        $(".form-control").prop('required',false);
    });

</script>
</body>

</html>
