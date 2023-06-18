<?php

/**
 * Tickets system Configs and defaults
 */

return [
    /*
     * the default status for new tickets
     */
    'default_status_id' => 1,

    /*
     * default status for closing tickets
     */
    'default_close_status_id' => false,

    /*
     * default status for re-opening tickets
     */
    'default_reopen_status_id' => false,

    /*
     * pagination length for tickets page
     */
    'paginate_items' => 10,

    /*
     * send email notification
     */

    /*
     * send changing status notification
     */
    'status_notification' => true,

    /*
     * send new comments notification
     */
    'comments_notification' => true,

    /*
     * notify agent for assigned to tickets
     */
    'assigned_notifications' => true,

    /*
     * restrict agent to have access to only their tickets
     */
    'agent_restricted' => true,


    /*
     * Tickets Permissions
     */

    /*
     * closing ticket permission
     */
    'close_ticket_perm' => [
        'owner' => true,
        'agent' => true,
        'admin' => true,
    ],

    /*
     * Editors Settings
     */
    'user_editor_enabled' => false,
    'agent_editor_enabled' => true,
    'admin_editor_enabled' => true,

    /*
     * enable code view
     */

    'enable_html_code_view' => false,

    /*
    * Init values for summernote js text editor in JSON
    * See available options here: http://summernote.org/deep-dive/#initialization-options
    *
    * This setting stores the path to the json config file, relative to project route
    */
    'summernote_options_json_file' => 'vendor/blackpanda/laravel-ticket/src/JSON/summernote_init.json',

    /*
    * Set which html tags are allowed
    *
    * This overrides the settings part of this file: https://github.com/mewebstudio/Purifier/blob/master/config/purifier.php
    * The same config can be achieved by running php artisan vendor:publish and modifying config/purifier.php
    *
    * Full docs: http://htmlpurifier.org/docs
    */

    'purifier_config' => [
        'HTML.SafeIframe' => 'true',
        'URI.SafeIframeRegexp' => '%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%',
        'URI.AllowedSchemes' => ['data' => true, 'http' => true, 'https' => true, 'mailto' => true, 'ftp' => true],
    ],


];
