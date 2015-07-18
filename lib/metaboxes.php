<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_55aa9f48b6f91',
	'title' => 'Episode Details',
	'fields' => array (
		array (
			'key' => 'field_55aa9f6626c07',
			'label' => 'Audio File',
			'name' => 'audio_file',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_55aa9fb526c08',
			'label' => 'Show Duration',
			'name' => 'show_duration',
			'type' => 'text',
			'instructions' => 'Be sure to use HH:MM:SS format',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'podcast',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'custom_fields',
		4 => 'discussion',
		5 => 'comments',
		6 => 'revisions',
		7 => 'slug',
		8 => 'author',
		9 => 'format',
		10 => 'page_attributes',
		11 => 'featured_image',
		12 => 'categories',
		13 => 'tags',
		14 => 'send-trackbacks',
	),
));

endif;