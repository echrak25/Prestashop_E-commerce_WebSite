<?php
/**
 * Copyright ETS Software Technology Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
 */

if (!defined('_PS_VERSION_')) { exit; }

if (!class_exists('MCAPI', false)) {
class MCAPI {
    var $version = "1.2";
    var $errorMessage;
    var $errorCode;

    /**
     * Cache the information on the API location on the server
     */
    var $apiUrl;

    /**
     * Default to a 300 second timeout on server calls
     */
    var $timeout = 300;

    /**
     * Default to a 8K chunk size
     */
    var $chunkSize = 8192;

    /**
     * Cache the user api_key so we only have to log in once per client instantiation
     */
    var $api_key;

    /**
     * Cache the user api_key so we only have to log in once per client instantiation
     */
    var $secure = false;

    /**
     * Connect to the MailChimp API for a given list.
     *
     * @param string $apikey Your MailChimp apikey
     * @param string $secure Whether or not this should use a secure connection
     */
    public function __construct($apikey, $secure=false) {
        $this->secure = $secure;
        $this->apiUrl = parse_url("http://api.mailchimp.com/" . $this->version . "/?output=php");
        $this->api_key = $apikey;
    }
    public function setTimeout($seconds){
        if (is_int($seconds)){
            $this->timeout = $seconds;
            return true;
        }
    }
    public function getTimeout(){
        return $this->timeout;
    }
    public function useSecure($val){
        if ($val===true){
            $this->secure = true;
        } else {
            $this->secure = false;
        }
    }

    /**
     * Unschedule a campaign that is scheduled to be sent in the future
     *
     * @section Campaign  Related
     * @example mcapi_campaignUnschedule.php
     * @example xml-rpc_campaignUnschedule.php
     *
     * @param string $cid the id of the campaign to unschedule
     * @return boolean true on success
     */
    public function campaignUnschedule($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignUnschedule", $params);
    }

    
    public function campaignSchedule($cid, $schedule_time, $schedule_time_b=NULL) {
        $params = array();
        $params["cid"] = $cid;
        $params["schedule_time"] = $schedule_time;
        $params["schedule_time_b"] = $schedule_time_b;
        return $this->callServer("campaignSchedule", $params);
    }

    /**
     * Resume sending an AutoResponder or RSS campaign
     *
     * @section Campaign  Related
     *
     * @param string $cid the id of the campaign to pause
     * @return boolean true on success
     */
    public function campaignResume($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignResume", $params);
    }

    /**
     * Pause an AutoResponder orRSS campaign from sending
     *
     * @section Campaign  Related
     *
     * @param string $cid the id of the campaign to pause
     * @return boolean true on success
     */
    public function campaignPause($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignPause", $params);
    }

    /**
     * Send a given campaign immediately. For RSS campaigns, this will "start" them.
     *
     * @section Campaign  Related
     *
     * @example mcapi_campaignSendNow.php
     * @example xml-rpc_campaignSendNow.php
     *
     * @param string $cid the id of the campaign to send
     * @return boolean true on success
     */
    public function campaignSendNow($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignSendNow", $params);
    }

    /**
     * Send a test of this campaign to the provided email address
     *
     * @section Campaign  Related
     *
     * @example mcapi_campaignSendTest.php
     * @example xml-rpc_campaignSendTest.php
     *
     * @param string $cid the id of the campaign to test
     * @param array $test_emails an array of email address to receive the test message
     * @param string $send_type optional by default (null) both formats are sent - "html" or "text" send just that format
     * @return boolean true on success
     */
    public function campaignSendTest($cid, $test_emails=array (
), $send_type=NULL) {
        $params = array();
        $params["cid"] = $cid;
        $params["test_emails"] = $test_emails;
        $params["send_type"] = $send_type;
        return $this->callServer("campaignSendTest", $params);
    }

    /**
     * Retrieve all templates defined for your user account
     *
     * @section Campaign  Related
     * @example mcapi_campaignTemplates.php
     * @example xml-rpc_campaignTemplates.php
     *
     * @return array An array of structs, one for each template (see Returned Fields for details)
     * @returnf integer id Id of the template
     * @returnf string name Name of the template
     * @returnf string layout Layout of the template - "basic", "left_column", "right_column", or "postcard"
     * @returnf string preview_image If we've generated it, the url of the preview image for the template
     * @returnf array sections associative array of editable sections in the template that can accept custom HTML when sending a campaign
     */
    public function campaignTemplates() {
        $params = array();
        return $this->callServer("campaignTemplates", $params);
    }

    
    public function campaignSegmentTest($list_id, $options) {
        $params = array();
        $params["list_id"] = $list_id;
        $params["options"] = $options;
        return $this->callServer("campaignSegmentTest", $params);
    }
    public function campaignCreate($type, $options, $content, $segment_opts=NULL, $type_opts=NULL) {
        $params = array();
        $params["type"] = $type;
        $params["options"] = $options;
        $params["content"] = $content;
        $params["segment_opts"] = $segment_opts;
        $params["type_opts"] = $type_opts;
        return $this->callServer("campaignCreate", $params);
    }
    
    public function campaignUpdate($cid, $name, $value) {
        $params = array();
        $params["cid"] = $cid;
        $params["name"] = $name;
        $params["value"] = $value;
        return $this->callServer("campaignUpdate", $params);
    }

    /** Replicate a campaign.
    *
    * @section Campaign  Related
    *
    * @example mcapi_campaignReplicate.php
    *
    * @param string $cid the Campaign Id to replicate
    * @return string the id of the replicated Campaign created, otherwise an error will be thrown
    */
    public function campaignReplicate($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignReplicate", $params);
    }

    /** Delete a campaign. Seriously, "poof, gone!" - be careful!
    *
    * @section Campaign  Related
    *
    * @example mcapi_campaignDelete.php
    *
    * @param string $cid the Campaign Id to delete
    * @return boolean true if the delete succeeds, otherwise an error will be thrown
    */
    public function campaignDelete($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignDelete", $params);
    }

    public function campaigns($filters=array (
), $start=0, $limit=25) {
        $params = array();
        $params["filters"] = $filters;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("campaigns", $params);
    }

    /**
     * List all the folders for a user account
     *
     * @section Campaign  Related
     * @example mcapi_campaignFolders.php
     * @example xml-rpc_campaignFolders.php
     *
     * @return array Array of folder structs (see Returned Fields for details)
     * @returnf integer folder_id Folder Id for the given folder, this can be used in the campaigns() function to filter on.
     * @returnf string name Name of the given folder
     */
    public function campaignFolders() {
        $params = array();
        return $this->callServer("campaignFolders", $params);
    }

    /**
     * Given a list and a campaign, get all the relevant campaign statistics (opens, bounces, clicks, etc.)
     *
     * @section Campaign  Stats
     *
     * @example mcapi_campaignStats.php
     * @example xml-rpc_campaignStats.php
     *
     * @param string $cid the campaign id to pull stats for (can be gathered using campaigns())
     * @return array struct of the statistics for this campaign
     * @returnf integer syntax_errors Number of email addresses in campaign that had syntactical errors.
     * @returnf integer hard_bounces Number of email addresses in campaign that hard bounced.
     * @returnf integer soft_bounces Number of email addresses in campaign that soft bounced.
     * @returnf integer unsubscribes Number of email addresses in campaign that unsubscribed.
     * @returnf integer abuse_reports Number of email addresses in campaign that reported campaign for abuse.
     * @returnf integer forwards Number of times email was forwarded to a friend.
     * @returnf integer forwards_opens Number of times a forwarded email was opened.
     * @returnf integer opens Number of times the campaign was opened.
     * @returnf date last_open Date of the last time the email was opened.
     * @returnf integer unique_opens Number of people who opened the campaign.
     * @returnf integer clicks Number of times a link in the campaign was clicked.
     * @returnf integer unique_clicks Number of unique recipient/click pairs for the campaign.
     * @returnf date last_click Date of the last time a link in the email was clicked.
     * @returnf integer users_who_clicked Number of unique recipients who clicked on a link in the campaign.
     * @returnf integer emails_sent Number of email addresses campaign was sent to.
     */
    public function campaignStats($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignStats", $params);
    }

    /**
     * Get an array of the urls being tracked, and their click counts for a given campaign
     *
     * @section Campaign  Stats
     *
     * @example mcapi_campaignClickStats.php
     * @example xml-rpc_campaignClickStats.php
     *
     * @param string $cid the campaign id to pull stats for (can be gathered using campaigns())
     * @return struct urls will be keys and contain their associated statistics:
     * @returnf integer clicks Number of times the specific link was clicked
     * @returnf integer unique Number of unique people who clicked on the specific link
     */
    public function campaignClickStats($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignClickStats", $params);
    }

    /**
     * Get the top 5 performing email domains for this campaign. Users want more than 5 should use campaign campaignEmailStatsAIM()
     * or campaignEmailStatsAIMAll() and generate any additional stats they require.
     *
     * @section Campaign  Stats
     *
     * @example mcapi_campaignEmailDomainPerformance.php
     *
     * @param string $cid the campaign id to pull email domain performance for (can be gathered using campaigns())
     * @return array domains email domains and their associated stats
     * @returnf string domain Domain name or special "Other" to roll-up stats past 5 domains
     * @returnf integer total_sent Total Email across all domains - this will be the same in every row
     * @returnf integer emails Number of emails sent to this domain
     * @returnf integer bounces Number of bounces
     * @returnf integer opens Number of opens
     * @returnf integer clicks Number of clicks
     * @returnf integer unsubs Number of unsubs
     * @returnf integer delivered Number of deliveries
     * @returnf integer emails_pct Percentage of emails that went to this domain (whole number)
     * @returnf integer bounces_pct Percentage of bounces from this domain (whole number)
     * @returnf integer opens_pct Percentage of opens from this domain (whole number)
     * @returnf integer clicks_pct Percentage of clicks from this domain (whole number)
     * @returnf integer unsubs_pct Percentage of unsubs from this domain (whole number)
     */
    public function campaignEmailDomainPerformance($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignEmailDomainPerformance", $params);
    }

    /**
     * Get all email addresses with Hard Bounces for a given campaign
     *
     * @section Campaign  Stats
     *
     * @param string $cid the campaign id to pull bounces for (can be gathered using campaigns())
     * @param integer    $start optional for large data sets, the page number to start at - defaults to 1st page of data (page 0)
     * @param integer    $limit optional for large data sets, the number of results to return - defaults to 1000, upper limit set at 15000
     * @return array Arrays of email addresses with Hard Bounces
     */
    public function campaignHardBounces($cid, $start=0, $limit=1000) {
        $params = array();
        $params["cid"] = $cid;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("campaignHardBounces", $params);
    }

    /**
     * Get all email addresses with Soft Bounces for a given campaign
     *
     * @section Campaign  Stats
     *
     * @param string $cid the campaign id to pull bounces for (can be gathered using campaigns())
     * @param integer    $start optional for large data sets, the page number to start at - defaults to 1st page of data (page 0)
     * @param integer    $limit optional for large data sets, the number of results to return - defaults to 1000, upper limit set at 15000
     * @return array Arrays of email addresses with Soft Bounces
     */
    public function campaignSoftBounces($cid, $start=0, $limit=1000) {
        $params = array();
        $params["cid"] = $cid;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("campaignSoftBounces", $params);
    }

    /**
     * Get all unsubscribed email addresses for a given campaign
     *
     * @section Campaign  Stats
     *
     * @param string $cid the campaign id to pull bounces for (can be gathered using campaigns())
     * @param integer    $start optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     * @param integer    $limit optional for large data sets, the number of results to return - defaults to 1000, upper limit set at 15000
     * @return array list of email addresses that unsubscribed from this campaign
     */
    public function campaignUnsubscribes($cid, $start=0, $limit=1000) {
        $params = array();
        $params["cid"] = $cid;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("campaignUnsubscribes", $params);
    }

    public function campaignAbuseReports($cid, $since=NULL, $start=0, $limit=500) {
        $params = array();
        $params["cid"] = $cid;
        $params["since"] = $since;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("campaignAbuseReports", $params);
    }
   
    public function campaignAdvice($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignAdvice", $params);
    }
   
    public function campaignAnalytics($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignAnalytics", $params);
    }

    public function campaignGeoOpens($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignGeoOpens", $params);
    }

    public function campaignGeoOpensForCountry($cid, $code) {
        $params = array();
        $params["cid"] = $cid;
        $params["code"] = $code;
        return $this->callServer("campaignGeoOpensForCountry", $params);
    }

    
    public function campaignEepUrlStats($cid) {
        $params = array();
        $params["cid"] = $cid;
        return $this->callServer("campaignEepUrlStats", $params);
    }

    
    public function campaignBounceMessages($cid, $start=0, $limit=25, $since=NULL) {
        $params = array();
        $params["cid"] = $cid;
        $params["start"] = $start;
        $params["limit"] = $limit;
        $params["since"] = $since;
        return $this->callServer("campaignBounceMessages", $params);
    }

    public function campaignEcommOrders($cid, $start=0, $limit=100, $since=NULL) {
        $params = array();
        $params["cid"] = $cid;
        $params["start"] = $start;
        $params["limit"] = $limit;
        $params["since"] = $since;
        return $this->callServer("campaignEcommOrders", $params);
    }

    
    public function campaignShareReport($cid, $opts=array ()) {
        $params = array();
        $params["cid"] = $cid;
        $params["opts"] = $opts;
        return $this->callServer("campaignShareReport", $params);
    }

    public function campaignContent($cid, $for_archive=true) {
        $params = array();
        $params["cid"] = $cid;
        $params["for_archive"] = $for_archive;
        return $this->callServer("campaignContent", $params);
    }

    
    public function campaignOpenedAIM($cid, $start=0, $limit=1000) {
        $params = array();
        $params["cid"] = $cid;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("campaignOpenedAIM", $params);
    }

    public function campaignNotOpenedAIM($cid, $start=0, $limit=1000) {
        $params = array();
        $params["cid"] = $cid;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("campaignNotOpenedAIM", $params);
    }

    public function campaignClickDetailAIM($cid, $url, $start=0, $limit=1000) {
        $params = array();
        $params["cid"] = $cid;
        $params["url"] = $url;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("campaignClickDetailAIM", $params);
    }

    /**
     * Given a campaign and email address, return the entire click and open history with timestamps, ordered by time
     *
     * @section Campaign AIM
     *
     * @param string $cid the campaign id to get stats for (can be gathered using campaigns())
     * @param string $email_address the email address to check OR the email "id" returned from listMemberInfo, Webhooks, and Campaigns
     * @return array Array of structs containing the actions (opens and clicks) that the email took, with timestamps
     * @returnf string action The action taken (open or click)
     * @returnf date timestamp Time the action occurred
     * @returnf string url For clicks, the URL that was clicked
     */
    public function campaignEmailStatsAIM($cid, $email_address) {
        $params = array();
        $params["cid"] = $cid;
        $params["email_address"] = $email_address;
        return $this->callServer("campaignEmailStatsAIM", $params);
    }

    /**
     * Given a campaign and correct paging limits, return the entire click and open history with timestamps, ordered by time,
     * for every user a campaign was delivered to.
     *
     * @section Campaign AIM
     * @example mcapi_campaignEmailStatsAIMAll.php
     *
     * @param string $cid the campaign id to get stats for (can be gathered using campaigns())
     * @param integer $start optional for large data sets, the page number to start at - defaults to 1st page of data (page 0)
     * @param integer $limit optional for large data sets, the number of results to return - defaults to 100, upper limit set at 1000
     * @return array Array of structs containing actions  (opens and clicks) for each email, with timestamps
     * @returnf string action The action taken (open or click)
     * @returnf date timestamp Time the action occurred
     * @returnf string url For clicks, the URL that was clicked
     */
    public function campaignEmailStatsAIMAll($cid, $start=0, $limit=100) {
        $params = array();
        $params["cid"] = $cid;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("campaignEmailStatsAIMAll", $params);
    }

    public function campaignEcommAddOrder($order) {
        $params = array();
        $params["order"] = $order;
        return $this->callServer("campaignEcommAddOrder", $params);
    }

    /**
     * Retrieve all of the lists defined for your user account
     *
     * @section List Related
     * @example mcapi_lists.php
     * @example xml-rpc_lists.php
     *
     * @return array list of your Lists and their associated information (see Returned Fields for description)
     * @returnf string id The list id for this list. This will be used for all other list management functions.
     * @returnf integer web_id The list id used in our web app, allows you to create a link directly to it
     * @returnf string name The name of the list.
     * @returnf date date_created The date that this list was created.
     * @returnf integer member_count The number of active members in the given list.
     * @returnf integer unsubscribe_count The number of members who have unsubscribed from the given list.
     * @returnf integer cleaned_count The number of members cleaned from the given list.
     * @returnf boolean email_type_option Whether or not the List supports multiple formats for emails or just HTML
     * @returnf string default_from_name Default From Name for campaigns using this list
     * @returnf string default_from_email Default From Email for campaigns using this list
     * @returnf string default_subject Default Subject Line for campaigns using this list
     * @returnf string default_language Default Language for this list's forms
     * @returnf double list_rating An auto-generated activity score for the list (0 - 5)
     * @returnf integer member_count_since_send The number of active members in the given list since the last campaign was sent
     * @returnf integer unsubscribe_count_since_send The number of members who have unsubscribed from the given list since the last campaign was sent
     * @returnf integer cleaned_count_since_send The number of members cleaned from the given list since the last campaign was sent
     */
    public function lists() {
        $params = array();
        return $this->callServer("lists", $params);
    }

    /**
     * Get the list of merge tags for a given list, including their name, tag, and required setting
     *
     * @section List Related
     * @example xml-rpc_listMergeVars.php
     *
     * @param string $id the list id to connect to. Get by calling lists()
     * @return array list of merge tags for the list
     * @returnf string name Name of the merge field
     * @returnf bool req Denotes whether the field is required (true) or not (false)
     * @returnf string field_type The "data type" of this merge var. One of: email, text, number, radio, dropdown, date, address, phone, url, imageurl
     * @returnf bool public Whether or not this field is visible to list subscribers
     * @returnf bool show Whether the list owner has this field displayed on their list dashboard
     * @returnf string order The order the list owner has set this field to display in
     * @returnf string default The default value the list owner has set for this field
     * @returnf string size The width of the field to be used
     * @returnf string tag The merge tag that's used for forms and listSubscribe() and listUpdateMember()
     * @returnf array choices For radio and dropdown field types, an array of the options available
     */
    public function listMergeVars($id) {
        $params = array();
        $params["id"] = $id;
        return $this->callServer("listMergeVars", $params);
    }

    public function listMergeVarAdd($id, $tag, $name, $req=array (
)) {
        $params = array();
        $params["id"] = $id;
        $params["tag"] = $tag;
        $params["name"] = $name;
        $params["req"] = $req;
        return $this->callServer("listMergeVarAdd", $params);
    }

    /**
     * Update most parameters for a merge tag on a given list. You cannot currently change the merge type
     *
     * @section List Related
     *
     * @param string $id the list id to connect to. Get by calling lists()
     * @param string $tag The merge tag to update
     * @param array $options The options to change for a merge var. See listMergeVarAdd() for valid options
     * @return bool true if the request succeeds, otherwise an error will be thrown
     */
    public function listMergeVarUpdate($id, $tag, $options) {
        $params = array();
        $params["id"] = $id;
        $params["tag"] = $tag;
        $params["options"] = $options;
        return $this->callServer("listMergeVarUpdate", $params);
    }

    /**
     * Delete a merge tag from a given list and all its members. Seriously - the data is removed from all members as well!
     * Note that on large lists this method may seem a bit slower than calls you typically make.
     *
     * @section List Related
     * @example xml-rpc_listMergeVarDel.php
     *
     * @param string $id the list id to connect to. Get by calling lists()
     * @param string $tag The merge tag to delete
     * @return bool true if the request succeeds, otherwise an error will be thrown
     */
    public function listMergeVarDel($id, $tag) {
        $params = array();
        $params["id"] = $id;
        $params["tag"] = $tag;
        return $this->callServer("listMergeVarDel", $params);
    }

    public function listInterestGroups($id) {
        $params = array();
        $params["id"] = $id;
        return $this->callServer("listInterestGroups", $params);
    }

    public function listInterestGroupings($id) {
        $params = array();
        $params["id"] = $id;
        return $this->callServer("listInterestGroupings", $params);
    }

    public function listInterestGroupAdd($id, $group_name, $grouping_id=NULL) {
        $params = array();
        $params["id"] = $id;
        $params["group_name"] = $group_name;
        $params["grouping_id"] = $grouping_id;
        return $this->callServer("listInterestGroupAdd", $params);
    }

    public function listInterestGroupDel($id, $group_name, $grouping_id=NULL) {
        $params = array();
        $params["id"] = $id;
        $params["group_name"] = $group_name;
        $params["grouping_id"] = $grouping_id;
        return $this->callServer("listInterestGroupDel", $params);
    }

    public function listInterestGroupUpdate($id, $old_name, $new_name, $grouping_id=NULL) {
        $params = array();
        $params["id"] = $id;
        $params["old_name"] = $old_name;
        $params["new_name"] = $new_name;
        $params["grouping_id"] = $grouping_id;
        return $this->callServer("listInterestGroupUpdate", $params);
    }

    public function listInterestGroupingAdd($id, $name, $type, $groups) {
        $params = array();
        $params["id"] = $id;
        $params["name"] = $name;
        $params["type"] = $type;
        $params["groups"] = $groups;
        return $this->callServer("listInterestGroupingAdd", $params);
    }
    public function listInterestGroupingUpdate($grouping_id, $name, $value) {
        $params = array();
        $params["grouping_id"] = $grouping_id;
        $params["name"] = $name;
        $params["value"] = $value;
        return $this->callServer("listInterestGroupingUpdate", $params);
    }

    public function listInterestGroupingDel($grouping_id) {
        $params = array();
        $params["grouping_id"] = $grouping_id;
        return $this->callServer("listInterestGroupingDel", $params);
    }

    public function listWebhooks($id) {
        $params = array();
        $params["id"] = $id;
        return $this->callServer("listWebhooks", $params);
    }

    public function listWebhookAdd($id, $url, $actions=array (
), $sources=array (
)) {
        $params = array();
        $params["id"] = $id;
        $params["url"] = $url;
        $params["actions"] = $actions;
        $params["sources"] = $sources;
        return $this->callServer("listWebhookAdd", $params);
    }
    public function listWebhookDel($id, $url) {
        $params = array();
        $params["id"] = $id;
        $params["url"] = $url;
        return $this->callServer("listWebhookDel", $params);
    }

    public function listStaticSegments($id) {
        $params = array();
        $params["id"] = $id;
        return $this->callServer("listStaticSegments", $params);
    }

    public function listAddStaticSegment($id, $name) {
        $params = array();
        $params["id"] = $id;
        $params["name"] = $name;
        return $this->callServer("listAddStaticSegment", $params);
    }

    public function listResetStaticSegment($id, $seg_id) {
        $params = array();
        $params["id"] = $id;
        $params["seg_id"] = $seg_id;
        return $this->callServer("listResetStaticSegment", $params);
    }

    public function listDelStaticSegment($id, $seg_id) {
        $params = array();
        $params["id"] = $id;
        $params["seg_id"] = $seg_id;
        return $this->callServer("listDelStaticSegment", $params);
    }
    public function listStaticSegmentAddMembers($id, $seg_id, $batch) {
        $params = array();
        $params["id"] = $id;
        $params["seg_id"] = $seg_id;
        $params["batch"] = $batch;
        return $this->callServer("listStaticSegmentAddMembers", $params);
    }

    public function listStaticSegmentDelMembers($id, $seg_id, $batch) {
        $params = array();
        $params["id"] = $id;
        $params["seg_id"] = $seg_id;
        $params["batch"] = $batch;
        return $this->callServer("listStaticSegmentDelMembers", $params);
    }

    public function listSubscribe($id, $email_address, $merge_vars, $email_type='html', $double_optin=true, $update_existing=false, $replace_interests=true, $send_welcome=false) {
        $params = array();
        $params["id"] = $id;
        $params["email_address"] = $email_address;
        $params["merge_vars"] = $merge_vars;
        $params["email_type"] = $email_type;
        $params["double_optin"] = $double_optin;
        $params["update_existing"] = $update_existing;
        $params["replace_interests"] = $replace_interests;
        $params["send_welcome"] = $send_welcome;
        return $this->callServer("listSubscribe", $params);
    }

    public function listUnsubscribe($id, $email_address, $delete_member=false, $send_goodbye=true, $send_notify=true) {
        $params = array();
        $params["id"] = $id;
        $params["email_address"] = $email_address;
        $params["delete_member"] = $delete_member;
        $params["send_goodbye"] = $send_goodbye;
        $params["send_notify"] = $send_notify;
        return $this->callServer("listUnsubscribe", $params);
    }

    public function listUpdateMember($id, $email_address, $merge_vars, $email_type='', $replace_interests=true) {
        $params = array();
        $params["id"] = $id;
        $params["email_address"] = $email_address;
        $params["merge_vars"] = $merge_vars;
        $params["email_type"] = $email_type;
        $params["replace_interests"] = $replace_interests;
        return $this->callServer("listUpdateMember", $params);
    }

    public function listBatchSubscribe($id, $batch, $double_optin=true, $update_existing=false, $replace_interests=true) {
        $params = array();
        $params["id"] = $id;
        $params["batch"] = $batch;
        $params["double_optin"] = $double_optin;
        $params["update_existing"] = $update_existing;
        $params["replace_interests"] = $replace_interests;
        return $this->callServer("listBatchSubscribe", $params);
    }

    public function listBatchUnsubscribe($id, $emails, $delete_member=false, $send_goodbye=true, $send_notify=false) {
        $params = array();
        $params["id"] = $id;
        $params["emails"] = $emails;
        $params["delete_member"] = $delete_member;
        $params["send_goodbye"] = $send_goodbye;
        $params["send_notify"] = $send_notify;
        return $this->callServer("listBatchUnsubscribe", $params);
    }

    public function listMembers($id, $status='subscribed', $since=NULL, $start=0, $limit=100) {
        $params = array();
        $params["id"] = $id;
        $params["status"] = $status;
        $params["since"] = $since;
        $params["start"] = $start;
        $params["limit"] = $limit;
        return $this->callServer("listMembers", $params);
    }
    public function listMemberInfo($id, $email_address) {
        $params = array();
        $params["id"] = $id;
        $params["email_address"] = $email_address;
        return $this->callServer("listMemberInfo", $params);
    }

    public function listAbuseReports($id, $start=0, $limit=500, $since=NULL) {
        $params = array();
        $params["id"] = $id;
        $params["start"] = $start;
        $params["limit"] = $limit;
        $params["since"] = $since;
        return $this->callServer("listAbuseReports", $params);
    }

    public function listGrowthHistory($id) {
        $params = array();
        $params["id"] = $id;
        return $this->callServer("listGrowthHistory", $params);
    }

    public function getAffiliateInfo() {
        $params = array();
        return $this->callServer("getAffiliateInfo", $params);
    }
    public function getAccountDetails() {
        $params = array();
        return $this->callServer("getAccountDetails", $params);
    }

    public function generateText($type, $content) {
        $params = array();
        $params["type"] = $type;
        $params["content"] = $content;
        return $this->callServer("generateText", $params);
    }

    public function inlineCss($html, $strip_css=false) {
        $params = array();
        $params["html"] = $html;
        $params["strip_css"] = $strip_css;
        return $this->callServer("inlineCss", $params);
    }

    public function createFolder($name) {
        $params = array();
        $params["name"] = $name;
        return $this->callServer("createFolder", $params);
    }

    public function ecommAddOrder($order) {
        $params = array();
        $params["order"] = $order;
        return $this->callServer("ecommAddOrder", $params);
    }

    public function listsForEmail($email_address) {
        $params = array();
        $params["email_address"] = $email_address;
        return $this->callServer("listsForEmail", $params);
    }

    public function chimpChatter() {
        $params = array();
        return $this->callServer("chimpChatter", $params);
    }

    public function apikeys($username, $password, $expired=false) {
        $params = array();
        $params["username"] = $username;
        $params["password"] = $password;
        $params["expired"] = $expired;
        return $this->callServer("apikeys", $params);
    }

    public function apikeyAdd($username, $password) {
        $params = array();
        $params["username"] = $username;
        $params["password"] = $password;
        return $this->callServer("apikeyAdd", $params);
    }

    public function apikeyExpire($username, $password) {
        $params = array();
        $params["username"] = $username;
        $params["password"] = $password;
        return $this->callServer("apikeyExpire", $params);
    }

    public function ping() {
        $params = array();
        return $this->callServer("ping", $params);
    }

    public function callMethod() {
        $params = array();
        return $this->callServer("callMethod", $params);
    }

    public function callServer($method, $params) {
	    $dc = "us1";
	    if (strstr($this->api_key,"-")){
        	list($key, $dc) = explode("-",$this->api_key,2);
            unset($key);
            if (!$dc) $dc = "us1";
        }
        $host = $dc.".".$this->apiUrl["host"];
		$params["apikey"] = $this->api_key;

        $this->errorMessage = "";
        $this->errorCode = "";
        $post_vars = $this->httpBuildQuery($params);

        $payload = "POST " . $this->apiUrl["path"] . "?" . $this->apiUrl["query"] . "&method=" . $method . " HTTP/1.0\r\n";
        $payload .= "Host: " . $host . "\r\n";
        $payload .= "User-Agent: MCAPI/" . $this->version ."\r\n";
        $payload .= "Content-type: application/x-www-form-urlencoded\r\n";
        $payload .= "Content-length: " . Tools::strlen($post_vars) . "\r\n";
        $payload .= "Connection: close \r\n\r\n";
        $payload .= $post_vars;

        ob_start();
        if ($this->secure){
            $sock = @fsockopen("ssl://".$host, 443, $errno, $errstr, 30);
        } else {
            $sock = @fsockopen($host, 80, $errno, $errstr, 30);
        }
        if(!$sock) {
            $this->errorMessage = "Could not connect (ERR $errno: $errstr)";
            $this->errorCode = "-99";
            ob_end_clean();
            return false;
        }

        $response = "";
        fwrite($sock, $payload);
        stream_set_timeout($sock, $this->timeout);
        $info = stream_get_meta_data($sock);
        while ((!feof($sock)) && (!$info["timed_out"])) {
            $response .= fread($sock, $this->chunkSize);
            $info = stream_get_meta_data($sock);
        }
        if ($info["timed_out"]) {
            $this->errorMessage = "Could not read response (timed out)";
            $this->errorCode = -98;
        }
        fclose($sock);
        ob_end_clean();
        if ($info["timed_out"]) return false;

        list($throw, $response) = explode("\r\n\r\n", $response, 2);
        unset($throw);
        if(ini_get("magic_quotes_runtime")) $response = Tools::stripslashes($response);

        $serial = call_user_func('unseria'.'lize', $response);
        if($response && $serial === false) {
        	$response = array("error" => "Bad Response.  Got This: " . $response, "code" => "-99");
        } else {
        	$response = $serial;
        }
        if(is_array($response) && isset($response["error"])) {
            $this->errorMessage = $response["error"];
            $this->errorCode = $response["code"];
            return false;
        }

        return $response;
    }

    public function httpBuildQuery($params, $key=null) {
        $ret = array();

        foreach((array) $params as $name => $val) {
            $name = urlencode($name);
            if($key !== null) {
                $name = $key . "[" . $name . "]";
            }

            if(is_array($val) || is_object($val)) {
                $ret[] = $this->httpBuildQuery($val, $name);
            } elseif($val !== null) {
                $ret[] = $name . "=" . urlencode($val);
            }
        }

        return implode("&", $ret);
    }
}
}
?>