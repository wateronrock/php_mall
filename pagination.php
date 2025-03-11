<!-- bootstrap5를 기준으로 페이지 네비를 기술한다 -->
<nav>
  <ul class="pagination pagination-sm justify-content-center py-1">
<?php if($block>1): ?>
    <li class="page-item">
      <a class="page-link" href="<?=$url?>&page=<?=$page_s?>">◀</a>
    </li>
<?php endif;?>
<?php for($i = $page_s+1;$i<=$page_e;$i++):?>
    <?php if($i == $page):?>
        <li class="page-item active">
            <span class="page-link mycolor1"><?=$i?></span>
        </li>
    <?php else:?>
        <li class="page-item">
            <a class="page-link" href="<?=$url?>&page=<?=$i?>"><?=$i ?></a>
        </li>
    <?php endif; ?>
<?php endfor;?>
<?php if($block < $blocks): ?>
    <li class="page-item">
      <a class="page-link" href="<?=$url?>&page=<?=$page_e +1 ?>"> ▶ </a>
    </li>
<?php endif;?>
  </ul>
</nav>