<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->verifyAccess();
    }

    public function verifyAccess()
    {
        $local_token = env('FACBOOK_MESSENGER_WEBHOOK_TOKEN');
        $hub_verify_token = request('hub_verify_token');

        if ($hub_verify_token === $local_token) {
            echo request('hub_challenge');
            exit;
        }
    }
}
