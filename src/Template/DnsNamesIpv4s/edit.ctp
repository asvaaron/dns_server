<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DnsNamesIpv4 $dnsNamesIpv4
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dnsNamesIpv4->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dnsNamesIpv4->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dns Names Ipv4s'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dnsNamesIpv4s form large-9 medium-8 columns content">
    <?= $this->Form->create($dnsNamesIpv4) ?>
    <fieldset>
        <legend><?= __('Edit Dns Names Ipv4') ?></legend>
        <?php
            echo $this->Form->control('domain_name');
            echo $this->Form->control('ip_address');
            echo $this->Form->control('created_at', ['empty' => true]);
            echo $this->Form->control('modified_at', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
