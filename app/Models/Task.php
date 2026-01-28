<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasUuids;
//    /**
//     * The table associated with the model.
//     *
//     * @var string
//     */
//    protected $table = 'my_flights';

//    /**
//     * Indicates if the model's ID is auto-incrementing.
//     *
//     * @var bool
//     */
//    public $incrementing = false;

//    /**
//     * The data type of the primary key ID.
//     *
//     * @var string
//     */
//    protected $keyType = 'string';

    protected string $id;
    protected string $title;
    protected string $description;
    protected string $status;

    public function __construct(
        string $id,
        string $title,
        string $description,
        string $status,
    ) {
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
    }
}
