<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsoProjectDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id', 'block_id', 'vcdc_id','village_count','household_count','hr_budget','admin_budget',
        'program_name','fund_source','user_id','project_id'
    ];
}
