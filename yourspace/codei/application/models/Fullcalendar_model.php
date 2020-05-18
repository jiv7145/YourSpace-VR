<?php

class Fullcalendar_model extends CI_Model
{
 function fetch_all_event($email){
  $this->db->order_by('id');
  return $this->db->get_where('events', ['email' => $email]);
 }
 function fetch_all_event_booked($email){
$this->db->order_by('id');
  return $this->db->get_where('events', ['email !=' => $email]);

 }

 function insert_event($data)
 {
  $this->db->insert('events', $data);
 }

 function update_event($data, $id)
 {
  $this->db->where('id', $id);
  $this->db->update('events', $data);
 }

 function delete_event($id)
 {
  $this->db->where('id', $id);
  $this->db->delete('events');
 }
}

?>
