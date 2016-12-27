<?php

namespace App\Jobs;

use App\Models\Mo;
use Illuminate\Support\Facades\Log;
use Exception;

class MoJob extends Job
{

    private $moModel; 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Mo $model)
    {
        $this->moModel = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $result = $this->get_auth_token($this->moModel);
        $this->moModel->auth_token = $result;
        $this->moModel->save();
    }
    private function get_auth_token(Mo $model) {
            $path = base_path();
            $arg = json_encode($model->toArray());
            //Log::debug();
            return shell_exec(resource_path()."/bash/registermo $arg");
    }
    public function failed(Exception $exception)
    {
       Log::debug($exception);
    }
}
