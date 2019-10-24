<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DnsName $dnsName
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dns Name'), ['action' => 'edit', $dnsName->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dns Name'), ['action' => 'delete', $dnsName->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dnsName->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dns Names'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dns Name'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dnsNames view large-9 medium-8 columns content">
    <h3><?= h($dnsName->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dns Ip Address') ?></th>
            <td><?= h($dnsName->dns_ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dnsName->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($dnsName->date_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Updated') ?></th>
            <td><?= h($dnsName->last_updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Dns Domain Name') ?></h4>
        <?= $this->Text->autoParagraph(h($dnsName->dns_domain_name)); ?>
    </div>
</div>
