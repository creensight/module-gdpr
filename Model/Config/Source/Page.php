<?php
/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

namespace CreenSight\GDPR\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Magento\Cms\Model\ResourceModel\Page\CollectionFactory as PageCollectionFactory;
use Magento\Cms\Model\Page as CmsPage;

class Page implements ArrayInterface
{
    /**
     * @var PageCollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var array
     */
    protected $options;

    /**
     * @param PageCollectionFactory $collectionFactory
     */
    public function __construct(
        PageCollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * To option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        if(!$this->options) {
            $this->options = [['value' => '','label' => __('--Please Select--')]];

            $collection =  $this->collectionFactory->create();
            $collection->addFieldToFilter('is_active', CmsPage::STATUS_ENABLED);

            foreach ($collection as $page) {
                $value = $page->getData('identifier');
                if ($value != 'home') {
                    $this->options[] = [
                        'value' => $value,
                        'label' => $page->getData('title')
                    ];
                }
            }
        }
        
        return $this->options;
    }
}
