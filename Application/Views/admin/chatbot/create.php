<?php view('shared.admin.header', [
    'title' => 'Add Chatbot Intent'
]); ?>

<?php if (!empty($message['success'])) { ?>
    <div class="alert alert-success" id="success-add-intent">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById('success-add-intent').style.display='none'">&times;</button>
        <?= $message['success'] ?? '' ?>
    </div>
<?php } ?>

<?php if (!empty($message['error'])) { ?>
    <div class="alert alert-danger" id="error-add-intent">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById('error-add-intent').style.display='none'">&times;</button>
        <?= $message['error'] ?? '' ?>
    </div>
<?php } ?>

<form action="./?module=admin&controller=chatbot&action=store" method="POST" name="intentForm">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="tag">Tag (Nhãn) <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="tag" id="tag" placeholder="Ví dụ: greeting, goodbye, products" required>
                <small class="form-text text-muted">Tag là định danh duy nhất cho intent. Không dùng khoảng trắng, dấu.</small>
            </div>

            <div class="form-group">
                <label for="patterns">Patterns (Các mẫu câu hỏi) <span class="text-danger">*</span></label>
                <textarea class="form-control" name="patterns" id="patterns" rows="4" placeholder="Các từ khóa hoặc câu hỏi, phân cách bằng dấu phẩy. Ví dụ: xin chào,chào,hello,hi" required></textarea>
                <small class="form-text text-muted">Nhập các từ khóa hoặc câu hỏi mà người dùng có thể hỏi, phân cách bằng dấu phẩy.</small>
            </div>

            <div class="form-group">
                <label for="responses">Responses (Các câu trả lời) <span class="text-danger">*</span></label>
                <textarea class="form-control" name="responses" id="responses" rows="6" placeholder="Các câu trả lời, phân cách bằng dấu |. Ví dụ: Xin chào!|Chào bạn!" required></textarea>
                <small class="form-text text-muted">Nhập các câu trả lời có thể dùng, phân cách bằng dấu |. Hệ thống sẽ chọn ngẫu nhiên một câu để trả lời.</small>
            </div>
            
            <div class="form-group">
                <label for="context_required">Context Required (Yêu cầu ngữ cảnh)</label>
                <input type="text" class="form-control" name="context_required" id="context_required" placeholder="Ví dụ: ask_view_products">
                <small class="form-text text-muted">Nhập ngữ cảnh yêu cầu để kích hoạt intent này. Để trống nếu intent có thể được kích hoạt bất kỳ lúc nào.</small>
            </div>
            
            <div class="form-group">
                <label for="context_set">Context Set (Đặt ngữ cảnh)</label>
                <input type="text" class="form-control" name="context_set" id="context_set" placeholder="Ví dụ: search_products_context">
                <small class="form-text text-muted">Nhập ngữ cảnh được đặt sau khi intent này được kích hoạt. Để trống nếu intent không đặt ngữ cảnh mới.</small>
            </div>
            
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="is_dynamic" id="is_dynamic">
                    <label class="custom-control-label" for="is_dynamic">Intent Động (Dynamic Intent)</label>
                </div>
                <small class="form-text text-muted">Chọn nếu intent này cần xử lý đặc biệt (tìm kiếm sản phẩm, trạng thái đơn hàng, ...).</small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu Intent</button>
                <a href="./?module=admin&controller=chatbot" class="btn btn-default">Quay lại</a>
            </div>
        </div>
    </div>
</form>

<?php view('shared.admin.footer'); ?>