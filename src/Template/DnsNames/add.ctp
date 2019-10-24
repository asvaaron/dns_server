<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DnsName $dnsName
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dns Names'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dnsNames form large-9 medium-8 columns content">
    <?= $this->Form->create($dnsName) ?>
    <fieldset>
        <legend><?= __('Add Dns Name') ?></legend>
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
