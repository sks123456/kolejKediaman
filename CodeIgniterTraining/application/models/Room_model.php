<?php
class Room_model extends CI_Model
{
    public function count_all_rooms()
    {
        // Count all records from kk_room table
        return $this->db->count_all('kk_room');
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

    public function getAvailableRoom($room_capacity, $religion,$gender)
    {
        // Start building the query
        $this->db->select('*');
        $this->db->from('kk_room');
        $this->db->where('CAPACITY', $room_capacity);
        $this->db->where('FILLED_ROOM < CAPACITY');
        if (!empty($religion)) {
            $this->db->where('ROOM_TYPE', $religion);
        }if (!empty($gender)) {
            $this->db->where('ROOM_GENDER', $gender);
        }

        // Execute the query and retrieve data from the database
        $query = $this->db->get();
        return $query->result();
    }
    public function get_records($room_type, $gender, $status, $kolej)
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
}
