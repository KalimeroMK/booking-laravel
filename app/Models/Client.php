<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Client newModelQuery()
 * @method static Builder|Client newQuery()
 * @method static Builder|Client query()
 * @method static Builder|Client whereCreatedAt($value)
 * @method static Builder|Client whereEmail($value)
 * @method static Builder|Client whereId($value)
 * @method static Builder|Client whereImage($value)
 * @method static Builder|Client whereName($value)
 * @method static Builder|Client wherePhone($value)
 * @method static Builder|Client whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Client extends Model
{
    protected $guarded = [];
}
