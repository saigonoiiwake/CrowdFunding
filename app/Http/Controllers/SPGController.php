<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\ProjectEnroll;
use App\Project;
use App\ProjectPackage;
use App\User;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;
use MPG;

class SPGController extends Controller
{
    private $serverUrl = 'https://db540088.ngrok.io' ;
    //private $testServerIP = "13.231.184.188";
    
    // public function __construct()
    // {
    //     if (env('APP_ENV') === 'production') {
    //         $this->serverUrl = 'http://' . $this->testServerIP;
    //     }   else {
    //         $this->serverUrl = 'http://' . $this->testServerIP;
    //     }   
    // }
    
    public function pay(Request $request, $project_id, $package_id)
    {
        
        $package = ProjectPackage::findOrFail($package_id);
        $uid = auth()->user()->id;
       
        // Store transaction data into Table:transaction
        DB::beginTransaction();
        try {
            $transaction = Transaction::create([
                'user_id' => $uid,
                'package_id' => $package->id,
                'status' => Transaction::STATUS_PENDING,
                'amount' => $package->price,
                'method' => 'spgateway',
                'info' => 'pay',
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        // MerchantOrderNo shouldn't be too simple cause SPGateway any MerchantOrderNo will only accept once in one store, 
        // If someday we rollback or use a new table, row ids let's said begin from 0 will be already exist in SPGateway system and won't be accept anymore.
        // It already happened during testing, cause I connect to different DB after deploy to aws.
        // So I use $transaction->created_at . "_" . $transaction->id as MerchantOrderNo now to ensure that won't happen in the future.
        $MerchantOrderNo = date("YmdHis", strtotime($transaction->created_at)) . "_" . $transaction->id;

        // $mer_array = array(
        //     'MerchantID' => 'MS3117631225',
        //     'TimeStamp' => time(),
        //     'MerchantOrderNo'=>$MerchantOrderNo,
        //     'Amt' => $package->price,
        // );
        
        $params = array(
            'MerchantOrderNo' => $MerchantOrderNo,  
            // 'OrderComment' => $CheckValue,
            'ReturnURL' => $this->serverUrl . '/api/spg/return',
            'NotifyURL' => $this->serverUrl . '/api/spg/notify'
        );
    
        $order = MPG::generate(
            $package->price,
            auth()->user()->email,
            $package->title,
            $params
        );

        return $order->send();
        //return $order->getPostData();
    }

    // Spgateway payment NotifyURL callback
    public function notify(Request $request)
    {
        $tradeInfo = MPG::parse(request()->TradeInfo);
        $merchantOrderNo = explode("_", $tradeInfo->Result->MerchantOrderNo);
        $order_no = $merchantOrderNo[1];
    
        if($tradeInfo->Status == 'SUCCESS')
        { 
            DB::beginTransaction();
            try { 
                // Query Order
                $order = Transaction::where('id', $order_no)->first();
                $order->transaction_status = Transaction::STATUS_SUCCESS;
                $order->info = response()->json($tradeInfo);
                $order->save();
                // Update enroll number in Table: ProjectPackage
                $package = ProjectPackage::where('id', $order->package_id)->first();
                $uid = $order->user_id;
                $user = User::where('id', $uid)->first();
                $package->sponsor_count ++;
                $package->save();
                // Store into Table: enroll
                $enroll = ProjectEnroll::create([
                'package_id' => $package->id,
                'user_id' => $uid
                ]);
                
                // Mail order payment info
                // $data = array(
                // 'nick_name' => $user->nick_name,
                // 'course_name' => $course->title,
                // 'course_price' => $tradeInfo->Result->Amt,
                // 'from_date' => $course->from_date
                // );
                
                // Mail::to($user->email)->bcc('b816132@gmail.com')->send(new \App\Mail\PurchaseSuccessful($data));
                DB::commit();
            }catch (Exception $e) {
                DB::rollback();
                report($e);
                return false;
            }
            
        }else{
            DB::beginTransaction();
            try { 
                // Query Order
                $order = Transaction::where('id', $order_no)->first();
                $order->transaction_status = Transaction::STATUS_FAILED;
                $order->info = response()->json($tradeInfo);
                $order->save();
                DB::commit();
            }catch (Exception $e) {
                DB::rollback();
                report($e);
                return false;
            }
        }
    }
    // Spgateway payment ReturnURL callback
    public function return(Request $request)
    {
        $payment_result = request()->Status;
        $tradeInfo = MPG::parse(request()->TradeInfo);
        $order_no = $tradeInfo->Result->MerchantOrderNo;
        $order = Transaction::where('id', $order_no)->first();
        
        if($payment_result == 'SUCCESS')
        { 
            return redirect()->back();
        }else{
            //Session::flash('warning', '付款失敗，請至信箱確認');
            return redirect()->back();
        }
    }
    
}
