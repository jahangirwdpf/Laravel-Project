<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $primaryKey = "cat_id";
    protected $fillable = ['cat_name_en','cat_name_bn'];
}
