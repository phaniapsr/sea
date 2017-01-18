<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Phani Kumar.
 * Date: 24-Dec-16
 * Time: 12:02 PM
 */
if (!function_exists('send_sms'))
{
    function send_sms($number, $message_body)
    {
        $ci=& get_instance();
        $url = $ci->config->item('sms_gateway')['url'].'?username='.$ci->config->item('sms_gateway')['username'].'&api_password='.$ci->config->item('sms_gateway')['api_password'].'&sender='.$ci->config->item('sms_gateway')['sender_id'].'&to='.$number.'&message='.urlencode($message_body).'&priority=11';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}