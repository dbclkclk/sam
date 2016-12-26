<?php

namespace App\Jobs;

use App\Models\Mo;

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
    public function handle(BaseRepository $repository)
    {
        $result = $this->get_auth_token($this->moModel);
        $this->moModel->auth_token = $result;
        $repository->create($this->moModel->toArray());
    }
    private function get_auth_token(Mo $model) {
            $path = base_path();
            $arg = json_encode($model->toArray());
            return resource_path().`/bash/registermo $arg`;
    }
}
