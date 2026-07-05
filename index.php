<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Góc Sinh Viên — Mạng xã hội mini cho sinh viên</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#EDF1F6;
  --board:#E4EAF3;
  --surface:#FFFFFF;
  --surface-alt:#F5F7FB;
  --ink:#1B2430;
  --muted:#6B7685;
  --line:#D7DEE8;
  --primary:#2F6FED;
  --primary-dark:#1E54C4;
  --primary-ink:#FFFFFF;
  --accent:#FFC145;
  --accent-2:#FF6B4A;
  --success:#2FA66A;
  --danger:#E14F4F;
  --radius:14px;
  --shadow: 0 1px 2px rgba(27,36,48,.06), 0 8px 24px rgba(27,36,48,.06);
}
*{box-sizing:border-box;}
html,body{height:100%;}
body{
  margin:0;
  background:var(--bg);
  color:var(--ink);
  font-family:'Inter',sans-serif;
  -webkit-font-smoothing:antialiased;
}
h1,h2,h3,h4,.display{font-family:'Poppins',sans-serif;}
.mono{font-family:'JetBrains Mono',monospace;}
button{font-family:inherit;cursor:pointer;}
input,textarea{font-family:inherit;}
a{color:inherit;}
::selection{background:var(--accent);color:var(--ink);}

/* ---------- Scrollbar ---------- */
::-webkit-scrollbar{width:8px;height:8px;}
::-webkit-scrollbar-thumb{background:#C6D0E0;border-radius:8px;}

/* ---------- Utility ---------- */
.btn{
  display:inline-flex;align-items:center;justify-content:center;gap:6px;
  border:none;border-radius:10px;padding:10px 18px;font-weight:600;font-size:14px;
  transition:transform .12s ease, box-shadow .12s ease, background .15s ease;
}
.btn:active{transform:scale(.97);}
.btn-primary{background:var(--primary);color:var(--primary-ink);}
.btn-primary:hover{background:var(--primary-dark);}
.btn-ghost{background:transparent;color:var(--ink);border:1.5px solid var(--line);}
.btn-ghost:hover{border-color:var(--primary);color:var(--primary);}
.btn-accent{background:var(--accent);color:#4A3300;}
.btn-danger{background:transparent;color:var(--danger);border:1.5px solid #F3C7C7;}
.btn-danger:hover{background:#FDEDED;}
.btn-sm{padding:6px 12px;font-size:13px;border-radius:8px;}
.btn:disabled{opacity:.5;cursor:not-allowed;}
.pill{
  display:inline-flex;align-items:center;gap:5px;padding:3px 10px;border-radius:99px;
  font-size:11.5px;font-weight:600;background:var(--surface-alt);color:var(--muted);
}
.hidden{display:none !important;}
.field{margin-bottom:14px;}
.field label{display:block;font-size:13px;font-weight:600;margin-bottom:6px;color:var(--muted);}
.field input, .field textarea{
  width:100%;padding:11px 13px;border-radius:10px;border:1.5px solid var(--line);
  background:var(--surface-alt);font-size:14.5px;color:var(--ink);outline:none;
  transition:border-color .15s ease, background .15s ease;
}
.field input:focus, .field textarea:focus{border-color:var(--primary);background:var(--surface);}
.field textarea{resize:vertical;min-height:70px;}
.error-text{color:var(--danger);font-size:12.5px;margin-top:5px;display:block;}
.field.has-error input, .field.has-error textarea{border-color:var(--danger);background:#FFF6F6;}

/* ---------- Auth screen ---------- */
#auth-screen{
  min-height:100vh;display:flex;align-items:center;justify-content:center;
  background:
    linear-gradient(180deg, rgba(255,255,255,.5), rgba(255,255,255,0)),
    repeating-linear-gradient(0deg, transparent, transparent 38px, #DCE4F0 39px),
    var(--board);
  padding:24px;
}
.auth-wrap{
  width:100%;max-width:920px;display:grid;grid-template-columns:1.05fr 1fr;
  background:var(--surface);border-radius:20px;overflow:hidden;box-shadow:var(--shadow);
}
.auth-side{
  background:linear-gradient(155deg,var(--primary) 0%, #4A7EF2 55%, #6C93F5 100%);
  color:#fff;padding:44px 38px;display:flex;flex-direction:column;justify-content:space-between;
  position:relative;overflow:hidden;
}
.auth-side::after{
  content:"";position:absolute;right:-60px;bottom:-60px;width:220px;height:220px;
  background:var(--accent);opacity:.18;border-radius:40% 60% 55% 45%/50% 45% 55% 50%;
}
.auth-brand{font-family:'Poppins';font-weight:800;font-size:26px;letter-spacing:-.5px;display:flex;align-items:center;gap:10px;}
.auth-brand .pin{font-size:22px;transform:rotate(-18deg);display:inline-block;}
.auth-tagline{font-size:15px;line-height:1.6;opacity:.92;margin-top:18px;max-width:320px;}
.auth-uc{display:flex;flex-direction:column;gap:10px;margin-top:28px;}
.auth-uc div{display:flex;align-items:center;gap:10px;font-size:13.5px;opacity:.9;}
.auth-uc span.dot{width:6px;height:6px;border-radius:50%;background:var(--accent);flex:none;}
.auth-form-side{padding:44px 40px;}
.auth-tabs{display:flex;gap:6px;margin-bottom:26px;background:var(--surface-alt);padding:4px;border-radius:12px;}
.auth-tab{flex:1;text-align:center;padding:9px 0;border-radius:9px;font-weight:600;font-size:14px;color:var(--muted);background:transparent;border:none;}
.auth-tab.active{background:var(--surface);color:var(--primary);box-shadow:var(--shadow);}
.auth-msg{padding:10px 13px;border-radius:10px;font-size:13px;margin-bottom:14px;}
.auth-msg.err{background:#FDECEC;color:var(--danger);}
.auth-msg.ok{background:#EAF7EF;color:var(--success);}

/* ---------- App shell ---------- */
#app-shell{display:none;min-height:100vh;grid-template-columns:250px 1fr;background:var(--bg);}
#app-shell.active{display:grid;}
.sidebar{
  background:var(--surface);border-right:1px solid var(--line);padding:22px 16px;
  display:flex;flex-direction:column;position:sticky;top:0;height:100vh;
}
.brand{display:flex;align-items:center;gap:9px;font-family:'Poppins';font-weight:800;font-size:19px;padding:0 8px 22px;color:var(--ink);}
.brand .pin{transform:rotate(-18deg);color:var(--accent-2);}
.nav-item{
  display:flex;align-items:center;gap:12px;padding:11px 12px;border-radius:11px;color:var(--muted);
  font-weight:600;font-size:14.5px;margin-bottom:4px;border:none;background:transparent;width:100%;text-align:left;
  position:relative;
}
.nav-item:hover{background:var(--surface-alt);color:var(--ink);}
.nav-item.active{background:#EAF0FE;color:var(--primary);}
.nav-item .ico{width:20px;text-align:center;font-size:17px;}
.nav-badge{
  margin-left:auto;background:var(--accent-2);color:#fff;font-size:10.5px;font-weight:700;
  border-radius:99px;padding:1px 7px;
}
.sidebar-footer{margin-top:auto;border-top:1px solid var(--line);padding-top:14px;}
.mini-profile{display:flex;align-items:center;gap:10px;padding:8px;border-radius:11px;}
.mini-profile:hover{background:var(--surface-alt);cursor:pointer;}
.mini-profile .name{font-weight:700;font-size:13.5px;}
.mini-profile .handle{font-size:11.5px;color:var(--muted);}

.avatar{
  width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;
  font-weight:700;color:#fff;flex:none;font-size:15px;
}
.avatar.sm{width:30px;height:30px;font-size:12px;}
.avatar.lg{width:76px;height:76px;font-size:26px;}
.avatar img{width:100%;height:100%;border-radius:50%;object-fit:cover;}

.main{padding:26px 34px;max-width:1180px;}
.topbar{display:flex;align-items:center;gap:16px;margin-bottom:24px;}
.search-box{
  flex:1;max-width:420px;display:flex;align-items:center;gap:9px;background:var(--surface);
  border:1.5px solid var(--line);border-radius:11px;padding:9px 14px;
}
.search-box input{border:none;outline:none;background:transparent;flex:1;font-size:14px;}
.view-title{font-family:'Poppins';font-weight:700;font-size:22px;}
.view-sub{color:var(--muted);font-size:13.5px;margin-top:2px;}

/* ---------- Corkboard feed ---------- */
.board{
  background:
    repeating-linear-gradient(90deg, rgba(255,255,255,.4) 0 1px, transparent 1px 26px);
  background-color:var(--board);
  border-radius:18px;padding:22px;
}
.composer{
  background:var(--surface);border-radius:16px;padding:18px 20px;box-shadow:var(--shadow);margin-bottom:20px;
  border:1.5px dashed var(--line);
}
.composer-top{display:flex;gap:12px;}
.composer textarea{flex:1;border:none;background:var(--surface-alt);border-radius:12px;padding:12px 14px;font-size:14.5px;min-height:56px;outline:none;}
.composer textarea:focus{background:#EEF3FC;}
.composer-actions{display:flex;justify-content:space-between;align-items:center;margin-top:10px;padding-left:52px;}
.composer-actions .left{display:flex;gap:10px;align-items:center;}
.img-preview{position:relative;margin-top:10px;margin-left:52px;display:inline-block;}
.img-preview img{max-height:180px;border-radius:10px;display:block;}
.img-preview .rm{position:absolute;top:-8px;right:-8px;background:var(--danger);color:#fff;border:none;border-radius:50%;width:22px;height:22px;font-size:12px;}

.post-card{
  background:var(--surface);border-radius:16px;padding:18px 20px;box-shadow:var(--shadow);
  margin-bottom:18px;position:relative;
}
.post-card::before{
  content:"📌";position:absolute;top:-11px;left:22px;font-size:18px;
}
.post-card:nth-child(3n+1){transform:rotate(-.4deg);}
.post-card:nth-child(3n+2){transform:rotate(.35deg);}
.post-card:nth-child(3n){transform:rotate(-.15deg);}
.post-head{display:flex;align-items:center;gap:11px;}
.post-head .who{flex:1;}
.post-head .name{font-weight:700;font-size:14.5px;}
.post-head .time{font-size:12px;color:var(--muted);}
.post-menu{position:relative;}
.post-menu-btn{background:none;border:none;color:var(--muted);font-size:18px;padding:4px 8px;border-radius:8px;}
.post-menu-btn:hover{background:var(--surface-alt);}
.post-menu-list{
  position:absolute;right:0;top:32px;background:var(--surface);border:1px solid var(--line);
  border-radius:10px;box-shadow:var(--shadow);min-width:130px;overflow:hidden;z-index:5;
}
.post-menu-list button{display:block;width:100%;text-align:left;padding:9px 13px;border:none;background:none;font-size:13.5px;}
.post-menu-list button:hover{background:var(--surface-alt);}
.post-menu-list button.danger{color:var(--danger);}
.post-body{margin:12px 0 6px;font-size:14.5px;line-height:1.6;white-space:pre-wrap;}
.post-img{max-width:100%;border-radius:12px;margin-top:8px;display:block;}
.post-stats{display:flex;gap:16px;color:var(--muted);font-size:12.5px;padding:10px 0;border-bottom:1px solid var(--line);}
.post-actions{display:flex;gap:6px;padding-top:8px;}
.post-action{
  flex:1;display:flex;align-items:center;justify-content:center;gap:7px;border:none;background:none;
  padding:8px;border-radius:9px;color:var(--muted);font-weight:600;font-size:13.5px;
}
.post-action:hover{background:var(--surface-alt);}
.post-action.liked{color:var(--accent-2);}
.comments{margin-top:10px;border-top:1px dashed var(--line);padding-top:10px;}
.comment{display:flex;gap:9px;margin-bottom:10px;}
.comment-bubble{background:var(--surface-alt);border-radius:12px;padding:8px 12px;border-left:3px solid var(--primary);flex:1;}
.comment-name{font-weight:700;font-size:12.5px;}
.comment-text{font-size:13.5px;margin-top:2px;}
.comment-time{font-size:11px;color:var(--muted);margin-top:3px;}
.comment-input-row{display:flex;gap:9px;margin-top:8px;}
.comment-input-row input{flex:1;border:1.5px solid var(--line);border-radius:99px;padding:8px 14px;font-size:13.5px;outline:none;background:var(--surface-alt);}
.comment-input-row input:focus{border-color:var(--primary);}
.comment-input-row button{border:none;background:var(--primary);color:#fff;border-radius:99px;padding:8px 16px;font-size:13px;font-weight:600;}

.empty-state{text-align:center;padding:60px 20px;color:var(--muted);}
.empty-state .big{font-size:38px;margin-bottom:10px;}

/* ---------- Cards / lists (friends, search, messages) ---------- */
.card-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));gap:14px;}
.person-card{
  background:var(--surface);border-radius:14px;padding:16px;box-shadow:var(--shadow);
  display:flex;flex-direction:column;align-items:center;text-align:center;gap:8px;
}
.person-card .name{font-weight:700;font-size:14.5px;}
.person-card .handle{font-size:12px;color:var(--muted);}
.person-card .bio{font-size:12px;color:var(--muted);min-height:16px;}
.person-card .row-btns{display:flex;gap:6px;margin-top:6px;width:100%;}
.person-card .row-btns .btn{flex:1;}

.list-row{
  display:flex;align-items:center;gap:12px;background:var(--surface);border-radius:13px;
  padding:12px 14px;box-shadow:var(--shadow);margin-bottom:10px;
}
.list-row .info{flex:1;min-width:0;}
.list-row .name{font-weight:700;font-size:14px;}
.list-row .sub{font-size:12px;color:var(--muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.list-row .actions{display:flex;gap:6px;}

/* ---------- Messages ---------- */
.chat-shell{display:grid;grid-template-columns:290px 1fr;background:var(--surface);border-radius:16px;box-shadow:var(--shadow);overflow:hidden;height:calc(100vh - 150px);}
.chat-list{border-right:1px solid var(--line);overflow-y:auto;}
.chat-list-item{display:flex;gap:10px;align-items:center;padding:13px 14px;border-bottom:1px solid var(--surface-alt);cursor:pointer;}
.chat-list-item:hover{background:var(--surface-alt);}
.chat-list-item.active{background:#EAF0FE;}
.chat-list-item .info{flex:1;min-width:0;}
.chat-list-item .name{font-weight:700;font-size:13.5px;}
.chat-list-item .preview{font-size:12px;color:var(--muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.chat-main{display:flex;flex-direction:column;height:100%;}
.chat-header{padding:14px 18px;border-bottom:1px solid var(--line);display:flex;align-items:center;gap:11px;}
.chat-body{flex:1;overflow-y:auto;padding:18px;display:flex;flex-direction:column;gap:10px;}
.msg-row{display:flex;}
.msg-row.mine{justify-content:flex-end;}
.msg-bubble{max-width:60%;padding:9px 14px;border-radius:16px;font-size:13.5px;line-height:1.45;}
.msg-row.mine .msg-bubble{background:var(--primary);color:#fff;border-bottom-right-radius:4px;}
.msg-row:not(.mine) .msg-bubble{background:var(--surface-alt);border-bottom-left-radius:4px;}
.msg-time{font-size:10.5px;color:var(--muted);margin-top:3px;text-align:right;}
.chat-input{display:flex;gap:10px;padding:14px 16px;border-top:1px solid var(--line);}
.chat-input input{flex:1;border:1.5px solid var(--line);border-radius:99px;padding:10px 16px;font-size:14px;outline:none;background:var(--surface-alt);}
.chat-input input:focus{border-color:var(--primary);}

/* ---------- Profile ---------- */
.profile-cover{height:100px;border-radius:16px 16px 0 0;background:linear-gradient(120deg,var(--primary),#7CA0F5 60%, var(--accent));}
.profile-card{background:var(--surface);border-radius:16px;box-shadow:var(--shadow);margin-bottom:22px;overflow:hidden;}
.profile-info{padding:0 26px 22px;display:flex;gap:18px;align-items:flex-end;margin-top:-38px;}
.profile-meta{padding-bottom:6px;}
.profile-name{font-family:'Poppins';font-weight:700;font-size:20px;}
.profile-handle{color:var(--muted);font-size:13px;}
.profile-bio{padding:0 26px 20px;color:var(--ink);font-size:14px;line-height:1.6;}
.profile-tabs{display:flex;gap:4px;padding:0 20px;border-top:1px solid var(--line);}
.profile-tab{padding:13px 16px;border:none;background:none;font-weight:600;font-size:13.5px;color:var(--muted);border-bottom:2.5px solid transparent;}
.profile-tab.active{color:var(--primary);border-color:var(--primary);}
.stat-chip{text-align:center;}
.stat-chip b{display:block;font-size:16px;}
.stat-chip span{font-size:11.5px;color:var(--muted);}

/* ---------- Modal ---------- */
.modal-backdrop{
  position:fixed;inset:0;background:rgba(27,36,48,.45);display:none;align-items:center;justify-content:center;z-index:100;padding:20px;
}
.modal-backdrop.active{display:flex;}
.modal{background:var(--surface);border-radius:16px;padding:24px;width:100%;max-width:440px;max-height:90vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,.25);}
.modal h3{margin:0 0 16px;font-size:18px;}
.modal-close{float:right;border:none;background:var(--surface-alt);width:28px;height:28px;border-radius:50%;font-size:15px;color:var(--muted);}

/* ---------- Toast ---------- */
#toast{
  position:fixed;bottom:22px;left:50%;transform:translateX(-50%) translateY(120%);
  background:var(--ink);color:#fff;padding:11px 20px;border-radius:99px;font-size:13.5px;font-weight:600;
  box-shadow:var(--shadow);z-index:200;transition:transform .25s ease;
}
#toast.show{transform:translateX(-50%) translateY(0);}

/* ---------- Responsive ---------- */
@media (max-width:880px){
  #app-shell.active{grid-template-columns:1fr;}
  .sidebar{
    position:fixed;bottom:0;left:0;right:0;top:auto;height:auto;width:100%;
    flex-direction:row;justify-content:space-around;padding:8px 6px;z-index:50;
    border-top:1px solid var(--line);border-right:none;
  }
  .brand,.sidebar-footer{display:none;}
  .nav-item{flex-direction:column;font-size:10.5px;padding:7px 4px;gap:3px;width:auto;flex:1;}
  .nav-item span.label{white-space:nowrap;}
  .main{padding:18px 16px 90px;}
  .auth-wrap{grid-template-columns:1fr;}
  .auth-side{display:none;}
  .chat-shell{grid-template-columns:1fr;height:calc(100vh - 220px);}
  .chat-list{display:none;}
  .chat-list.mobile-active{display:block;position:fixed;inset:0 0 60px;background:var(--surface);z-index:60;}
}
</style>
</head>
<body>

<!-- ============ AUTH SCREEN ============ -->
<div id="auth-screen">
  <div class="auth-wrap">
    <div class="auth-side">
      <div>
        <div class="auth-brand"><span class="pin">📌</span>Góc Sinh Viên</div>
        <div class="auth-tagline">Mạng xã hội mini dành riêng cho sinh viên: đăng bài, kết bạn, nhắn tin và cùng nhau học tập.</div>
      </div>
      <div class="auth-uc">
        <div><span class="dot"></span>Đăng bài viết &amp; tương tác (thích, bình luận)</div>
        <div><span class="dot"></span>Kết bạn &amp; quản lý danh sách bạn bè</div>
        <div><span class="dot"></span>Nhắn tin trực tiếp giữa các thành viên</div>
        <div><span class="dot"></span>Tìm kiếm người dùng &amp; bài viết</div>
      </div>
    </div>
    <div class="auth-form-side">
      <div class="auth-tabs">
        <button class="auth-tab active" id="tab-login" onclick="switchAuthTab('login')">Đăng nhập</button>
        <button class="auth-tab" id="tab-register" onclick="switchAuthTab('register')">Đăng ký</button>
      </div>
      <div id="auth-message"></div>

      <!-- LOGIN FORM -->
      <form id="login-form" onsubmit="return handleLogin(event)">
        <div class="field" id="f-login-id">
          <label>Email hoặc tên đăng nhập</label>
          <input type="text" id="login-id" autocomplete="username">
        </div>
        <div class="field" id="f-login-pw">
          <label>Mật khẩu</label>
          <input type="password" id="login-pw" autocomplete="current-password">
        </div>
        <button class="btn btn-primary" style="width:100%;padding:12px;" type="submit">Đăng nhập</button>
        <p style="text-align:center;font-size:12.5px;color:var(--muted);margin-top:16px;">Chưa có tài khoản? <a href="#" onclick="switchAuthTab('register');return false;" style="color:var(--primary);font-weight:600;">Đăng ký ngay</a></p>
      </form>

      <!-- REGISTER FORM -->
      <form id="register-form" class="hidden" onsubmit="return handleRegister(event)">
        <div class="field" id="f-reg-name">
          <label>Họ và tên</label>
          <input type="text" id="reg-name">
        </div>
        <div class="field" id="f-reg-username">
          <label>Tên đăng nhập</label>
          <input type="text" id="reg-username" placeholder="vd: ngoducanh">
        </div>
        <div class="field" id="f-reg-email">
          <label>Email</label>
          <input type="text" id="reg-email" placeholder="vd: [email protected]">
        </div>
        <div class="field" id="f-reg-pw">
          <label>Mật khẩu</label>
          <input type="password" id="reg-pw">
        </div>
        <div class="field" id="f-reg-pw2">
          <label>Xác nhận mật khẩu</label>
          <input type="password" id="reg-pw2">
        </div>
        <button class="btn btn-primary" style="width:100%;padding:12px;" type="submit">Tạo tài khoản</button>
        <p style="text-align:center;font-size:12.5px;color:var(--muted);margin-top:16px;">Đã có tài khoản? <a href="#" onclick="switchAuthTab('login');return false;" style="color:var(--primary);font-weight:600;">Đăng nhập</a></p>
      </form>
    </div>
  </div>
</div>

<!-- ============ APP SHELL ============ -->
<div id="app-shell">
  <nav class="sidebar">
    <div class="brand"><span class="pin">📌</span>Góc Sinh Viên</div>
    <button class="nav-item active" data-view="feed" onclick="goView('feed')"><span class="ico">🏠</span><span class="label">Trang chủ</span></button>
    <button class="nav-item" data-view="friends" onclick="goView('friends')"><span class="ico">🧑‍🤝‍🧑</span><span class="label">Bạn bè</span><span class="nav-badge hidden" id="badge-friends">0</span></button>
    <button class="nav-item" data-view="messages" onclick="goView('messages')"><span class="ico">💬</span><span class="label">Tin nhắn</span></button>
    <button class="nav-item" data-view="profile" onclick="goView('profile')"><span class="ico">👤</span><span class="label">Hồ sơ</span></button>
    <div class="sidebar-footer">
      <div class="mini-profile" onclick="goView('profile')">
        <div class="avatar sm" id="mini-avatar"></div>
        <div>
          <div class="name" id="mini-name"></div>
          <div class="handle" id="mini-handle"></div>
        </div>
      </div>
      <button class="btn btn-ghost btn-sm" style="width:100%;margin-top:10px;" onclick="handleLogout()">🚪 Đăng xuất</button>
    </div>
  </nav>

  <main class="main">
    <div class="topbar">
      <div class="search-box">
        <span>🔎</span>
        <input type="text" id="global-search" placeholder="Tìm bạn bè hoặc bài viết..." onkeydown="if(event.key==='Enter')runSearch()">
      </div>
      <button class="btn btn-ghost btn-sm" onclick="runSearch()">Tìm kiếm</button>
    </div>
    <div id="view-root"></div>
  </main>
</div>

<!-- ============ MODAL (edit post / profile / password) ============ -->
<div class="modal-backdrop" id="modal-backdrop">
  <div class="modal" id="modal-content"></div>
</div>

<div id="toast"></div>

<script>
/* =========================================================
   GÓC SINH VIÊN — client-side demo of a mini social network
   Data persisted in localStorage (single-file front-end app)
   ========================================================= */

const DB_KEY = 'gsv_db_v1';
const SESSION_KEY = 'gsv_session_v1';

function loadDB(){
  let raw = localStorage.getItem(DB_KEY);
  if(!raw){
    const db = seedDB();
    localStorage.setItem(DB_KEY, JSON.stringify(db));
    return db;
  }
  try{ return JSON.parse(raw); }catch(e){ const db = seedDB(); localStorage.setItem(DB_KEY, JSON.stringify(db)); return db; }
}
function saveDB(db){ localStorage.setItem(DB_KEY, JSON.stringify(db)); }
function uid(prefix){ return (prefix||'id')+'_'+Math.random().toString(36).slice(2,10); }
function now(){ return Date.now(); }

function seedDB(){
  const u1 = { id:'u_demo', username:'sinhvien_demo', email:'[email protected]', fullname:'Sinh Viên Demo', password:'123456', bio:'Chào mừng đến với Góc Sinh Viên! 👋 Đây là tài khoản demo.', avatar:null, createdAt: now() };
  const u2 = { id:'u_anh', username:'ducanh', email:'[email protected]', fullname:'Ngô Đức Anh', password:'123456', bio:'Lớp 74DCTT11 · Yêu thích kiểm thử phần mềm 🐞', avatar:null, createdAt: now() };
  const u3 = { id:'u_vinh', username:'truongvinh', email:'[email protected]', fullname:'Ngô Trường Vinh', password:'123456', bio:'Đang tìm nhóm học React cùng!', avatar:null, createdAt: now() };
  const p1 = { id:uid('p'), userId:'u_anh', content:'Cả nhà ơi, ai có tài liệu ôn tập môn Kiểm thử phần mềm không, cho mình xin với 📚', image:null, createdAt: now()-1000*60*60*5, likes:['u_vinh'], comments:[
      { id:uid('c'), userId:'u_vinh', content:'Tối nay mình gửi cho cậu nhé!', createdAt: now()-1000*60*58*3 }
  ]};
  const p2 = { id:uid('p'), userId:'u_vinh', content:'Vừa demo xong đồ án Mạng xã hội mini, mọi người vào ủng hộ nhóm mình nha 🎉', image:null, createdAt: now()-1000*60*60*20, likes:[], comments:[] };
  return { users:[u1,u2,u3], posts:[p2,p1], friendRequests:[
      { id:uid('fr'), fromId:'u_anh', toId:'u_demo', status:'pending', createdAt: now()-1000*60*30 }
  ], messages:[
      { id:uid('m'), fromId:'u_vinh', toId:'u_demo', content:'Chào cậu! Cậu có tham gia nhóm học nhóm CSDL không?', createdAt: now()-1000*60*60*2 }
  ] };
}

let DB = loadDB();
let session = JSON.parse(localStorage.getItem(SESSION_KEY) || 'null');
let currentView = 'feed';
let activeChatUserId = null;
let profileTab = 'posts';
let viewingUserId = null; // for viewing other profiles

function me(){ return session ? DB.users.find(u=>u.id===session.userId) : null; }
function userById(id){ return DB.users.find(u=>u.id===id); }

/* ---------------- Toast ---------------- */
let toastTimer=null;
function toast(msg){
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(()=>t.classList.remove('show'), 2400);
}

/* ---------------- Avatar helpers ---------------- */
function hashHue(str){
  let h=0;
  for(let i=0;i<str.length;i++){ h = (h*31 + str.charCodeAt(i)) % 360; }
  return h;
}
function avatarHTML(user, size){
  size = size||'';
  if(user.avatar){
    return `<div class="avatar ${size}"><img src="${user.avatar}"></div>`;
  }
  const hue = hashHue(user.username||user.fullname||'x');
  const initials = (user.fullname||'?').trim().split(/\s+/).slice(-2).map(w=>w[0]).join('').toUpperCase();
  return `<div class="avatar ${size}" style="background:hsl(${hue},62%,52%)">${initials}</div>`;
}

/* ---------------- Time formatting ---------------- */
function timeAgo(ts){
  const diff = Math.floor((now()-ts)/1000);
  if(diff<60) return 'Vừa xong';
  if(diff<3600) return Math.floor(diff/60)+' phút trước';
  if(diff<86400) return Math.floor(diff/3600)+' giờ trước';
  if(diff<86400*7) return Math.floor(diff/86400)+' ngày trước';
  return new Date(ts).toLocaleDateString('vi-VN');
}

/* =========================================================
   AUTH
   ========================================================= */
function switchAuthTab(tab){
  document.getElementById('tab-login').classList.toggle('active', tab==='login');
  document.getElementById('tab-register').classList.toggle('active', tab==='register');
  document.getElementById('login-form').classList.toggle('hidden', tab!=='login');
  document.getElementById('register-form').classList.toggle('hidden', tab!=='register');
  document.getElementById('auth-message').innerHTML='';
  clearFieldErrors();
}
function clearFieldErrors(){
  document.querySelectorAll('.field').forEach(f=>{
    f.classList.remove('has-error');
    const err = f.querySelector('.error-text'); if(err) err.remove();
  });
}
function setFieldError(fieldId, msg){
  const f = document.getElementById(fieldId);
  if(!f) return;
  f.classList.add('has-error');
  let err = f.querySelector('.error-text');
  if(!err){ err = document.createElement('span'); err.className='error-text'; f.appendChild(err); }
  err.textContent = msg;
}
function authMessage(msg, type){
  document.getElementById('auth-message').innerHTML = `<div class="auth-msg ${type}">${msg}</div>`;
}
const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function handleLogin(e){
  e.preventDefault();
  clearFieldErrors();
  document.getElementById('auth-message').innerHTML='';
  const idVal = document.getElementById('login-id').value.trim();
  const pw = document.getElementById('login-pw').value;
  let ok = true;
  if(!idVal){ setFieldError('f-login-id','Vui lòng nhập email hoặc tên đăng nhập.'); ok=false; }
  if(!pw){ setFieldError('f-login-pw','Vui lòng nhập mật khẩu.'); ok=false; }
  if(!ok) return false;

  const user = DB.users.find(u=> u.email.toLowerCase()===idVal.toLowerCase() || u.username.toLowerCase()===idVal.toLowerCase());
  if(!user){ authMessage('Tài khoản không tồn tại. Vui lòng kiểm tra lại.', 'err'); return false; }
  if(user.password !== pw){ authMessage('Sai mật khẩu. Vui lòng thử lại.', 'err'); return false; }

  session = { userId:user.id };
  localStorage.setItem(SESSION_KEY, JSON.stringify(session));
  toast('Đăng nhập thành công! Chào mừng trở lại 👋');
  enterApp();
  return false;
}

function handleRegister(e){
  e.preventDefault();
  clearFieldErrors();
  document.getElementById('auth-message').innerHTML='';
  const name = document.getElementById('reg-name').value.trim();
  const username = document.getElementById('reg-username').value.trim().toLowerCase();
  const email = document.getElementById('reg-email').value.trim();
  const pw = document.getElementById('reg-pw').value;
  const pw2 = document.getElementById('reg-pw2').value;
  let ok=true;
  if(!name){ setFieldError('f-reg-name','Vui lòng nhập họ tên.'); ok=false; }
  if(!username){ setFieldError('f-reg-username','Vui lòng nhập tên đăng nhập.'); ok=false; }
  else if(!/^[a-z0-9_]{3,20}$/.test(username)){ setFieldError('f-reg-username','Chỉ dùng chữ thường, số, gạch dưới (3-20 ký tự).'); ok=false; }
  if(!email){ setFieldError('f-reg-email','Vui lòng nhập email.'); ok=false; }
  else if(!EMAIL_RE.test(email)){ setFieldError('f-reg-email','Email không đúng định dạng.'); ok=false; }
  if(!pw){ setFieldError('f-reg-pw','Vui lòng nhập mật khẩu.'); ok=false; }
  else if(pw.length<6){ setFieldError('f-reg-pw','Mật khẩu phải có ít nhất 6 ký tự.'); ok=false; }
  if(pw2!==pw){ setFieldError('f-reg-pw2','Xác nhận mật khẩu không khớp.'); ok=false; }
  if(!ok) return false;

  if(DB.users.some(u=>u.email.toLowerCase()===email.toLowerCase())){
    setFieldError('f-reg-email','Email này đã được sử dụng.'); return false;
  }
  if(DB.users.some(u=>u.username.toLowerCase()===username)){
    setFieldError('f-reg-username','Tên đăng nhập đã tồn tại.'); return false;
  }

  const newUser = { id:uid('u'), username, email, fullname:name, password:pw, bio:'', avatar:null, createdAt: now() };
  DB.users.push(newUser);
  saveDB(DB);
  session = { userId:newUser.id };
  localStorage.setItem(SESSION_KEY, JSON.stringify(session));
  toast('Tạo tài khoản thành công! 🎉');
  enterApp();
  return false;
}

function handleLogout(){
  session = null;
  localStorage.removeItem(SESSION_KEY);
  document.getElementById('app-shell').classList.remove('active');
  document.getElementById('auth-screen').style.display='flex';
  document.getElementById('login-form').reset();
  document.getElementById('register-form').reset();
  switchAuthTab('login');
}

function enterApp(){
  document.getElementById('auth-screen').style.display='none';
  document.getElementById('app-shell').classList.add('active');
  currentView='feed';
  renderShellChrome();
  render();
}

/* =========================================================
   SHELL CHROME (mini profile, badges)
   ========================================================= */
function renderShellChrome(){
  const u = me(); if(!u) return;
  document.getElementById('mini-avatar').outerHTML = avatarHTML(u,'sm').replace('class="avatar sm"','id="mini-avatar" class="avatar sm"');
  document.getElementById('mini-name').textContent = u.fullname;
  document.getElementById('mini-handle').textContent = '@'+u.username;
  const pending = DB.friendRequests.filter(r=>r.toId===u.id && r.status==='pending').length;
  const badge = document.getElementById('badge-friends');
  if(pending>0){ badge.textContent = pending; badge.classList.remove('hidden'); } else badge.classList.add('hidden');
}

function goView(view, arg){
  currentView = view;
  if(view==='profile') viewingUserId = arg || me().id;
  document.querySelectorAll('.nav-item').forEach(n=>n.classList.toggle('active', n.dataset.view===view));
  if(view==='messages'){ activeChatUserId = arg || activeChatUserId; }
  render();
}

function render(){
  renderShellChrome();
  const root = document.getElementById('view-root');
  if(currentView==='feed') root.innerHTML = renderFeed();
  else if(currentView==='friends') root.innerHTML = renderFriends();
  else if(currentView==='messages') root.innerHTML = renderMessages();
  else if(currentView==='profile') root.innerHTML = renderProfile(viewingUserId||me().id);
  else if(currentView==='search') root.innerHTML = renderSearchResults(window.__lastQuery||'');
  attachDynamicHandlers();
}

/* =========================================================
   FEED / POSTS
   ========================================================= */
let pendingImageData = null;

function renderFeed(){
  const u = me();
  const posts = [...DB.posts].sort((a,b)=>b.createdAt-a.createdAt);
  return `
    <div class="view-title">Trang chủ</div>
    <div class="view-sub">Chia sẻ điều gì đó với cộng đồng sinh viên của bạn</div>
    <div class="board" style="margin-top:18px;">
      <div class="composer">
        <div class="composer-top">
          ${avatarHTML(u)}
          <textarea id="composer-text" placeholder="Bạn đang nghĩ gì, ${u.fullname.split(' ').pop()}?"></textarea>
        </div>
        <div id="composer-img-wrap"></div>
        <div class="composer-actions">
          <div class="left">
            <label class="btn btn-ghost btn-sm" style="margin:0;">🖼️ Ảnh<input type="file" accept="image/*" class="hidden" onchange="handleComposerImage(event)"></label>
          </div>
          <button class="btn btn-primary btn-sm" onclick="submitPost()">Đăng bài</button>
        </div>
      </div>
      <div id="posts-list">
        ${ posts.length ? posts.map(p=>renderPostCard(p)).join('') : emptyState('📭','Chưa có bài viết nào. Hãy là người đầu tiên chia sẻ!') }
      </div>
    </div>
  `;
}

function emptyState(icon, text){
  return `<div class="empty-state"><div class="big">${icon}</div><div>${text}</div></div>`;
}

function handleComposerImage(e){
  const file = e.target.files[0]; if(!file) return;
  const reader = new FileReader();
  reader.onload = ()=>{
    pendingImageData = reader.result;
    document.getElementById('composer-img-wrap').innerHTML = `
      <div class="img-preview"><img src="${pendingImageData}"><button class="rm" onclick="pendingImageData=null;document.getElementById('composer-img-wrap').innerHTML=''">✕</button></div>`;
  };
  reader.readAsDataURL(file);
}

function submitPost(){
  const text = document.getElementById('composer-text').value.trim();
  if(!text && !pendingImageData){ toast('Nội dung bài viết không được để trống.'); return; }
  const post = { id:uid('p'), userId:me().id, content:text, image:pendingImageData, createdAt:now(), likes:[], comments:[] };
  DB.posts.unshift(post);
  saveDB(DB);
  pendingImageData = null;
  toast('Đã đăng bài viết!');
  render();
}

function renderPostCard(p){
  const author = userById(p.userId);
  if(!author) return '';
  const u = me();
  const liked = p.likes.includes(u.id);
  const isMine = author.id===u.id;
  return `
  <div class="post-card" data-post="${p.id}">
    <div class="post-head">
      <a href="#" onclick="goView('profile','${author.id}');return false;">${avatarHTML(author)}</a>
      <div class="who">
        <div class="name"><a href="#" onclick="goView('profile','${author.id}');return false;" style="text-decoration:none;color:inherit;">${author.fullname}</a></div>
        <div class="time mono">@${author.username} · ${timeAgo(p.createdAt)}</div>
      </div>
      ${isMine ? `
      <div class="post-menu">
        <button class="post-menu-btn" onclick="togglePostMenu('${p.id}')">⋯</button>
        <div class="post-menu-list hidden" id="menu-${p.id}">
          <button onclick="openEditPost('${p.id}')">✏️ Chỉnh sửa</button>
          <button class="danger" onclick="deletePost('${p.id}')">🗑️ Xóa bài viết</button>
        </div>
      </div>` : ''}
    </div>
    ${p.content ? `<div class="post-body">${escapeHTML(p.content)}</div>` : ''}
    ${p.image ? `<img class="post-img" src="${p.image}">` : ''}
    <div class="post-stats">
      <span>👍 ${p.likes.length} lượt thích</span>
      <span>💬 ${p.comments.length} bình luận</span>
    </div>
    <div class="post-actions">
      <button class="post-action ${liked?'liked':''}" onclick="toggleLike('${p.id}')">${liked?'💛 Đã thích':'🤍 Thích'}</button>
      <button class="post-action" onclick="toggleComments('${p.id}')">💬 Bình luận</button>
    </div>
    <div class="comments hidden" id="comments-${p.id}">
      ${p.comments.map(c=>renderComment(c)).join('')}
      <div class="comment-input-row">
        ${avatarHTML(u,'sm')}
        <input type="text" id="comment-input-${p.id}" placeholder="Viết bình luận..." onkeydown="if(event.key==='Enter')submitComment('${p.id}')">
        <button onclick="submitComment('${p.id}')">Gửi</button>
      </div>
    </div>
  </div>`;
}

function renderComment(c){
  const u = userById(c.userId);
  if(!u) return '';
  return `<div class="comment">${avatarHTML(u,'sm')}
    <div class="comment-bubble">
      <div class="comment-name">${u.fullname}</div>
      <div class="comment-text">${escapeHTML(c.content)}</div>
      <div class="comment-time">${timeAgo(c.createdAt)}</div>
    </div>
  </div>`;
}

function escapeHTML(str){
  const d = document.createElement('div'); d.textContent = str; return d.innerHTML;
}

function togglePostMenu(id){
  document.querySelectorAll('.post-menu-list').forEach(m=>{ if(m.id!=='menu-'+id) m.classList.add('hidden'); });
  document.getElementById('menu-'+id).classList.toggle('hidden');
}
document.addEventListener('click', (e)=>{
  if(!e.target.closest('.post-menu')) document.querySelectorAll('.post-menu-list').forEach(m=>m.classList.add('hidden'));
});

function toggleLike(postId){
  const p = DB.posts.find(x=>x.id===postId); if(!p) return;
  const u = me();
  const idx = p.likes.indexOf(u.id);
  if(idx>-1) p.likes.splice(idx,1); else p.likes.push(u.id);
  saveDB(DB); render();
}

function toggleComments(postId){
  const el = document.getElementById('comments-'+postId);
  el.classList.toggle('hidden');
}

function submitComment(postId){
  const input = document.getElementById('comment-input-'+postId);
  const text = input.value.trim();
  if(!text) return;
  const p = DB.posts.find(x=>x.id===postId);
  p.comments.push({ id:uid('c'), userId:me().id, content:text, createdAt:now() });
  saveDB(DB);
  render();
  const el = document.getElementById('comments-'+postId);
  if(el) el.classList.remove('hidden');
}

function deletePost(postId){
  if(!confirm('Bạn có chắc muốn xóa bài viết này?')) return;
  DB.posts = DB.posts.filter(p=>p.id!==postId);
  saveDB(DB);
  toast('Đã xóa bài viết.');
  render();
}

function openEditPost(postId){
  const p = DB.posts.find(x=>x.id===postId);
  openModal(`
    <button class="modal-close" onclick="closeModal()">✕</button>
    <h3>Chỉnh sửa bài viết</h3>
    <div class="field">
      <textarea id="edit-post-text" rows="4">${escapeHTML(p.content)}</textarea>
    </div>
    <button class="btn btn-primary" style="width:100%;" onclick="saveEditPost('${p.id}')">Lưu thay đổi</button>
  `);
}
function saveEditPost(postId){
  const text = document.getElementById('edit-post-text').value.trim();
  if(!text){ toast('Nội dung bài viết không được để trống.'); return; }
  const p = DB.posts.find(x=>x.id===postId);
  p.content = text;
  saveDB(DB);
  closeModal();
  toast('Đã cập nhật bài viết.');
  render();
}

/* =========================================================
   FRIENDS
   ========================================================= */
function friendIdsOf(userId){
  const ids = new Set();
  DB.friendRequests.forEach(r=>{
    if(r.status==='accepted'){
      if(r.fromId===userId) ids.add(r.toId);
      if(r.toId===userId) ids.add(r.fromId);
    }
  });
  return ids;
}
function friendStatusBetween(a,b){
  if(a===b) return 'self';
  const req = DB.friendRequests.find(r=> (r.fromId===a&&r.toId===b)||(r.fromId===b&&r.toId===a));
  if(!req) return 'none';
  if(req.status==='accepted') return 'friends';
  if(req.status==='pending') return req.fromId===a ? 'pending_out' : 'pending_in';
  return 'none';
}

function renderFriends(){
  const u = me();
  const myFriends = [...friendIdsOf(u.id)].map(userById).filter(Boolean);
  const incoming = DB.friendRequests.filter(r=>r.toId===u.id && r.status==='pending');
  const suggestions = DB.users.filter(x=> x.id!==u.id && friendStatusBetween(u.id,x.id)==='none');

  return `
    <div class="view-title">Bạn bè</div>
    <div class="view-sub">Kết nối và quản lý danh sách bạn bè của bạn</div>

    ${incoming.length ? `
    <h4 style="margin:22px 0 10px;">Lời mời kết bạn (${incoming.length})</h4>
    ${incoming.map(r=>{
      const from = userById(r.fromId);
      return `<div class="list-row">
        ${avatarHTML(from)}
        <div class="info"><div class="name">${from.fullname}</div><div class="sub">@${from.username}</div></div>
        <div class="actions">
          <button class="btn btn-primary btn-sm" onclick="respondRequest('${r.id}','accepted')">Chấp nhận</button>
          <button class="btn btn-danger btn-sm" onclick="respondRequest('${r.id}','declined')">Từ chối</button>
        </div>
      </div>`;
    }).join('')}` : ''}

    <h4 style="margin:22px 0 10px;">Bạn bè của bạn (${myFriends.length})</h4>
    ${myFriends.length ? `<div class="card-grid">${myFriends.map(f=>renderPersonCard(f)).join('')}</div>` : emptyState('🧑‍🤝‍🧑','Bạn chưa có người bạn nào. Hãy kết bạn ở phần gợi ý bên dưới!')}

    <h4 style="margin:26px 0 10px;">Gợi ý kết bạn</h4>
    ${suggestions.length ? `<div class="card-grid">${suggestions.map(f=>renderPersonCard(f)).join('')}</div>` : emptyState('✨','Không còn gợi ý nào lúc này.')}
  `;
}

function renderPersonCard(u){
  const status = friendStatusBetween(me().id, u.id);
  let actionHTML = '';
  if(status==='friends'){
    actionHTML = `<button class="btn btn-ghost btn-sm" onclick="goView('messages','${u.id}')">💬 Nhắn tin</button><button class="btn btn-danger btn-sm" onclick="removeFriend('${u.id}')">Hủy kết bạn</button>`;
  } else if(status==='pending_out'){
    actionHTML = `<button class="btn btn-ghost btn-sm" disabled>Đã gửi lời mời</button>`;
  } else if(status==='pending_in'){
    const r = DB.friendRequests.find(x=>x.fromId===u.id && x.toId===me().id && x.status==='pending');
    actionHTML = `<button class="btn btn-primary btn-sm" onclick="respondRequest('${r.id}','accepted')">Chấp nhận</button>`;
  } else {
    actionHTML = `<button class="btn btn-primary btn-sm" onclick="sendFriendRequest('${u.id}')">➕ Kết bạn</button>`;
  }
  return `<div class="person-card">
    <a href="#" onclick="goView('profile','${u.id}');return false;">${avatarHTML(u,'lg')}</a>
    <a href="#" onclick="goView('profile','${u.id}');return false;" style="text-decoration:none;color:inherit;">
      <div class="name">${u.fullname}</div>
    </a>
    <div class="handle mono">@${u.username}</div>
    <div class="bio">${escapeHTML(u.bio||'')}</div>
    <div class="row-btns">${actionHTML}</div>
  </div>`;
}

function sendFriendRequest(toId){
  DB.friendRequests.push({ id:uid('fr'), fromId:me().id, toId, status:'pending', createdAt:now() });
  saveDB(DB);
  toast('Đã gửi lời mời kết bạn.');
  render();
}
function respondRequest(reqId, status){
  const r = DB.friendRequests.find(x=>x.id===reqId);
  r.status = status;
  saveDB(DB);
  toast(status==='accepted' ? 'Đã chấp nhận lời mời kết bạn!' : 'Đã từ chối lời mời.');
  render();
}
function removeFriend(otherId){
  if(!confirm('Hủy kết bạn với người này?')) return;
  DB.friendRequests = DB.friendRequests.filter(r=> !((r.fromId===me().id&&r.toId===otherId)||(r.fromId===otherId&&r.toId===me().id)) || r.status!=='accepted');
  saveDB(DB);
  toast('Đã hủy kết bạn.');
  render();
}

/* =========================================================
   MESSAGES
   ========================================================= */
function conversationsFor(userId){
  const partnerIds = new Set();
  DB.messages.forEach(m=>{
    if(m.fromId===userId) partnerIds.add(m.toId);
    if(m.toId===userId) partnerIds.add(m.fromId);
  });
  return [...partnerIds].map(pid=>{
    const msgs = DB.messages.filter(m=>(m.fromId===userId&&m.toId===pid)||(m.fromId===pid&&m.toId===userId)).sort((a,b)=>a.createdAt-b.createdAt);
    return { user: userById(pid), last: msgs[msgs.length-1] };
  }).filter(c=>c.user).sort((a,b)=>b.last.createdAt-a.last.createdAt);
}

function renderMessages(){
  const u = me();
  const friends = [...friendIdsOf(u.id)].map(userById).filter(Boolean);
  const convos = conversationsFor(u.id);
  const convoIds = new Set(convos.map(c=>c.user.id));
  const friendsWithoutConvo = friends.filter(f=>!convoIds.has(f.id));

  if(!activeChatUserId && convos.length) activeChatUserId = convos[0].user.id;
  if(!activeChatUserId && friends.length) activeChatUserId = friends[0].id;

  const listHTML = `
    ${convos.map(c=>chatListItem(c.user, c.last)).join('')}
    ${friendsWithoutConvo.map(f=>chatListItem(f, null)).join('')}
  `;

  return `
    <div class="view-title">Tin nhắn</div>
    <div class="view-sub">Trò chuyện trực tiếp với bạn bè của bạn</div>
    <div class="chat-shell" style="margin-top:18px;">
      <div class="chat-list">
        ${ (convos.length+friendsWithoutConvo.length) ? listHTML : `<div style="padding:20px;">${emptyState('💬','Kết bạn để bắt đầu trò chuyện!')}</div>` }
      </div>
      <div class="chat-main">
        ${ activeChatUserId ? renderChatMain(activeChatUserId) : `<div style="margin:auto;">${emptyState('👈','Chọn một cuộc trò chuyện')}</div>` }
      </div>
    </div>
  `;
}

function chatListItem(user, last){
  const active = user.id===activeChatUserId;
  return `<div class="chat-list-item ${active?'active':''}" onclick="openChat('${user.id}')">
    ${avatarHTML(user)}
    <div class="info">
      <div class="name">${user.fullname}</div>
      <div class="preview">${last ? escapeHTML(last.content) : 'Bắt đầu trò chuyện'}</div>
    </div>
  </div>`;
}

function openChat(userId){ activeChatUserId = userId; render(); }

function renderChatMain(partnerId){
  const partner = userById(partnerId);
  const u = me();
  const isFriend = friendIdsOf(u.id).has(partnerId);
  const msgs = DB.messages.filter(m=>(m.fromId===u.id&&m.toId===partnerId)||(m.fromId===partnerId&&m.toId===u.id)).sort((a,b)=>a.createdAt-b.createdAt);
  return `
    <div class="chat-header">${avatarHTML(partner)}<div><div style="font-weight:700;font-size:14.5px;">${partner.fullname}</div><div class="mono" style="font-size:11.5px;color:var(--muted);">@${partner.username}</div></div></div>
    <div class="chat-body" id="chat-body">
      ${ msgs.length ? msgs.map(m=>`
        <div class="msg-row ${m.fromId===u.id?'mine':''}">
          <div>
            <div class="msg-bubble">${escapeHTML(m.content)}</div>
            <div class="msg-time">${timeAgo(m.createdAt)}</div>
          </div>
        </div>`).join('') : emptyState('👋','Gửi lời chào đầu tiên nào!') }
    </div>
    ${ isFriend ? `
    <div class="chat-input">
      <input type="text" id="chat-input-box" placeholder="Nhập tin nhắn..." onkeydown="if(event.key==='Enter')sendMessage('${partnerId}')">
      <button class="btn btn-primary" onclick="sendMessage('${partnerId}')">Gửi</button>
    </div>` : `<div style="padding:14px;text-align:center;color:var(--muted);font-size:13px;">Chỉ có thể nhắn tin với bạn bè.</div>` }
  `;
}

function sendMessage(partnerId){
  const input = document.getElementById('chat-input-box');
  const text = input.value.trim();
  if(!text) return;
  DB.messages.push({ id:uid('m'), fromId:me().id, toId:partnerId, content:text, createdAt:now() });
  saveDB(DB);
  render();
  const body = document.getElementById('chat-body');
  if(body) body.scrollTop = body.scrollHeight;
}

/* =========================================================
   PROFILE
   ========================================================= */
function renderProfile(userId){
  const u = userById(userId);
  const meU = me();
  const isMine = u.id===meU.id;
  const myPosts = DB.posts.filter(p=>p.userId===u.id).sort((a,b)=>b.createdAt-a.createdAt);
  const friendCount = friendIdsOf(u.id).size;
  const status = friendStatusBetween(meU.id, u.id);

  let actionBtn = '';
  if(!isMine){
    if(status==='friends') actionBtn = `<button class="btn btn-ghost btn-sm" onclick="goView('messages','${u.id}')">💬 Nhắn tin</button><button class="btn btn-danger btn-sm" onclick="removeFriend('${u.id}')">Hủy kết bạn</button>`;
    else if(status==='pending_out') actionBtn = `<button class="btn btn-ghost btn-sm" disabled>Đã gửi lời mời</button>`;
    else if(status==='pending_in'){
      const r = DB.friendRequests.find(x=>x.fromId===u.id&&x.toId===meU.id&&x.status==='pending');
      actionBtn = `<button class="btn btn-primary btn-sm" onclick="respondRequest('${r.id}','accepted')">Chấp nhận lời mời</button>`;
    } else actionBtn = `<button class="btn btn-primary btn-sm" onclick="sendFriendRequest('${u.id}')">➕ Kết bạn</button>`;
  } else {
    actionBtn = `<button class="btn btn-ghost btn-sm" onclick="openEditProfile()">✏️ Chỉnh sửa hồ sơ</button><button class="btn btn-ghost btn-sm" onclick="openChangePassword()">🔒 Đổi mật khẩu</button>`;
  }

  return `
    <div class="profile-card">
      <div class="profile-cover"></div>
      <div class="profile-info">
        ${avatarHTML(u,'lg')}
        <div class="profile-meta">
          <div class="profile-name">${u.fullname}</div>
          <div class="profile-handle mono">@${u.username}</div>
        </div>
        <div style="margin-left:auto;display:flex;gap:8px;">${actionBtn}</div>
      </div>
      <div class="profile-bio">${escapeHTML(u.bio || 'Chưa có mô tả bản thân.')}</div>
      <div style="display:flex;gap:26px;padding:0 26px 18px;">
        <div class="stat-chip"><b>${myPosts.length}</b><span>Bài viết</span></div>
        <div class="stat-chip"><b>${friendCount}</b><span>Bạn bè</span></div>
      </div>
    </div>
    <h4 style="margin-bottom:12px;">Bài viết</h4>
    ${ myPosts.length ? myPosts.map(p=>renderPostCard(p)).join('') : emptyState('📝','Chưa có bài viết nào.') }
  `;
}

function openEditProfile(){
  const u = me();
  openModal(`
    <button class="modal-close" onclick="closeModal()">✕</button>
    <h3>Chỉnh sửa hồ sơ</h3>
    <div class="field"><label>Họ và tên</label><input id="edit-fullname" value="${escapeHTML(u.fullname)}"></div>
    <div class="field"><label>Giới thiệu bản thân</label><textarea id="edit-bio" rows="3">${escapeHTML(u.bio||'')}</textarea></div>
    <div class="field">
      <label>Ảnh đại diện</label>
      <input type="file" accept="image/*" id="edit-avatar-file">
    </div>
    <button class="btn btn-primary" style="width:100%;" onclick="saveProfile()">Lưu thay đổi</button>
  `);
}
function saveProfile(){
  const u = me();
  const name = document.getElementById('edit-fullname').value.trim();
  const bio = document.getElementById('edit-bio').value.trim();
  const fileInput = document.getElementById('edit-avatar-file');
  if(!name){ toast('Họ tên không được để trống.'); return; }
  u.fullname = name; u.bio = bio;
  const file = fileInput.files[0];
  if(file){
    const reader = new FileReader();
    reader.onload = ()=>{ u.avatar = reader.result; saveDB(DB); closeModal(); toast('Đã cập nhật hồ sơ.'); render(); };
    reader.readAsDataURL(file);
  } else {
    saveDB(DB); closeModal(); toast('Đã cập nhật hồ sơ.'); render();
  }
}
function openChangePassword(){
  openModal(`
    <button class="modal-close" onclick="closeModal()">✕</button>
    <h3>Đổi mật khẩu</h3>
    <div class="field" id="f-old-pw"><label>Mật khẩu hiện tại</label><input type="password" id="old-pw"></div>
    <div class="field" id="f-new-pw"><label>Mật khẩu mới</label><input type="password" id="new-pw"></div>
    <div class="field" id="f-new-pw2"><label>Xác nhận mật khẩu mới</label><input type="password" id="new-pw2"></div>
    <button class="btn btn-primary" style="width:100%;" onclick="savePasswordChange()">Cập nhật mật khẩu</button>
  `);
}
function savePasswordChange(){
  clearFieldErrors();
  const u = me();
  const oldPw = document.getElementById('old-pw').value;
  const newPw = document.getElementById('new-pw').value;
  const newPw2 = document.getElementById('new-pw2').value;
  let ok=true;
  if(oldPw !== u.password){ setFieldError('f-old-pw','Mật khẩu hiện tại không đúng.'); ok=false; }
  if(newPw.length<6){ setFieldError('f-new-pw','Mật khẩu mới phải có ít nhất 6 ký tự.'); ok=false; }
  if(newPw!==newPw2){ setFieldError('f-new-pw2','Xác nhận mật khẩu không khớp.'); ok=false; }
  if(!ok) return;
  u.password = newPw;
  saveDB(DB);
  closeModal();
  toast('Đã đổi mật khẩu thành công.');
}

/* =========================================================
   SEARCH
   ========================================================= */
function runSearch(){
  const q = document.getElementById('global-search').value.trim();
  window.__lastQuery = q;
  currentView = 'search';
  document.querySelectorAll('.nav-item').forEach(n=>n.classList.remove('active'));
  render();
}
function renderSearchResults(q){
  if(!q){
    return `<div class="view-title">Tìm kiếm</div><div class="view-sub">Nhập từ khóa để tìm người dùng hoặc bài viết</div>`;
  }
  const ql = q.toLowerCase();
  const users = DB.users.filter(u=> u.id!==me().id && (u.fullname.toLowerCase().includes(ql) || u.username.toLowerCase().includes(ql)));
  const posts = DB.posts.filter(p=> p.content && p.content.toLowerCase().includes(ql));

  return `
    <div class="view-title">Kết quả tìm kiếm cho "${escapeHTML(q)}"</div>
    <div class="view-sub">${users.length + posts.length} kết quả</div>

    <h4 style="margin:20px 0 10px;">Người dùng (${users.length})</h4>
    ${users.length ? `<div class="card-grid">${users.map(u=>renderPersonCard(u)).join('')}</div>` : emptyState('🙈','Không tìm thấy người dùng phù hợp.')}

    <h4 style="margin:24px 0 10px;">Bài viết (${posts.length})</h4>
    ${posts.length ? posts.map(p=>renderPostCard(p)).join('') : emptyState('🙈','Không tìm thấy bài viết phù hợp.')}
  `;
}

/* =========================================================
   MODAL helpers
   ========================================================= */
function openModal(html){
  document.getElementById('modal-content').innerHTML = html;
  document.getElementById('modal-backdrop').classList.add('active');
}
function closeModal(){
  document.getElementById('modal-backdrop').classList.remove('active');
}
document.getElementById('modal-backdrop').addEventListener('click', (e)=>{
  if(e.target.id==='modal-backdrop') closeModal();
});

function attachDynamicHandlers(){ /* reserved for future delegated listeners */ }

/* =========================================================
   BOOT
   ========================================================= */
(function boot(){
  if(session && me()){
    enterApp();
  } else {
    session = null;
    document.getElementById('auth-screen').style.display='flex';
  }
})();
</script>
</body>
</html>