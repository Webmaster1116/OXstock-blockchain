<div class="row footer-pagination">
    <div class="col-sm-12 col-lg-6 text-left">Page <?php echo $page; ?> of <?php echo $NumberOfPages; ?></div>
    <div class="col-sm-12 col-lg-6 text-right">
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
          <ul class="pagination">
            <?php
              if($NumberOfResults!=0 and $page!=1)
              {	
                $prev=$page-1;
                ?>                       
                <li class="page-item"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].$paginationback.'&page=1'; ?>"><span aria-hidden="true" class="la la-angle-double-left"></span><span class="sr-only">First Page</span></a></li>        
                <li class="page-item"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].$paginationback.'&page='.$prev; ?>" aria-label="Previous"><span aria-hidden="true" class="la la-angle-left"></span><span class="sr-only">Previous</span></a></li>
                <?php
              }
            ?>				         
            <?php
              for($i=$start; $i<= $end; $i++)
              {
                if($i==$page)
                {
                  ?>
                  <li class="page-item"><a class="page-link"><?php echo $i;?></a></li>
                  <?php
                }
                else
                {
                  ?>
                  <li class="page-item"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].$paginationback.'&page='.$i; ?>"><?php echo $i;?></a></li>
                  <?php
                }
              }
            ?>
            <?php
              if($NumberOfResults!=0 and $page!=$NumberOfPages)
              {	
                $next=$page+1;
                ?>            
                <li class="page-item"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].$paginationback.'&page='.$next;?>" aria-label="Next"><span aria-hidden="true" class="la la-angle-right"></span><span class="sr-only">Next</span></a></li>
                <li class="page-item"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].$paginationback.'&page='.$NumberOfPages;?>"><span aria-hidden="true" class="la la-angle-double-right"></span><span class="sr-only">Last Page</span></a></li>
                <?php
              }
            ?>                   
          </ul>           
          <?php
        }
        ?>
    </div>
</div>