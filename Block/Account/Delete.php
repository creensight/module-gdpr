<?php
/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

namespace CreenSight\GDPR\Block\Account;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use CreenSight\GDPR\Model\Helper\ConfigProvider;
use CreenSight\Core\Model\Helper\Json;

/**
 * Class Delete
 * @package CreenSight\GDPR\Block\Account
 */
class Delete extends Template
{
    /**
     * @var ConfigProvider
     */
    private $configProvider;

    /**
     * @var Json
     */
    private $json;

    /**
     * Delete constructor.
     *
     * @param Context $context
     * @param ConfigProvider $configProvider
     * @param Json $json
     * @param array $data
     */
    public function __construct(
        Context $context,
        ConfigProvider $configProvider,
        Json $json,
        array $data = []
    ) {
        $this->configProvider = $configProvider;
        $this->json = $json;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed|string
     */
    public function getDeleteAccountMessage()
    {
        $deleteAccountMessage = $this->configProvider->execute(ConfigProvider::XML_PATH_CUSTOMER_ACCOUNT_DELETE_CUSTOMER_MESSAGE);
        
        $defaultMassage = __('Your account will be permanently deleted. Once you delete your account, there is no going back. Please be certain.');

        return $deleteAccountMessage ?: $defaultMassage;
    }

    /**
     * @return bool
     */
    public function allowDeleteAccount()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_CUSTOMER_ACCOUNT_ALLOW_DELETE_CUSTOMER);
    }

    /**
     * @return string
     */
    public function getExtraData()
    {
        return $this->json->encode([]);
    }

    /**
     * @return string
     */
    public function getDeleteAccountUrl()
    {
        return $this->getUrl('customer/account/delete');
    }
}
