<?php
function getPost($post_type,$field = array(),$order = 'asc',$tag_id = '',$meta_query = array(),$num = ''){
		$args = array( 
						'post_type' => $post_type, 
						'order' => $order,
						'posts_per_page' => $num,
						'meta_query' => $meta_query

					);
		if(!empty($tag_id)){
			$args['p'] = $tag_id;
		}
		
		$loop = new WP_Query( $args );
		$i = 0;
		$result = array();

		while ( $loop->have_posts() ) : $loop->the_post();
			foreach($field as $key=>$row){
				$result[$i]['id'] = get_the_ID();
				if($row == 'title'){
					$result[$i][$row] = get_the_title();
				}
				elseif($row == 'desc'){
					$result[$i][$row] = get_the_content();
				}
				else{
					$result[$i][$row] = get_field($row);
				}
			}
			$i++;
		endwhile;	
		return $result;
	
}


function moretext($message,$length = 200){
		
		if(mb_strlen($message) > $length){
			return mb_substr($message, 0, $length). "..." ;
		}
		else{
			return $message;
		}
}
function format_date($date){
	
		$arrayMonth = array('ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.');
		$exdate = explode('/',$date);
		$month = (int)$exdate[1];
		$year = substr($exdate[2]+543,2,2);
		return (int)$exdate[0]." ".$arrayMonth[$exdate[1]-1]." ".$year;
	
}
function prepare_data($data){
		$result_array = array();
        $excepted = array("id","step");
		foreach($data as $key=>$row){
			if(!in_array($key,$excepted)){
				$result_array[$key] = $row;
			}
		}
		return $result_array;
}

function db_result($result){
	   sleep(1);
		if($result){
            $callback[] = true;
		}
		else{
            $callback[] = false;
            $callback[] = "ไม่สามารถอัพเดทข้อมูลในฐานข้อมูลได้ !";
		}
        echo json_encode($callback);
}
?>