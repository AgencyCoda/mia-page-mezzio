<?php

namespace Mia\Page\Model;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $title Description for variable
 * @property mixed $slug Description for variable
 * @property mixed $data Description for variable
 * @property mixed $seo_title Description for variable
 * @property mixed $seo_keywords Description for variable
 * @property mixed $seo_description Description for variable
 * @property mixed $status Description for variable
 * @property mixed $visibility Description for variable
 * @property mixed $published_date Description for variable
 * @property mixed $is_archive Description for variable
 * @property mixed $last_updated_user Description for variable
 * @property mixed $created_at Description for variable
 * @property mixed $updated_at Description for variable
 * @property mixed $deleted Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="slug",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="data",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="seo_title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="seo_keywords",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="seo_description",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="status",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="visibility",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="published_date",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="is_archive",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="last_updated_user",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="created_at",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="updated_at",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="deleted",
 *  type="integer",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class MiaPage extends \Illuminate\Database\Eloquent\Model
{
    use \RecursiveRelationships\Traits\HasRecursiveRelationships;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    const VISIBILITY_NOT_PUBLIC = 0;
    const VISIBILITY_PUBLIC = 1;

    protected $table = 'mia_page';
    
    protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;

    /**
    * Configurar un filtro a todas las querys
    * @return void
    */
    protected static function boot(): void
    {
        parent::boot();
        
        static::addGlobalScope('exclude', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->where('mia_page.deleted', 0);
        });
    }
}