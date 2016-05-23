<?php

class Voorstelling extends Model {
    public $validate = array(
        'voorstellingsnaam' => array(
            'rule' => 'notBlank'
        ),
        'voorstellingsjaar' => array(
            'rule' => 'notBlank'
        ),
        'acteurs' => array(
            'rule' => 'notBlank'
        ),
        'korteinhoud' => array(
            'rule' => 'notBlank'
        ),
        'regie' => array(
            'rule' => 'notBlank'
        ),
        'auteur' => array(
            'rule' => 'notBlank'
        )
    );
    
}