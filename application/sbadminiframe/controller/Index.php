<?php
namespace app\sbadminiframe\controller;

class Index
{
    public function index()
    {
       dump(input('post.'));
       dump($_POST);
    }
}
