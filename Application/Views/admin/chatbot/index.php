<?php view('shared.admin.header', [
    'title' => 'Chatbot Intents List'
]); ?>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Quản lý Chatbot</h1>
    </div>
    <div class="col-sm-6">
        <a href="./?module=admin&controller=chatbot&action=create" class="btn btn-success float-right">
            <i class="fas fa-plus"></i> Thêm Intent mới
        </a>
        <a href="./?module=admin&controller=chatbot&action=conversationHistory" class="btn btn-info float-right mr-2">
            <i class="fas fa-history"></i> Lịch sử trò chuyện
        </a>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tag</th>
            <th>Patterns</th>
            <th>Responses</th>
            <th>Context</th>
            <th>Động</th>
            <th class="text-right">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($intents as $intent) : ?>
            <tr>
                <td><?= $intent['id'] ?></td>
                <td><?= $intent['tag'] ?></td>
                <td>
                    <?php
                    $patterns = explode(',', $intent['patterns']);
                    foreach ($patterns as $pattern) {
                        echo "<span class='badge badge-info mr-1'>" . $pattern . "</span>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $responses = explode('|', $intent['responses']);
                    foreach ($responses as $response) {
                        echo "<div class='mb-1'>" . (strlen($response) > 50 ? substr($response, 0, 50) . '...' : $response) . "</div>";
                    }
                    ?>
                </td>
                <td>
                    <?php if ($intent['context_required']) : ?>
                        <span class="badge badge-warning">Yêu cầu: <?= $intent['context_required'] ?></span>
                    <?php endif; ?>
                    <?php if ($intent['context_set']) : ?>
                        <span class="badge badge-success">Đặt: <?= $intent['context_set'] ?></span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($intent['is_dynamic'] == 1) : ?>
                        <span class="badge badge-primary">Có</span>
                    <?php else : ?>
                        <span class="badge badge-secondary">Không</span>
                    <?php endif; ?>
                </td>
                <td class="text-right">
                    <a href="./?module=admin&controller=chatbot&action=edit&id=<?= $intent['id'] ?>" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="./?module=admin&controller=chatbot&action=delete&id=<?= $intent['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa intent này?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php view('shared.admin.footer'); ?>