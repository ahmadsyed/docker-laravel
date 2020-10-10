<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use FFMpeg;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** file duration validation  'video:25' */
        Validator::extend('file_length', function($attribute, $value, $parameters, $validator) {

            // validate the file extension
            if(!empty($value->getClientOriginalExtension())){

                $ffprobe = FFMpeg\FFProbe::create([
                    'ffmpeg.binaries'  => exec('which ffmpeg'),
                    'ffprobe.binaries' => exec('which ffprobe')
                ]);
                $duration = $ffprobe
                    ->format($value->getRealPath()) // extracts file information
                    ->get('duration');
                return(round($duration) > $parameters[0]) ?false:true;
            }else{
                return false;
            }
        });
    }
}
