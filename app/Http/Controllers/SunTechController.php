<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collections\SunTechCollection;
use App\Models\StReceive;
use App\Models\StPaid;

class SunTechController extends Controller
{
    //
    public function receive(Request $request)
    {
        $data = $request->all();

        $st = [
             'web'                 => $this->getPostData('web', $data),
             'buysafeno'           => $this->getPostData('buysafeno', $data),
             'user_no'             => $this->getPostData('UserNo', $data),
             'name'                => $this->getPostData('Name', $data),
             'td'                  => $this->getPostData('Td', $data),
             'mn'                  => $this->getPostData('MN', $data),
             'name'                => urldecode($this->getPostData('Name', $data)),
             'note1'               => urldecode($this->getPostData('note1', $data)),
             'note2'               => urldecode($this->getPostData('note2', $data)),
             'send_type'           => $this->getPostData('SendType', $data),
             'barcode_a'           => $this->getPostData('BarcodeA', $data),
             'barcode_b'           => $this->getPostData('BarcodeB', $data),
             'barcode_c'           => $this->getPostData('BarcodeC', $data),
             'post_barcode_a'      => $this->getPostData('PostBarcodeA', $data),
             'post_barcode_b'      => $this->getPostData('PostBarcodeB', $data),
             'post_barcode_c'      => $this->getPostData('PostBarcodeC', $data),
             'entity_atm'          => $this->getPostData('EntityATM', $data),
             'bank_code'           => $this->getPostData('BankCode', $data),
             'bank_name'           => $this->getPostData('BankName', $data),
             'pay_code'            => $this->getPostData('PayCode', $data),
             'pay_type'            => $this->getPostData('PayType', $data),
             'approve_code'        => $this->getPostData('ApproveCode', $data),
             'card_no'             => $this->getPostData('Card_NO', $data),
             'err_no'              => $this->getPostData('errcode', $data),
             'err_msg'             => urldecode($this->getPostData('errmsg', $data)),
             'card_type'           => $this->getPostData('Card_Type', $data),
             'invoice_no'          => $this->getPostData('InvoiceNo', $data),
             'cargo_no'            => $this->getPostData('CargoNo', $data),
             'store_id'            => $this->getPostData('StoreId', $data),
             'store_name'          => urldecode($this->getPostData('StoreName', $data)),
             'store_type'          => $this->getPostData('StoreType', $data),
             'store_msg'           => urldecode($this->getPostData('StoreMsg', $data)),
             'chk_value'           => $this->getPostData('ChkValue', $data),
             'status'              => $this->getPostData('status', $data),
        ];

        $str = StReceive::create($st);

        return view('suntechpayment.show', compact('str'));
    }

    public function paid(Request $request)
    {
        $data = $request->all();

        $st = [
             'web'                 => $this->getPostData('web', $data),
             'buysafeno'           => $this->getPostData('buysafeno', $data),
             'user_no'             => $this->getPostData('UserNo', $data),
             'name'                => $this->getPostData('Name', $data),
             'td'                  => $this->getPostData('Td', $data),
             'mn'                  => $this->getPostData('MN', $data),
             'name'                => urldecode($this->getPostData('Name', $data)),
             'note1'               => urldecode($this->getPostData('note1', $data)),
             'note2'               => urldecode($this->getPostData('note2', $data)),
             'pay_date'            => $this->getPostData('PayDate', $data),
             'pay_time'            => $this->getPostData('PayTime', $data),
             'pay_type'            => $this->getPostData('PayType', $data),
             'pay_agency'          => $this->getPostData('PayAgency', $data),
             'pay_agency_name'     => urldecode($this->getPostData('PayAgencyName', $data)),
             'pay_agency_tel'      => $this->getPostData('PayAgencyTel', $data),
             'pay_agency_address'  => urldecode($this->getPostData('PayAgencyAddress', $data)),
             'err_code'            => $this->getPostData('errcode', $data),
             'err_msg'             => urldecode($this->getPostData('errMsg', $data)),
             'invoice_no'          => $this->getPostData('InvoiceNo', $data),
             'cargo_no'            => $this->getPostData('CargoNo', $this),
             'store_id'            => $this->getPostData('StoreId', $this),
             'store_name'          => urldecode($this->getPostData('StoreName', $data)),
        ];

        $str = StPaid::create($st);

    }

    function getPostData($key, $data)
    {
       return array_key_exists($key, $data) ? $data[$key] : '';
    }

    /**
      * 檢查交易檢查碼是否正確（SHA1雜湊值）
     */
    function getChkValue($string)
    {
        return strtoupper(sha1($string));
    }

}

