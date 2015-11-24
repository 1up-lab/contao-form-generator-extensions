<?php

namespace Oneup\Contao\FormGeneratorExtensions\EventListener;

use Contao\Config;
use Contao\StringUtil;

class FormListener
{
    public function onPrepare(&$arrSubmitted, $arrLabels, $objForm)
    {
        if ('' !== $objForm->sender) {
            $GLOBALS['TL_ADMIN_EMAIL'] = $objForm->sender;
        }

        if ('' !== $objForm->senderName) {
            $GLOBALS['TL_ADMIN_NAME'] = $objForm->senderName;
        }
    }

    public function onProcess($arrPost, $arrForm, $arrFiles)
    {
        global $objPage;

        if ($objPage->adminEmail !== ''){
            list($GLOBALS['TL_ADMIN_NAME'], $GLOBALS['TL_ADMIN_EMAIL']) = StringUtil::splitFriendlyEmail($objPage->adminEmail);
        } else {
            list($GLOBALS['TL_ADMIN_NAME'], $GLOBALS['TL_ADMIN_EMAIL']) = StringUtil::splitFriendlyEmail(Config::get('adminEmail'));
        }
    }
}
