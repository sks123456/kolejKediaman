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


}
