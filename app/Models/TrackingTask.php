<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingTask extends Model {

    public $table = 'trackingtime_tasks';

    public function getDateAttribute() {
        $endDateFile = new \DateTime($this->attributes['date']);
        return $endDateFile->format('d/m/Y  h:i:s a');
    }

}
