<?php
$permalink_option = get_option( 'permalink_structure' );
$account_page_id = wpshop_tools::get_page_id( get_option( 'wpshop_myaccount_page_id' ) );
?>

<?php $user_ID = get_current_user_id(); ?>

<?php if ( 0 !== $user_ID ) : ?>
<div class="wps-user-dashboard">
	<?php $account_user = get_userdata( $user_ID ); ?>
	<span class="wps-user-name">
		<?php _e( 'Hello', 'wpshop' ); ?>
		<strong><?php echo $account_user->data->user_login; ?></strong>
	</span>
	<span class="wps-user-thumbnail">
		<?php echo get_avatar( $user_ID, 40 ); ?> 
	</span>
	<a href="<?php echo wp_logout_url( site_url() ); ?>" class="" title="<?php _e( 'Log out', 'wpshop' ); ?>">		
		<i class="wps-icon-power"></i>
	</a>
</div>
<?php endif; ?>

<section class="wps-section-account">
	<div class="wps-section-taskbar">
		<ul>
			<li class="<?php echo ( ( empty($_GET['account_dashboard_part']) || ( !empty($_GET['account_dashboard_part']) && $_GET['account_dashboard_part'] == 'account' ) ) ? 'wps-activ' : '' ); ?>">
				<a data-target="menu1" href="<?php echo get_permalink($account_page_id).( (!empty($permalink_option) ? '?' : '&' ).'account_dashboard_part=account' ); ?>" title="" class="">
					<i class="wps-icon-user"></i>
					<span><?php _e( 'My account', 'wpshop'); ?></span>
				</a>
			</li>
			<li class="<?php echo ( ( !empty($_GET['account_dashboard_part']) && $_GET['account_dashboard_part'] == 'address') ? 'wps-activ' : '' ); ?>">
				<a href="<?php echo get_permalink($account_page_id).( (!empty($permalink_option) ? '?' : '&' ).'account_dashboard_part=address' ); ?>" title="" class="">
					<i class="wps-icon-address"></i>
					<span><?php _e( 'My addresses', 'wpshop'); ?></span>
				</a>
			</li>
			<li class="<?php echo ( ( !empty($_GET['account_dashboard_part']) && $_GET['account_dashboard_part'] == 'order') ? 'wps-activ' : '' ); ?>">
				<a href="<?php echo get_permalink($account_page_id).( (!empty($permalink_option) ? '?' : '&' ).'account_dashboard_part=order' ); ?>" title="" class="">
					<i class="wps-icon-truck"></i>
					<span><?php _e( 'My orders', 'wpshop'); ?></span>
				</a>
			</li>
			<li class="<?php echo ( ( !empty($_GET['account_dashboard_part']) && $_GET['account_dashboard_part'] == 'coupon') ? 'wps-activ' : '' ); ?>">
				<a href="<?php echo get_permalink($account_page_id).( (!empty($permalink_option) ? '?' : '&' ).'account_dashboard_part=coupon' ); ?>" title="" class="">
					<i class="wps-icon-promo"></i>
					<span><?php _e( 'My coupons', 'wpshop'); ?></span>
				</a>
			</li>
			<?php $opinion_option = get_option( 'wps_opinion' );
			if( !empty($opinion_option) && !empty($opinion_option['active']) ) : ?>
			<li class="<?php echo ( ( !empty($_GET['account_dashboard_part']) && $_GET['account_dashboard_part'] == 'opinion') ? 'wps-activ' : '' ); ?>">
				<a href="<?php echo get_permalink($account_page_id).( (!empty($permalink_option) ? '?' : '&' ).'account_dashboard_part=opinion' ); ?>" title="" class="">
					<i class="wps-icon-chat"></i>
					<span><?php _e( 'My opinions', 'wpshop'); ?></span>
				</a>
			</li>
			<?php endif; ?>
			<li class="<?php echo ( ( !empty($_GET['account_dashboard_part']) && $_GET['account_dashboard_part'] == 'messages') ? 'wps-activ' : '' ); ?>">
				<a href="<?php echo get_permalink($account_page_id).( (!empty($permalink_option) ? '?' : '&' ).'account_dashboard_part=messages' ); ?>" title="" class="">
					<i class="wps-icon-email"></i>
					<span><?php _e( 'My messages', 'wpshop' ); ?></span>
				</a>
			</li>
			<?php echo apply_filters('wps_my_account_extra_part_menu', ''); ?>
		</ul>
	</div>
	<div class="wps-section-content">
		<div class="wps-activ" id="wps_dashboard_content">
			<?php echo $content; ?>
		</div>
	</div>
</section>
