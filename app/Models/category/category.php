<?php
 
namespace App\Models\category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'priority',
        'slug'
    ];
     
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}