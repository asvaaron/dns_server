<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DnsName[]|\Cake\Collection\CollectionInterface $dnsNames
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dns Name'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dnsNames index large-9 medium-8 columns content">
    <h3><?= __('Dns Names') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dns_ip_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dnsNames as $dnsName): ?>
            <tr>
                <td><?= $this->Number->format($dnsName->id) ?></td>
                <td><?= h($dnsName->dns_ip_address) ?></td>
                <td><?= h($dnsName->date_created) ?></td>
                <td><?= h($dnsName->last_updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dnsName->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dnsName->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dnsName->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dnsName->id)]) ?>
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
