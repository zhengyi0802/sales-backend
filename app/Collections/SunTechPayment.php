<?php

namespace App\Collections;

use App\Models\Order;
use App\Models\Member;
use App\Models\User;

class SunTechPayment
{

    public $web=array(4);
    public $MN;
    public $OrderInfo;
    public $Td;
    public $sna;
    public $sdt;
    public $email;
    public $note1;
    public $note2;
    public $DueDate;
    public $UserNo;
    public $BillDate;
    public $ProductName1;
    public $ProductPrice1;
    public $ProductQuantity1;
    public $AgencyType;
    public $AgencyBank;
    public $CargoFlag;
    public $StoreID;
    public $StoreName;
    public $BuyerCid;
    public $DonationCode;
    public $Carrier_ID;
    public $EDI;
    public $ChkValue=array(4);

    // Credit Card/Union Pay
    public $Card_Type;
    public $Country_Type;
    public $Term;

    public $isProduction;
    public $paymentURL;

    private $merchantID=array(4);
    private $transPassword;
    private $bankID;
    private $EDI_Name;
    private $EDI_Tel;
    private $EDI_Address;
    private $EDI_Size;
    private $EDI_Type;

    public function __construct(Order $order, $amount, $pflag = 1) {
        $this->merchantID[0] = env('MERCHANTID_24PAYMENT');
        $this->merchantID[1] = env('MERCHANTID_ATM');
        $this->merchantID[2] = env('MERCHANTID_CREDITCARD');
        $this->merchantID[3] = env('MERCHANTID_PAYCODE');
        $this->transPassword = env('TRANSPASSWORD');
        $this->isProduction = env('ISPRODUCTION');
        $this->web[0] = $this->merchantID[0];
        $this->web[1] = $this->merchantID[1];
        $this->web[2] = $this->merchantID[2];
        $this->web[3] = $this->merchantID[3];
        $this->MN  = $amount;
        $this->OrderInfo = ($order->model == 1) ? '75吋大電視36期月繳999元專案' : '65吋大電視36期月繳799元專案';
        $this->Td = $order->id;
        $this->sna = $order->member->user->name;
        $this->sdt = $order->phone;
        $this->email = $order->member->user->email;
        $this->note1 = '3500元訂金抵電視安裝費';
        $this->note2 = '';
        $this->DueDate = date('Ymd', strtotime("+7 days"));
        $this->UserNo = sprintf('M23%07d', $order->member_id);
        $this->BillDate = date('Ymd');
        $this->ProductName1 = ($order->model == 1) ? '75吋大電視36期月繳999元專案' : '65吋大電視36期月繳799元專案';
        $this->ProductName1 .= ($pflag == 1) ? '訂金' : '押金';
        $this->ProductPrice1 = $amount;
        $this->ProductQuantity1 = 1;
        $this->AgencyType = '';
        $this->AgencyBank = '';
        $this->CargoFlag = '';
        $this->StoreID = '';
        $this->StoreName = '';
        $this->BuyerCid = '';
        $this->DonationCode = '';
        $this->Carrier_ID = '';

        $this->Card_Type = '';
        $this->Country_Type = '';
        $this->Term = '';

        $EDI_array = array(
            'EDI_Name'        => $this->EDI_Name,
            'EDI_Tel'         => $this->EDI_Tel,
            'EDI_Address'     => $this->EDI_Address,
            'EDI_Size'        => $this->EDI_Size,
            'EDI_Type'        => $this->EDI_Type
        );
        $this->EDI = $this->encrypt(json_encode($EDI_array), $this->transPassword); //加密
        $this->ChkValue[0] = $this->getChkValue($this->web[0].$this->transPassword.$this->MN); //交易檢查碼（SHA1雜湊值並轉成大寫）
        $this->ChkValue[1] = $this->getChkValue($this->web[1].$this->transPassword.$this->MN); //交易檢查碼（SHA1雜湊值並轉成大寫）
        $this->ChkValue[2] = $this->getChkValue($this->web[2].$this->transPassword.$this->MN); //交易檢查碼（SHA1雜湊值並轉成大寫）
        $this->ChkValue[3] = $this->getChkValue($this->web[3].$this->transPassword.$this->MN); //交易檢查碼（SHA1雜湊值並轉成大寫）
        $this->paymentURL = ($this->isProduction) ? 'https://www.esafe.com.tw/Service/Etopm.aspx' : 'https://test.esafe.com.tw/Service/Etopm.aspx'; //傳送網址

    }

    /*
     * 檢查交易檢查碼是否正確（SHA1雜湊值）
     */
    private function getChkValue($string) {
        return strtoupper(sha1($string));
    }

    /**
      * 加密函數
      */
    private function encrypt($data, $key) {
	if (strlen($data) % 8) {
		$data = str_pad($data,strlen($data) + 8 - strlen($data) % 8, "\0");
	}

	$encData = openssl_encrypt($data, 'DES-EDE3', '1234567890' . substr($key, 0, 8) . '123456', OPENSSL_NO_PADDING);
	$encData = base64_encode($encData);
	return $encData;
    }

}
