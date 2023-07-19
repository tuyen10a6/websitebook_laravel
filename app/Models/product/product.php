<?php
 
namespace App\Models\product;

use App\Models\bookcover\Bookcover;
use App\Models\category\category;
use App\Models\provider\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    
    protected $table = 'products';
    
    const PRODUCT_STATUS_IS_ACTIVE = 1;

    const PRODUCT_STATUS_IS_INACTIVE = 0;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'imagedefault',
        'price',
        'priceone',
        'category_id',
        'bookcover_id',
        'quantity',
        'describe',
        'page',
        'publishingyear',
        'size',
        'weight',
        'provider_id',
        'status'
    ];
      
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
   
    public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}

    public function bookcover(): BelongsTo
    {
        return $this->belongsTo(Bookcover::class);
    }


}