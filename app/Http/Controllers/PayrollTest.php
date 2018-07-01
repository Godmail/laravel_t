<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/6/29
 * Time: 22:08
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PayrollTest extends  Controller{
    public function  payroll(){
        $payrolls=DB::connection('sqlsrv')
            ->table('his_dispathpayroll')
            ->get();
        dd($payrolls);
    }

}