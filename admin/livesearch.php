<?php
/**
 * settings page for live search
 */

//wp_enqueue_script("wp_ajax_response");

if (isset($_POST['livesearch_settings_form_submit']) &&
    $_POST['livesearch_settings_form_submit'] == 'Y') {

    // save settings submit. save user input to database.
    update_option('livesearch_input_id',
            stripslashes($_POST['livesearch_input_id']));
    update_option('livesearch_filter_options',
            stripslashes($_POST['livesearch_filter_options']));

    // show the message.
    echo '<div class="updated"><p><strong>Settings Updated</strong></p></div>';
}

$options = get_option('livesearch_filter_options');
if($options === false) {
    // no options set up yet, set the default.
    // This is a sample default filter options, based on the 
    // solr syntax.
    $options = st_livesearch_default_options();
}

$input_id = get_option('livesearch_input_id');
if($input_id === false) {
    // the default input id will be livesearch.
    $input_id = 'livesearch';
}
?>

<div class="wrap">
  <h2>Search Toolkit - LiveSearch Settings</h2>
  <p>General settings for live searchb box.</p>

  <form name="livesearch_settings_form" method="post">
    <input type="hidden" name="livesearch_settings_form_submit"
           value="Y"/>
    <table class="form-table"><tbody>
      <tr>
        <th scope="row">Live Search Input Box ID:</th>
        <td>
          <input name="livesearch_input_id" size="80"
                 value="<?php echo $input_id;?>"
          >
        </td>
      </tr>
      <tr>
        <th scope="row">Live Search Filter Options: <br/>
        (One Filter Each Line)
        </th>
        <td>
          <textarea name="livesearch_filter_options"
                    rows="6" cols="98"
          ><?php echo $options;?></textarea>
        </td>
      </tr>
      <tr>
        <th scope="row"><input type="submit" name="saveSetting" 
            class="button-primary" value="Save Settings" />
        </th>
        <td></td>
      </tr>
    </tbody></table>
  </form>
</div>
