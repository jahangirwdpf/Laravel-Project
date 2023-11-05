<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    use HasFactory;
    protected $primaryKey = "subcat_id";
    protected $fillable = ['subcat_name_en','subcat_name_bn'];
}
