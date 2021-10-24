<div class="content_detail__pagination cdp">
            <?php
        if($NumberOfResults>$Limit)
        {
          if($NumberOfPages<=20)
          {
          $start=1; $end=$NumberOfPages;
          }
          else if($page<=10)
          {
          $start=1; $end=20;
          }
          else if($page>=$NumberOfPages-10)
          {
          $start=$NumberOfPages-20; $end=$NumberOfPages;
          }
          else
          {
          $start=$page-10; $end=$page+9;
          }
          ?>
         
            <?php
              if($NumberOfResults!=0 and $page!=1)
              {	
                $prev=$page-1;
                ?>                       
               <a class="cdp_i" href="<?php echo URL_BASE.'index.php&page=1#Recent-post_sec'; ?>"><span aria-hidden="true" class="la la-angle-double-left"></span><span class="">First Page</span></a>        
               <a class="cdp_i" href="<?php echo URL_BASE.'index.php&page='.$prev.'#Recent-post_sec'; ?>" aria-label="Previous"><span aria-hidden="true" class="la la-angle-left"></span><span class="">Previous</span></a>
                <?php
              }
            ?>				         
            <?php
              for($i=$start; $i<= $end; $i++)
              {
                if($i==$page)
                {
                  ?>
                  <a class="cdp_i active-page"><?php echo $i;?></a>
                  <?php
                }
                else
                {
                  ?>
                  <a class="cdp_i" href="<?php echo URL_BASE.'index.php&page='.$i.'#Recent-post_sec'; ?>"><?php echo $i;?></a>
                  <?php
                }
              }
            ?>
            <?php
              if($NumberOfResults!=0 and $page!=$NumberOfPages)
              {	
                $next=$page+1;
                ?>            
                <a class="cdp_i" href="<?php echo URL_BASE.'index.php&page='.$next.'#Recent-post_sec';?>" aria-label="Next"><span aria-hidden="true" class="la la-angle-right"></span><span class="">Next</span></a>
                <a class="cdp_i" href="<?php echo URL_BASE.'index.php&page='.$NumberOfPages.'#Recent-post_sec';?>"><span aria-hidden="true" class="la la-angle-double-right"></span><span class="">Last Page</span></a>
                <?php
              }
            ?>                   
                    
          <?php
        }
        ?>
    </div>
