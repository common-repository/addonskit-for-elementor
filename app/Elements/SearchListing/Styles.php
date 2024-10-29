<?php
/**
 * @author  WpWax
 * @since   1.0.0
 * @version 1.0.0
 */

namespace AddonskitForElementor\Elements\SearchListing;

use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Text_Stroke;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Styles {
    protected function register_form_container_style_controls( string $section_label = '', string $prefix = '', string $selector = '', $condition = '' ): void {

        $this->start_controls_section(
            "section_{$prefix}_style",
            [
                'label'     => $section_label,
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => $condition,
            ]
        );

        $this->add_responsive_control(
            "{$prefix}_padding",
            [
                'label'      => __( 'Padding', 'addonskit-for-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    "{{WRAPPER}} {$selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );

        $this->add_responsive_control(
            "{$prefix}_margin",
            [
                'label'      => __( 'Margin', 'addonskit-for-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    "{{WRAPPER}} {$selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            "{$prefix}_bg_color",
            [
                'label'     => __( 'Background Color', 'addonskit-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$selector}"                                     => 'background-color: {{VALUE}};',
                    "{{WRAPPER}} {$selector} .directorist-search-modal__contents" => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => "{$prefix}_border",
                'selector'  => "{{WRAPPER}} {$selector}",
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            "{$prefix}_border_radius",
            [
                'label'      => __( 'Border Radius', 'addonskit-for-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    "{{WRAPPER}} {$selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => "{$prefix}_border_box_shadow",
                'selector' => "{{WRAPPER}} {$selector}",
            ]
        );

        $this->end_controls_section();
    }

    protected function register_form_fields_controls(): void {

        $this->start_controls_section(
            "section_form_style",
            [
                'label' => __( 'Form Fields', 'addonskit-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            "form_color",
            [
                'label'     => esc_html__( 'Text Color', 'addonskit-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .directorist-search-modal__contents__body .directorist-search-field.input-is-focused .select2-selection--single .select2-selection__rendered .select2-selection__placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .directorist-search-contents .directorist-search-form-top .directorist-search-field__label' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .directorist-search-contents .directorist-search-form-top .directorist-search-field .directorist-form-element::placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .select2-container--default .select2-selection--single .select2-selection__placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .directorist-search-contents .directorist-search-form-top .directorist-search-field .directorist-btn-ml' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .directorist-price-ranges__item .directorist-pf-range' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .directorist-checkbox .directorist-checkbox__label' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .directorist-form-group .directorist-input-icon .directorist-icon-mask:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .directorist-select2-addons-area .directorist-icon-mask:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .directorist-search-form-wrap .directorist-search-form-box .directorist-form-group .directorist-form-element::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => "form_typography",
                'selector' => "{{WRAPPER}} .directorist-search-contents .directorist-search-field__label,
                            {{WRAPPER}} .directorist-search-contents .select2-selection__placeholder",
            ]
        );

        $this->end_controls_section();
    }

    protected function register_form_button_style_controls(): void {

        $this->start_controls_section(
            'section_form_search_style',
            [
                'label' => __( 'Form Button', 'addonskit-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( "search_buttons_style" );

        $this->start_controls_tab(
            "filters_button",
            [
                'label' => esc_html__( 'Filters', 'addonskit-for-elementor' ),
            ]
        );

        $this->add_control(
            'filter_color',
            [
                'label'     => __( 'Text Color', 'addonskit-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .directorist-search-form-action__filter .directorist-filter-btn' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_more_filter_btn' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'filter_bg_color',
            [
                'label'     => __( 'Background', 'addonskit-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .directorist-search-form-action__filter .directorist-filter-btn' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'show_more_filter_btn' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'filter_icon_color',
            [
                'label'     => __( 'Icon', 'addonskit-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .directorist-search-form-action__filter .directorist-filter-btn .directorist-icon-mask:after' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'show_more_filter_btn' => 'yes',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            "search_button",
            [
                'label' => esc_html__( 'Search', 'addonskit-for-elementor' ),
            ]
        );

        $this->add_control(
            'search_color',
            [
                'label'     => __( 'Text Color', 'addonskit-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .directorist-search-contents .directorist-btn.directorist-btn-dark' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'search_bg_color',
            [
                'label'     => __( 'Background', 'addonskit-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .directorist-search-contents .directorist-btn.directorist-btn-dark' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'search_icon_color',
            [
                'label'     => __( 'Icon', 'addonskit-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .directorist-search-contents .directorist-btn.directorist-btn-dark .directorist-icon-mask:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function register_cat_icon_controls( string $section_label = '', string $prefix = '', string $selector = '' ): void {

        $this->start_controls_section(
            "section_{$prefix}_style",
            [
                'label' => $section_label,
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            "{$prefix}_color",
            [
                'label'     => esc_html__( 'Color', 'addonskit-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} {$selector}"       => 'color: {{VALUE}} !important;',
                    "{{WRAPPER}} {$selector} .directorist-icon-mask:after" => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            "{$prefix}_icon_size",
            [
                'label'      => __( 'Icon Size', 'addonskit-for-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 1,
                    ],
                    'em' => [
                        'min'  => 0,
                        'max'  => 5,
                        'step' => .5,
                    ],
                ],
                'selectors'  => [
                    "{{WRAPPER}} {$selector} .directorist-icon-mask::after" => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => "{$prefix}_typography",
                'selector' => "{{WRAPPER}} {$selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name'     => "{$prefix}_text_stroke",
                'selector' => "{{WRAPPER}} {$selector}",
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'     => "{$prefix}_text_shadow",
                'selector' => "{{WRAPPER}} {$selector}",
            ]
        );

        $this->end_controls_section();
    }
}
