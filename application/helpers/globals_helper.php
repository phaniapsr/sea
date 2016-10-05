<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Phani Kumar.
 * Date: 10/1/2016
 * Time: 5:15 PM
 */
class GlobalsHelper
{
    public static $course_level_structure = null;
    public static $course_level_config_array = null;
    private static $initialized = false;

    private static function initialize()
    {
        if (self::$initialized)
            return;

        self::$course_level_structure =array(
            'ACMAS'=>array(
                'Subjunior'=>array(
                    'Level1',
                    'Level2'
                ),
                'Junior'=>array(
                    'Level1',
                    'Level2',
                    'Level3',
                    'Level4',
                    'Level5',
                    'Level6',
                ),
                'Senior'=>array(
                    'Level1',
                    'Level2',
                    'Level3',
                    'Level4',
                    'Level5',
                    'Level6',
                    'Level7',
                    'Level8',
                    'Level9',
                    'Level10',
                ),
            ),
            'IAA'=>array(
                'Junior'=>array(
                    'Level1',
                    'Level2',
                    'Level3',
                    'Level4',
                    'Level5',
                    'Level6',
                ),
                'Senior'=>array(
                    'Level1',
                    'Level2',
                    'Level3',
                    'Level4',
                    'Level5',
                    'Level6',
                    'Level7',
                    'Level8',
                ),
            ),
            'FUNMATHS'=>array(
                'Level1',
                'Level2',
                'Level3',
                'Level4',
            ),
            'WRITEASY',
        );
        self::$course_level_config_array =array(
            'SR_FEE'=>1,
            'KIT_FEE'=>array(
                'ACMAS'=>array(
                    'Level1'=>2,
                    'Level2'=>3,
                    'Level3'=>3,
                    'Level4'=>3,
                    'Level5'=>3,
                    'Level6'=>3,
                    'Level7'=>3,
                    'Level8'=>3,
                    'Level9'=>3,
                    'Level10'=>3
                ),
                'IAA'=>array(
                    'Level1'=>4,
                    'Level2'=>5,
                    'Level3'=>5,
                    'Level4'=>5,
                    'Level5'=>5,
                    'Level6'=>5,
                    'Level7'=>5,
                    'Level8'=>5
                ),
                'FUNMATHS'=>array(
                    'Level1'=>6,
                    'Level2'=>7,
                    'Level3'=>7,
                    'Level4'=>7,
                ),
                'WRITEASY'=>array(''=>8),
            ),
            'LEVEL_FEE'=>array(
                'ACMAS'=>9,
                'FUNMATHS'=>10,
                'WRITEASY'=>11,
                'IAA'=>12,
            ),
            'AC_FEE'=>13
        );
        self::$initialized = true;
    }
}