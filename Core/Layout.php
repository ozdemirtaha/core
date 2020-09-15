<?php

namespace Core;

/**
 * Router
 *
 * PHP version 7.0
 */
class Layout
{

    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    static protected $layouts = [


        'Admin' => [
            'before' => [
                'header.php'
            ],
            'after' => [
                'footer.php'
            ]
        ],

        'Frontend' => [
            'before' => [
                'header.php'
            ],
            'after' => [
                'footer.php'
            ]
        ],


    ];


//    public function add($name, $arg)
//    {
//        $this->layouts[$name] = $arg;
//    }


    public static function getLayout($name)
    {
        return Layout::$layouts[$name];
    }



}
//
//$router = new Layout();
//$router->add('Admin', [
//    'before' => [
//        'header.php'
//    ],
//    'after' => [
//        'footer.php'
//    ]
//]);