<?php
/**
 * @author  WpWax
 * @since   1.0.0
 * @version 1.0.0
 */

namespace AddonskitForElementor\Utils;

class DirectoristTaxonomies {
    public static function listing_categories(): array {
        $result     = [];
        $categories = get_terms( ATBDP_CATEGORY );
        foreach ( $categories as $category ) {
            $result[$category->slug] = $category->name;
        }

        return $result;
    }

    public static function listing_tags(): array {
        $result = [];
        $tags   = get_terms( ATBDP_TAGS );
        foreach ( $tags as $tag ) {
            $result[$tag->slug] = $tag->name;
        }

        return $result;
    }

    public static function listing_locations(): array {
        $result    = [];
        $locations = get_terms( ATBDP_LOCATION );
        foreach ( $locations as $location ) {
            $result[$location->slug] = $location->name;
        }

        return $result;
    }

    public static function directory_types(): array {
        $listing_types = [];
        $all_types     = get_terms(
            [
                'taxonomy'   => ATBDP_TYPE,
                'hide_empty' => false,
            ]
        );

        foreach ( $all_types as $type ) {
            $listing_types[$type->slug] = $type->name;
        }

        return $listing_types;
    }
}