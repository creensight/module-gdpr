<?php
/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

namespace CreenSight\GDPR\Model\Helper;

use CreenSight\Core\Model\Helper\ConfigProvider as CoreConfigProvider;

/**
 * Class ConfigProvider
 * @package CreenSight\GDPR\Model\Helper
 */
class ConfigProvider
{
    /**
     * @var string [Customer Configuration]
     */
    const XML_PATH_CUSTOMER_ACCOUNT_ALLOW_DELETE_CUSTOMER = 'gdpr/customer/account/allow_delete_customer';
    const XML_PATH_CUSTOMER_ACCOUNT_DELETE_CUSTOMER_MESSAGE = 'gdpr/customer/account/delete_customer_message';
    const XML_PATH_CUSTOMER_ADDRESS_ALLOW_DELETE_ADDRESS = 'gdpr/customer/address/allow_delete_default_address';

    /**
     * @var string [Cookie Notice (General) Configuration]
     */
    const XML_PATH_COOKIE_NOTICE_GENERAL_ENABLED = 'gdpr/cookie_notice/general/enabled';
    const XML_PATH_COOKIE_NOTICE_GENERAL_HIDE_MESSAGE = 'gdpr/cookie_notice/general/hide_message';
    const XML_PATH_COOKIE_NOTICE_GENERAL_POSITION = 'gdpr/cookie_notice/general/position';

    /**
     * @var string [Cookie Notice (Message) Configuration]
     */
    const XML_PATH_COOKIE_NOTICE_MESSAGE_TITLE = 'gdpr/cookie_notice/notice_message/title';
    const XML_PATH_COOKIE_NOTICE_MESSAGE_COLOR = 'gdpr/cookie_notice/notice_message/color';
    const XML_PATH_COOKIE_NOTICE_MESSAGE_CONTENT = 'gdpr/cookie_notice/notice_message/content';
    const XML_PATH_COOKIE_NOTICE_MESSAGE_CONTENT_COLOR = 'gdpr/cookie_notice/notice_message/content_color';
    const XML_PATH_COOKIE_NOTICE_MESSAGE_BACKGROUND = 'gdpr/cookie_notice/notice_message/background';

    /**
     * @var string [Cookie Notice (Accept Button) Configuration]
     */
    const XML_PATH_COOKIE_NOTICE_ACCEPT_BUTTON_TEXT = 'gdpr/cookie_notice/accept_button/text';
    const XML_PATH_COOKIE_NOTICE_ACCEPT_BUTTON_COLOR = 'gdpr/cookie_notice/accept_button/color';
    const XML_PATH_COOKIE_NOTICE_ACCEPT_BUTTON_BACKGROUND = 'gdpr/cookie_notice/accept_button/background';

    /**
     * @var string [Cookie Notice (More Information) Configuration]
     */
    const XML_PATH_COOKIE_NOTICE_MORE_INFO_BUTTON_TEXT = 'gdpr/cookie_notice/more_info_button/text';
    const XML_PATH_COOKIE_NOTICE_MORE_INFO_BUTTON_COLOR = 'gdpr/cookie_notice/more_info_button/color';
    const XML_PATH_COOKIE_NOTICE_MORE_INFO_BUTTON_BACKGROUND = 'gdpr/cookie_notice/more_info_button/background';
    const XML_PATH_COOKIE_NOTICE_MORE_INFO_BUTTON_CMS_PAGE = 'gdpr/cookie_notice/more_info_button/cms_page';

    /**
     * @var string [Cookie Notice (Custom Style) Configuration]
     */
    const XML_PATH_COOKIE_NOTICE_CUSTOM_STYLE_CSS = 'gdpr/cookie_notice/custom_style/css';

    /**
     * @var CoreConfigProvider
     */
    protected $configProvider;

    /**
     * ConfigProvider constructor.
     *
     * @param CoreConfigProvider $configProvider
     */
    public function __construct(
        CoreConfigProvider $configProvider
    ) {
        $this->configProvider = $configProvider;
    }

    /**
     * @param string $path
     * @param number $storeId
     * @return mixed
     */
    public function execute($path, $storeId = null)
    {
        return $this->configProvider->execute($path, $storeId);
    }
}
