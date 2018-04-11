<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<?php 
use Cake\Routing\Router;
foreach ($tags as $tag) {
    echo '<h3><a href="'.Router::url(['controller' => 'tags', 'action' => 'view', $tag->id]).'">'.$tag->title.'</a></h3>';
    echo '<br>';
}
 ?>
 <hr><hr>
<?php 
foreach ($keywords as $keyword) {
    echo '<h5><a href="'.Router::url(['controller' => 'keywords', 'action' => 'view', $keyword->id]).'">'.$keyword->title.'</a></h5>';
    echo '<br>';
}
?>
 <hr><hr>
<?php 
foreach ($bookmarks as $bookmark) {
    echo '<p>'.h($bookmark->title).'</p>';
}

 ?>
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="persons index large-9 medium-8 columns content">
    <h3><?= __('Persons') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','id番号') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age','年齢') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name','名前') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($persons as $person): ?>
            <tr>
                <td><?= $this->Number->format($person->id) ?></td>
                <td><?= $this->Number->format($person->age) ?></td>
                <td><?php echo $person->name;?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    foreach ($photos as $photo) {
        echo '<span>'.$photo->id.'</span><em>'.$photo->area.'</em><br>';
     } 
     ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>


<?php 
$humans = array(
    "name"    => "acidbaer",
    "age"     => "23",
    "address" => "ccc@gmail.com",
    "tel"     => "4444",
    );
echo $humans["name"];
echo "<br>";
echo $humans["age"].'歳';
echo "<br>";


 ?>