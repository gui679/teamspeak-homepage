<?php

declare(strict_types=1);

namespace Framework\Model;

class AbstractClient extends AbstractModel
{

    public $id;
    public $cid;
    public $database_id;
    public $nickname;
    public $type;

    /*additional_data */
    public $idle_time;
    public $unique_identifier;
    public $version;
    public $platform;
    public $input_muted;
    public $output_muted;
    public $outputonly_muted;
    public $input_hardware;
    public $output_hardware;
    public $default_channel;
    public $meta_data;
    public $is_recording;
    public $version_sign;
    public $security_hash;
    public $login_name;
    public $channel_group_id;
    public $servergroups;
    public $created;
    public $last_connected;
    public $totalconnections;
    public $away;
    public $away_message;
    public $flag_avatar;
    public $talk_power;
    public $talk_request;
    public $talk_request_msg;
    public $description;
    public $is_talker;
    public $month_bytes_uploaded;
    public $month_bytes_downloaded;
    public $total_bytes_uploaded;
    public $total_bytes_downloaded;
    public $is_priority_speaker;
    public $nickname_phonetic;
    public $needed_serverquery_view_power;
    public $default_token;
    public $icon_id;
    public $is_channel_commander;
    public $country;
    public $channel_group_inherited_channel_id;
    public $badges;
    public $myteamspeak_id;
    public $integrations;
    public $myteamspeak_avatar;
    public $signed_badges;
    public $base64HashClientUID;
    public $connection_filetransfer_bandwidth_sent;
    public $connection_filetransfer_bandwidth_received;
    public $connection_packets_sent_total;
    public $connection_bytes_sent_total;
    public $connection_packets_received_total;
    public $connection_bytes_received_total;
    public $connection_bandwidth_sent_last_second_total;
    public $connection_bandwidth_sent_last_minute_total;
    public $connection_bandwidth_received_last_second_total;
    public $connection_bandwidth_received_last_minute_total;
    public $connection_connected_time;
    public $connection_client_ip;

}
