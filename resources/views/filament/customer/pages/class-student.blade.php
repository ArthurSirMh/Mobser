@extends('layouts.master')
@section('content')
    <div class="classes-page">
        <div class="classes-container"><!-- Header -->
            <div class="classes-header">
                <h1 class="classes-title">لیست کلاس‌های درسی</h1>
                <p class="classes-subtitle">مشاهده تمام کلاس‌های فعال</p>
            </div><!-- Stats -->
            <div class="classes-stats">
                <h2 class="classes-stats-title">آمار کلی</h2>
                <div class="classes-stats-grid">
                    <div class="classes-stat-item">
                        <div class="classes-stat-number">
                            {{ $total_classes }}
                        </div>
                        <div class="classes-stat-label">
                            تعداد کلاس‌ها
                        </div>
                    </div>
                    <div class="classes-stat-item">
                        <div class="classes-stat-number">
                            240
                        </div>
                        <div class="classes-stat-label">
                            مجموع دانش‌آموزان
                        </div>
                    </div>
                    <div class="classes-stat-item">
                        <div class="classes-stat-number">
                            6
                        </div>
                        <div class="classes-stat-label">
                            معلمان
                        </div>
                    </div>
                </div>
            </div><!-- Classes Grid -->
            <div class="classes-grid"><!-- Class 1 -->
                @foreach ($classes as $class)
                    <a href="{{ route('filament.customer.pages.students', ['class_id' => $class->id]) }}">
                        <div class="class-card">
                            <div class="class-card-header">
                                <h3 class="class-card-name">{{ $class->class_name }}</h3><span
                                    class="class-card-badge">فعال</span>
                            </div>
                            <div class="class-card-info">
                                <div class="class-info-row"><span class="class-info-icon">👨‍🏫</span> <span
                                        class="class-info-text">استاد احمدی</span>
                                </div>
                                <div class="class-info-row"><span class="class-info-icon">👥</span> <span
                                        class="class-info-text">{{ $class->limit_student }} دانش‌آموز</span>
                                </div>
                                <div class="class-info-row"><span class="class-info-icon">🕐</span> <span
                                        class="class-info-text">شنبه و دوشنبه 8-10</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'9b62a6dcd2d8d2eb',t:'MTc2NzEwOTM5Ni4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
    </div>
@endsection
