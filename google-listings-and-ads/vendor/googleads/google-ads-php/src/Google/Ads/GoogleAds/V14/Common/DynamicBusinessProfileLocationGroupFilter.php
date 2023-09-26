<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/common/asset_set_types.proto

namespace Google\Ads\GoogleAds\V14\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a filter on Business Profile locations in an asset set. If
 * multiple filters are provided, they are AND'ed together.
 *
 * Generated from protobuf message <code>google.ads.googleads.v14.common.DynamicBusinessProfileLocationGroupFilter</code>
 */
class DynamicBusinessProfileLocationGroupFilter extends \Google\Protobuf\Internal\Message
{
    /**
     * Used to filter Business Profile locations by label. Only locations that
     * have any of the listed labels will be in the asset set.
     * Label filters are OR'ed together.
     *
     * Generated from protobuf field <code>repeated string label_filters = 1;</code>
     */
    private $label_filters;
    /**
     * Used to filter Business Profile locations by business name.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v14.common.BusinessProfileBusinessNameFilter business_name_filter = 2;</code>
     */
    protected $business_name_filter = null;
    /**
     * Used to filter Business Profile locations by listing ids.
     *
     * Generated from protobuf field <code>repeated int64 listing_id_filters = 3;</code>
     */
    private $listing_id_filters;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $label_filters
     *           Used to filter Business Profile locations by label. Only locations that
     *           have any of the listed labels will be in the asset set.
     *           Label filters are OR'ed together.
     *     @type \Google\Ads\GoogleAds\V14\Common\BusinessProfileBusinessNameFilter $business_name_filter
     *           Used to filter Business Profile locations by business name.
     *     @type array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $listing_id_filters
     *           Used to filter Business Profile locations by listing ids.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V14\Common\AssetSetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Used to filter Business Profile locations by label. Only locations that
     * have any of the listed labels will be in the asset set.
     * Label filters are OR'ed together.
     *
     * Generated from protobuf field <code>repeated string label_filters = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLabelFilters()
    {
        return $this->label_filters;
    }

    /**
     * Used to filter Business Profile locations by label. Only locations that
     * have any of the listed labels will be in the asset set.
     * Label filters are OR'ed together.
     *
     * Generated from protobuf field <code>repeated string label_filters = 1;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLabelFilters($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->label_filters = $arr;

        return $this;
    }

    /**
     * Used to filter Business Profile locations by business name.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v14.common.BusinessProfileBusinessNameFilter business_name_filter = 2;</code>
     * @return \Google\Ads\GoogleAds\V14\Common\BusinessProfileBusinessNameFilter|null
     */
    public function getBusinessNameFilter()
    {
        return $this->business_name_filter;
    }

    public function hasBusinessNameFilter()
    {
        return isset($this->business_name_filter);
    }

    public function clearBusinessNameFilter()
    {
        unset($this->business_name_filter);
    }

    /**
     * Used to filter Business Profile locations by business name.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v14.common.BusinessProfileBusinessNameFilter business_name_filter = 2;</code>
     * @param \Google\Ads\GoogleAds\V14\Common\BusinessProfileBusinessNameFilter $var
     * @return $this
     */
    public function setBusinessNameFilter($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V14\Common\BusinessProfileBusinessNameFilter::class);
        $this->business_name_filter = $var;

        return $this;
    }

    /**
     * Used to filter Business Profile locations by listing ids.
     *
     * Generated from protobuf field <code>repeated int64 listing_id_filters = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getListingIdFilters()
    {
        return $this->listing_id_filters;
    }

    /**
     * Used to filter Business Profile locations by listing ids.
     *
     * Generated from protobuf field <code>repeated int64 listing_id_filters = 3;</code>
     * @param array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setListingIdFilters($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT64);
        $this->listing_id_filters = $arr;

        return $this;
    }

}

