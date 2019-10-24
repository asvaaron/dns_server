<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DnsNamesIpv4[]|\Cake\Collection\CollectionInterface $dnsNamesIpv4s
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dns Names Ipv4'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dnsNamesIpv4s index large-9 medium-8 columns content">
    <h3><?= __('Dns Names Ipv4s') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('domain_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dnsNamesIpv4s as $dnsNamesIpv4): ?>
            <tr>
                <td><?= $this->Number->format($dnsNamesIpv4->id) ?></td>
                <td><?= h($dnsNamesIpv4->domain_name) ?></td>
                <td><?= h($dnsNamesIpv4->created_at) ?></td>
                <td><?= h($dnsNamesIpv4->modified_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dnsNamesIpv4->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dnsNamesIpv4->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dnsNamesIpv4->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dnsNamesIpv4->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
