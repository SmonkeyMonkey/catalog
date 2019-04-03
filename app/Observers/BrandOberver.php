<?php

namespace App\Observers;

use App\Brand;

class BrandOberver
{
    /**
     * Handle the brand "created" event.
     *
     * @param  \App\Brand  $brand
     * @return void
     */
    public function created(Brand $brand)
    {
        //
    }
    public function creating(Brand $brand){
        dd(__METHOD__,$brand->getAttribute('is_published'));
    }
    /**
     * Handle the brand "updated" event.
     *
     * @param  \App\Brand  $brand
     * @return void
     */
    public function updated(Brand $brand)
    {
        //
    }
    public function updating(Brand $brand){
        dd(__METHOD__,$brand->getAttribute('is_published'));

    }
    /**
     * Handle the brand "deleted" event.
     *
     * @param  \App\Brand  $brand
     * @return void
     */
    public function deleted(Brand $brand)
    {
        //
    }

    /**
     * Handle the brand "restored" event.
     *
     * @param  \App\Brand  $brand
     * @return void
     */
    public function restored(Brand $brand)
    {
        //
    }

    /**
     * Handle the brand "force deleted" event.
     *
     * @param  \App\Brand  $brand
     * @return void
     */
    public function forceDeleted(Brand $brand)
    {
        //
    }
    public function setPublished(Brand $brand){
        if($brand->is_published != null){
            return 'ok';
        }
        return 'f';
    }
}
