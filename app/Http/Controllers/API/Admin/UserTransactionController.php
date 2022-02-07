<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\BaseController;
use App\Includes\Constant;
use App\Models\UserTransaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;


class UserTransactionController extends BaseController
{
    public function getUserTransaction(Request $request)
    {
        $transaction = UserTransaction::find($request->input('transaction_id'));

        $result = [
            'id' => $transaction->id,
            'title' => $transaction->id,
            'price' => $transaction->id,
            'pt' => $transaction->id,
            'prt' => $transaction->id,
            'value' => $transaction->id,
            'days' => $transaction->id,
            'portal' => $transaction->id,
            'redirect_url' => $transaction->id,
            'success' => $transaction->success,
            'order_no' => $transaction->order_no,
            'ref_id' => $transaction->ref_id,
        ];

        return $this->sendResponse(Constant::$SUCCESS, $result);
    }

    public function generateUserTransaction(Request $request){
        $transaction = new UserTransaction();
        $transaction->order_no = $this->getOrderNo();
        $transaction->title = $request->query('title'); //$this->generateTransactionTitle($pt, $prt, $value, $days);
        $transaction->price = $request->query('price');
        $transaction->pt = $request->query('pt');
        $transaction->prt = $request->query('prt');
        $transaction->value = $request->query('value');
        $transaction->days = $request->query('days');
        $transaction->portal = $request->query('portal');
        $transaction->redirect_url = $request->query('redirect_url');
        $transaction->save();

        $result = [
            'id' => $transaction->id,
            'title' => $transaction->id,
            'price' => $transaction->id,
            'pt' => $transaction->id,
            'prt' => $transaction->id,
            'value' => $transaction->id,
            'days' => $transaction->id,
            'portal' => $transaction->id,
            'redirect_url' => $transaction->id,
            'success' => $transaction->success,
            'order_no' => $transaction->order_no,
            'ref_id' => $transaction->ref_id,
        ];

        return $this->sendResponse(Constant::$SUCCESS, $result);
    }

    public function payForProduct(Request $request)
    {
        $transaction = UserTransaction::find($request->query('transaction_id'));
        $invoice = (new Invoice)->amount($transaction->price);

        return Payment::via($transaction->portal)
                ->callbackUrl(route('user-product-pay-done', 
                    [
                     'tenant' => $request->input('user')->tenant_id, 
                     'token' => $request->input('user')->token,
                     'transaction_id' => $transaction->id,
                    ]
                ))->purchase($invoice, function($driver, $transaction_id) use($transaction,$invoice){

            $transaction->uuid = $invoice->getUuid();
            $transaction->invoice_transaction_id = $transaction_id;
            $transaction->save();

        })->pay()->render();
    }

    public function payForProductIsDone(Request $request)
    {
        $transaction = UserTransaction::find($request->query('transaction_id'));

        if ($transaction) {
            try{
                $receipt = Payment::amount($transaction->price)->transactionId($transaction->ref_id)->verify();
                $transaction->ref_id = $receipt->getReferenceId();
                $transaction->success = 1;
                $transaction->save();

                // apply transaction result
                $profile = $request->user->u_profile;
                $this->setProduct($transaction, $profile);                
            }catch(Exception $e){
                $transaction->success = 0;
                $transaction->error_msg = $e->getMessage();
                $transaction->save();
            }
        }else {
            return "TRANSACTION NOT FOUND";
        }

        return Redirect::to(
            $transaction->redirect_url 
            . '/?transaction_id=' . $transaction->id 
            . '&tenant=' 
            . $request->user->tenant_id);
    }

    private function getOrderNo()
    {
        if (UserTransaction::count() > 0)
            return UserTransaction::max('order_no') + 1;
        else
            return 111111;
    }

    private function generateTransactionTitle($pt, $prt, $value, $days)
    {
        $title = "خرید";
        if ($pt == Constant::$PT_INCREMENTAL) {
            if ($prt == Constant::$PRT_SMS)
                $title = "{$value} تومان اعتبار ارسال پیامک";
            else if ($prt == Constant::$PRT_MAINTENANCE)
                $title = "{$value} تومان اعتبار نگهداری";
            else if ($prt == Constant::$PRT_TEST)
                $title = "بسته {$value} عددی برگزاری آزمون";
        } else if ($pt == Constant::$PT_ACTIVATION) {
            if ($prt == Constant::$PRT_TEST)
                $title = "بسته {$days} روزه برگزاری آزمون";
        }

        return $title;
    }

    private function setProduct($transaction, $profile)
    {
        if ($transaction->pt == Constant::$PT_INCREMENTAL) {
            if ($transaction->prt == Constant::$PRT_SMS)
                $profile->s_balance += $transaction->value;
            else if ($transaction->prt == Constant::$PRT_MAINTENANCE)
                $profile->m_balance += $transaction->value;
            else if ($transaction->prt == Constant::$PRT_TEST)
                $profile->holdable_test_count += $transaction->value;
        } else if ($transaction->pt == Constant::$PT_ACTIVATION) {
            if ($transaction->prt == Constant::$PRT_TEST)
                $profile->infinit_test_finish_date = Carbon::now()->addDays($transaction->days);
        }

        $profile->save();
    }
}
