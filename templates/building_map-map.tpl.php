<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<?php print $content['field_room_name']['#items']['0']['value'] ?>


<div class="map wrapper" value="guildhall"><!--Indentify building-->
		<div class="map sidebar active">
			<header>
				<h1>Welcome to the <dt class="building"><?php print $title; ?></dt></h1>
			</header>
			<section id="picker" name="floor picker">
				<ol>
					<?php //FLOOR LIST
						$floor_count = $content['field_number_of_floors']['#items']['0']['value'];
						if($floor_count == 1){
							print '<li class="active one" value="one">Floor One</li>';
						}
						elseif($floor_count == 2){
							print '<li class="active one" value="one">Floor One</li>
							<li class="two" value="two">Floor Two</li>';
						}
						elseif($floor_count == 3){
							print '<li class="active one" value="one">Floor One</li>
							<li class="two" value="two">Floor Two</li>
							<li class="three" value="three">Floor Three</li>';
						}
						elseif($floor_count == 4){
							print '<li class="active one" value="one">Floor One</li>
							<li class="two" value="two">Floor Two</li>
							<li class="three" value="three">Floor Three</li>
							<li class="four" value="three">Floor Four</li>';
						}
						elseif($floor_count == 5){
							print '<li class="active one" value="one">Floor One</li>
							<li class="two" value="two">Floor Two</li>
							<li class="three" value="three">Floor Three</li>
							<li class="four" value="three">Floor Four</li>
							<li class="five" value="three">Floor Five</li>';
						}
					?>
				</ol>
				<button class="internal active">Inside</button>
				<button class="contact inactive">Location</button>
			</section>
			<header>
				<h1 class="dynamic">About floor four</h1>
			</header>
			<section id="about-floor" name="about-building">
				
				<table class="key">
					<!--Dynamicly Added-->
				</table>
			</section>
			
			<section id="building-meta">
				<label>Phone:</label>
				<strong>01225 394041</strong>
				<label>Address:</label>
				<strong>Highstreet</strong>
				
				<h1>Travel Maps</h1>
				<h4>Other Council Buildings</h3>
				<select class="neo">
					<option value="this-building">Guildhall</option>
					<option>Lewis House</option>
					<option>Riverside</option>
					<option>Hollies</option>
				</select>
				<h4>Go from here</h3>
				<select class="neo">
					<option class="travel">Train Station</option>
					<option class="travel">Bus Station</option>
					<option class="travel">Bike in Bath</option>
					<option class="travel">Taxi Rank</option>
				</select>
			</section>
		</div>
		<div class="map main">
				
		<?php
		function floorOne(){
		include mysqli;
		$conn = new mysqli('localhost','root','','acronamy');
		if ($conn->connect_error) {
				trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
		}
		$sqlquery1 = "SELECT field_map_marker_field_room_name_value,field_map_marker_field_room_type_value,field_map_marker_field_image_map_coordinates_value FROM field_data_field_map_marker ";
		$results = $conn->query($sqlquery1);
		if($results === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		} else {
				$rows_returned = $results->num_rows;
		}
		$results->data_seek(0);
		;
		while($row = $results->fetch_assoc()){
				echo '<area coords="' . $row['field_map_marker_field_image_map_coordinates_value'] . '" class="' . $row['field_map_marker_field_room_type_value'] . '" alt="' . $row['field_map_marker_field_room_name_value'] . '"/>';
		};
		}
		
function floorTwo(){
		include mysqli;
		$conn = new mysqli('localhost','root','','acronamy');
		if ($conn->connect_error) {
				trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
		}
		$sqlquery1 = "SELECT field_map_marker_floor_two_field_room_name_value,field_map_marker_floor_two_field_room_type_value,field_map_marker_floor_two_field_image_map_coordinates_value FROM field_data_field_map_marker_floor_two ";
		$results = $conn->query($sqlquery1);
		if($results === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		} else {
				$rows_returned = $results->num_rows;
		}
		$results->data_seek(0);
		;
		
		while($row = $results->fetch_assoc()){
				echo '<area coords="' . $row['field_map_marker_floor_two_field_image_map_coordinates_value'] . '" class="' . $row['field_map_marker_floor_two_field_room_type_value'] . '" alt="' . $row['field_map_marker_floor_two_field_room_name_value'] . '"/>';
		};
}
function floorThree(){
		include mysqli;
		$conn = new mysqli('localhost','root','','acronamy');
		if ($conn->connect_error) {
				trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
		}
		$sqlquery1 = "SELECT field_map_marker_floor_three_field_room_name_value,field_map_marker_floor_three_field_room_type_value,field_map_marker_floor_three_field_image_map_coordinates_value FROM field_data_field_map_marker_floor_three ";
		$results = $conn->query($sqlquery1);
		if($results === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		} else {
				$rows_returned = $results->num_rows;
		}
		$results->data_seek(0);
		;
		
		while($row = $results->fetch_assoc()){
				echo '<area coords="' . $row['field_map_marker_floor_three_field_image_map_coordinates_value'] . '" class="' . $row['field_map_marker_floor_three_field_room_type_value'] . '" alt="' . $row['field_map_marker_floor_three_field_room_name_value'] . '"/>';
		};
}
function floorFour(){
		include mysqli;
		$conn = new mysqli('localhost','root','','acronamy');
		if ($conn->connect_error) {
				trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
		}
		$sqlquery1 = "SELECT field_map_marker_floor_four_field_room_name_value,field_map_marker_floor_four_field_room_type_value,field_map_marker_floor_four_field_image_map_coordinates_value FROM field_data_field_map_marker_floor_four ";
		$results = $conn->query($sqlquery1);
		if($results === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		} else {
				$rows_returned = $results->num_rows;
		}
		$results->data_seek(0);
		;
		
		while($row = $results->fetch_assoc()){
				echo '<area coords="' . $row['field_map_marker_floor_four_field_image_map_coordinates_value'] . '" class="' . $row['field_map_marker_floor_four_field_room_type_value'] . '" alt="' . $row['field_map_marker_floor_four_field_room_name_value'] . '"/>';
		};
}
function floorFive(){
		include mysqli;
		$conn = new mysqli('localhost','root','','acronamy');
		if ($conn->connect_error) {
				trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
		}
		$sqlquery1 = "SELECT field_map_marker_floor_five_field_room_name_value,field_map_marker_floor_five_field_room_type_value,field_map_marker_floor_five_field_image_map_coordinates_value FROM field_data_field_map_marker_floor_five ";
		$results = $conn->query($sqlquery1);
		if($results === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		} else {
				$rows_returned = $results->num_rows;
		}
		$results->data_seek(0);
		;
		
		while($row = $results->fetch_assoc()){
				echo '<area coords="' . $row['field_map_marker_floor_five_field_image_map_coordinates_value'] . '" class="' . $row['field_map_marker_floor_five_field_room_type_value'] . '" alt="' . $row['field_map_marker_floor_five_field_room_name_value'] . '"/>';
		};
}
?>
				
				
			<h1 id="room-name">Select a room</h1>
			<?php // FLOOR PLAN IMAGES
						if($floor_count == 1){
							print '<img usemap="#floor-one" class="floor one active" src="'. file_create_url($node->field_floor_plan_one['und'][0]['uri']) .'">';
						print '<map id="floor-one" class="active one" name="guild-floor-one">';
								floorOne();
						print '</map>';
						}
						elseif($floor_count == 2){
							print '<img usemap="#floor-one" class="floor one active" src="'. file_create_url($node->field_floor_plan_one['und'][0]['uri']) .'">';
							print '<img usemap="#floor-two" class="floor two" src="'. file_create_url($node->field_floor_plan_two['und'][0]['uri']) .'">';
						print '<map id="floor-one" class="active" name="guild-floor-one">';	
							floorOne();
						print '</map>';
						print '<map id="floor-two" class="two" name="guild-floor-two">';	
							floorTwo();
						print '</map>';
						}
						elseif($floor_count == 3){
							print '<img usemap="#floor-one" class="floor one active" src="'. file_create_url($node->field_floor_plan_one['und'][0]['uri']) .'">';
							print '<img usemap="#floor-two" class="floor two" src="'. file_create_url($node->field_floor_plan_two['und'][0]['uri']) .'">';
							print '<img usemap="#floor-three" class="floor three" src="'. file_create_url($node->field_floor_plan_three['und'][0]['uri']) .'">';
						print '<map id="floor-one" class="active one" name="guild-floor-one">';	
							floorOne();
						print '</map>';
						print '<map id="floor-two" class="two" name="guild-floor-two">';	
							floorTwo();
						print '</map>';
						print '<map id="floor-three" class="three" name="guild-floor-three">';	
							floorThree();
						print '</map>';
						}
						elseif($floor_count == 4){
							print '<img usemap="#floor-one" class="floor one active" src="'. file_create_url($node->field_floor_plan_one['und'][0]['uri']) .'">';
							print '<img usemap="#floor-two" class="floor two" src="'. file_create_url($node->field_floor_plan_two['und'][0]['uri']) .'">';
							print '<img usemap="#floor-three" class="floor three" src="'. file_create_url($node->field_floor_plan_three['und'][0]['uri']) .'">';
							print '<img usemap="#floor-four" class="floor four" src="'. file_create_url($node->field_floor_plan_four['und'][0]['uri']) .'">';
						print '<map id="floor-one" class="active one" name="guild-floor-one">';	
							floorOne();
						print '</map>';
						print '<map id="floor-two" class="two" name="guild-floor-two">';	
							floorTwo();
						print '</map>';
						print '<map id="floor-three" class="three" name="guild-floor-three">';	
							floorThree();
						print '</map>';
						print '<map id="floor-four" class="four" name="guild-floor-four">';	
							floorFour();
						print '</map>';
						}
						elseif($floor_count == 5){
							print '<img usemap="#floor-one" class="floor one active" src="'. file_create_url($node->field_floor_plan_one['und'][0]['uri']) .'">';
							print '<img usemap="#floor-two" class="floor two" src="'. file_create_url($node->field_floor_plan_two['und'][0]['uri']) .'">';
							print '<img usemap="#floor-three" class="floor three" src="'. file_create_url($node->field_floor_plan_three['und'][0]['uri']) .'">';
							print '<img usemap="#floor-four" class="floor four" src="'. file_create_url($node->field_floor_plan_four['und'][0]['uri']) .'">';
							print '<img usemap="#floor-five" class="floor five" src="'. file_create_url($node->field_floor_plan_five['und'][0]['uri']) .'">';
						print '<map id="floor-one" class="active one" name="guild-floor-one">';	
							floorOne();
						print '</map>';
						print '<map id="floor-two" class="two" name="guild-floor-two">';	
							floorTwo();
						print '</map>';
						print '<map id="floor-three" class="three" name="guild-floor-three">';	
							floorThree();
						print '</map>';
						print '<map id="floor-four" class="four" name="guild-floor-four">';	
							floorFour();
						print '</map>';
						print '<map id="floor-five" class="five" name="guild-floor-five">';	
							floorFive();
						print '</map>';	
						}
					?>
			<?php print render($content['field_html_image_maps']) ?>
			<section class="contact wrapper" name="gmap">
				<!--maps render here-->
			</section>
		</div>
	</div>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print "<div class='slug'>";
      print render($content);
      print "</div>";
    ?>
  </div>			