<?php

require_once 'client.php';
$api = new client();

$users = $api->get_us();
echo '<p style="background:lavender; text-align: center">Users</p>';
echo '<pre>';
print_r($users);
echo '</pre>';

echo '<p style="background:lavender; text-align: center">------8 user posts------</p>';
$uPosts = $api->get_posts(8);
echo '<pre>';
print_r($uPosts);
echo '</pre>';

echo '<p style="background:lavender; text-align: center">------9 user tasks------</p>';
$uTasks = $api->get_tasks(9);
echo '<pre>';
print_r($uTasks);
echo '</pre>';

$newInfo = array(
    'userId' => 2,
    'title' => 'New post theme',
    'body' => 'Put your description here'
);
echo '<p style="background:lavender; text-align: center">------2 user new post------</p>';
$newPost = $api->addPost($newInfo);
echo '<pre>';
print_r($newPost);
echo '</pre>';

echo '<p style="background:lavender; text-align: center">------Updated post------</p>';

$upInfo = array(
    'title' => 'Changed theme',
    'body' => 'Changed descritption'
);
$updated = $api->updatePost(2, $upInfo);
echo '<pre>';
print_r($updated);
echo '</pre>';

echo '<p style="background:lavender; text-align: center">------Deleted post------</p>';


$deletedPost = $api->deletePost(2);
echo '<pre>';
print_r($deletedPost);
echo '</pre>';

?>

