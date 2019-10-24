<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dn $dn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dn'), ['action' => 'edit', $dn->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dn'), ['action' => 'delete', $dn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dn->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dn'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dns view large-9 medium-8 columns content">
    <h3><?= h($dn->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dns Ip Address') ?></th>
            <td><?= h($dn->dns_ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dn->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($dn->date_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Updated') ?></th>
            <td><?= h($dn->last_updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Dns Domain Name') ?></h4>
        <?= $this->Text->autoParagraph(h($dn->dns_domain_name)); ?>
    </div>
</div>
