    <?php if($this->uri->segment(1) == 'metode-pembayaran') { ?>
      <form id="payment-form" method="post" action="send">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="result_type" id="result-type" value=""></div>
        <input type="hidden" name="result_data" id="result-data" value=""></div>
      </form>
    <?php } ?>
<!-- Template js files -->
    <script src="wp-content/js/jquery-3.3.1.min.js"></script>
    <script src="wp-content/js/popper.min.js"></script>
    <script src="wp-content/js/sweetalert2.all.min.js"></script>
    <script src="wp-content/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <?php if($this->uri->segment(1) == 'metode-pembayaran') { ?>
      <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: 'token',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>
    <?php } ?>

    <!-- Swiper javascript -->
    <script src="wp-content/vendor/swiper/js/swiper.min.js"></script>

    <!-- Custom javascript -->
    <script src="wp-content/js/main.js"></script>
    
    <!-- Cookie for color scheme -->
    <script src="wp-content/vendor/cookie/jquery.cookie.js"></script>
    
    <!-- Color scheme js -->
    <script src="wp-content/js/color-scheme-demo.js"></script>

    <!-- App js page level initialization functions -->
    <script src="wp-content/js/app.js"></script>
    <script type="text/javascript">
        //  if (window.screen.width > 480) {
        //  document.location.href = "alert";
        //  }
    </script>
    <script>
        function increment() {
            document.getElementById('qty').stepUp();
        }
        function decrement() {
            document.getElementById('qty').stepDown();
        }

        function goBack() {
            window.history.back();
        }
    </script>
    <?php if($this->uri->segment(1) == 'checkout') { ?>
        <script type="text/javascript">

         $(document).ready(function() {

               $('#prov').change(function() {
                  var prov = $('#prov').val();
                  var province = prov.split(',');

                  $.ajax({
                     url: "home/city",
                     method: "POST",
                     data: { prov : province[0] },
                     success: function(obj) {
                        $('#kota').html(obj);
                     }
                  });
               });

               $('#kota').change(function() {
                  var kota = $('#kota').val();
                  var dest = kota.split(',');
                  var kurir = $('#kurir').val()

                  $.ajax({
                     url: "home/getcost",
                     method: "POST",
                     data: { dest : dest[0], kurir : kurir },
                     success: function(obj) {
                        $('#layanan').html(obj);
                     }
                  });
               });

               $('#kurir').change(function() {
                  var kota = $('#kota').val();
                  var dest = kota.split(',');
                  var kurir = $('#kurir').val()

                  $.ajax({
                     url: "home/getcost",
                     method: "POST",
                     data: { dest : dest[0], kurir : kurir },
                     success: function(obj) {
                        $('#layanan').html(obj);
                     }
                  });
               });

               $('#layanan').change(function() {
                  var layanan = $('#layanan').val();
                  $.ajax({
                    url: "home/cost",
                    method: "POST",
                    data: { layanan : layanan },
                    success: function(obj) {
                      var hasil = obj.split(",");
                      var nongkir = hasil[0];
                      var ntotal = hasil[1];
                      var reverse = nongkir.toString().split('').reverse().join(''),
                      ongkir  = reverse.match(/\d{1,3}/g);
                      ongkir  = 'Ongkir : Rp. ' + ongkir.join('.').split('').reverse().join('') + ',-';
                      var reverse = ntotal.toString().split('').reverse().join(''),
                      total   = reverse.match(/\d{1,3}/g);
                      total = 'Rp. ' + total.join('.').split('').reverse().join('') + ',-';
                      document.getElementById("ongkir").innerHTML= ongkir;
                      document.getElementById("total").innerHTML= total;
                      $('#ongkirset').val(hasil[0]);
                      $('#totalset').val(hasil[1]);
                    }
                  });
                });
         });
      </script>
      <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
      <script>
        $(document).ready(function(){
            $( "#alamat" ).autocomplete({
              source: "<?php echo site_url('home/get_autocomplete/?');?>"
            });
        });
      </script>
    <?php } ?>
</body>
</html>
