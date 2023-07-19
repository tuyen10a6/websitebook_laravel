<?php
 
namespace App\Models\bookcover;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookcover extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    
    protected $table = 'bookcovers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    
    ];
      

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


}