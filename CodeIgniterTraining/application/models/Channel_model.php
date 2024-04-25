<?php
class Channel_model extends CI_Model
{

    public function count_all_channels()
    {
        return $this->db->count_all('kk_channel');
    }

    public function get_all_channel2($limit, $offset)
    {
        // query to get paginated session records
        $query = $this->db->limit($limit, $offset)
            ->get('kk_channel');
        return $query;
    }

    public function get_all_channel()
    {
        // query to get all session records
        $query = $this->db->get('kk_channel');
        return $query;
    }

    public function get_channel_id_and_name() {
        $query = $this->db->select('channel_id, channel_name')
        ->where('channel_status','Aktif')->get('kk_channel');
        return $query->result();
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

    public function valid_channel()
    {
        $this->load->model("channel_model");
        $channelResult = $this->channel_model->get_all_channel();

        // Assuming you have the input channel_name via POST
        $inputChannelName = $this->input->post("channel_name");

        // Convert query result to array
        $channel = $channelResult->result_array();

        $channelFound = false;

        foreach ($channel as $channelDetail) {
            // Assuming each $channel has a 'name' key
            $channelName = $channelDetail['CHANNEL_NAME'];

            if (strtoupper($inputChannelName) == $channelName) {
                // Channel name found in the list
                $channelFound = true;
                break; // Exit the loop since we found a match
            }
        }
        return $channelFound;
    }
    public function save_channel()
    {
        $this->db->set("CHANNEL_NAME", strtoupper($this->input->post("channel_name")));
            $this->db->set("CHANNEL_STATUS", $this->input->post("channel_status"));
            $this->db->insert('kk_channel');
            redirect(base_url('CodeIgniterTraining/index.php/crudchannel/index'));
    }

    public function get_channel($channel_ID)
    {
        $query = $this->db
            ->where("channel_ID", $channel_ID)
            ->get('kk_channel');

        return $query;
    }

    public function update_channel_status()
    {
        $this->db->where('CHANNEL_ID', $this->input->post("channel_id"));
        $this->db->set('CHANNEL_STATUS', $this->input->post("channel_status"));
        $this->db->update('kk_channel');
    }
}
