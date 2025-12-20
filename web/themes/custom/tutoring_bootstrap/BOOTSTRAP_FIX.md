# Bootstrap 5 子主題修復說明

## 問題描述

套用 `tutoring_bootstrap` 子主題後，HTML 結構沒有使用 Bootstrap 的類別名稱。

## 根本原因

子主題的 `tutoring_bootstrap.info.yml` 配置不完整，缺少以下關鍵設定：

1. **未繼承 Bootstrap 5 的核心 libraries**
   - 缺少 `bootstrap5/base`（Bootstrap CSS 組件）
   - 缺少 `bootstrap5/bootstrap5-js-latest`（Bootstrap JavaScript）
   - 缺少 `bootstrap5/global-styling`（全域樣式和 Bootstrap Icons）

2. **未繼承 Bootstrap 5 的 libraries-extend**
   - 這些擴展確保 Drupal 核心組件使用 Bootstrap 樣式

3. **區域（regions）定義不完整**
   - 使用了自定義區域名稱，而非 Bootstrap 5 的標準區域

4. **缺少 Bootstrap 5 的配置檔案**
   - 沒有 schema 定義
   - 沒有預設設定

## 已修復的內容

### 1. 更新 `tutoring_bootstrap.info.yml`

**修復前：**
```yaml
libraries:
  - tutoring_bootstrap/custom-styling
```

**修復後：**
```yaml
# 繼承 Bootstrap 5 的核心 libraries
libraries:
  - bootstrap5/base                    # Bootstrap CSS 組件
  - bootstrap5/messages                # 訊息樣式
  - core/normalize                     # CSS 正規化
  - bootstrap5/bootstrap5-js-latest    # Bootstrap JavaScript
  - bootstrap5/global-styling          # 全域樣式 + Bootstrap Icons
  - tutoring_bootstrap/custom-styling  # 自定義樣式（保留）

# 繼承 Bootstrap 5 的 libraries-extend
libraries-extend:
  user/drupal.user:
    - bootstrap5/user
  core/drupal.dropbutton:
    - bootstrap5/dropbutton
  core/drupal.dialog:
    - bootstrap5/dialog
  file/drupal.file:
    - bootstrap5/file
  core/drupal.progress:
    - bootstrap5/progress
```

### 2. 更新區域定義

**修復前：**
```yaml
regions:
  header: Header
  primary_menu: 'Primary menu'
  secondary_menu: 'Secondary menu'
  # ... 其他自定義區域
```

**修復後（使用 Bootstrap 5 標準區域）：**
```yaml
regions:
  header: Header
  nav_branding: 'Navigation branding region'
  nav_main: 'Main navigation region'
  nav_additional: 'Additional navigation region'
  breadcrumb: Breadcrumbs
  content: 'Main content'
  sidebar_first: 'Sidebar first'
  sidebar_second: 'Sidebar second'
  footer: Footer
```

### 3. 新增配置檔案

**新增 `config/schema/tutoring_bootstrap.schema.yml`：**
```yaml
tutoring_bootstrap.settings:
  type: theme_settings
  label: 'Tutoring Bootstrap theme settings'
  mapping:
    b5_body_schema:
      type: string
      label: 'Body theme'
    b5_body_bg_schema:
      type: string
      label: 'Body background'
    b5_navbar_schema:
      type: string
      label: 'Navbar theme'
    b5_navbar_bg_schema:
      type: string
      label: 'Navbar background'
    b5_footer_schema:
      type: string
      label: 'Footer theme'
    b5_footer_bg_schema:
      type: string
      label: 'Footer background'
    b5_top_container:
      type: string
      label: 'Website container type'
    b5_top_container_config:
      type: string
      label: 'Website container type configuration'
```

**新增 `config/install/tutoring_bootstrap.settings.yml`：**
```yaml
# 預設使用淺色導覽列和深色頁尾
b5_body_schema: ''
b5_body_bg_schema: ''

b5_navbar_schema: 'light'
b5_navbar_bg_schema: 'light'

b5_footer_schema: 'dark'
b5_footer_bg_schema: 'dark'

b5_top_container: 'container'
b5_top_container_config: ''
```

## 驗證修復

### 1. 檢查主題狀態

```bash
# 確認主題已啟用
ddev drush pm:list --type=theme --status=enabled

# 確認為預設主題
ddev drush config:get system.theme default
```

### 2. 檢查 Libraries 載入

```bash
# 列出 Bootstrap 5 的所有 libraries
ddev drush eval "print_r(array_keys(\Drupal::service('library.discovery')->getLibrariesByExtension('bootstrap5')));"
```

應該看到：
- base
- bootstrap5-js-latest
- global-styling
- messages
- 等等...

### 3. 檢查前端頁面

訪問網站並查看 HTML 原始碼，應該能看到：

**CSS 載入：**
```html
<link rel="stylesheet" href="/themes/contrib/bootstrap5/css/style.css">
<link rel="stylesheet" href="/themes/contrib/bootstrap5/dist/icons/1.11.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="/themes/custom/tutoring_bootstrap/css/style.css">
```

**JavaScript 載入：**
```html
<script src="/themes/contrib/bootstrap5/dist/bootstrap/5.3.8/dist/js/bootstrap.bundle.js"></script>
```

**Bootstrap 類別應用：**
```html
<div class="container">
  <div class="row">
    <div class="col-12">
      <!-- 內容使用 Bootstrap 類別 -->
    </div>
  </div>
</div>
```

### 4. 測試 Bootstrap 組件

創建一個測試區塊或節點，加入以下 HTML：

```html
<div class="alert alert-success" role="alert">
  這是一個 Bootstrap 成功訊息！
</div>

<button type="button" class="btn btn-primary">
  Bootstrap 按鈕
</button>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">卡片標題</h5>
    <p class="card-text">這是 Bootstrap 卡片組件。</p>
  </div>
</div>
```

如果 Bootstrap 正確載入，這些組件應該有正確的樣式。

## Bootstrap 5 主題設定

修復後，您可以透過主題設定頁面調整 Bootstrap 樣式：

1. 前往 `/admin/appearance/settings/tutoring_bootstrap`
2. 可以設定的選項：
   - **Body schema**: 頁面主體的顏色方案
   - **Navbar schema**: 導覽列的顏色方案（dark/light）
   - **Footer schema**: 頁尾的顏色方案
   - **Container type**: 容器類型（container/container-fluid）

## 常見 Bootstrap 類別參考

### 網格系統
```html
<div class="container">
  <div class="row">
    <div class="col-md-6">左側欄位</div>
    <div class="col-md-6">右側欄位</div>
  </div>
</div>
```

### 按鈕
```html
<button class="btn btn-primary">主要按鈕</button>
<button class="btn btn-secondary">次要按鈕</button>
<button class="btn btn-success">成功按鈕</button>
<button class="btn btn-danger">危險按鈕</button>
```

### 卡片
```html
<div class="card">
  <div class="card-header">卡片標題</div>
  <div class="card-body">
    <p class="card-text">卡片內容</p>
  </div>
  <div class="card-footer">卡片頁尾</div>
</div>
```

### 表單
```html
<form>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email">
  </div>
  <button type="submit" class="btn btn-primary">提交</button>
</form>
```

### 導覽列
```html
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">品牌</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
```

### 提示訊息
```html
<div class="alert alert-primary" role="alert">
  這是一個主要提示訊息
</div>
<div class="alert alert-success" role="alert">
  這是一個成功提示訊息
</div>
<div class="alert alert-warning" role="alert">
  這是一個警告提示訊息
</div>
<div class="alert alert-danger" role="alert">
  這是一個危險提示訊息
</div>
```

## 自定義樣式

如果需要覆寫 Bootstrap 樣式，請在 `css/style.css` 中添加：

```css
/* 自定義主色調 */
:root {
  --bs-primary: #your-color;
  --bs-secondary: #your-color;
}

/* 自定義導覽列 */
.navbar {
  /* 你的樣式 */
}

/* 自定義按鈕 */
.btn-primary {
  /* 你的樣式 */
}
```

## Bootstrap Icons

Bootstrap Icons 已自動載入，可以直接使用：

```html
<i class="bi bi-house"></i>
<i class="bi bi-person"></i>
<i class="bi bi-search"></i>
<i class="bi bi-cart"></i>
```

完整圖標列表：https://icons.getbootstrap.com/

## 疑難排解

### 問題：樣式仍然沒有顯示

**解決方案：**
```bash
# 清除所有快取
ddev drush cr

# 檢查瀏覽器快取
# 按 Ctrl+Shift+R (或 Cmd+Shift+R) 強制重新載入
```

### 問題：某些區域沒有顯示

**解決方案：**
```bash
# 前往區塊管理頁面
# /admin/structure/block

# 確認區塊已分配到正確的區域
# 新的區域名稱：
# - nav_branding
# - nav_main
# - nav_additional
```

### 問題：想使用舊的區域名稱

**解決方案：**

如果您已經在舊的區域（如 `primary_menu`, `secondary_menu`）中放置了區塊，有兩個選擇：

**選項 1：移動區塊到新區域**
1. 前往 `/admin/structure/block`
2. 將區塊從舊區域移到新區域

**選項 2：保留舊區域（不推薦）**

在 `tutoring_bootstrap.info.yml` 中混合使用新舊區域：
```yaml
regions:
  header: Header
  nav_branding: 'Navigation branding region'
  nav_main: 'Main navigation region'
  nav_additional: 'Additional navigation region'
  primary_menu: 'Primary menu'      # 保留舊區域
  secondary_menu: 'Secondary menu'  # 保留舊區域
  breadcrumb: Breadcrumbs
  content: 'Main content'
  sidebar_first: 'Sidebar first'
  sidebar_second: 'Sidebar second'
  footer: Footer
```

然後重新安裝主題。

## 進階：自定義樣板

如果需要自定義 HTML 結構，可以在子主題中覆寫樣板：

```bash
# 複製 Bootstrap 5 的樣板到子主題
mkdir -p web/themes/custom/tutoring_bootstrap/templates

# 例如：覆寫頁面樣板
cp web/themes/contrib/bootstrap5/templates/layout/page.html.twig \
   web/themes/custom/tutoring_bootstrap/templates/

# 編輯樣板並清除快取
ddev drush cr
```

## 參考資源

- **Bootstrap 5 官方文件**: https://getbootstrap.com/docs/5.3/
- **Bootstrap 5 Drupal 主題**: https://www.drupal.org/project/bootstrap5
- **Bootstrap Icons**: https://icons.getbootstrap.com/
- **Drupal Theming Guide**: https://www.drupal.org/docs/theming-drupal

## 總結

修復完成後，您的 `tutoring_bootstrap` 子主題現在：

✅ 正確繼承 Bootstrap 5 的所有 CSS 和 JavaScript
✅ 使用 Bootstrap 5 的標準區域定義
✅ 包含完整的配置檔案
✅ 支援 Bootstrap 5 主題設定
✅ 可以使用所有 Bootstrap 組件和工具類別
✅ 載入 Bootstrap Icons 字體圖標
✅ 保留自定義樣式的能力

現在您可以盡情使用 Bootstrap 5 的所有功能來美化您的補習班網站！
