<?php
include '../core/db.php';

class admin extends db
{

  public function index()
  {
      include '../views/admin/index-head.html';
      include '../views/admin/index-footer.html';
  }
}