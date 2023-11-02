<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $primaryKey = "n_cat_id";
    protected $fillable = [
        'n_cat_name',
    ];
}
