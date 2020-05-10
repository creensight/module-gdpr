<?php
/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

namespace CreenSight\GDPR\Block\Address;

use Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\Address\Mapper;
use Magento\Customer\Block\Address\Grid as AddressesGrid;
use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Address\Config as AddressConfig;
use Magento\Customer\Block\Address\Book as AddressBook;
use CreenSight\GDPR\Model\Helper\ConfigProvider;

/**
 * Customer address book block
 */
class Book extends AddressBook
{
    /**
     * @var ConfigProvider
     */
    private $configProvider;

    /**
     * @param Context $context
     * @param CustomerRepositoryInterface|null $customerRepository
     * @param AddressRepositoryInterface $addressRepository
     * @param CurrentCustomer $currentCustomer
     * @param AddressConfig $addressConfig
     * @param Mapper $addressMapper
     * @param ConfigProvider $configProvider
     * @param array $data
     * @param AddressesGrid|null $addressesGrid
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function __construct(
        Context $context,
        CustomerRepositoryInterface $customerRepository = null,
        AddressRepositoryInterface $addressRepository,
        CurrentCustomer $currentCustomer,
        AddressConfig $addressConfig,
        Mapper $addressMapper,
        ConfigProvider $configProvider,
        array $data = [],
        AddressesGrid $addressesGrid = null
    ) {
        $this->configProvider = $configProvider;
        parent::__construct($context, $customerRepository, $addressRepository, $currentCustomer, $addressConfig, $addressMapper, $data, $addressesGrid);
    }

    /**
     * @param null $storeId
     * @return bool
     */
    public function allowDeleteDefaultAddress()
    {
        return $this->configProvider->execute(ConfigProvider::XML_PATH_CUSTOMER_ADDRESS_ALLOW_DELETE_ADDRESS);
    }
}
