<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Spatie\Activitylog\Contracts\Activity as ActivityContract;

class ActivityLog extends Model
{
    /**
     * @var string
     */
    public $table = 'activity_log';

    /**
     * @var array
     */
    protected $fillable = [
        'subject_id',
        'subject_type',
        'causer_id',
        'causer_type',
        'properties',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @param string|null $value
     *
     * @return mixed
     */
    public function getCauserIdAtAttribute(string $value = null)
    {
        return $this->attributes['causer_id'] = $this->getCauserIdAtAttribute();
    }

    /**
     * @param string|null $value
     *
     * @return string|null
     */
    public function getCreatedAtAttribute(string $value = null): ?string
    {
        return $this->attributes['created_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

    /**
     * @param string|null $value
     *
     * @return string|null
     */
    public function getUpdatedAtAttribute(string $value = null): ?string
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

}
