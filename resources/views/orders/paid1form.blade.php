<style>
  div.paid {
      background-color : yellow;
      color            : blue;
  }
  button.submit2 {
      background-color : #4CAF50; /* Green */
      border           : none;
      color            : white;
      //padding          : 15px 32px;
      //text-align       : center;
      //text-decoration  : none;
      display          : inline-block;
      font-size        : 16px;
      margin-left      : 10px;
  }
  p.input {
      margin-left      : 20px;
  }
</style>
<div class="block">
  <h2>{{ __('treaty.title') }}</h2>
  <p class="input">{{ __('treaty.treaty1') }}</p>
  <p class="input">{{ __('treaty.treaty2') }}</p>
  <p class="input">{{ __('treaty.treaty3') }}</p>
  <p class="input">{{ __('treaty.treaty3a') }}</p>
  <p class="input">{{ __('treaty.treaty3b') }}</p>
  <p class="input">{{ __('treaty.treaty4') }}</p>
  <p class="input">{{ __('treaty.treaty5') }}</p>
  <p class="input">{{ __('treaty.treaty6') }}</p>
  <p class="input">{{ __('treaty.treaty7') }}</p>
  <p class="input">{{ __('treaty.treaty8') }}</p>
</div>
<div class="block">
  <h2>支付訂金新台幣3500元</h2>
  <p class="input"><input type="radio" id="method" name="method" value="24payment" class="form-control">{{ __('orders.24payment') }}</p>
  <p class="input"><input type="radio" id="method" name="method" value="atm" class="form-control">{{ __('orders.atm') }}</p>
  <p class="input"><input type="radio" id="method" name="method" value="creditcard" class="form-control">{{ __('orders.creditcard') }}</p>
  <p class="input"><input type="radio" id="method" name="method" value="webatm" class="form-control"  hidden>{{ __('orders.webatm') }}</p>
  <p class="input"><input type="radio" id="method" name="method" value="paycode" class="form-control" hidden>{{ __('orders.paycode') }}</p>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://sales.mdo.tw/js/jquery-validation/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $('input:radio[name="method"]').change(
        function () {
            if ($(this).is(':checked') && $(this).val() == '24payment') {
                $('#suntech_24payment').show();
                $('#suntech_atm').hide();
                $('#suntech_creditcard').hide();
                $('#suntech_webatm').hide();
                $('#suntech_paycode').hide();
            } else if ($(this).is(':checked') && $(this).val() == 'atm') {
                $('#suntech_24payment').hide();
                $('#suntech_atm').show();
                $('#suntech_creditcard').hide();
                $('#suntech_webatm').hide();
                $('#suntech_paycode').hide();
            } else if ($(this).is(':checked') && $(this).val() == 'creditcard') {
                $('#suntech_24payment').hide();
                $('#suntech_atm').hide();
                $('#suntech_creditcard').show();
                $('#suntech_webatm').hide();
                $('#suntech_paycode').hide();
            } else if ($(this).is(':checked') && $(this).val() == 'webatm') {
                $('#suntech_24payment').hide();
                $('#suntech_atm').hide();
                $('#suntech_creditcard').hide();
                $('#suntech_webatm').show();
                $('#suntech_paycode').hide();
            } else if ($(this).is(':checked') && $(this).val() == 'paycode') {
                $('#suntech_24payment').hide();
                $('#suntech_atm').hide();
                $('#suntech_creditcard').hide();
                $('#suntech_webatm').hide();
                $('#suntech_paycode').show();
            } else {
                //Other Things
            }
        });
    });
</script>
<div id="suntech">
    <div id="suntech_24payment" class="block paid" hidden><h2><b>{{ __('orders.24payment') }}</b></h2>
         <form id="form1" name="form1" action="{{ $pInfo->paymentURL }}" method="POST">
            <input type="hidden" name="web" value="{{ $pInfo->web[0] }}">
            <input type="hidden" name="MN" value="{{ $pInfo->MN }}">
            <input type="hidden" name="OrderInfo" value="{{ $pInfo->OrderInfo }}">
            <input type="hidden" name="Td" value="{{ $pInfo->Td }}">
            <input type="hidden" name="sna" value="{{ $pInfo->sna }}">
            <input type="hidden" name="sdt" value="{{ $pInfo->sdt }}">
            <input type="hidden" name="email" value="{{ $pInfo->email }}">
            <input type="hidden" name="note1" value="{{ $pInfo->note1 }}">
            <input type="hidden" name="note2" value="{{ $pInfo->note2 }}">
            <input type="hidden" name="DueDate" value="{{ $pInfo->DueDate }}">
            <input type="hidden" name="UserNo" value="{{ $pInfo->UserNo }}">
            <input type="hidden" name="BillDate" value="{{ $pInfo->BillDate }}">
            <input type="hidden" name="ProductName1" value="{{ $pInfo->ProductName1 }}">
            <input type="hidden" name="ProductPrice1" value="{{ $pInfo->ProductPrice1 }}">
            <input type="hidden" name="ProductQuantity1" value="{{ $pInfo->ProductQuantity1 }}">
            <input type="hidden" name="AgencyType" value="1"/>
            <input type="hidden" name="AgencyBank" value="{{ $pInfo->AgencyBank }}"/>
            <input type="hidden" name="CargoFlag" value="{{ $pInfo->CargoFlag }}">
            <input type="hidden" name="StoreID" value="{{ $pInfo->StoreID }}">
            <input type="hidden" name="StoreName" value="{{ $pInfo->StoreName }}">
            <input type="hidden" name="BuyerCid" value="{{ $pInfo->BuyerCid }}">
            <input type="hidden" name="DonationCode" value="{{ $pInfo->DonationCode }}">
            <input type="hidden" name="Carrier_ID" value="{{ $pInfo->Carrier_ID }}">
            <input type="hidden" name="EDI" value="{{ $pInfo->EDI }}">
            <input type="hidden" name="ChkValue" value="{{ $pInfo->ChkValue[0] }}">
            <button class="submit2" type="submit" name="send">{{ __('orders.paid1') }}</button>
        </form>
    </div>
    <div id="suntech_atm" class="block paid" hidden><h2><b>{{ __('orders.atm') }}</b></h2>
         <form id="form2" name="form2" action="{{ $pInfo->paymentURL }}" method="POST">
            <input type="hidden" name="web" value="{{ $pInfo->web[1] }}">
            <input type="hidden" name="MN" value="{{ $pInfo->MN }}">
            <input type="hidden" name="OrderInfo" value="{{ $pInfo->OrderInfo }}">
            <input type="hidden" name="Td" value="{{ $pInfo->Td }}">
            <input type="hidden" name="sna" value="{{ $pInfo->sna }}">
            <input type="hidden" name="sdt" value="{{ $pInfo->sdt }}">
            <input type="hidden" name="email" value="{{ $pInfo->email }}">
            <input type="hidden" name="note1" value="{{ $pInfo->note1 }}">
            <input type="hidden" name="note2" value="{{ $pInfo->note2 }}">
            <input type="hidden" name="DueDate" value="{{ $pInfo->DueDate }}">
            <input type="hidden" name="UserNo" value="{{ $pInfo->UserNo }}">
            <input type="hidden" name="BillDate" value="{{ $pInfo->BillDate }}">
            <input type="hidden" name="ProductName1" value="{{ $pInfo->ProductName1 }}">
            <input type="hidden" name="ProductPrice1" value="{{ $pInfo->ProductPrice1 }}">
            <input type="hidden" name="ProductQuantity1" value="{{ $pInfo->ProductQuantity1 }}">
            <input type="hidden" name="AgencyType" value="2"/>
            <input type="hidden" name="AgencyBank" value="{{ $pInfo->AgencyBank }}"/>
            <input type="hidden" name="CargoFlag" value="{{ $pInfo->CargoFlag }}">
            <input type="hidden" name="StoreID" value="{{ $pInfo->StoreID }}">
            <input type="hidden" name="StoreName" value="{{ $pInfo->StoreName }}">
            <input type="hidden" name="BuyerCid" value="{{ $pInfo->BuyerCid }}">
            <input type="hidden" name="DonationCode" value="{{ $pInfo->DonationCode }}">
            <input type="hidden" name="Carrier_ID" value="{{ $pInfo->Carrier_ID }}">
            <input type="hidden" name="EDI" value="{{ $pInfo->EDI }}">
            <input type="hidden" name="ChkValue" value="{{ $pInfo->ChkValue[1] }}">
            <button class="submit2" type="submit" name="send">{{ __('orders.paid1') }}</button>
        </form>
    </div>
    <div id="suntech_creditcard" class="block paid" hidden><h2><b>{{ __('orders.creditcard') }}</b></h2>
         <form id="form3" name="form3" action="{{ $pInfo->paymentURL }}" method="POST">
            <input type="hidden" name="web" value="{{ $pInfo->web[2] }}">
            <input type="hidden" name="MN" value="{{ $pInfo->MN }}">
            <input type="hidden" name="OrderInfo" value="{{ $pInfo->OrderInfo }}">
            <input type="hidden" name="Td" value="{{ $pInfo->Td }}">
            <input type="hidden" name="sna" value="{{ $pInfo->sna }}">
            <input type="hidden" name="sdt" value="{{ $pInfo->sdt }}">
            <input type="hidden" name="email" value="{{ $pInfo->email }}">
            <input type="hidden" name="note1" value="{{ $pInfo->note1 }}">
            <input type="hidden" name="note2" value="{{ $pInfo->note2 }}">
            <input type="hidden" name="DueDate" value="{{ $pInfo->DueDate }}">
            <input type="hidden" name="UserNo" value="{{ $pInfo->UserNo }}">
            <input type="hidden" name="BillDate" value="{{ $pInfo->BillDate }}">
            <input type="hidden" name="ProductName1" value="{{ $pInfo->ProductName1 }}">
            <input type="hidden" name="ProductPrice1" value="{{ $pInfo->ProductPrice1 }}">
            <input type="hidden" name="ProductQuantity1" value="{{ $pInfo->ProductQuantity1 }}">
            <input type="hidden" name="Card_Type" value="{{ $pInfo->Card_Type }}">
            <input type="hidden" name="Country_Type" value="{{ $pInfo->Country_Type }}">
            <input type="hidden" name="Term" value="{{ $pInfo->Term }}">
            <input type="hidden" name="CargoFlag" value="{{ $pInfo->CargoFlag }}">
            <input type="hidden" name="StoreID" value="{{ $pInfo->StoreID }}">
            <input type="hidden" name="StoreName" value="{{ $pInfo->StoreName }}">
            <input type="hidden" name="BuyerCid" value="{{ $pInfo->BuyerCid }}">
            <input type="hidden" name="DonationCode" value="{{ $pInfo->DonationCode }}">
            <input type="hidden" name="Carrier_ID" value="{{ $pInfo->Carrier_ID }}">
            <input type="hidden" name="EDI" value="{{ $pInfo->EDI }}">
            <input type="hidden" name="ChkValue" value="{{ $pInfo->ChkValue[2] }}">
            <button class="submit2" type="submit" name="send">{{ __('orders.paid1') }}</button>
        </form>
    </div>
    <div id="suntech_webatm" class="block paid" hidden><h2><b>{{ __('orders.webatm') }}</b></h2>
         <form id="form4" name="form4" action="{{ $pInfo->paymentURL }}" method="POST">
            <input type="hidden" name="web" value="{{ $pInfo->web[1] }}">
            <input type="hidden" name="MN" value="{{ $pInfo->MN }}">
            <input type="hidden" name="OrderInfo" value="{{ $pInfo->OrderInfo }}">
            <input type="hidden" name="Td" value="{{ $pInfo->Td }}">
            <input type="hidden" name="sna" value="{{ $pInfo->sna }}">
            <input type="hidden" name="sdt" value="{{ $pInfo->sdt }}">
            <input type="hidden" name="email" value="{{ $pInfo->email }}">
            <input type="hidden" name="note1" value="{{ $pInfo->note1 }}">
            <input type="hidden" name="note2" value="{{ $pInfo->note2 }}">
            <input type="hidden" name="CargoFlag" value="{{ $pInfo->CargoFlag }}">
            <input type="hidden" name="StoreID" value="{{ $pInfo->StoreID }}">
            <input type="hidden" name="StoreName" value="{{ $pInfo->StoreName }}">
            <input type="hidden" name="BuyerCid" value="{{ $pInfo->BuyerCid }}">
            <input type="hidden" name="DonationCode" value="{{ $pInfo->DonationCode }}">
            <input type="hidden" name="Carrier_ID" value="{{ $pInfo->Carrier_ID }}">
            <input type="hidden" name="EDI" value="{{ $pInfo->EDI }}">
            <input type="hidden" name="ChkValue" value="{{ $pInfo->ChkValue[1] }}">
            <button class="submit2" type="submit" name="send">{{ __('orders.paid1') }}</button>
        </form>
    </div>
    <div id="suntech_paycode" class="block paid" hidden><h2><b>{{ __('orders.paycode') }}</b></h2>
         <form id="form5" name="form5" action="{{ $pInfo->paymentURL }}" method="POST">
            <input type="hidden" name="web" value="{{ $pInfo->web[3] }}">
            <input type="hidden" name="MN" value="{{ $pInfo->MN }}">
            <input type="hidden" name="OrderInfo" value="{{ $pInfo->OrderInfo }}">
            <input type="hidden" name="Td" value="{{ $pInfo->Td }}">
            <input type="hidden" name="sna" value="{{ $pInfo->sna }}">
            <input type="hidden" name="sdt" value="{{ $pInfo->sdt }}">
            <input type="hidden" name="email" value="{{ $pInfo->email }}">
            <input type="hidden" name="note1" value="{{ $pInfo->note1 }}">
            <input type="hidden" name="note2" value="{{ $pInfo->note2 }}">
            <input type="hidden" name="DueDate" value="{{ $pInfo->DueDate }}">
            <input type="hidden" name="UserNo" value="{{ $pInfo->UserNo }}">
            <input type="hidden" name="BillDate" value="{{ $pInfo->BillDate }}">
            <input type="hidden" name="CargoFlag" value="{{ $pInfo->CargoFlag }}">
            <input type="hidden" name="StoreID" value="{{ $pInfo->StoreID }}">
            <input type="hidden" name="StoreName" value="{{ $pInfo->StoreName }}">
            <input type="hidden" name="BuyerCid" value="{{ $pInfo->BuyerCid }}">
            <input type="hidden" name="DonationCode" value="{{ $pInfo->DonationCode }}">
            <input type="hidden" name="Carrier_ID" value="{{ $pInfo->Carrier_ID }}">
            <input type="hidden" name="EDI" value="{{ $pInfo->EDI }}">
            <input type="hidden" name="ChkValue" value="{{ $pInfo->ChkValue[3] }}">
            <button class="submit2" type="submit" name="send">{{ __('orders.paid1') }}</button>
        </form>
    </div>

</div>
