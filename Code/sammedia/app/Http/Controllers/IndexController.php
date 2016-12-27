<?php

namespace App\Http\Controllers;
use App\Repositories\MoRepository;
use Illuminate\Http\Request;
use App\Models\Mo;
use App\Jobs\MoJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        $moModel = new Mo;
        $moModel->msisdn = $request->query("msisdn");
        $moModel->operatorid = $request->query("operatorid");
        $moModel->shortcodeid = $request->query("shortcodeid");
        $moModel->text = $request->query("text");
        $moModel->save();

        $job = new MoJob($moModel);
    //     Log::debug(time()." Start Time");
        $this->dispatch($job);
    //    Log::debug(time()."End Time");


    }

}
