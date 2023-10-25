<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerBasicDetails extends Model
{
    use HasFactory;

    protected $table = 'partner_basic_details';

    protected $fillable = [
        'org_head', 
        'org_name', 
        'org_contact_person', 
        'org_mobile', 
        'org_landline', 
        'org_address', 
        'org_email', 
        'org_state', 
        'org_district', 
        'org_pincode', 
        'org_website', 
        'user_id', 
        'created_by', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];


}
