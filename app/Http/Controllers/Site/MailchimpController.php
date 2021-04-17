<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 17.04.2021 15:36
 */

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MailchimpMarketing;

class MailchimpController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'mail' => 'required|email',
        ]);

        $mailchimp = new MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('settings.mailchimp_token'),
            'server' => config('settings.mailchimp_prefix'),
        ]);

        $list_id = config('settings.mailchimp_list_id');

        $body = [
            "email_address" => $request->input('mail'),
            "status" => "subscribed",
        ];

        $response = $mailchimp->lists->addListMember($list_id, $body);

        return response()->json([
            'status' => 'success',
            'id' => $response->id
        ]);
    }
}
