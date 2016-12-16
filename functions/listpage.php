 <?php
 $total_page = ceil($total_row/$max_result);
                  $list_page = ''; 
                   
                       $prev = $page - 1;
                                if($page>1){
                                $list_page.="<li><a href=".$_SERVER['PHP_SELF']."?page=$prev>Prev</a></li>";} 
                     
                        for($i=1;$i<=$total_page;$i++){
                            if($page==$i){
                                  $list_page.="<li><a>".$i."</a></li>";
                                      }
                            else{
                                $list_page.="<li><a href=".$_SERVER['PHP_SELF']."?page=$i>".$i."</a></li>";
                                }
                            }
                     
                                $next = $page + 1;
                                if($page<$total_page){
                                $list_page.="<li><a href=".$_SERVER['PHP_SELF']."?page=$next>Next</a></li>";} 
                                echo $list_page;
?>