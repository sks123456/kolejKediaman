<?php
class Room_model extends CI_Model
{
    public function count_all_rooms()
    {
        // Count all records from kk_room table
        return $this->db->count_all('kk_room');
    }

    public function get_block()
    {
        $this->db->select('KOD_SESI, ,KOLEJ, BLOCK, SUM(CAPACITY) AS total_capacity, SUM(FILLED_ROOM) AS total_filled_room');
        $this->db->select("(CASE WHEN SUM(CASE WHEN STATUS_ACTIVE = '1' THEN 1 ELSE 0 END) > 0 THEN '1' ELSE '0' END) AS block_status", false);
        $this->db->from('kk_room');
        $this->db->group_by(array('KOD_SESI', 'BLOCK'));
        $query = $this->db->get();
        return $query->result();
    }
    public function get_paginated_rooms($limit, $offset, $sortColumn, $sortDirection)
    {
        // Query to get paginated records with sorting
        $this->db->order_by($sortColumn, $sortDirection);
        $query = $this->db->get('kk_room', $limit, $offset);
        return $query->result();
    }

    public function get_all_rooms($sortColumn = '', $sortDirection = 'asc')
    {
        // Run query to get all student records from db
        if (!empty($sortColumn)) {
            $this->db->order_by($sortColumn, $sortDirection);
        }
        $query = $this->db->get('kk_room');
        return $query;
    }

    public function getAvailableRoom($room_capacity, $religion, $gender,$academic_id)
    {
        // Start building the query
        $this->db->select('*');
        $this->db->from('kk_room');
        $this->db->where('CAPACITY', $room_capacity);
        $this->db->where('KOD_SESI', $academic_id);
        $this->db->where('STATUS_ACTIVE = 1');
        $this->db->where('FILLED_ROOM < CAPACITY');
        if (!empty($religion)) {
            $this->db->where('ROOM_TYPE', $religion);
        }
        if (!empty($gender)) {
            $this->db->where('ROOM_GENDER', $gender);
        }

        // Execute the query and retrieve data from the database
        $query = $this->db->get();
        return $query->result();
    }
    public function get_records($room_type, $gender, $status, $status_active, $kolej)
    {
        // Start building the query
        $this->db->select('*');
        $this->db->from('kk_room');

        // Add conditions based on non-empty form inputs
        if (!empty($room_type)) {
            $this->db->where('ROOM_TYPE', $room_type);
        }
        if (!empty($gender)) {
            $this->db->where('ROOM_GENDER', $gender);
        }
        if (!empty($status)) {
            $this->db->where('ROOM_STATUS', $status);
        }
        if (!empty($status_active)) {
            $this->db->where('STATUS_ACTIVE', $status_active);
        }
        if (!empty($kolej)) {
            $this->db->where('KOLEJ', $kolej);
        }

        // Execute the query and retrieve data from the database
        $query = $this->db->get();
        return $query->result();
    }
    public function search_room($room_code)
    {
        // Start building the query
        $this->db->select('*');
        $this->db->from('kk_room');
        if (!empty($room_code)) {
            $this->db->where('ROOM_CODE', $room_code);
        }
        // Execute the query and retrieve data from the database
        $query = $this->db->get();
        return $query->result();
    }

    public function get_room_codes_with_id()
    {
        // Fetch room codes and IDs from the database
        $this->db->select('ID, ROOM_CODE, KOD_SESI');
        $query = $this->db->get('kk_room');
        return $query->result();
    }

    public function get_unique_sessions()
    {
        $this->db->select('KOD_SESI');
        $this->db->distinct();
        $this->db->from('kk_room');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_room_status($room_id, $status_active)
    {
        // Determine the status to update based on status_active
        $status = ($status_active == 0) ? 0 : 1;

        // Prepare data to update
        $data = array(
            'STATUS_ACTIVE' => $status_active,
            'ROOM_STATUS' => $status
        );

        // Set WHERE condition
        $this->db->where('ROOM_CODE', $room_id);

        // Perform update operation
        return $this->db->update('kk_room', $data);
    }




    public function update_block_status($session, $kolej, $block, $status_active)
    {
        $status = ($status_active == 0) ? 0 : 1;

        $data = array(
            'STATUS_ACTIVE' => $status_active,
            'ROOM_STATUS' => $status
        );

        $this->db->where('BLOCK', $block);
        $this->db->where('KOD_SESI', $session);
        $this->db->where('KOLEJ', $kolej);
        return $this->db->update('kk_room', $data);
    }

    public function allocateRoom($data)
    {
        // Insert the allocation data into the room allocation table
        return $this->db->insert('kk_room_allocation', $data);
    }

    public function incrementFilledRoom($roomCode)
{
    // Get current filled_room count and capacity
    $this->db->select('filled_room, capacity');
    $this->db->where('room_code', $roomCode);
    $query = $this->db->get('kk_room');
    
    if ($query->num_rows() > 0) {
        $room = $query->row();
        $currentFilledRoom = $room->filled_room;
        $capacity = $room->capacity;
        
        // Increment the filled_room count
        $this->db->set('filled_room', 'filled_room + 1', FALSE);
        $this->db->where('room_code', $roomCode);
        $this->db->update('kk_room');
        
        // Check if filled_room equals capacity
        if ($currentFilledRoom + 1 == $capacity) {
            // Update room_status to 6
            $this->db->set('room_status', 2);
            $this->db->where('room_code', $roomCode);
            $this->db->update('kk_room');
        }
        
        return true; // Update successful
    } else {
        return false; // Room not found
    }
}

    public function get_kod_sesi()
    {
        $query = $this->db->distinct()
            ->select('KOD_SESI')
            ->from('kk_room')
            ->get();
        return $query->result();
    }

    public function get_rooms_by_session($kod_sesi)
    {
        $this->db->where('KOD_SESI', $kod_sesi);
        $query = $this->db->get('kk_room');
        return $query->result();
    }

    public function delete_room_by_session($kod_sesi)
    {
        $this->db->where('KOD_SESI', $kod_sesi);
        return $this->db->delete('kk_room');
    }

    public function get_room_by_id($room_id)
    {
        $this->db->where('ROOM_CODE', $room_id);
        $query = $this->db->get('kk_room');
        return $query->row();
    }

    public function get_rooms_from_kk_db($session_id)
    {
        $this->db->db_select('kk_db'); // Switch to kk_db database
        $this->db->where('KOD_SESI', $session_id);
        $query = $this->db->get('k_room');
        return $query->result();
    }

    public function insert_room_data($data)
    {
        $this->db->db_select('fyp_kk'); // Switch to fyp_kk database
        return $this->db->insert('kk_room', $data); // Insert into kk_room table
    }

    public function check_session_exists($session_id)
    {
        $this->db->db_select('kk_db');
        $this->db->where('KOD_SESI', $session_id);
        $query = $this->db->get('k_room'); // Replace with the correct table name
        return $query->num_rows() > 0;
    }

}
