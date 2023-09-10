<?php
class client{
    private $url;

    public function __construct(){
        $this->url = "https://jsonplaceholder.typicode.com/";
    }

    private function get_all($url){
        $ci = curl_init($url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ci);
        curl_close($ci);
        return json_decode($res, false);
    }

    public function get_us(){
        $url = $this->url . "./users";
        return $this->get_all($url);
    }

    public function get_posts($id){
        $url = $this->url."./posts?userId=".$id;
        return $this->get_all($url);
    }

    public function get_tasks($id){
        $url = $this->url."./todos?userid=".$id;
        return $this->get_all($url);
    }

    /*---------------POSTS METHODS-----------------*/

    public function addPost($info){
        $url = $this->url . "./posts";
        $ci = curl_init($url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ci, CURLOPT_POST, 1);
        curl_setopt($ci, CURLOPT_POSTFIELDS, json_encode($info));
        curl_setopt($ci, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $res = curl_exec($ci);
        curl_close($ci);
        return json_decode($res, false);
    }

    public function updatePost($id, $info){
        $url = $this->url."./posts/".$id;
        $ci = curl_init($url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER,1 );
        curl_setopt($ci, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ci, CURLOPT_POSTFIELDS, json_encode($info));
        curl_setopt($ci, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        $res = curl_exec($ci);
        curl_close($ci);
        return json_decode($res, false);
    }

    public function deletePost($id)
    {
        $url = $this->url . "./posts/" . $id;
        $ci = curl_init($url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ci, CURLOPT_CUSTOMREQUEST, "DELETE");
        $res = curl_exec($ci);
        curl_close($ci);
        return json_decode($res, false);
    }

}
?>