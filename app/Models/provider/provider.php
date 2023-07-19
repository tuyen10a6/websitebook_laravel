<?php
 
namespace App\Models\provider;

use App\Models\product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    
    protected $table = 'providers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'adress',
        'phone',
        'email',
        'status'
    ];
      

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


}