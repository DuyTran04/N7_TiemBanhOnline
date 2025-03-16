<?php view('shared.admin.header', [
    'title' => 'Lịch sử trò chuyện Chatbot'
]); ?>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Lịch sử trò chuyện Chatbot</h1>
    </div>
    <div class="col-sm-6">
        <a href="./?module=admin&controller=chatbot" class="btn btn-info float-right">
            <i class="fas fa-arrow-left"></i> Quay lại quản lý Intents
        </a>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Session ID</th>
            <th>Tin nhắn người dùng</th>
            <th>Phản hồi của bot</th>
            <th>Context</th>
            <th>Thời gian</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conversations as $convo) : ?>
            <tr>
                <td><?= $convo['id'] ?></td>
                <td><?= substr($convo['session_id'], 0, 10) ?>...</td>
                <td><?= htmlspecialchars($convo['user_message']) ?></td>
                <td><?= htmlspecialchars(strlen($convo['bot_response']) > 100 ? substr($convo['bot_response'], 0, 100) . '...' : $convo['bot_response']) ?></td>
                <td><?= $convo['context'] ? $convo['context'] : '<span class="text-muted">Không có</span>' ?></td>
                <td><?= $convo['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php view('shared.admin.footer'); ?>