# 全科補習班 Mahi 主題

這是一個基於 Mahi Pro 主題的自訂子主題。

## 目錄結構

```
tutoring_mahi/
├── css/                    # 自訂 CSS 樣式
│   └── style.css
├── js/                     # 自訂 JavaScript
│   └── custom.js
├── templates/              # 自訂 Twig 模板
├── images/                 # 主題圖片資源
├── tutoring_mahi.info.yml  # 主題資訊檔
├── tutoring_mahi.libraries.yml  # 資源庫定義
└── tutoring_mahi.theme     # 主題函數

```

## 啟用主題

```bash
# 清除快取
ddev drush cr

# 啟用主題
ddev drush theme:enable tutoring_mahi

# 設定為預設主題
ddev drush config:set system.theme default tutoring_mahi
```

## 自訂說明

### CSS 樣式
- 編輯 `css/style.css` 來添加或覆蓋樣式
- 修改後執行 `ddev drush cr` 清除快取

### JavaScript
- 編輯 `js/custom.js` 來添加自訂 JavaScript 功能
- 使用 Drupal.behaviors 模式確保代碼正確執行

### Twig 模板
- 從父主題 mahipro 或 Drupal 核心複製模板到 `templates/` 目錄
- 修改模板檔案來自訂 HTML 輸出
- 模板變更後需執行 `ddev drush cr`

### 主題函數
- 在 `tutoring_mahi.theme` 中添加 hook 函數
- 實作 preprocess 函數來修改模板變數
- 添加主題建議（theme suggestions）來使用不同模板

## 開發提示

1. 每次修改主題檔案後，記得清除快取：
   ```bash
   ddev drush cr
   ```

2. 查看可用的模板建議：
   ```bash
   # 在 Drupal 管理介面啟用 Twig 除錯模式
   # 編輯 sites/default/services.yml
   ```

3. 覆蓋父主題的樣式時，使用更具體的選擇器或 `!important`（謹慎使用）

## 參考資源

- [Drupal 主題開發文件](https://www.drupal.org/docs/theming-drupal)
- [Mahi Pro 主題文件](https://drupar.com/doc/mahipro)
