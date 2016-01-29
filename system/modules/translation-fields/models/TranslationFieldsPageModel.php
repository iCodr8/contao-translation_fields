<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2014 Leo Feyer
 *
 * @package    translation-fields
 * @author     Daniel Kiesel <daniel@craffft.de>
 * @license    LGPL
 * @copyright  Daniel Kiesel 2013-2016
 */

/**
 * Namespace
 */
namespace TranslationFields;

/**
 * Class TranslationFieldsPageModel
 *
 * @copyright  Daniel Kiesel 2013-2016
 * @author     Daniel Kiesel <daniel@craffft.de>
 * @package    translation-fields
 */
class TranslationFieldsPageModel extends \Model
{
    /**
     * strTable
     *
     * @var string
     * @access protected
     * @static
     */
    protected static $strTable = 'tl_page';

    /**
     * findRootPages function.
     *
     * @access public
     * @static
     * @param array
     * @return object
     */
    public static function findRootPages(array $arrOptions = array())
    {
        $t = static::$strTable;
        $arrColumns = array("$t.type=?");
        $arrValues = array('root');

        if (!isset($arrOptions['order'])) {
            $arrOptions['order'] = "$t.fallback DESC, $t.sorting ASC";
        }

        return static::findBy($arrColumns, $arrValues, $arrOptions);
    }
}
