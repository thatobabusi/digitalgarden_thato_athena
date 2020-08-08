<?php

namespace App\Models\System;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemPageMetaData extends Model
{
    use SoftDeletes, Cachable;

    /**
     * @var string
     */
    public $table = 'system_page_metadata';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'system_page_id',
        'title',
        'author',
        'robots',
        'keywords',
        'description',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function systemPage(): BelongsTo
    {
        return $this->belongsTo(SystemPage::class);
    }
}
