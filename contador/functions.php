<?php //Registrar estilos
add_action('wp_enqueue_scripts', 'contador_enqueue_styles');
function contador_enqueue_styles(){
    //Hoja de estilos
    wp_enqueue_style('style', get_template_directory_uri( ).'./styles/styles.css');
}


//Registrar Scripts
add_action( 'wp_enqueue_scripts', 'contador_enqueue_scripts');
function contador_enqueue_scripts(){
    wp_enqueue_script( 'main', get_template_directory_uri(  ).'./main.js');
}


add_theme_support( 'custom-logo', array(

    //Alto
    'height' => 100,
    //Ancho
    'width' => 100,
    //PERMITIR FLEXIBILIDAD EN EL TAMAÑO
	'flex-height' => true,
    'flex-width'  => true,
    //
	'header-text' => array( 'site-title', 'site-description' )

) );

add_filter('get_custom_logo_image_attributes', 'img_custom_logo_class');

function img_custom_logo_class($custom_logo_attr){
    $custom_logo_attr = array( 
            'class' => 'img',
            'width' => 100,
            'height' => 1000
    );
    return $custom_logo_attr;
}


function contador_widget_init(){

    register_sidebar( 
        array(

            'name'  => 'Subtitulo',
            'id'    => 'desc',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   =>  ''


        ));
}

add_action('widgets_init', 'contador_widget_init');


class DSCRIPTION_RV extends WP_Widget{


    function __construct() {
		parent::__construct(
			'subtitle_widget_rv', 
			esc_html__( 'RV-Subtitulo', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Muestra un texto debajo del titulo', 'text_domain' ), ) 
		);
	}

    public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

        $subtitulo = $instance['subtitulo_rv']


        ?>
        
        <p class="desc"><?php echo $subtitulo ?></p>
        <?php 
	}

    public function form( $instance ) {
		$subtitulo = ! empty( $instance['subtitulo_rv'] ) ? $instance['subtitulo_rv'] : esc_html__( '', 'rv_subtitulo' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'subtitulo_rv' ) ); ?>">
            <?php esc_attr_e( 'Agrega un texto', 'rv_subtitulo' ); ?>
        </label> 
		<input class="widefat" 
        id="<?php echo esc_attr( $this->get_field_id( 'subtitulo_rv' ) ); ?>" 
        name="<?php echo esc_attr( $this->get_field_name( 'subtitulo_rv' ) ); ?>" 
        type="text" value="<?php echo esc_attr( $subtitulo ); ?>">
		</p>
		<?php 
	}


    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['subtitulo_rv'] = ( ! empty( $new_instance['subtitulo_rv'] ) ) ? sanitize_text_field( $new_instance['subtitulo_rv'] ) : '';

		return $instance;
	}

}
function registrar_rv_plugin_contador() {
    register_widget( 'DSCRIPTION_RV' );

}
add_action( 'widgets_init', 'registrar_rv_plugin_contador' );


?>