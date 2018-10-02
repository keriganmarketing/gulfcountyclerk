<?php

/**
 * Registers the `tax_deed_sale` post type.
 */
function tax_deed_sale_init() {
	register_post_type( 'tax-deed-sale', array(
		'labels'                => array(
			'name'                  => __( 'Tax Deed Sales', 'wordplate' ),
			'singular_name'         => __( 'Tax Deed Sale', 'wordplate' ),
			'all_items'             => __( 'All Tax Deed Sales', 'wordplate' ),
			'archives'              => __( 'Tax Deed Sale Archives', 'wordplate' ),
			'attributes'            => __( 'Tax Deed Sale Attributes', 'wordplate' ),
			'insert_into_item'      => __( 'Insert into Tax Deed Sale', 'wordplate' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Tax Deed Sale', 'wordplate' ),
			'featured_image'        => _x( 'Featured Image', 'tax-deed-sale', 'wordplate' ),
			'set_featured_image'    => _x( 'Set featured image', 'tax-deed-sale', 'wordplate' ),
			'remove_featured_image' => _x( 'Remove featured image', 'tax-deed-sale', 'wordplate' ),
			'use_featured_image'    => _x( 'Use as featured image', 'tax-deed-sale', 'wordplate' ),
			'filter_items_list'     => __( 'Filter Tax Deed Sales list', 'wordplate' ),
			'items_list_navigation' => __( 'Tax Deed Sales list navigation', 'wordplate' ),
			'items_list'            => __( 'Tax Deed Sales list', 'wordplate' ),
			'new_item'              => __( 'New Tax Deed Sale', 'wordplate' ),
			'add_new'               => __( 'Add New', 'wordplate' ),
			'add_new_item'          => __( 'Add New Tax Deed Sale', 'wordplate' ),
			'edit_item'             => __( 'Edit Tax Deed Sale', 'wordplate' ),
			'view_item'             => __( 'View Tax Deed Sale', 'wordplate' ),
			'view_items'            => __( 'View Tax Deed Sales', 'wordplate' ),
			'search_items'          => __( 'Search Tax Deed Sales', 'wordplate' ),
			'not_found'             => __( 'No Tax Deed Sales found', 'wordplate' ),
			'not_found_in_trash'    => __( 'No Tax Deed Sales found in trash', 'wordplate' ),
			'parent_item_colon'     => __( 'Parent Tax Deed Sale:', 'wordplate' ),
			'menu_name'             => __( 'Tax Deed Sales', 'wordplate' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-format-aside',
		'show_in_rest'          => true,
		'rest_base'             => 'tax-deed-sale',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'tax_deed_sale_init' );

/**
 * Sets the post updated messages for the `tax_deed_sale` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `tax_deed_sale` post type.
 */
function tax_deed_sale_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['tax-deed-sale'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Tax Deed Sale updated. <a target="_blank" href="%s">View Tax Deed Sale</a>', 'wordplate' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wordplate' ),
		3  => __( 'Custom field deleted.', 'wordplate' ),
		4  => __( 'Tax Deed Sale updated.', 'wordplate' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Tax Deed Sale restored to revision from %s', 'wordplate' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Tax Deed Sale published. <a href="%s">View Tax Deed Sale</a>', 'wordplate' ), esc_url( $permalink ) ),
		7  => __( 'Tax Deed Sale saved.', 'wordplate' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Tax Deed Sale submitted. <a target="_blank" href="%s">Preview Tax Deed Sale</a>', 'wordplate' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Tax Deed Sale scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Tax Deed Sale</a>', 'wordplate' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Tax Deed Sale draft updated. <a target="_blank" href="%s">Preview Tax Deed Sale</a>', 'wordplate' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'tax_deed_sale_updated_messages' );

function getTaxDeeds() {
	$targs = [
		'posts_per_page'   => -1,
		'orderby'          => 'meta_value',
		'order'            => 'DESC',
		'meta_key'         => 'date',
		'meta_value'       => '',
		'post_type'        => 'tax-deed-sale',
		'post_status'      => 'publish' 
	];
		
	$deeds = get_posts( $targs );
	$i = 1;
	$j = 0;

	$output = '<div>';

		foreach($deeds as $deed){
			$id = $deed->ID;
			$date = get_field('date',$id);
			$taxcert = get_field('tax_cert',$id);
			$taxdeed = get_field('tax_deed',$id);
			$parcel = get_field('parcel',$id);
			$bid = get_field('opening_bid',$id);
			$dep = get_field('estimated_minimum_deposit',$id);
			$high_bid = get_field('high_bid',$id);
			$surplus_funds = get_field('surplus_funds',$id);
			$lands_available = get_field('lands_available',$id);
			$applicant = get_field('applicant',$id);
			$owner = get_field('owner',$id);
			$descrip = get_field('legal_description',$id);
			$oereport = get_field('owner_&_encumbrance_reports',$id);
			$claim_form = get_field('claim_form',$id);
			$status = get_field('status',$id);
			$today = date('Ymd');
			$match_date = date('Ymd', strtotime($date));

			if((($match_date >= $today) && ($status != 'unpublished')) || $status == 'surplus'){
				$j++;
				$output .= '<div class="shadow mb-2">';
				$output .= '<div class="d-flex flex-wrap bg-dark text-white py-2">';
				$output .= '	<div class="col-md-auto">
									<p class="text-center m-0">
									<span class="d-lock d-md-inline-block mx-1" >Sale Date</span>
									'.date('m/d/y', strtotime($date)).'
									</p>
								</div>';
				$output .= '	<div class="col-md-auto">
									<p class="text-center m-0">
									<span class="d-lock d-md-inline-block mx-1" >Certificate No.</span>
									<a target="_blank" class="text-white" style="text-decoration: underline; cursor:pointer;" href="http://www.gulfcountytaxcollector.com/Property/TASearchResults?ownername=&streetnumber=&streetname=&propertynumber='.$parcel.'&taxbillnumber=&RollTypes=&Years=">
										'.$taxcert.'
									</a></p>
								</div>';
				$output .= '	<div class="col-md-auto">
									<p class="text-center m-0">
									<span class="d-lock d-md-inline-block mx-1" >Case No.</span>';
				if($oereport['url']!=''){ $output .= '<a target="_blank" style="text-decoration: underline; cursor:pointer;" class="text-white" href="'.$oereport['url'].'">'; }
				$output .= 				$taxdeed;
				if($oereport['url']!=''){ $output .= '</a>'; }
				$output .= '		</p>
								</div>';
				$output .= '	<div class="col-md-auto">
									<div class="text-center sizeable-element " style="line-height: 1.8em;">
										<span class="d-lock d-md-inline-block mx-1" >Parcel ID </span>			
										<form action="http://qpublic6.qpublic.net/fl_alsearch_dw.php" method="post" target="_blank" class="form-inline d-inline m-0 p-0">
										<input type="HIDDEN" name="BEGIN" value="0" />
										<input type="HIDDEN" name="INPUT" value="'.$parcel.'" />
										<input type="HIDDEN" name="searchType" value="parcel_id" />
										<input type="HIDDEN" name="county" value="fl_gulf" />
										<button type="submit" class="border-0 m-0 p-0 bg-transparent text-white d-inline" style="text-decoration: underline; cursor:pointer; line-height:1rem;" >'.$parcel.'</button>
										</form>
									</div>
								</div>';
				$output .= '	<div class="col-md-auto ml-md-auto text-center text-md-right" >';
				if($status!=''){ $output .= '<p class="m-0"><strong style="text-transform: uppercase;">' . $status . '</strong></p>'; }
				$output .= '	</div>
							</div>';
				$output .= '<div class="d-flex flex-wrap py-2 text-center text-md-left">';
				$output .= '	<div class="col-md-3">
									<p class="m-0 mx-1">
									<strong>Applicant</strong><br>
									'.$applicant.'</p>
								</div>';
				$output .= '	<div class="col-md-3 px-4">
									<p class="m-0 mx-1">
									<strong>Owner</strong><br>
									'.$owner.'</p>
								</div>';
				$output .= '	<div class="col-md-3 px-4">
									<p class="m-0 mx-1">
									<strong>Location</strong><br>
									'.$descrip.'</p>
								</div>';
				$output .= '	<div class="col-md-3 ml-md-auto text-center text-md-right" >';
				$output .= '		<p class="m-0 mx-1">';
				if($bid!=''){ 		
					$output .= '		<strong>$'.$bid.'</strong>';
					if($dep != ''){
						$output .=      '<br>Est. Min. Deposit: $' . $dep;
					} 
				}elseif($surplus_funds!=''){
					if($claim_form!=''){ 
						$output .= '<a target="_blank" class="text-white" href="'.$claim_form['url'].'" >'; 
					}
					$output .= '		<strong>$'.$surplus_funds.'</strong>';
					if($claim_form!=''){ 
						$output .= '</a>'; 
					}
				}
				$output .= '	</p></div>';
				$output .= '	</div>';
				$output .= '</div>';
				$i++;
			}
		}

	if($j<1){ $output .= '<p>There are currently no tax deed sales available, please check back soon for future sales.</p>'; }

	$output .= '</div>';

	return $output;
}
add_shortcode( 'kma_taxdeeds', 'getTaxDeeds' );