<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DnsNamesIpv4 $dnsNamesIpv4
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dns Names Ipv4'), ['action' => 'edit', $dnsNamesIpv4->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dns Names Ipv4'), ['action' => 'delete', $dnsNamesIpv4->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dnsNamesIpv4->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dns Names Ipv4s'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dns Names Ipv4'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dnsNamesIpv4s view large-9 medium-8 columns content">
    <h3><?= h($dnsNamesIpv4->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Domain Name') ?></th>
            <td><?= h($dnsNamesIpv4->domain_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dnsNamesIpv4->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($dnsNamesIpv4->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified At') ?></th>
            <td><?= h($dnsNamesIpv4->modified_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Ip Address') ?></h4>
        <?= $this->Text->autoParagraph(h($dnsNamesIpv4->ip_address)); ?>
    </div>
</div>
