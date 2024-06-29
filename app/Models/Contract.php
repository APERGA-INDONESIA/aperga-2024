<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        "generated_id",
        "talent_id",
        "customer_id",
        "name",
        "address",
        "outside_address",
        "plan_number",
        "plan_type",
        "payment_type",
        "dp_amount",
        "amount",
        "note",
        "status",
        "document",
        "document_signed",
        "document_signed_at",
        "document_signed_by",
        "contact"
    ];

    public function talent(){
        return $this->belongsTo(Talent::class);
    }
}
