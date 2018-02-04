<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Keyword $keyword
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Keyword'), ['action' => 'edit', $keyword->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Keyword'), ['action' => 'delete', $keyword->id], ['confirm' => __('Are you sure you want to delete # {0}?', $keyword->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Keywords'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Keyword'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="keywords view large-9 medium-8 columns content">
    <h3><?= h($keyword->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($keyword->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= $this->Text->autoParagraph(h($keyword->title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Level') ?></h4>
        <?= $this->Text->autoParagraph(h($keyword->level)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Bookmarks') ?></h4>
        <?php if (!empty($keyword->bookmarks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($keyword->bookmarks as $bookmarks): ?>
            <tr>
                <td><?= h($bookmarks->id) ?></td>
                <td><?= h($bookmarks->title) ?></td>
                <td><?= h($bookmarks->author) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bookmarks', 'action' => 'view', $bookmarks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bookmarks', 'action' => 'edit', $bookmarks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookmarks', 'action' => 'delete', $bookmarks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmarks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
