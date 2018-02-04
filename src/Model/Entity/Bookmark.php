<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bookmark Entity
 *
 * @property int $id
 * @property string $title
 * @property string $author
 *
 * @property \App\Model\Entity\Keyword[] $keywords
 * @property \App\Model\Entity\Tag[] $tags
 */
class Bookmark extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    //税込価格の取得
    public function getPriceWithTax(){
        $tax = 1.08;
        return ceil($this->genka * $tax);
    }
}
