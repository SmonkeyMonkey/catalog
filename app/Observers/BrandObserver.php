<?php

namespace App\Observers;

use App\Brand;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class BrandObserver
{

    /**
     * Handle the brand "created" event.
     *
     * @param \App\Brand $brand
     * @return void
     */
    public function created(Brand $brand)
    {
        //
    }

    public function creating(Brand $brand)
    {
    }

    /**
     * Handle the brand "updated" event.
     *
     * @param \App\Brand $brand
     * @return void
     */
    public function updated(Brand $brand)
    {

    }

    public function updating(Brand $brand)
    {
        $brand->updated_at = Carbon::now();
    }

    /**
     * Handle the brand "deleted" event.
     *
     * @param \App\Brand $brand
     * @return void
     */
    public function deleted(Brand $brand)
    {
        //
    }

    /**
     * Handle the brand "restored" event.
     *
     * @param \App\Brand $brand
     * @return void
     */
    public function restored(Brand $brand)
    {
        //
    }

    /**
     * Handle the brand "force deleted" event.
     *
     * @param \App\Brand $brand
     * @return void
     */
    public function forceDeleted(Brand $brand)
    {
        //
    }

}
