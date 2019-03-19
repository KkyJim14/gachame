<form class="checkout-form mt-2" name="checkoutForm" method="POST" action="/omise-pay">
  <input id="transfer_omise" type="hidden" name="transfer_omise" value="">
  <script>
  $('#transfer_amount').change(function() {
    $('#transfer_omise').val($(this).val());
  });
  </script>
  @csrf
  <script id="omiseScript_autoFillable" type="text/javascript" src="https://cdn.omise.co/omise.js"
          data-key="pkey_test_5cxodoewdmtrmj4j1g4"
          data-amount=""
          data-frame-label="www.gachame.com"
          data-submit-label="ยืนยันการชำระเงิน"
          data-button-label="เติมผ่านบัตรเครดิต">
  </script>
  <script>
      function isNumber(value) {
          var x = parseFloat(value);
          return !isNaN(value) && (x | 0) === x;
      }
      $("#transfer_amount").change(function(e){
          if(isNumber($("#transfer_amount").val())){
              $("#omiseScript_autoFillable").attr("data-amount", parseInt("" + $("#transfer_amount").val() + "00"));
          }
      });
  </script>
</form>
