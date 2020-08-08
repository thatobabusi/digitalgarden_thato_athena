<?php

namespace App\Models\System;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemPageSection extends Model
{
    use SoftDeletes, Cachable;

    public $table = 'system_page_sections';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'system_page_id',
        'title',
        'header',
        'subheader',
        'order',
        'body',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    public function systemPage(): BelongsTo
    {
        return $this->belongsTo(SystemPage::class);
    }
}
