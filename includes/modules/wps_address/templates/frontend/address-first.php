<div class="wps-<?php echo $address_type; ?>-address" <?php if ( !empty( $first_address_checking ) && !$is_from_admin && $type == 'billing' ) { echo 'style="display: none;"'; } ?> id="wps-address-container-<?php echo $address_type_id; ?>">
	<div id="wps_address_error_container" ></div>
	<form id="wps_address_form_save_first_address" action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post">
<?php
		echo self::display_form_fields( $address_type_id, '', '', '', array(), array(), array(), get_current_user_id() );

	/** Check if a billing address is already save **/
	if ( $address_type_id != $billing_option['choice'] ) :
?>
		<label class="wps-form" >
			<input name="wps-shipping-to-billing" id="wps-shipping_to_billing" checked="checked" type="checkbox" />
			<?php _e( 'Use the same address for billing', 'wpshop' ); ?>
		</label>
<?php endif; ?>

		<button class="wps_submit_address_form wps-bton-first-alignRight-rounded"><?php _e('Save', 'wpshop'); ?></button>
	</form>
</div>