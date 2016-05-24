<?php

class Voorstelling extends Model {
    public $validate = array(
        'VoorstellingNaam' => array(
            'rule' => 'notBlank'
        ),
        'VoorstellingJaar' => array(
            'rule' => 'notBlank'
        ),
        'Acteurs' => array(
            'rule' => 'notBlank'
        ),
        'KorteInhoud' => array(
            'rule' => 'notBlank'
        ),
        'Regie' => array(
            'rule' => 'notBlank'
        ),
        'Auteur' => array(
            'rule' => 'notBlank'
        )
    );
    
}