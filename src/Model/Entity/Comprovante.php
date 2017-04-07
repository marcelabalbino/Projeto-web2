<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comprovante Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $boleto_id
 * @property int $recibo_id
 * @property \Cake\I18n\Time $vencimento
 * @property \Cake\I18n\Time $pagamento
 * @property bool $aproved
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\File $file
 */
class Comprovante extends Entity
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
}
