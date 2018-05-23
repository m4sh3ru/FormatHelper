<?php

namespace M4sh3ru\FormatHelper;

use Illuminate\Support\ServiceProvider;

class FormatHelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include 'helper/format.php';
    }

    public function register()
    {
        //
    }
}
