<?php
/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

namespace CreenSight\GDPR\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use CreenSight\GDPR\Model\Config\Source\Position;
use CreenSight\GDPR\Model\Helper\ConfigProvider;

class CookieNotice extends Template
{
    /**
     * @var ConfigProvider
     */
    private $configProvider;

    /**
     * @param Context $context
     * @param ConfigProvider $configProvider
     * @param array $data
     */
    public function __construct(
        Context $context,
        ConfigProvider $configProvider,
        array $data = []
    ) {
        $this->configProvider = $configProvider;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve Cookie Notice Enable
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->configProvider->execute(
            ConfigProvider::XML_PATH_COOKIE_NOTICE_GENERAL_ENABLED);
    }

    /**
     * Get Auto Hide Message
     *
     * @return int
     */
    public function getHideMessage()
    {
        $miliseconds = $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_GENERAL_HIDE_MESSAGE);

        if(!isset($miliseconds) || $miliseconds == "")
            return 0;

        $seconds = $miliseconds * 1000;
        return $seconds;
    }

    /**
     * Get Position
     *
     * @return string
     */
    public function getPosition()
    {
        $position = $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_GENERAL_POSITION);
        switch ($position) {
            case Position::POSITION_BOTTOM_LEFT:
                return json_encode(
                    ['left' => '10px','bottom' => '10px']
                );
            case Position::POSITION_TOP_LEFT:
                return json_encode(
                    ['left' => '10px','top' => '10px']
                );
            case Position::POSITION_BOTTOM_RIGHT:
                return json_encode(
                    ['right' => '10px','bottom' => '10px']
                );
            case Position::POSITION_TOP_RIGHT:
                return json_encode(
                    ['right' => '10px','top' => '10px']
                );
        }
    }

    /**
     * Get Message Title
     *
     * @return string
     */
    public function getMessageTitle()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_MESSAGE_TITLE);
    }

    /**
     * Get Title Text Color
     *
     * @return string
     */
    public function getTitleColor()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_MESSAGE_COLOR);
    }

    /**
     * Get Message
     *
     * @return string
     */
    public function getMessageContent()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_MESSAGE_CONTENT);
    }

    /**
     * Get Message Text Color
     *
     * @return string
     */
    public function getContentColor()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_MESSAGE_CONTENT_COLOR);
    }

    /**
     * Get Background Color
     *
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_MESSAGE_BACKGROUND);
    }

    /**
     * Get Text Acceptance Button
     *
     * @return string
     */
    public function getAcceptButtonText()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_ACCEPT_BUTTON_TEXT);
    }

    /**
     * Get Text Color Acceptance Button
     *
     * @return string
     */
    public function getAcceptButtonColor()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_ACCEPT_BUTTON_COLOR);
    }

    /**
     * Get Background Color Acceptance Button
     *
     * @return string
     */
    public function getAcceptButtonBackgroundColor()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_ACCEPT_BUTTON_BACKGROUND);
    }

    /**
     * Get Text More Information Button
     *
     * @return string
     */
    public function getMoreInfoButtonText()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_MORE_INFO_BUTTON_TEXT);
    }

    /**
     * Get Text Color More Information Button
     *
     * @return string
     */
    public function getMoreInfoButtonColor()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_MORE_INFO_BUTTON_COLOR);
    }

    /**
     * Get Background Color More Information Button
     *
     * @return string
     */
    public function getMoreInfoButtonBackgroundColor()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_MORE_INFO_BUTTON_BACKGROUND);
    }

    /**
     * Get CMS Page
     *
     * @return string
     */
    public function getCMSPage()
    {
        $identifier = $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_MORE_INFO_BUTTON_CMS_PAGE);
        return $this->getUrl($identifier);
    }

    /**
     * Get Custom Css
     *
     * @return string
     */
    public function getCustomStyle()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_COOKIE_NOTICE_CUSTOM_STYLE_CSS);
    }
}
