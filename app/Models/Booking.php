<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Booking
 *
 * @property int $id
 * @property int $client_id
 * @property int $room_id
 * @property string $start_date
 * @property string $end_date
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Client $client
 * @property-read Room $room
 * @method static Builder|Booking newModelQuery()
 * @method static Builder|Booking newQuery()
 * @method static Builder|Booking query()
 * @method static Builder|Booking whereClientId($value)
 * @method static Builder|Booking whereCreatedAt($value)
 * @method static Builder|Booking whereEndDate($value)
 * @method static Builder|Booking whereId($value)
 * @method static Builder|Booking whereRoomId($value)
 * @method static Builder|Booking whereStartDate($value)
 * @method static Builder|Booking whereStatus($value)
 * @method static Builder|Booking whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Booking extends Model
{
    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
