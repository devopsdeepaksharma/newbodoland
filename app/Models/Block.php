<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable = [
        'block_name',
        'district_id'
    ];

    /**
     * Get the district that owns the Block
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }


    /**
     * Get all of the vcdcs for the Block
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function VillageCouncilDevelopmentCommittees(): HasMany
    {
        return $this->hasMany(VillageCouncilDevelopmentCommittee::class);
    }
}
