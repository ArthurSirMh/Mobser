<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'سایت' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reset only for this component */
        .classes-page-wrapper {
            all: initial;
            display: block;
            font-family: 'Vazirmatn', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            direction: rtl;
            width: 100%;
            min-height: 500px;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            padding: 2rem;
            box-sizing: border-box;
        }
        .classes-page-wrapper * {
            box-sizing: border-box;
        }
        .classes-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .classes-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .classes-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0 0 0.5rem 0;
            margin-top: 20px;
            padding: 0;
            line-height: 1.2;
        }
        .classes-subtitle {
            font-size: 1rem;
            color: #94a3b8;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        .classes-stats {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        .classes-stats-title {
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0 0 1rem 0;
            padding: 0;
            text-align: center;
            line-height: 1.5;
        }
        .classes-stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
        }
        .classes-stat-item {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 0.75rem;
            padding: 1.25rem;
            text-align: center;
        }
        .classes-stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #3b82f6;
            margin: 0 0 0.25rem 0;
            padding: 0;
            line-height: 1;
        }
        .classes-stat-label {
            font-size: 0.875rem;
            color: #94a3b8;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        .classes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.25rem;
        }
        .class-card {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 1rem;
            padding: 1.25rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .class-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.25);
        }
        .class-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(59, 130, 246, 0.2);
        }
        .class-card-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
            padding: 0;
            line-height: 1.3;
        }
        .class-card-badge {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            padding: 0.25rem 0.625rem;
            border-radius: 0.375rem;
            font-size: 0.75rem;
            font-weight: 600;
            line-height: 1;
        }
        .class-card-info {
            display: flex;
            flex-direction: column;
            gap: 0.625rem;
        }
        .class-info-row {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            color: #94a3b8;
            font-size: 0.9375rem;
            line-height: 1.5;
        }
        .class-info-icon {
            font-size: 1.125rem;
            line-height: 1;
            flex-shrink: 0;
        }
        .class-info-text {
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
    </style>
    <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
    <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
    <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
    @stack('head')
</head>
    @yield('content')
    @stack('scripts')
</html>

