<?php
class Channel_model extends CI_Model
{

    public function get_all_channel()
    {
        // query to get all session records
        $query = $this->db->get('kk_channel');
        return $query;
    }

    public function delete_channel_id($channel_ID)
    {

        //delete query prep and having pipeline to specify which to delete
        $query = $this->db
            ->where("channel_ID", $channel_ID)
            ->delete('kk_channel');

        //return query to execute
        return $query;
    }

    public function save_channel()
    {

        $this->db->set("CHANNEL_NAME", $this->input->post("channel_name"));
        $this->db->set("CHANNEL_STATUS", $this->input->post("channel_status"));

    }

    public function get_channel($channel_ID)
    {
        $query = $this->db
            ->where("channel_ID", $channel_ID)
            ->get('kk_channel');

        return $query;
    }

    public function update_channel_status($channel_ID, $status)
    {
        $this->db->where('CHANNEL_ID', $channel_ID);
        $this->db->set('CHANNEL_STATUS', $status);
        $this->db->update('kk_channel');
    }}
