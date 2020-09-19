<?php

namespace Core;

/**
 * Router
 *
 * PHP version 7.0
 */
class Language
{
    public static $lang = [
        'tr' => [
            'login-page-form-title' => 'GİRİŞ YAPIN',
            'login-page-form-email-placeholder' => 'E-posta',
            'login-page-form-password-placeholder' => 'Şifre',
            'login-page-form-email-required-msg' => 'Lütfen geçerli bir e-posta adresi giriniz',
            'login-page-form-password-required-msg' => 'Lütfen şifrenizi giriniz',
        ],
        'en' => [
            'login-page-form-title' => 'Sign In',
            'login-page-form-email-placeholder' => 'Email',
            'login-page-form-password-placeholder' => 'Password',
            'login-page-form-email-required-msg' => 'Please enter a valid email',
            'login-page-form-password-required-msg' => 'Please enter your password',
        ]
    ];

    public static function lang($text, $language = 'tr')
    {
        if (isset(Language::$lang[$language][$text]) && !empty(isset(Language::$lang[$language][$text])))
        {
            return Language::$lang[$language][$text];
        }
        else
        {
            return 'Language Error';
        }
    }

}
