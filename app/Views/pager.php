<?php $pager->setSurroundCount(2) ?>
<nav class="courses-pagination mt-50">
    <ul class="pagination justify-content-lg-end justify-content-center">
        <?php if ($pager->hasPrevious()) { ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" aria-label="First">
                    <i class="fa fa-angle-double-left"></i>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getPrevious() ?>" aria-label="Previous">
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
        <?php } ?>
        <?php
        foreach ($pager->links() as $link) {
            $activeclass = $link['active'] ? 'active' : '';
        ?>
            <li class="page-item">
                <a class="<?= $activeclass; ?>" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?></a>
            </li>

        <?php } ?>
        <?php if ($pager->hasNext()) { ?>
            <li class="page-item">
                <a href="<?= $pager->getNext() ?>" aria-label="Next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getLast() ?>" aria-label="Next">
                    <i class="fa fa-angle-double-right"></i>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav> <!-- courses pagination -->