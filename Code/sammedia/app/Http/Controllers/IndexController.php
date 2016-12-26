<?php

namespace App\Http\Controllers;
use App\Repositories\MoRepository;
use Illuminate\Http\Request;
use App\Models\Mo;
use App\Jobs\MoJob;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {

    }
    public function LogCode (Request $request)
    {
        $moModel = new Mo();
        $moModel->msisdn = $request->query("msisdn");
        $moModel->operatorid = $request->query("operatorid");
        $moModel->shortcodeid = $request->query("shortcodeid");
        $moModel->text = $request->query("text");

        $job = (new MoJob($moModel))->delay(Carbon::now()->addMinutes(1));
        $this->dispatch($job);


    }

}
