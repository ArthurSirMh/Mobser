<x-filament-panels::page>
    <!doctype html>
    <html lang="fa" dir="rtl" class="h-full">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>لیست دانش‌آموزان</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700&amp;display=swap"
            rel="stylesheet">
        <style>
            body {
                box-sizing: border-box;
            }

            * {
                font-family: 'Vazirmatn', sans-serif;
            }

            html,
            body {
                height: 100%;
                width: 100%;
            }
        </style>
        <style>
        </style>
        <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
        <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
    </head>
    <div class="w-full h-full overflow-auto bg-gradient-to-br   p-8">
        <input id="class_id" type="hidden" value={{ $class_id }}>
        <div class="max-w-6xl mx-auto"><!-- Header -->
            <header class="text-center mb-10">
                <h1 class="text-4xl font-bold text-white mb-2">لیست دانش‌آموزان</h1>
                <p class="text-lg text-slate-400">مشاهده اطلاعات و ثبت غیبت</p>
            </header><!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-slate-900/70 backdrop-blur-md border border-blue-500/30 rounded-2xl p-6 text-center">
                    <div class="text-4xl mb-3">
                        👥
                    </div>
                    <div class="text-3xl font-bold text-blue-500 mb-2">
                        {{ $total_student }}
                    </div>
                    <div class="text-slate-400 font-medium">
                        کل دانش‌آموزان
                    </div>
                </div>
                <div class="bg-slate-900/70 backdrop-blur-md border border-blue-500/30 rounded-2xl p-6 text-center">
                    <div class="text-4xl mb-3">
                        ✅
                    </div>
                    <div class="text-3xl font-bold text-blue-500 mb-2">
                        0
                    </div>
                    <div class="text-slate-400 font-medium">
                        غیبت ثبت شده
                    </div>
                </div>
            </div><!-- Table -->
            <div class="bg-slate-900/70 backdrop-blur-md border border-blue-500/30 rounded-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-500/15">
                            <tr>
                                <th
                                    class="px-6 py-4 text-right text-blue-400 font-semibold border-b-2 border-blue-500/30">
                                    نام و نام خانوادگی</th>
                                <th
                                    class="px-6 py-4 text-right text-blue-400 font-semibold border-b-2 border-blue-500/30">
                                    نام پدر</th>
                                <th
                                    class="px-6 py-4 text-right text-blue-400 font-semibold border-b-2 border-blue-500/30">
                                    کد ملی</th>
                                <th
                                    class="px-6 py-4 text-center text-blue-400 font-semibold border-b-2 border-blue-500/30">
                                    عملیات</th>
                            </tr>
                        </thead>
                        <form id="absenceForm">
                            @foreach ($students as $student)
                                <tbody>
                                    <tr class="hover:bg-blue-500/10 transition-colors border-b border-blue-500/10">
                                        <td class="px-6 py-5 text-white font-semibold">{{ $student->name }}</td>
                                        <td class="px-6 py-5 text-slate-300">محمد</td>
                                        <td class="px-6 py-5 text-slate-400 font-mono text-sm">{{ $student->melicode }}
                                        </td>
                                        <td class="px-6 py-5 text-center">
                                            <div>
                                                @if ($student->last_absence && \Carbon\Carbon::parse($student->last_absence)->isToday())
                                                    <button type="button" class="btn btn-warning restore-absence"
                                                        data-student-id="{{ $student->id }}">
                                                        برگرداندن غیبت
                                                    </button>
                                                @else
                                                    <label>
                                                        <input type="checkbox" class="student-checkbox"
                                                            value="{{ $student->id }}">
                                                        غیبت
                                                    </label>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </form>
                    </table>
                    @if (!empty($student))
                        <button name="createAbsence" id="submitAbsence" value={{ $student->id }}
                            class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:-translate-y-0.5 hover:shadow-lg hover:shadow-red-500/40 transition-all">
                            ثبت غیبت </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <script>
        const classId = document.getElementById('class_id')
        document.getElementById('submitAbsence').addEventListener('click', function() {
            const checkedStudents = document.querySelectorAll('.student-checkbox:checked');
            const studentIds = [];
            checkedStudents.forEach(checkbox => {
                studentIds.push(checkbox.value);
            });
            const data = {
                class_id: classId.value,
                student_id: studentIds
            };
            fetch("create-absence", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    if (result == 200) {
                        toastr.success('با موفقیت انجام شد');
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        });
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.restore-absence').forEach(button => {
                button.addEventListener('click', function() {

                    const studentId = this.dataset.studentId;

                    fetch('delete-absence', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                student_id: studentId
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data == 200) {
                                toastr.success('غیبت با موفقیت حذف شد');
                                location.reload(); // یا رفرش سطر
                            } else {
                                toastr.error('حذف انجام نشد');
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            toastr.error('خطای سرور');
                        });

                });
            });

        });
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'9b8353ae37901e33',t:'MTc2NzQ1MjAxOS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
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
</x-filament-panels::page>
