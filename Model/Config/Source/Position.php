<?php
/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

namespace CreenSight\GDPR\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Position implements ArrayInterface
{
    /**
     * @const Position
     */
    const POSITION_BOTTOM_LEFT = '0';
    const POSITION_TOP_LEFT = '1';
    const POSITION_BOTTOM_RIGHT = '2';
    const POSITION_TOP_RIGHT = '3';

    /**
     * Return array of options as value-label pairs.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::POSITION_BOTTOM_LEFT, 'label' => __('Bottom Left')],
            ['value' => self::POSITION_TOP_LEFT, 'label' => __('Top Left')],
            ['value' => self::POSITION_BOTTOM_RIGHT, 'label' => __('Bottom Right')],
            ['value' => self::POSITION_TOP_RIGHT, 'label' => __('Top Right')],
        ];
    }
}
