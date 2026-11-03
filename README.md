# Tavaan Engine — Session

> **نشست** — موتور Session در فریمورک تَوان

## مشخصات

| فیلد | مقدار |
|---|---|
| شناسه | `tavaan.engine.session` |
| نام | `Session` |
| عنوان فارسی | نشست |
| نسخه | `0.1.0` |
| namespace | `Tavaan\Engine\Session` |
| نوع | `engine` |
| Facade | `Session` (accessor: `session`) |

## توضیحات

همهٔ درایورها فعال: file/cookie/array/database (M3) + redis (M4 — روی موتور cache با fallback به file).

## کلاس‌های اصلی

- `src/Handlers/ArrayHandler.php`
- `src/Handlers/CacheHandler.php`
- `src/Handlers/CookieHandler.php`
- `src/Handlers/DatabaseHandler.php`
- `src/Handlers/FileHandler.php`
- `src/Middleware/CsrfVerifyMiddleware.php`
- `src/Middleware/ShareErrorsFromSessionMiddleware.php`
- `src/Middleware/StartSessionMiddleware.php`
- `src/SessionHandlerInterface.php`
- `src/SessionManager.php`
- `src/session.php`

## Service Providerها

- `Tavaan\Engine\Session\SessionServiceProvider`

## وابستگی‌ها

**موتورهای مورد‌نیاز:**

- `http`
- `crypt`
- `config`

**موتورهای اختیاری:**

- `database`
- `cache`

## جداول دیتابیس

- `sessions`

## دستورات CLI

- `session:clear`

## پیکربندی

- فایل پیکربندی: `config/session.php`
- کلید: `session`

## نصب

```bash
git clone https://github.com/andrbi106/Tavaan-Engine-Session.git
```

این موتور بخشی از فریمورک تَوان است و معمولاً به‌صورت مستقیم نصب نمی‌شود،
بلکه توسط [Tavaan-Core](https://github.com/andrbi106/Tavaan-Core) مدیریت می‌شود.

## روابط با سایر مخازن

| مخزن | نقش |
|---|---|
| **`andrbi106/Tavaan-Engine-Session`** (این مخزن) | موتور Session |
| `andrbi106/Tavaan-Engine-Core` | ساختار پایه + درگاه ارتباط موتورها |
| `andrbi106/Tavaan-Core` | اسکلت اپلیکیشن + همهٔ موتورها |
| `Derogaramin/Tavaan-Framework` | فریمورک مادر (monorepo) |

## مجوز

MIT — هم‌راستا با فریمورک مادر تَوان.
