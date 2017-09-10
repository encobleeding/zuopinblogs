<?php
  class addDel {
    public $ad;
    function __construct ($config){
      $this->ad = new mysqli($config['host'],$config['user'],$config['passwd'],$config['dbase']);
      $this->db->query('SET NAMES ' . $config['charset']);
    }

    //数据添加的方法
    function add($fields,$addid,$where){ //$fields字段（粉丝、关注人），$addid添加的id，$where判断(写字符串)
      $row = $this->getOneData('user',$fields,$where);
      $arr = explode(',',$row[$fields]);
      array_push($arr,$addid);
      $str = implode(', ', $arr);
      $this->updateData('user',{$fields:$str},$where);
    }

    function getOneData($table, $fields, $where){
        $sql        = 'SELECT '.$fields.' FROM '.$table.' WHERE ' . $where . ' LIMIT 1';
        // var_dump($sql);
        // exit;
        $result     = $this->db->query($sql);
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    function updateData ($table,$data,$where){
      $update = array();
      foreach($data as $key=>$val){
        if(is_string($val)){
          $val = '"'.$val.'"';
        }
        $update[] = $key .'='.$val;
      }
      $sql = 'UPDATE '.$table.' SET '.implode(', ',$update).' WHERE 1=1 '.$this->whereData($where);
      return $this->db->query($sql);
    }

    function __destruct (){
      $this->db->close();
    }
  }
