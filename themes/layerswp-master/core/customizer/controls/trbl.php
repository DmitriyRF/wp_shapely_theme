<?php  /**
 * TRBL Field (Top, Right, Bottm, Left)
 *
 * This file is used to register and display the custom Layers TRBL field
 *
 * @package Layers
 * @since Layers 1.0.0
 */

if( !class_exists( 'Layers_Customize_TRBL_Control' ) ) {
	
	class Layers_Customize_TRBL_Control extends Layers_Customize_Control {

		public $type = 'layers-trbl-fields';
		
		public $fields = array();

		public function render_content() {

			$form_elements = new Layers_Form_Elements();

			$values = false; ?>

			<div data-test id="layers-customize-control-<?php echo esc_attr( $this->id ); ?>" class="layers-customize-control layers-customize-control-<?php echo esc_attr( str_replace( 'layers-', '', $this->type ) ); ?> <?php echo esc_attr( $this->class ); ?>" <?php echo $this->get_linked_data(); ?> >
				
				<?php $this->render_history_actions(); ?>
				
				<?php if ( '' != $this->heading_divider ) { ?>
					<?php $this->render_heading_divider( $this->heading_divider ); ?>
				<?php } ?>
				
				<?php if ( '' != $this->label ) { ?>
					<span class="customize-control-title"><?php echo $this->label; ?></span>
				<?php } ?>
				
				<?php if ( '' != $this->description ) : ?>
					<div class="description customize-control-description">
						<?php echo $this->description; ?>
					</div>
				<?php endif; ?>

				<div class="layers-form-item">

					<?php if ( '' != $this->subtitle ) : ?>
						<label class="layers-form-row"><?php echo $this->subtitle; ?></label>
					<?php endif; ?>

					<div class="layers-form-item <?php echo ( $this->colspan ) ? esc_attr( "layers-column-flush layers-span-{$this->colspan}" ) : '' ?>">
						<?php echo $form_elements->input(
							array(
								'type' => 'trbl-fields',
								'name' => '',
								'id' => $this->id,
								'value' => array(
									'top' => get_option( "{$this->id}-top" ),
									'right' => get_option( "{$this->id}-right" ),
									'bottom' => get_option( "{$this->id}-bottom" ),
									'left' => get_option( "{$this->id}-left" ),
								),
   								'fields' => $this->fields,
							)
						); ?>
					</div>
				</div>

			</div>
			<?php
		}
	}
}