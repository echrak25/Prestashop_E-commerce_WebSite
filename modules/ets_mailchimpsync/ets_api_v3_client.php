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

class Ets_api_v3_client
{


    /**
     * @var string
     */
    private $api_key;

    /**
     * @var string
     */
    private $api_url = 'https://api.mailchimp.com/3.0/';

    /**
     * @var array
     */
    private $last_response;

    /**
     * @var array
     */
    private $last_request;

    /**
     * Constructor
     *
     * @param string $api_key
     */
    public function __construct($api_key)
    {
        $this->api_key = $api_key;

        $dash_position = strpos($api_key, '-');
        if ($dash_position !== false) {
            $this->api_url = str_replace('//api.', '//' . Tools::substr($api_key, $dash_position + 1) . ".api.", $this->api_url);
        }

    }

    /**
     * @param string $resource
     * @param array $args
     *
     * @return mixed
     */
    public function get($resource, array $args = array())
    {
        return $this->request('GET', $resource, $args);
    }

    /**
     * @param string $resource
     * @param array $data
     *
     * @return mixed
     */
    public function post($resource, array $data)
    {
        return $this->request('POST', $resource, $data);
    }

    /**
     * @param string $resource
     * @param array $data
     * @return mixed
     */
    public function put($resource, array $data)
    {
        return $this->request('PUT', $resource, $data);
    }

    /**
     * @param string $resource
     * @param array $data
     * @return mixed
     */
    public function patch($resource, array $data)
    {
        return $this->request('PATCH', $resource, $data);
    }

    /**
     * @param string $resource
     * @return mixed
     */
    public function delete($resource)
    {
        return $this->request('DELETE', $resource);
    }

    /**
     * @link https://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/
     *
     * @param string $list_id
     * @param string $email_address
     * @param array $args
     *
     * @return object
     * @throws MC4WP_API_Exception
     */
    public function get_list_member($list_id, $email_address, array $args = array())
    {
        $subscriber_hash = md5(Tools::strtolower(trim($email_address)));
        $resource = sprintf('/lists/%s/members/%s', $list_id, $subscriber_hash);
        $data = $this->get($resource, $args);
        return $data;
    }

    public function get_all_memeber_list($list_id, $args = array())
    {
        $resource = sprintf('/lists/%s/members', $list_id);
        $data = $this->get($resource, $args);
        return $data;
    }

    public function get_count_member_list($list_id)
    {
        $resource = sprintf('/lists/%s/members?count=1', $list_id);
        $data = $this->get($resource, array());
        return $data;
    }

    public function request($method, $resource = null, array $data = array())
    {

        $url = $this->api_url . ($resource != null ? ltrim($resource, '/') : '');
        if ($method == 'GET')
            $url .= '?' . http_build_query($data);
        // don't bother if no API key was given.
        if (empty($this->api_key)) {

        }

        $mch = curl_init();
        curl_setopt($mch, CURLOPT_URL, $url);
        curl_setopt($mch, CURLOPT_HTTPHEADER, $this->get_headers());
        curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
        curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $method); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
        curl_setopt($mch, CURLOPT_TIMEOUT, 10);
        curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection

        if ($method != 'GET') {
            curl_setopt($mch, CURLOPT_POST, true);
            curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data)); // send data in json
        }
        $rest = json_decode(curl_exec($mch));
        curl_close($mch);
        return $rest;
    }

    /**
     * @return array
     */
    private function get_headers()
    {
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Basic ' . call_user_func('base64_encode', 'user:' . $this->api_key);
        $headers[] = 'Accept: application/json';
        if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $headers[] = 'Accept-Language:' . $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        }
        return $headers;
    }

    /**
     * Gets information about all members of a MailChimp list.
     *
     * @param string $list_id
     *   The ID of the list.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @see http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/#read-get_lists_list_id_members
     */
    public function checkMemberExit($id_list, $email_check)
    {
        $api_id_list = $id_list;
        if (!$this->api_key || !$api_id_list) {
            return false;
        }

        try {
            $data = $this->get_list_member($api_id_list, $email_check);
        } catch (Exception $e) {
            die('error conect');
        }
        return !empty($data->id) && $data->status === 'subscribed';
    }

}
