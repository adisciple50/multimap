//install instructions for
//install instructions for building_map

<?php
function building_map_install(){
    // use get_t() to get the name of our localization function for translation
    // during install, when t() is not available.
    $t = get_t();
  
    // Define the node type.
    $node_example = array(
        'type' => 'node_example',
        'name' => $t('Example Node'),
        'base' => 'node_content',
        'description' => $t('This is an example node type with a few fields.'),
        'body_label' => $t('Example Description')
    );
  
    // Complete the node type definition by setting any defaults not explicitly
    // declared above.
    // http://api.drupal.org/api/function/node_type_set_defaults/7
    $content_type = node_type_set_defaults($node_example);
    node_add_body_field($content_type);
  
    // Save the content type
    //node_type_save($content_type);
    //function productcustomtype_install() {
    
    $content_type_values = array(
        'building_name' => '',
        'floor_name' => '',
        'floor_plan_image' => '',
        'Map_marker' => '',
        'Description' = '',
        'help' = '',
        'title_label' = $content_type_values['building_name'],
        'body_label' = '',
        'base' = '',
        'custom' => '1',
        'locked' = > '0'
        'modified' => '1'
    )
    // checks if the mysterious value known as 'op' is set (if it isnt it returns a blank string) - not sarcasm :(
    $op = isset($content_type_values['op']) ? $content_type_values['op'] : '';
    //trims the rest of the script - reason unknown.
    $type = node_type_set_defaults();
    $type->type = trim($content_type_values['type']);
    $type->name = trim($content_type_values['name']);
    $type->orig_type = trim($content_type_values['orig_type']);
    $type->old_type = isset($content_type_values['old_type']) ? $content_type_values['old_type'] : $type->type;
    $type->description = $content_type_values['description'];
    $type->help = $content_type_values['help'];
    $type->title_label = $content_type_values['title_label'];
    $type->body_label = $content_type_values['body_label'];
    // title_label is required in core; has_title will always be true, unless a
    // module alters the title field.
    $type->has_title = ($type->title_label = '');
    $type->has_body = ($type->body_label = '');
    $type->base = !empty($content_type_values['base']) ? $content_type_values['base'] : 'node_content';
    $type->custom = $content_type_values['custom'];
    $type->modified = true;
    $type->locked = $content_type_values['locked'];
    variable_set('teaser_length_' . 600);
    variable_set('node_preview_' . 1);
    
    $fc_item = entity_create('Map_marker',array(
    'Room_name' => '',
    'Room_types' => '',
    'Room_Coordinates' => ''
    'Room_image' => 'Room Image Link'
    
    )
    )
    
    // Code that would be here but is omitted loads a node called $my_node
    // Nodes of the type that is $my_node have a field of the field collection
    // type called field_text_files, which in turn is defined as having two
    // fields called field_source_txt_filename and field_source_txt_content
    // Begin by using the entity_create function to create a new entity of
    // type field_collection_item. The second parameter to the function
    // provides "an array of values to set, keyed by property name".
    // In our example, the field in my_node that holds the field collection is
    // the field_text_files field.
    //below variable is defined above.
    //$fc_item = entity_create('field_collection_item', array('field_name' => 'field_text_files'));
    // Now connect / attach the new field collection item to a node that
    // we loaded earlier in our code and stored in the $my_node variable.
    // The setHostEntity function is provided by the Field Collection module.
    $fc_item->setHostEntity('node', $type);
    // Now, we use the entity_metadata_wrapper function from the Entity
    // API to "wrap" the field collection entity in a class that simplifies
    // working with the entity.
    $fc_wrapper = entity_metadata_wrapper('Map_marker', $fc_item);
    // If we weren't using the entity_metadata_wrapper function, we'd have to
    // access and set field values within the field collection entity using this code:
    //
    // $fc_item->field_source_txt_filename[LANGUAGE_NONE][0]['value'] = $stat['name'];
    //
    // This code is obviously less readable and also not as friendly to translations
    // perhaps.
    // Now, we just put a string value into a field on the field collection entity
    // The set() method appears to be the preferred way to set values on
    // entity fields, as opposed doing an assignment of data to the value() property
    
    // LAST LEFT OFF HERE - PLEASE CODE BELOW
    
    $fc_wrapper->save(true);
    // Now save the node
    node_save($type);
    // As an alternative to node_save, you could use
    // field_attach_update('node', $my_node);
    // This function from the Field API saves field data for an existing entity but
    // doesn't save the entity itself. So, in the code above, the field_text_files field
    // that belongs to $my_node would get saved, but the $my_node node would
    // not get saved.
    
    // Saving the content type after saving the variables allows modules to act
    // on those variables via hook_node_type_insert().
    //add content type to admin menu
    $status = node_type_save($type);
    node_types_rebuild();
    menu_rebuild();
    $t_args = array('%name' => $type->name);
    if ($status == SAVED_UPDATED)
    {
        drupal_set_message(t('The content type %name has been updated.', $t_args));
    } elseif ($status == SAVED_NEW)
    {
        drupal_set_message(t('The content type %name has been added.', $t_args));
        watchdog('node', 'Added content type %name.', $t_args, WATCHDOG_NOTICE, l(t('view'), 'admin/structure/types'));
    }
}

function building_map_uninstall() {
    // Gather all the example content that might have been created while this
    // module was enabled.  Simple selects still use db_query().
    // http://api.drupal.org/api/function/db_query/7
    $sql = 'SELECT nid FROM {node} n WHERE n.type = :type';
    $result = db_query($sql, array(':type' => 'node_example'));
    $nids = array();
    foreach ($result as $row) {
        $nids[] = $row->nid;
    }
    // Delete all the nodes at once
    // http://api.drupal.org/api/function/node_delete_multiple/7
    node_delete_multiple($nids);
    // Delete our content type
    // http://api.drupal.org/api/function/node_type_delete/7
    node_type_delete('node_example');
?>
