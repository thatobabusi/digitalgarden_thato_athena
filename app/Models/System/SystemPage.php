<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\System\SystemPage
 *
 * @property int $id
 * @property int $page_category_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\System\SystemPageCategory $systemPageCategory
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemPage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage wherePageCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemPage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemPage withoutTrashed()
 * @mixin \Eloquent
 */
class SystemPage extends Model
{
    use SoftDeletes;

    public $table = 'system_pages';

    /**
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    public function systemPageCategory()
    {
        return $this->belongsTo(SystemPageCategory::class);
    }
}