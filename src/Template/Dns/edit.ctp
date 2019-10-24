<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dn $dn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dn->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dn->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dns'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dns form large-9 medium-8 columns content">
    <?= $this->Form->create($dn) ?>
    <fieldset>
        <legend><?= __('Edit Dn') ?></legend>
        <?php
            echo $this->Form->control('dns_domain_name');
            echo $this->Form->control('dns_ip_address');
            echo $this->Form->control('date_created', ['empty' => true]);
            echo $this->Form->control('last_updated', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
