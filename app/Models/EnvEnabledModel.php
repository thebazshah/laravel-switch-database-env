<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnvEnabledModel extends Model
{
    public function __construct(array $attributes = [])
    {
        // don't forget to invoke your parent's functionality
        parent::__construct($attributes);
        // if we are authenticated, we can get user's model like this
        $user = auth()->user();

        // // if environment is set to env, it might be called from seeding function
        if (env('ALPHA_ENV', 'prod') === 'dev') {
            $this->setTable('dev_'.$this->getTable());
        }

        if ($user && $user->current_env === 'dev') {
            $this->setTable('dev_'.$this->getTable());
        }
    }
}
