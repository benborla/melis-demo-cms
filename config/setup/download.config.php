<?php

namespace MelisDemoCms;

use MelisMarketPlace\Support\MelisMarketPlace as MarketPlace;
use MelisMarketPlace\Support\MelisMarketPlaceCmsTables as Melis;
use MelisMarketPlace\Support\MelisMarketPlaceSiteInstall as Site;

return [
    'plugins' => [
        __NAMESPACE__ => [
            Site::DOWNLOAD => [
                Site::CONFIG => [
                    'id' => 'id_' . __NAMESPACE__,
                    Melis::CMS_TOTAL_PAGE => 10,
                ],
                MarketPlace::FORM => [
                    'melis_demo_cms_setup' => [
                        'forms' => [
                            'melis_demo_cms_setup_download_form' => [
                                'attributes' => [
                                    'name' => 'melis_demo_cms_setup_download_form',
                                    'id' => 'melis_demo_cms_setup_download_form',
                                    'method' => 'POST',
                                    'action' => '',
                                ],
                                'hydrator' => \Zend\Stdlib\Hydrator\ArraySerializable::class,
                                'elements' => [
                                    [
                                        'spec' => [
                                            'name' => 'scheme',
                                            'type' => \Zend\Form\Element\Select::class,
                                            'options' => [
                                                'label' => 'tr_site_demo_cms_tool_site_scheme',
                                                'tooltip' => 'tr_site_demo_cms_tool_site_scheme tooltip',
                                                'value_options' => [
                                                    'http' => 'http://',
                                                    'https' => 'https://',
                                                ],
                                            ],
                                            'attributes' => [
                                                'id' => 'scheme',
                                                'value' => '',
                                                'required' => 'required',
                                                'text-required' => '*',
                                                'class' => 'form-control',

                                            ],
                                        ],
                                    ],
                                    [
                                        'spec' => [
                                            'name' => 'domain',
                                            'type' => \Zend\Form\Element\Text::class,
                                            'options' => [
                                                'label' => 'tr_site_demo_cms_tool_site_domain',
                                                'tooltip' => 'tr_site_demo_cms_tool_site_domain tooltip',
                                            ],
                                            'attributes' => [
                                                'id' => 'domain',
                                                'value' => '',
                                                'required' => 'required',
                                                'placeholder' => 'www.example.com',
                                                'class' => 'form-control',
                                                'text-required' => '*',
                                            ],
                                        ],
                                    ],
                                    [
                                        'spec' => [
                                            'name' => 'name',
                                            'type' => \Zend\Form\Element\Text::class,
                                            'options' => [
                                                'label' => 'tr_site_demo_cms_name',
                                                'tooltip' => 'tr_site_demo_cms_name_tooltip',
                                            ],
                                            'attributes' => [
                                                'id' => 'name',
                                                'value' => '',
                                                'required' => 'required',
                                                'placeholder' => 'My Site Name',
                                                'class' => 'form-control',
                                                'text-required' => '*',
                                            ],
                                        ],
                                    ],
                                ], // end elements
                                'input_filter' => [
                                    'scheme' => [
                                        'name' => 'scheme',
                                        'required' => true,
                                        'validators' => [
                                            [
                                                'name' => 'InArray',
                                                'options' => [
                                                    'haystack' => ['http', 'https'],
                                                    'messages' => [
                                                        \Zend\Validator\InArray::NOT_IN_ARRAY => 'tr_site_demo_cms_tool_site_scheme_invalid_selection',
                                                    ],
                                                ],
                                            ],
                                            [
                                                'name' => 'NotEmpty',
                                                'options' => [
                                                    'messages' => [
                                                        \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_melis_installer_tool_site_scheme_error_empty',
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'filters' => [
                                        ],
                                    ],
                                    'domain' => [
                                        'name' => 'domain',
                                        'required' => true,
                                        'validators' => [
                                            [
                                                'name' => 'StringLength',
                                                'options' => [
                                                    'encoding' => 'UTF-8',
                                                    'max' => 50,
                                                    'messages' => [
                                                        \Zend\Validator\StringLength::TOO_LONG => 'tr_melis_installer_tool_site_domain_error_long',
                                                    ],
                                                ],
                                            ],
                                            [
                                                'name' => 'NotEmpty',
                                                'options' => [
                                                    'messages' => [
                                                        \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_melis_installer_tool_site_domain_error_empty',
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'filters' => [
                                            ['name' => 'StripTags'],
                                            ['name' => 'StringTrim'],
                                        ],
                                    ],
                                    'name' => [
                                        'name' => 'name',
                                        'required' => true,
                                        'validators' => [
                                            [
                                                'name' => 'StringLength',
                                                'options' => [
                                                    'encoding' => 'UTF-8',
                                                    'max' => 50,
                                                    'messages' => [
                                                        \Zend\Validator\StringLength::TOO_LONG => 'tr_site_demo_cms_tool_site_name_error_long',
                                                    ],
                                                ],
                                            ],
                                            [
                                                'name' => 'NotEmpty',
                                                'options' => [
                                                    'messages' => [
                                                        \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_melis_installer_tool_site_name_error_empty',
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'filters' => [
                                            ['name' => 'StripTags'],
                                            ['name' => 'StringTrim'],
                                        ],
                                    ],
                                ], // end input_filter
                            ],
                        ],
                    ],
                ],
                Site::DATA => [
                    // this should correspond to the table name
                    Melis::CMS_TEMPLATE => [
                        [
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Home',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Home',
                            'tpl_zf2_action' => 'index',
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'News List',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'News',
                            'tpl_zf2_action' => 'list',
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'News Details',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'News',
                            'tpl_zf2_action' => 'details',
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Content List',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Content',
                            'tpl_zf2_action' => 'list',
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Content Details',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Content',
                            'tpl_zf2_action' => 'details',
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'About',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'About',
                            'tpl_zf2_action' => 'aboutus',
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Contact',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Contact',
                            'tpl_zf2_action' => 'contactus',
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Testimonial',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Testimonial',
                            'tpl_zf2_action' => 'testimonial',
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Search',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Search',
                            'tpl_zf2_action' => 'results',
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                    ],
                    Melis::CMS_PAGE_TREE => [
                        [
                            // Home Page
                            Melis::PRIMARY_KEY => 'tree_page_id',
                            'tree_page_id' => Melis::CURRENT_PAGE_ID,
                            'tree_father_page_id' => Melis::CMS_SITE_ID,
                            'tree_page_order' => 1,
                            Melis::RELATION => [
                                Melis::CMS_PAGE_PUBLISHED => [
                                    [
                                        Melis::PRIMARY_KEY => 'page_id',
                                        'page_id' => Melis::FOREIGN_KEY,
                                        'page_type' => 'SITE',
                                        'page_status' => '1',
                                        'page_menu' => 'LINK',
                                        'page_name' => 'Melis Demo CMS',
                                        'page_tpl_id' => [Site::GET_FIELD_VALUE => [Melis::CMS_TEMPLATE, 'tpl_name', 'Content Details', 'tpl_id']],
                                        'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="contactform_001"><![CDATA[Your name *]]></melisTag>   <melisTag id="contactform_002"><![CDATA[Your email address *]]></melisTag>  <melisTag id="contactform_003"><![CDATA[Subject]]></melisTag>   <melisTag id="contactform_004"><![CDATA[Message *]]></melisTag> <melisTag id="contacttext_001"><![CDATA[Get in <strong>touch</strong>]]></melisTag> <melisTag id="contacttext_002"><![CDATA[Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus.]]></melisTag> <melisTag id="contacttext_003"><![CDATA[The <strong>Office</strong>]]></melisTag>   <melisTag id="contacttext_004"><![CDATA[<ul class="list-unstyled">              <li><i class="icon icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>              <li><i class="icon icon-phone"></i> <strong>Phone:</strong> (123) 456-7890</li>             <li><i class="icon icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>          </ul>]]></melisTag> <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul><li><div class="contact-icon"><i class="zmdi zmdi-pin-drop"></i></div><div class="contact-text"><p><span>4, rue du Dahomey<br />75011 Paris, France</span><span><br /></span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-email-open"></i></div><div class="contact-text"><p><span>contact@melistechnology.com</span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-phone-paused"></i></div><div class="contact-text"><p><span>(+33) 972 386 280</span><span><br /></span></p></div></li></ul>]]></melisTag>    <melisTag id="footer_title_2"><![CDATA[menu]]></melisTag>   <melisTag id="footer_text_2"><![CDATA[<ul><li><a href="/">Home</a></li><li><a href="/home/news/id/2">News</a></li><li><a href="/home/our-designs/id/4">Our designs</a></li><li><a href="/home/about-us/id/29">About us</a></li><li><a href="/home/contact-us/id/30">Contact us</a></li></ul>]]></melisTag>  <melisTag id="footer_title_3"><![CDATA[InstaGram]]></melisTag>  <melisTag id="homepage_line_1"><![CDATA[<div class="delivery-service-area ptb-30"><div class="container"><div class="row"><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCms/images/icons/live.png" caption="false" data-mce-src="/MelisDemoCms/images/icons/live.png"><h5>Fashion show live</h5></div></div><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCms/images/icons/chat.png" caption="false" data-mce-src="/MelisDemoCms/images/icons/chat.png"><h5>Chat with a star !</h5></div></div><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCms/images/icons/news.png" caption="false" data-mce-src="/MelisDemoCms/images/icons/news.png"><h5>Last minute news</h5></div></div><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCms/images/icons/trending.png" caption="false" data-mce-src="/MelisDemoCms/images/icons/trending.png"><h5>Ultimate trending</h5></div></div></div></div></div>]]></melisTag>  <melisTag id="homepage_line_2"><![CDATA[<div class="blog-area pb-70"><div class="container"><div class="row"><div class="col-md-12 col-sm-8 col-xs-12"><div class="single-blog-body"><div class="single-blog sb-2 mb-30"><div class="blog-content"><div class="blog-title"><h5 class="uppercase font-bold"><a href="/melis-demo-cms/our-designs/id/4" data-mce-href="/melis-demo-cms/our-designs/id/4">The ultimate trend of 2017<br></a><br data-mce-bogus="1"></h5><div class="blog-text"><p>There are many variations of passages of Lorem Ipsum available, but the majority suffered alteration in some form, by injected humour, or random ised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum. <br><br>generators on the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available</p></div></div><div class="blockqot mtb-30"><blockquote><p>There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour. There are many variations of passages of Lorem Ipsum available, but the majorit. There are many variations of passages of Lorem Ipsum available, but the majorit.</p></blockquote></div></div></div></div></div></div></div></div>]]></melisTag>  <melisTag id="homepage_news_title"><![CDATA[News]]></melisTag>  <melisTag id="homepage_testimonial_title"><![CDATA[Testimonial]]></melisTag>    <melisTag id="footer_text_3"><![CDATA[<div class="instagrm"><ul><li><a href="#"><img src="/MelisDemoCms/images/gallery/01.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCms/images/gallery/02.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCms/images/gallery/03.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCms/images/gallery/04.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCms/images/gallery/05.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCms/images/gallery/06.jpg" alt="" /></a></li></ul></div>]]></melisTag> <melisTag id="footer_title_4"><![CDATA[Social Network]]></melisTag> <melisTag id="homepage_line_3"><![CDATA[<h5 class="uppercase font-bold"><a href="/home/news/news-details/id/3?newsid=1" data-mce-href="/home/news/news-details/id/3?newsid=1">Fashion show OBscuria in PARIS this spring 2017 !</a><br data-mce-bogus="1"></h5><div class="blog-text"><p>There are many variations of passages of Lorem Ipsum available, but the majority suffered alteration in some form, by injected humour, or random ised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum. <br><br>generators on the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available</p></div>]]></melisTag>    <melisTag id="homepage_line_4"><![CDATA[<h5 class="uppercase font-bold"><a href="/home/our-designs/suits/suit-3/id/14" data-mce-href="/home/our-designs/suits/suit-3/id/14">The flagship product of 2016</a><br data-mce-bogus="1"></h5><div class="blog-text"><p>There are many variations of passages of Lorem Ipsum available, but the majority suffered alteration in some form, by injected humour, or random ised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum. <br><br>generators on the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available</p></div>]]></melisTag>   <melisTag id="homepage_line_3_img"><![CDATA[<img class="img-responsive" src="/MelisDemoCms/images/news/N01.jpg"/>]]></melisTag> <melisTag id="homepage_line_4_img"><![CDATA[<img class="img-responsive" src="/MelisDemoCms/images/product/shoes/03/03.jpg" caption="false" data-mce-src="/MelisDemoCms/images/product/shoes/03/03.jpg">]]></melisTag></document>',
                                        'page_search_type' => 'tr_meliscms_page_tab_properties_search_type_option1',
                                    ],
                                ]
                            ],
                            Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],

                        ]

                    ],
                    Melis::CMS_NEWS => [
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N01.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Fashion show Obscuria in PARIS this spring 2017!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N02.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Latest youth trends',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N03.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => '8 ways to revive old fashion shoes',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N04.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Quizzz : how much do you know about fashion?',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N05.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'What type of model are you?',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N06.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Under the spotlight!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N07.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'How to get the utmost of your makeup',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N08.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Discover the most handsome star of the month!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N09.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Dark curtains project revealed!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N10.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Immerse yourself into fashion with this new event!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N11.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Why is Paris the capital city of Fashion?',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N12.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Gentlemen, time to put on your suits!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N13.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Upcoming trends this year',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N14.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Discover Angela the new fashion model of Melis',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N15.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Latest designs unveiled',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N16.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Revelations of the most renowned fashion artist!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N17.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'XYZ is now hiring models',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => __NAMESPACE__ . '/images/news/N18.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Fashion and seduction : an art in itself',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                    ],
                    Melis::CMS_PROSPECTS_THEMES => [
                        [
                            'pros_theme_name' => 'Melis Demo CMS Contact',
                            'pros_theme_code' => 'MELIS_DEMO_CMS_CONTACT',
                            Melis::RELATION => [
                                Melis::CMS_PROSPECTS_THEMES_ITEMS => [
                                    [
                                        'pros_theme_id' => Melis::FOREIGN_KEY,
                                        Melis::RELATION => [
                                            Melis::CMS_PROSPECTS_THEMES_ITEMS_TRANSLATIONS => [
                                                [
                                                    'item_trans_text' => 'About a product',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => Melis::ROOT_FOREIGN_KEY,
                                                ],
                                                [
                                                    'item_trans_text' => 'About the company',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => Melis::ROOT_FOREIGN_KEY,
                                                ],
                                                [
                                                    'item_trans_text' => 'Press related',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => Melis::ROOT_FOREIGN_KEY,
                                                ],
                                                [
                                                    'item_trans_text' => 'Apply for a position',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => Melis::ROOT_FOREIGN_KEY,
                                                ],
                                                [
                                                    'item_trans_text' => 'Other',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => Melis::ROOT_FOREIGN_KEY,
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'pros_theme_name' => 'Melis Demo CMS Contact 1',
                            'pros_theme_code' => 'MELIS_DEMO_CMS_CONTACT 1',
                            Melis::RELATION => [
                                Melis::CMS_PROSPECTS_THEMES_ITEMS => [
                                    [
                                        'pros_theme_id' => Melis::FOREIGN_KEY,
                                        Melis::RELATION => [
                                            Melis::CMS_PROSPECTS_THEMES_ITEMS_TRANSLATIONS => [
                                                [
                                                    'item_trans_text' => 'Just observe',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => Melis::ROOT_FOREIGN_KEY,
                                                ],
                                                [
                                                    'item_trans_text' => 'must keep trying',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => Melis::ROOT_FOREIGN_KEY,
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

];