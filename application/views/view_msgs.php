<div class="chat-cont">
    <header id="style"></header>    
        <section class="name-list">
        <aside id="chat_container">
            <header class="chat_header"><p>Resent massages </p></header>
    <section class=".chat-section" style="max-height:86%;overflow:auto; ">
        <?php 
        $uid = $_SESSION['usci']['user_data']['id'];
        $fds = $this->mange->query("SELECT users.id FROM users JOIN msgs ON (users.id = msgs.to_id || users.id = msgs.from_id) WHERE msgs.from_id = $uid || msgs.to_id = $uid ",TRUE);
        if(isset($fds) && !empty($fds)){
            //print_r($fds);
            $n = count($fds);
            for($i=0 ; $i<$n ;$i++){
                for($j=0 ; $j < $n ; $j++){
                    if(isset($fds[$i]) && isset($fds[$j])&& ($i != $j) && ($fds[$i]['id'] == $fds[$j]['id']) ){
                        unset($fds[$j]);
                    }
                }
            }
           // print_r($fds);
            foreach ($fds as $fd) :?>
        <a  href="<?=  base_url("index.php/msg/get/$uid/".$fd['id']);?>"  >
            <li class="chat_list_container" >
                <img src="<?=base_url().select_item('users', 'profile_url',$fd['id']);?>" id="chat_img" class="details">
                <p id="chat_username" class="details"><?=select_item('users', 'username',$fd['id']); ?></p>
                <div id="online" class="details"></div>
            <div style="clear:both"></div>    
            </li> 
        </a>
            <?php 
    endforeach;
            
        }
            
        
        ?>
            
    </section>
    <footer class="chat_footer">
            <i class="fa fa-search"></i><input type="text" placeholder="SEARCH..." id="chat_search">
           
              <div style="clear:both"></div>
          </footer> 
    
</div>