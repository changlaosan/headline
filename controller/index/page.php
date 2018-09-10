<?php
include '../core/db.php';

class page extends db
{
  const PER_PAGE = 4;
//  首页
  public function index()
  {
//接收分类id
    if (isset($_GET['cid'])) {
      $cid = $_GET['cid'];
    } else {
      $cid = 1;
    }
//接收页数
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
//分类
    $category = $this->pdo
      ->query('select * from news_category where is_default = "1" ')
      ->fetchAll();

//某个分类下的总条数
    $num = $this->pdo
      ->query('select count(*) as total from news where cid =' . $cid)
      ->fetch()['total'];

//总页数
    $page_total = ceil($num / $this::PER_PAGE);

//新闻
    $news = $this->pdo
      ->query('select * from news where cid= ' . $cid . ' limit '.$this::PER_PAGE )
      ->fetchAll();
//导航栏滚动距离
      if (isset($_GET['scrollLeft'])) {
          $scrollLeft = $_GET['scrollLeft'];
      } else {
          $scrollLeft = 0;
      }
    include '../views/index/index.html';
  }

// 首页ajax
  public function indexlist(){
      if (isset($_GET['cid'])) {
          $cid = $_GET['cid'];
      } else {
          $cid = 1;
      }
      if (isset($_GET['page'])) {
          $page = $_GET['page'];
      } else {
          $page = 1;
      }
      $news = $this->pdo
          ->query('select * from news where cid= ' . $cid . ' limit '.$this::PER_PAGE .' offset '. ($page-1)*$this::PER_PAGE)
          ->fetchAll();
      echo json_encode($news);
  }
//  分类页面
  public function category()
  {
    // 改变量is_default
      if(isset($_GET['s'])){
          $stmt = $this -> pdo->prepare("UPDATE news_category SET is_default = ? WHERE id = ?");
          $stmt->bindValue(1,$_GET['s']);
          $stmt->bindValue(2,$_GET['id']);
          $stmt->execute();
      }
    // 查默认的
      $category_show = $this->pdo
          ->query('select * from news_category where is_default="1"')
          ->fetchAll();
    // 查其他的
    $category_hide = $this->pdo
      ->query('select * from news_category where is_default="0"')
      ->fetchAll();
    include '../views/index/category.html';
  }

  public function search()
  {
    if(isset($_GET['s'])){
      $keyword = $_GET['s'];
    }else{
      $keyword = ' ';
    }
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
    $results = $this->pdo
      ->query('select * from news where title like "%'.$keyword.'%" limit '.$this::PER_PAGE.' offset '.($page-1)*$this::PER_PAGE)
      ->fetchAll();
    include '../views/index/search.html';
  }

  // ajax
  public function searchList(){

    if(isset($_GET['s'])){
      $keyword = $_GET['s'];
    }else{
      $keyword = '';
    }
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
    $results = $this->pdo
      ->query('select * from news where title like "%'.$keyword.'%" limit '.$this::PER_PAGE.' offset '.($page-1)*$this::PER_PAGE)
      ->fetchAll();
    echo json_encode($results);
  }
}



// 前台3个页面
//      ajax方式
// 中台 新闻管理   删除  分页
//      分类管理   删除  设置默认值  编辑
