<?php
namespace Drupal\ghsa_main_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Hello' Block
 *
 * @Block(
 * id = "hello_block",
 * admin_label = @Translation("Hello block"),
 * )
 */
class MainBlock extends BlockBase implements BlockPluginInterface {

    /**
     * {@inheritdoc}
     */
    public function build() {
        return array(
            '#markup' => $this->t('<main><a id="skip_to_main_content" class="tiny_near_hidden"></a>


        <!-- START: section.main_section_hero -->
        <section class="main_section_hero row_stripe_grey">

            <!-- START: main_hero_container -->
            <div class="main_hero_container">

                <!-- START: main_section_hero_left -->
                <div class="main_section_hero_left">

                    <!-- START: hero_container -->
                    <div class="hero_container">
                        <div class="hero_image no_image_resize"><img src="images/hero-example-1.jpg" alt="yadda" /></div>
                        <div class="hero_content">
                            <div class="hero_content_button button_1"><a href="#">Michigan Grantee Boot Camp</a></div>
                            <div class="hero_content_text"><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</p></div>
                        </div>
                    </div>
                    <!-- END: hero_container -->

                </div>
                <!-- END: main_section_hero_left -->

                <!-- START: main_section_hero_right -->
                <div class="main_section_hero_right">

                    <!-- START: hero_container -->
                    <div class="hero_container">
                        <div class="hero_image no_image_resize"><img src="images/hero-example-slide-2.jpg" alt="yadda" /></div>
                        <div class="hero_content">
                            <div class="hero_content_button button_1"><a href="#">Michigan Grantee</a></div>
                            <div class="hero_content_text"><p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et</p></div>
                        </div>
                    </div>
                    <!-- END: hero_container -->

                    <!-- START: hero_container -->
                    <div class="hero_container">
                        <div class="hero_image no_image_resize"><img src="images/hero-example-slide-4.jpg" alt="yadda" /></div>
                        <div class="hero_content">
                            <div class="hero_content_button button_1"><a href="#">Michigan Grantee</a></div>
                            <div class="hero_content_text"><p>Fusce dapibus, tellus ac cursus commodo, tortor mauris</p></div>
                        </div>
                    </div>
                    <!-- END: hero_container -->

                </div>
                <!-- END: main_section_hero_right -->

            </div>
            <!-- START: main_hero_container -->


            <!-- START: section.home_slideshow -->
            <div class="home_slideshow">

                <!-- START: home_slideshow_container -->
                <div role="alert" id="home_slideshow_container" class="view cycle-slideshow"
                     data-cycle-fx="fade"
                     data-cycle-timeout="5000"
                     data-cycle-speed="1000"
                     data-cycle-slides="> .views-row"
                     data-cycle-pause-on-hover="false"
                     data-cycle-pager="#home_slideshow_control_pager ul"
                     data-cycle-pager-template=""
                >

                    <!-- START: views-row -->
                    <div class="views-row">

                        <!-- START: slideshow_hero_container -->
                        <div class="slideshow_hero_container">
                            <div class="slideshow_hero_image no_image_resize"><img src="images/hero-example-slide-1.jpg" alt="yadda" /></div>
                            <div class="slideshow_hero_content">
                                <div class="slideshow_hero_content_button button_1"><a href="#">Michigan Grantee Boot Camp</a></div>
                                <div class="slideshow_hero_content_text"><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</p></div>
                            </div>
                        </div>
                        <!-- END: slideshow_hero_container -->

                    </div>
                    <!-- END: views-row -->

                    <!-- START: views-row -->
                    <div class="views-row">

                        <!-- START: slideshow_hero_container -->
                        <div class="slideshow_hero_container">
                            <div class="slideshow_hero_image no_image_resize"><img src="images/hero-example-slide-2.jpg" alt="yadda" /></div>
                            <div class="slideshow_hero_content">
                                <div class="slideshow_hero_content_button button_1"><a href="#">Michigan Grantee Boot Camp</a></div>
                                <div class="slideshow_hero_content_text"><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</p></div>
                            </div>
                        </div>
                        <!-- END: slideshow_hero_container -->

                    </div>
                    <!-- END: views-row -->

                    <!-- START: views-row -->
                    <div class="views-row">

                        <!-- START: slideshow_hero_container -->
                        <div class="slideshow_hero_container">
                            <div class="slideshow_hero_image no_image_resize"><img src="images/hero-example-slide-4.jpg" alt="yadda" /></div>
                            <div class="slideshow_hero_content">
                                <div class="slideshow_hero_content_button button_1"><a href="#">Michigan Grantee Boot Camp</a></div>
                                <div class="slideshow_hero_content_text"><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</p></div>
                            </div>
                        </div>
                        <!-- END: slideshow_hero_container -->

                    </div>
                    <!-- END: views-row -->

                </div>
                <!-- END: home_slideshow_container -->


                <!-- START: home_slideshow_controls -->
                <div class="home_slideshow_controls">

                    <h2 class="hidden">Slideshow Controls</h2>
                    <div id="home_slideshow_control_pager">
                        <h2 class="hidden">Slide Navigation</h2>
                        <ul role="listbox">
                            <li role="option" tab-index="0" aria-selected="true">1</li>
                            <li role="option" tab-index="-1" aria-selected="false">2</li>
                            <li role="option" tab-index="-1" aria-selected="false">3</li>
                        </ul>
                    </div>

                </div>
                <!-- END: home_slideshow_controls -->


            </div>
            <!-- END: section.home_slideshow -->


        </section>
        <!-- END: section.main_section_hero -->


    </main>'),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state) {
        $form = parent::blockForm($form, $form_state);

        $config = $this->getConfiguration();

        $form['hello_block_settings'] = array (
            '#type' => 'textfield',
            '#title' => $this->t('Who'),
            '#description' => $this->t('Who do you want to say hello to?'),
            '#default_value' => isset($config['hello_block_settings']) ? $config['hello_block_settings'] : ''
        );

        return $form;
    }



    /**
     * Implements hook_block_info().
     */
//    function t2dm_about_four_block_info() {
//        $blocks['t2dm_about_four'] = array(
//            // The name that will appear in the block list.
//            'info' => t('t2dm about_four'),
//            // Default setting.
//            //'cache' => DRUPAL_CACHE_PER_ROLE,
//        );
//        return $blocks;
//    }

    /**
     * Implements hook_block_configure(). // it has to be blockFrom in d8
     */
//    function t2dm_about_four_block_configure($delta = '') {
//        $form = array();
//        if ($delta == 't2dm_about_four') {
//            $form['t2dm_about_four_title'] = array(
//                '#type' => 'textfield',
//                '#title' => t('Main Caption'),
//                '#maxlength' => 255,
//                '#default_value' => variable_get('t2dm_about_four_title', 'About Us'),
//            );
//        }
//        return $form;
//    }
    /**
     * Implements hook_block_save().
     */
    function t2dm_about_four_block_save($delta = '', $edit = array()) {
        if ($delta == 't2dm_about_four') {
            variable_set('t2dm_about_four_title', $edit['t2dm_about_four_title']);
        }
    }
    /**
     * Implements hook_block_view(). //became build in d8
     */
//    function t2dm_about_four_block_view($delta = ''){
//        // This example is adapted from node.module.
//        $block = array();
//        $output ='';
//        switch ($delta) {
//            case 't2dm_about_four':
//                $title = variable_get('t2dm_about_four_title', '');
//                $output .= '<section class="offset-top-0">
//
//          <div class="rd-google-map">
//            <div id="rd-google-map" data-zoom="14" data-x="-95.373095" data-y="29.921197" data-styles= '.'\''.'[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":60}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"lightness":30}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ef8c25"},{"lightness":40}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#b6c54c"},{"lightness":40},{"saturation":-40}]},{}]'.'\''.' class="rd-google-map__model"></div>
//            <ul class="rd-google-map__locations">
//              <li data-x="-95.373095" data-y="29.92119">
//                <p>14115 Luthe Road
//                  Houston, Texas 770391</p>
//              </li>
//            </ul>
//          </div>
//        </section>';
//                $block['content'] = $output;
//                break;
//        }
//        return $block;
//    }



}
