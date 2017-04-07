<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comprovante'), ['action' => 'edit', $comprovante->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comprovante'), ['action' => 'delete', $comprovante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comprovante->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comprovantes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comprovante'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comprovantes view large-9 medium-8 columns content">
    <h3><?= h($comprovante->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $comprovante->has('user') ? $this->Html->link($comprovante->user->id, ['controller' => 'Users', 'action' => 'view', $comprovante->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $comprovante->has('file') ? $this->Html->link($comprovante->file->name, ['controller' => 'Files', 'action' => 'view', $comprovante->file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comprovante->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Boleto Id') ?></th>
            <td><?= $this->Number->format($comprovante->boleto_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vencimento') ?></th>
            <td><?= h($comprovante->vencimento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pagamento') ?></th>
            <td><?= h($comprovante->pagamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aproved') ?></th>
            <td><?= $comprovante->aproved ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
