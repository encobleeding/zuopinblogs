<?php
  class DB {
    public $db;
    function __construct ($config){
      $this->db = new mysqli($config['host'],$config['user'],$config['passwd'],$config['dbase']);
      $this->db->query('SET NAMES ' . $config['charset']);
    }

    //数据添加的方法
        function insertData($table, $data){
          $fieldA = array();
          foreach ($data as $field => &$value) {
              $fieldA[] = $field;
                //如果是字符串类型的数据，需要加引号
              if(is_string($value)){
                    $value = '"' . $value . '"';
              }
            }
          $sql = 'INSERT INTO ' . $table . '('.implode(', ', $fieldA).') VALUES ('.implode(', ', $data).')';
          // var_dump($sql);
          // exit;
          return $this->db->query($sql);
        }

    function deleteData ($table,$where){
      $sql = 'DELETE FROM '.$table.' WHERE 1=1 '.$this->whereData($where);
      return $this->db->query($sql);
    }

    function whereData ($where){
      if(!$where){
        return '';
      }
      if(is_array($where)){
        $where = implode('AND ',$delete);
      }
      $where = 'AND '.$where;
      return $where;
    }
    function getOneData($table, $fields, $where){
        $sql        = 'SELECT '.$fields.' FROM '.$table.' WHERE ' . $where . ' LIMIT 1';
        $result     = $this->db->query($sql);
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    function selectData ($table,$fields,$where='',$orderby='',$start=0,$num=0){
      $sql = 'SELECT '.$fields.' FROM '.$table.' WHERE 1=1 '.$this->whereData($where);

      if($orderby){

        $sql .= ' ORDER BY '.$orderby;
      }
      if($num){
        $sql .= ' LIMIT '.$start.','.$num;
      }
      // var_dump($sql);
      // exit;
      $r = $this->db->query($sql);
      $data = array();
      while ($row = $r->fetch_array(MYSQLI_ASSOC)) {
        $data[] = $row;
      }
      return $data;
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
      // var_dump($sql);
      // exit;
      return $this->db->query($sql);
    }

    function addFollow($tarid,$fansid){
      $tarrow = $this->getOneData('user','targetid','id = '.$tarid);
      if($tarrow['targetid']){
        $arr = explode(',',$tarrow['targetid']);
        array_push($arr,$fansid);
        $str = implode(',', $arr);
        $this->updateData('user',['targetid'=>$str],'id = '.$tarid);
      }else {
        $this->updateData('user',['targetid'=>$fansid],'id = '.$tarid);
      }

      $fansrow = $this->getOneData('user','fansid','id = '.$fansid);
      if($fansrow['fansid']){
        $arr = explode(',',$fansrow['fansid']);
        array_push($arr,$tarid);
        $str = implode(',', $arr);
        $this->updateData('user',['fansid'=>$str],'id = '.$fansid);
      }else {
        $this->updateData('user',['fansid'=>$tarid],'id = '.$fansid);
      }
    }

    function delFollow($tarid,$fansid){
      $tarrow = $this->getOneData('user','targetid','id = '.$tarid);

        $arr = explode(',',$tarrow['targetid']);
        foreach ($arr as $k=>$v){
          //判断数组值是否包含字符u
          // if(strpos($v, $fansid)!== false){
          if($v == $fansid){
            //删除对应的元素
            unset($arr[$k]);
          }
        }

        $str = implode(', ', $arr);
        $this->updateData('user',['targetid'=>$str],'id = '.$tarid);

      $fansrow = $this->getOneData('user','fansid','id = '.$fansid);

        $arr = explode(',',$fansrow['fansid']);
        foreach ($arr as $k=>$v){
          //判断数组值是否包含字符u
          //if(strpos($v, $tarid)!== false){
          if($v == $tarid){
            //删除对应的元素
            unset($arr[$k]);
          }
        }
        $str = implode(', ', $arr);
        $this->updateData('user',['fansid'=>$str],'id = '.$fansid);

    }

    function numFollow($id){
      $arr = array();
      $row = $this->getOneData('user','targetid,fansid','id = '.$id);
      if($row['targetid']){
        $tararr = explode(',',$row['targetid']);
        $arr['tarnum'] = count($tararr);
      }else {
        $arr['tarnum'] = 0;
      }
      if($row['fansid']){
        $fansarr = explode(',',$row['fansid']);
        $arr['fansnum'] = count($fansarr);
      }else {
        $arr['fansnum'] = 0;
      }
      return $arr;
    }

    function imgChange($str){
      if(!$str){
        echo '';
      }else{
        $arr = explode(',',$str);
        echo '<img src="'.$arr[1].'">';
      }

    }

    function headimgChange($aid){
      if(!$aid){
        echo '';
      }else{
        echo $this->getOneData('user','img','id ='.$aid)['img'];

      }
    }

    function users($id){

      $aid = $this->getOneData('blogs','aid','id='.$id)['aid'];
      if($aid == $id){
        echo "./userartic.php";
      }else{
        echo "./usersartic.php?id=".$aid;
      }
    }

    function __destruct (){
      $this->db->close();
    }
  }
