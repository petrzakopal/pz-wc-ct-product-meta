<?php
/**
 * Plugin Name: PZ WooCommerce Custom Product Meta Data
 * Plugin URI: https://petrzakopal.cz
 * Description: Add custom product meta input fields on a product page. Made for Czech Camp StayHeroCamp
 * Author URI: https://petrzakopal.cz
 * Version: 0.1
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/** 
 * Author of this script: Petr Zakopal
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * 
 * Tutorial page - thank you for the base of tutorial.
 * https://pluginrepublic.com/woocommerce-custom-fields/
*/

/**
 * Display the custom text field in the product settings menu
 * @since 1.0.0
 */
function pz_cfwc_create_custom_field() {

    /* Creating one input field*/
    $args['jmeno_ucastnika'] = array(
    'id' => 'jmeno_ucastnika_title',
    'label' => __( 'Nadpis jméno účastníka', 'cfwc' ),
    'class' => 'pz-cfwc-custom-field',
    'desc_tip' => true,
    'description' => __( 'Vložte text, zobrazený na stránce produktu u zadání pole jména účastníka.', 'ctwc' ),
    );

    /* Creating one input field*/
    $args['prijmeni_ucastnika'] = array(
        'id' => 'prijmeni_ucastnika_title',
        'label' => __( 'Nadpis příjmení účastníka', 'cfwc' ),
        'class' => 'pz-cfwc-custom-field',
        'desc_tip' => true,
        'description' => __( 'Vložte text, zobrazený na stránce produktu u zadání pole příjmení účastníka.', 'ctwc' ),
        );

    /* Creating one input field*/
    $args['rodne_cislo_ucastnika'] = array(
        'id' => 'rodne_cislo_ucastnika_title',
        'label' => __( 'Rodné číslo účastníka', 'cfwc' ),
        'class' => 'pz-cfwc-custom-field',
        'desc_tip' => true,
        'description' => __( 'Vložte text, zobrazený na stránce produktu u zadání pole rodné číslo účastníka.', 'ctwc' ),
        );

     /* Creating one input field*/
     $args['nazev_pojistovny_ucastnika'] = array(
        'id' => 'nazev_pojistovny_ucastnika_title',
        'label' => __( 'Název pojišťovny účastníka', 'cfwc' ),
        'class' => 'pz-cfwc-custom-field',
        'desc_tip' => true,
        'description' => __( 'Vložte text, zobrazený na stránce produktu u zadání pole názvu pojišťovny účastníka.', 'ctwc' ),
        );

    $args['alergie_ucastnika'] = array(
        'id' => 'alergie_ucastnika_title',
        'label' => __( 'Alergie účastníka', 'cfwc' ),
        'class' => 'pz-cfwc-custom-field',
        'desc_tip' => true,
        'description' => __( 'Vložte text, zobrazený na stránce produktu u zadání pole alergie účastníka.', 'ctwc' ),
            );

    $args['sportovni_omezeni_ucastnika'] = array(
        'id' => 'sportovni_omezeni_ucastnika_title',
        'label' => __( 'Sportovní omezení účastníka', 'cfwc' ),
        'class' => 'pz-cfwc-custom-field',
        'desc_tip' => true,
        'description' => __( 'Vložte text, zobrazený na stránce produktu u zadání pole sportovního omezení účastníka.', 'ctwc' ),
            );
    $args['poznamka_ucastnika'] = array(
        'id' => 'poznamka_ucastnika_title',
        'label' => __( 'Poznámka účastníka', 'cfwc' ),
        'class' => 'pz-cfwc-custom-field',
        'desc_tip' => true,
        'description' => __( 'Vložte text, zobrazený na stránce produktu u zadání pole poznámky účastníka.', 'ctwc' ),
            );

    /*Adding input field to Woo*/
    woocommerce_wp_text_input( $args['jmeno_ucastnika'] );
    woocommerce_wp_text_input( $args['prijmeni_ucastnika'] );
    woocommerce_wp_text_input( $args['rodne_cislo_ucastnika'] );
    woocommerce_wp_text_input( $args['nazev_pojistovny_ucastnika'] );
    woocommerce_wp_text_input( $args['alergie_ucastnika'] );
    woocommerce_wp_text_input( $args['sportovni_omezeni_ucastnika'] );
    woocommerce_wp_text_input( $args['poznamka_ucastnika'] );
   }
   add_action( 'woocommerce_product_options_general_product_data', 'pz_cfwc_create_custom_field' );
   
   /**
    * Save the custom field
    * @since 1.0.0
    */
   function pz_cfwc_save_custom_field( $post_id ) {
    /* Get product of current post_id */
    $product = wc_get_product( $post_id );

    /*Checking if is field set in admin panel of a product, if so, save value to title */
    $title['jmeno_ucastnika_title'] = isset( $_POST['jmeno_ucastnika_title'] ) ? $_POST['jmeno_ucastnika_title'] : '';
    $title['prijmeni_ucastnika_title'] = isset( $_POST['prijmeni_ucastnika_title'] ) ? $_POST['prijmeni_ucastnika_title'] : '';
    $title['rodne_cislo_ucastnika_title'] = isset( $_POST['rodne_cislo_ucastnika_title'] ) ? $_POST['rodne_cislo_ucastnika_title'] : '';
    $title['nazev_pojistovny_ucastnika_title'] = isset( $_POST['nazev_pojistovny_ucastnika_title'] ) ? $_POST['nazev_pojistovny_ucastnika_title'] : '';
    $title['alergie_ucastnika_title'] = isset( $_POST['alergie_ucastnika_title'] ) ? $_POST['alergie_ucastnika_title'] : '';
    $title['sportovni_omezeni_ucastnika_title'] = isset( $_POST['sportovni_omezeni_ucastnika_title'] ) ? $_POST['sportovni_omezeni_ucastnika_title'] : '';
    $title['poznamka_ucastnika_title'] = isset( $_POST['poznamka_ucastnika_title'] ) ? $_POST['poznamka_ucastnika_title'] : '';

    /* Updating meta data of product */
    $product->update_meta_data( 'jmeno_ucastnika_title', sanitize_text_field( $title['jmeno_ucastnika_title'] ) );
    $product->update_meta_data( 'prijmeni_ucastnika_title', sanitize_text_field( $title['prijmeni_ucastnika_title'] ) );
    $product->update_meta_data( 'rodne_cislo_ucastnika_title', sanitize_text_field( $title['rodne_cislo_ucastnika_title'] ) );
    $product->update_meta_data( 'nazev_pojistovny_ucastnika_title', sanitize_text_field( $title['nazev_pojistovny_ucastnika_title'] ) );
    $product->update_meta_data( 'alergie_ucastnika_title', sanitize_text_field( $title['alergie_ucastnika_title'] ) );
    $product->update_meta_data( 'sportovni_omezeni_ucastnika_title', sanitize_text_field( $title['sportovni_omezeni_ucastnika_title'] ) );
    $product->update_meta_data( 'poznamka_ucastnika_title', sanitize_text_field( $title['poznamka_ucastnika_title'] ) );

    $product->save();
   }
   add_action( 'woocommerce_process_product_meta', 'pz_cfwc_save_custom_field' );
   
   function pz_wc_ct_product_meta_styles()
    {   
    $plugin_path = plugins_url( 'pz-wc-ct-product-meta', dirname(__FILE__) );
   wp_register_style('pz-wc-ct-product-meta',$plugin_path . '/includes/pz-wc-ct-product-meta.css'); // template

    wp_enqueue_style( 'pz-wc-ct-product-meta');
    }
   add_action( 'wp_enqueue_scripts', 'pz_wc_ct_product_meta_styles', 99);

   /**
    * Display custom field on the front end - for customer on a product page
    * @since 1.0.0
    */
   function pz_cfwc_display_custom_field() {
    global $post;
    
    // Check for the custom field value

    $product = wc_get_product( $post->ID );

    /* Getting input field Titles */
    $title['jmeno_ucastnika_title'] = $product->get_meta( 'jmeno_ucastnika_title' );
    $title['prijmeni_ucastnika_title'] = $product->get_meta( 'prijmeni_ucastnika_title' );
    $title['rodne_cislo_ucastnika_title'] = $product->get_meta( 'rodne_cislo_ucastnika_title' );
    $title['nazev_pojistovny_ucastnika_title'] = $product->get_meta( 'nazev_pojistovny_ucastnika_title' );
    $title['alergie_ucastnika_title'] = $product->get_meta( 'alergie_ucastnika_title' );
    $title['sportovni_omezeni_ucastnika_title'] = $product->get_meta( 'sportovni_omezeni_ucastnika_title' );
    $title['poznamka_ucastnika_title'] = $product->get_meta( 'poznamka_ucastnika_title' );
    
    
    // Some styles, might put in global css later
    

    // Only display our field if we've got a value for the field title
    if( $title['jmeno_ucastnika_title'] ) {

    /* Table enviroment suits best for this type of inputs */
    echo '<table>';
    echo '<tr class="before-add-to-cart-data-input">';
    
    printf(
    '<td><div class="cfwc-custom-field-wrapper"><label class="label-for-data-input" for="jmeno_ucastnika_data">%s</label><input type="text" id="jmeno_ucastnika_data" name="jmeno_ucastnika_data" value=""></div></td>',
    esc_html( $title['jmeno_ucastnika_title'] )
    );}

    if( $title['prijmeni_ucastnika_title'] ) {
    printf(
        '<td><div class="cfwc-custom-field-wrapper"><label class="label-for-data-input" for="prijmeni_ucastnika_data">%s</label><input type="text" id="prijmeni_ucastnika_data" name="prijmeni_ucastnika_data" value=""></div></td>',
        esc_html( $title['prijmeni_ucastnika_title'] )
        );
    }
    echo '</tr>';

    echo '<tr class="before-add-to-cart-data-input">';
    if( $title['rodne_cislo_ucastnika_title'] ) {
        printf(
            '<td><div class="cfwc-custom-field-wrapper"><label class="label-for-data-input" for="rodne_cislo_ucastnika_data">%s</label><input type="text" id="rodne_cislo_ucastnika_data" name="rodne_cislo_ucastnika_data" value=""></div></td>',
            esc_html( $title['rodne_cislo_ucastnika_title'] )
            );
        
            }

    if( $title['nazev_pojistovny_ucastnika_title'] ) {
        printf(
            '<td><div class="cfwc-custom-field-wrapper"><label class="label-for-data-input" for="nazev_pojistovny_ucastnika_data">%s</label><input type="text" id="nazev_pojistovny_ucastnika_data" name="nazev_pojistovny_ucastnika_data" value=""></div></td>',
            esc_html( $title['nazev_pojistovny_ucastnika_title'] )
            );
        
            }

    echo '</tr>';

    echo '<tr class="before-add-to-cart-data-input">';
    if( $title['alergie_ucastnika_title'] ) {
        printf(
            '<td><div class="cfwc-custom-field-wrapper"><label class="label-for-data-input" for="alergie_ucastnika_data">%s</label><textarea id="alergie_ucastnika_data" name="alergie_ucastnika_data" value="" rows="3" cols="50" style="vertical-align:middle;"></textarea></div></td>',
            esc_html( $title['alergie_ucastnika_title'] )
            );
        
            }

    echo '</tr>';
    echo '<tr class="before-add-to-cart-data-input">';
    if( $title['sportovni_omezeni_ucastnika_title'] ) {
        printf(
            '<td><div class="cfwc-custom-field-wrapper"><label class="label-for-data-input" for="sportovni_omezeni_ucastnika_data">%s</label><textarea id="sportovni_omezeni_ucastnika_data" name="sportovni_omezeni_ucastnika_data" value="" rows="3" cols="50" style="vertical-align:middle;"></textarea></div></td>',
            esc_html( $title['sportovni_omezeni_ucastnika_title'] )
            );
        
            }

    echo '</tr>';
    echo '<tr class="before-add-to-cart-data-input">';
    if( $title['poznamka_ucastnika_title'] ) {
        printf(
            '<td><div class="cfwc-custom-field-wrapper"><label class="label-for-data-input" for="poznamka_ucastnika_data">%s</label><textarea id="poznamka_ucastnika_data" name="poznamka_ucastnika_data" value="" rows="3" cols="50" style="vertical-align:middle;"></textarea></div></td>',
            esc_html( $title['poznamka_ucastnika_title'] )
            );
        
            }

    echo '</tr>';
    echo '</table>';
   }
   add_action( 'woocommerce_before_add_to_cart_button', 'pz_cfwc_display_custom_field' );
   
   
   
   /**
    * Add the text field as item data to the cart object
    * @since 1.0.0
    * @param Array $cart_item_data Cart item meta data.
    * @param Integer $product_id Product ID.
    * @param Integer $variation_id Variation ID.
    * @param Boolean $quantity Quantity
    */
   function pz_cfwc_add_custom_field_item_data( $cart_item_data, $product_id, $variation_id, $quantity ) {
    
    // Add the item data
    $cart_item_data['jmeno_ucastnika_data'] = $_POST['jmeno_ucastnika_data'];
    $cart_item_data['prijmeni_ucastnika_data'] = $_POST['prijmeni_ucastnika_data'];
    $cart_item_data['rodne_cislo_ucastnika_data'] = $_POST['rodne_cislo_ucastnika_data'];
    $cart_item_data['nazev_pojistovny_ucastnika_data'] = $_POST['nazev_pojistovny_ucastnika_data'];
    $cart_item_data['alergie_ucastnika_data'] = $_POST['alergie_ucastnika_data'];
    $cart_item_data['sportovni_omezeni_ucastnika_data'] = $_POST['sportovni_omezeni_ucastnika_data'];
    $cart_item_data['poznamka_ucastnika_data'] = $_POST['poznamka_ucastnika_data'];
    /*
    $product = wc_get_product( $product_id ); // Expanded function
    $price = $product->get_price(); // Expanded function
    $cart_item_data['total_price'] = $price; // Expanded function - when might want to add another price
    */
    
    return $cart_item_data;
   }
   add_filter( 'woocommerce_add_cart_item_data', 'pz_cfwc_add_custom_field_item_data', 10, 4 );
   
   
   /**
    * Display the custom field value in the cart
    * @since 1.0.0
    */
   function pz_cfwc_cart_item_name( $name, $cart_item, $cart_item_key ) {
    if( isset( $cart_item['jmeno_ucastnika_data'] ) ) {
          
    $name .= sprintf(
    '<br/><span><b>Jméno účastníka:</b> %s</span>',
    esc_html( $cart_item['jmeno_ucastnika_data'] )
    );
    }
    if ( isset( $cart_item['prijmeni_ucastnika_data'] ))
    {
    $name .= sprintf(
        '<br/><span><b>Příjmení účastníka:</b> %s</span>',
        esc_html( $cart_item['prijmeni_ucastnika_data'] )
        );
    }
    if( isset( $cart_item['rodne_cislo_ucastnika_data']  ))
    {
    $name .= sprintf(
        '<br/><span><b>Rodné číslo účastníka:</b> %s</span>',
        esc_html( $cart_item['rodne_cislo_ucastnika_data'] )
        );
    }
    if( isset( $cart_item['nazev_pojistovny_ucastnika_data']))
    {
    $name .= sprintf(
        '<br/><span><b>Název pojišťovny účastníka:</b> %s</span>',
        esc_html( $cart_item['nazev_pojistovny_ucastnika_data'] )
        );
    }
    if(isset( $cart_item['alergie_ucastnika_data'] ))
    {
    $name .= sprintf(
        '<br/><span><b>Informace o alergiích účastníka:</b> %s</span>',
        esc_html( $cart_item['alergie_ucastnika_data'] )
        );
    }
    if(isset( $cart_item['sportovni_omezeni_ucastnika_data'] ))
    {
    $name .= sprintf(
        '<br/><span><b>Sportovní omezení účastníka:</b> %s</span>',
        esc_html( $cart_item['sportovni_omezeni_ucastnika_data'] )
        );
    }
    if(isset( $cart_item['poznamka_ucastnika_data'] ))
    {
        $name .= sprintf(
            '<br/><span><b>Poznámka účastníka:</b> %s</span>',
            esc_html( $cart_item['poznamka_ucastnika_data'] )
            );
    }
    
    
    
    $name .='<br/>';
    //$name.=var_dump($cart_item);
    return $name;
   }
   add_filter( 'woocommerce_cart_item_name', 'pz_cfwc_cart_item_name', 10, 3 );
   
   /**
    * Add custom field to order object
    */
    function pz_cfwc_add_custom_data_to_order( $item, $cart_item_key, $values, $order ) {
        
        
        $item->add_meta_data( __( 'Jméno účastníka', 'cfwc' ), $values['jmeno_ucastnika_data'], true );
        $item->add_meta_data( __( 'Příjmení účastníka', 'cfwc' ), $values['prijmeni_ucastnika_data'], true );
        $item->add_meta_data( __( 'Rodné číslo účastníka', 'cfwc' ), $values['rodne_cislo_ucastnika_data'], true );
        $item->add_meta_data( __( 'Název pojišťovny účastníka', 'cfwc' ), $values['nazev_pojistovny_ucastnika_data'], true );
        $item->add_meta_data( __( 'Informace o alergiích účastníka', 'cfwc' ), $values['alergie_ucastnika_data'], true );
        $item->add_meta_data( __( 'Sportovní omezení účastníka', 'cfwc' ), $values['sportovni_omezeni_ucastnika_data'], true );
        $item->add_meta_data( __( 'Poznámka účastníka', 'cfwc' ), $values['poznamka_ucastnika_data'], true );
        
        
       }
       add_action( 'woocommerce_checkout_create_order_line_item', 'pz_cfwc_add_custom_data_to_order', 10, 4 );
