<div class="directify_fn_profile_security_section">
    <form action="<?= BASE_URL . 'models/reset-password.php' ?>" method="post">
        <h3>Đổi Mật Khẩu</h3>
        <div class="security__pass-new">
            <label>Mật Khẩu Mới</label>
            <input type="password" id="security__pass-new" name="newpassword"/>
        </div>
        <div style="height: 30px"></div>
        <div class="security__pass-new-confirm">
            <label>Xác Nhận Mật Khẩu Mới</label>
            <input type="password" id="security__pass-new-confirm" name="repassword"/>
        </div>
        <div style="height: 30px"></div>
        <div class="security__pass-current">
            <label>Mật Khẩu Đang Dùng</label>
            <input type="password" id="security__pass-current" name="password"
                   placeholder="Nhập mật khẩu hiện tại của bạn"/>
        </div>
        <div style="height: 30px"></div>
        <div class="profile__save-password">
            <input type="submit" value="Save Password"/>
        </div>
    </form>
</div>