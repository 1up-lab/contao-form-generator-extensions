<?php

namespace Oneup\Contao\FormGeneratorExtensions\EventListener;

use Contao\Config;

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
            list($GLOBALS['TL_ADMIN_NAME'], $GLOBALS['TL_ADMIN_EMAIL']) = $this->splitFriendlyEmail($objPage->adminEmail);
        } else {
            list($GLOBALS['TL_ADMIN_NAME'], $GLOBALS['TL_ADMIN_EMAIL']) = $this->splitFriendlyEmail(Config::get('adminEmail'));
        }
    }

    protected function splitFriendlyEmail($email)
    {
        // Use StringUtil class when used Contao version is minimum 3.5.1
        // see https://github.com/contao/core-bundle/issues/309
        if (version_compare(VERSION .'.'.BUILD, '3.5.1', '<')) {
            return \String::splitFriendlyEmail($email);
        } else {
            return \StringUtil::splitFriendlyEmail($email);
        }
    }
}
