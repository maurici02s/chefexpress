<?php 
    $hostname = "localhost";
    $bancodedados = "pi";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if ($mysqli->connect_error) {
        echo "falha ao conecetar :(" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
    }
    else
        echo "Conectado ao Banco de Dados";

        // Method 1: Filter.
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyA2gmMHnT_bdZ_q4smxpmlRFnzjXH2DOuU';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// Method 2: Setting.
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyA2gmMHnT_bdZ_q4smxpmlRFnzjXH2DOuU');
}
add_action('acf/init', 'my_acf_init');

function add_action(
    string $hook_name,
    callable $callback,
    int $priority = 10,
    int $accepted_args = 1
): bool
?>

<?php 
$location = get_field('location');
if( $location ): ?>
    <div class="acf-map" data-zoom="16">
        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
    </div>
<?php endif; ?>