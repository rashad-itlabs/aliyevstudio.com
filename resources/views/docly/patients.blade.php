<!DOCTYPE html>
<html lang="az" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docly Dashboard - Pasiyentlər</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Mərkəzləşdirilmiş CSS Xətti (Docly Custom CSS) -->
    <link rel="stylesheet" href="{{ asset('assets/docly/docly.css') }}">

    <style>
        /* Modallar üçün xüsusi Dark/Light rejim tənzimləmələri */
        .modal-content {
            background-color: var(--docly-sidebar-bg);
            color: var(--docly-text-heading);
            border: 1px solid var(--docly-border);
        }
        .modal-header { border-bottom-color: var(--docly-border); }
        .modal-footer { border-top-color: var(--docly-border); }
        .form-control, .form-select {
            background-color: var(--docly-bg);
            border: 1px solid var(--docly-border);
            color: var(--docly-text-heading);
        }
        .form-control:focus, .form-select:focus {
            background-color: var(--docly-bg);
            color: var(--docly-text-heading);
            border-color: var(--docly-primary);
            box-shadow: none;
        }
        .action-btn {
            width: 32px; height: 32px;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 6px; border: none; cursor: pointer; transition: 0.3s;
        }
        .edit-btn { background: rgba(63, 90, 243, 0.1); color: var(--docly-primary); }
        .edit-btn:hover { background: var(--docly-primary); color: #fff; }
        .delete-btn { background: rgba(220, 53, 69, 0.1); color: #dc3545; }
        .delete-btn:hover { background: #dc3545; color: #fff; }
    </style>
</head>
<body>

    <!-- Yan Panel (Sidebar) -->
    <aside class="docly-sidebar">
        <div class="docly-sidebar-logo">
            <i class="fa-solid fa-stethoscope" style="color: var(--docly-primary);"></i> Docly
        </div>
        <div class="docly-sidebar-menu">
            <a href="{{ route('docly.dashboard') }}"><i class="fa-solid fa-chart-pie"></i> İdarəetmə Paneli</a>
            <a href="{{ route('docly.appointments') }}"><i class="fa-solid fa-calendar-check"></i> Randevular</a>
            <a href="{{ route('docly.patients') }}" class="active"><i class="fa-solid fa-users"></i> Pasiyentlər</a>
            <a href="{{ route('docly.doctors') }}"><i class="fa-solid fa-user-doctor"></i> Həkimlər</a>
            <a href="#"><i class="fa-solid fa-wallet"></i> Maliyyə</a>
            <a href="{{ route('docly.settings') }}"><i class="fa-solid fa-gear"></i> Parametrlər</a>
        </div>
        <div class="docly-sidebar-menu" style="flex-grow: 0; padding-bottom: 20px;">
            <a href="#" style="color: #dc3545;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Çıxış</a>
        </div>
    </aside>

    <!-- Əsas Məzmun -->
    <main class="docly-main-content">
        <div class="container-fluid p-0">
            
            <!-- Üst Navigasiya Başlığı -->
            <div class="d-flex justify-content-between align-items-center mb-4 fade-in-top">
                <h2 style="color: var(--docly-text-heading); font-weight: 700; margin: 0;">Pasiyentlər</h2>
                <div class="d-flex gap-3">
                    <div class="input-group" style="width: 250px;">
                        <span class="input-group-text" style="background: var(--docly-card-bg); border-color: var(--docly-border); color: var(--docly-text-body);"><i class="fa-solid fa-search"></i></span>
                        <input type="text" id="searchInput" class="form-control" placeholder="Pasiyent axtar..." style="background: var(--docly-card-bg); border-color: var(--docly-border); color: var(--docly-text-heading);">
                    </div>
                    <button class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#createModal" style="background-color: var(--docly-primary); border: none;">
                        <i class="fa-solid fa-plus"></i> Yeni Pasiyent
                    </button>
                    <button class="btn btn-outline-secondary rounded-circle" id="theme-toggle" style="width: 40px; height: 40px; color: var(--docly-text-body); border-color: var(--docly-border);">
                        <i class="fa-solid fa-sun"></i>
                    </button>
                </div>
            </div>

            <!-- Xəbərdarlıq Mesajları -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Cədvəl Kartı -->
            <div class="widget-card table-container" style="padding: 0; overflow: hidden;">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th>Ad Soyad</th>
                                <th>Əlaqə Nömrəsi</th>
                                <th>Email</th>
                                <th>Yaş / Cinsiyyət</th>
                                <th>Diaqnoz (Qeyd)</th>
                                <th class="text-end">Əməliyyat</th>
                            </tr>
                        </thead>
                        <tbody id="patientTableBody">
                            @forelse($patients as $patient)
                            <tr class="patient-row list-item">
                                <td style="font-weight: 500; color: var(--docly-text-heading);">{{ $patient->name }}</td>
                                <td>{{ $patient->phone ?? '-' }}</td>
                                <td>{{ $patient->email ?? '-' }}</td>
                                <td>{{ $patient->age ?? '-' }} / {{ $patient->gender == 'M' ? 'Kişi' : ($patient->gender == 'F' ? 'Qadın' : '-') }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($patient->diaqnoz, 30) ?? '-' }}</td>
                                <td class="text-end">
                                    <!-- JS üçün obyekti JSON-a çevirib data-atributuna atırıq -->
                                    <button class="action-btn edit-btn me-2" onclick="openEditModal({{ json_encode($patient) }})" title="Redaktə et">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="action-btn delete-btn" onclick="openDeleteModal({{ $patient->id }})" title="Sil">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Sistemdə heç bir pasiyent tapılmadı.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- 1. Yarat (Create) Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('docly.patients.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Yeni Pasiyent Əlavə Et</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Ad və Soyad</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Əlaqə Nömrəsi</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Yaş</label>
                            <input type="number" name="age" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cinsiyyət</label>
                            <select name="gender" class="form-select">
                                <option value="M">Kişi</option>
                                <option value="F">Qadın</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Diaqnoz / Qeyd</label>
                        <textarea name="diaqnoz" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                    <button type="submit" class="btn btn-primary" style="background-color: var(--docly-primary); border: none;">Yadda Saxla</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 2. Redaktə Et (Edit) Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="editForm" method="POST" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Pasiyent Məlumatlarını Yenilə</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Ad və Soyad</label>
                        <input type="text" name="name" id="editName" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Əlaqə Nömrəsi</label>
                            <input type="text" name="phone" id="editPhone" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="editEmail" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Yaş</label>
                            <input type="number" name="age" id="editAge" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cinsiyyət</label>
                            <select name="gender" id="editGender" class="form-select">
                                <option value="M">Kişi</option>
                                <option value="F">Qadın</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Diaqnoz / Qeyd</label>
                        <textarea name="diaqnoz" id="editDiaqnoz" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ləğv Et</button>
                    <button type="submit" class="btn btn-primary" style="background-color: var(--docly-primary); border: none;">Yenilə</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 3. Silmə (Delete) Təsdiq Modalı -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <form id="deleteForm" method="POST" class="modal-content text-center p-4">
                @csrf
                @method('DELETE')
                <i class="fa-solid fa-circle-exclamation text-danger mb-3" style="font-size: 48px;"></i>
                <h5 class="mb-3">Əminsiniz?</h5>
                <p class="text-muted mb-4">Bu pasiyent məlumatları sistemdən tamamilə silinəcək və geri qaytarılması mümkün olmayacaq.</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Xeyr, ləğv et</button>
                    <button type="submit" class="btn btn-danger">Bəli, Sil</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Skriptlər -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    <script>
        // Tema dəyişdirici və GSAP Animasiyaları
        document.addEventListener("DOMContentLoaded", function() {
            const themeToggle = document.getElementById('theme-toggle');
            const htmlTag = document.documentElement;

            themeToggle.addEventListener('click', () => {
                const newTheme = htmlTag.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                htmlTag.setAttribute('data-theme', newTheme);
                themeToggle.innerHTML = newTheme === 'dark' ? '<i class="fa-solid fa-sun"></i>' : '<i class="fa-solid fa-moon"></i>';
                // Modal close button color invert
                document.querySelectorAll('.btn-close').forEach(btn => {
                    newTheme === 'dark' ? btn.classList.add('btn-close-white') : btn.classList.remove('btn-close-white');
                });
            });

            gsap.fromTo(".docly-sidebar", { x: -260 }, { x: 0, duration: 0.6, ease: "power3.out" });
            gsap.from(".fade-in-top", { y: -20, opacity: 0, duration: 0.6, delay: 0.2 });
            gsap.to(".table-container", { y: 0, opacity: 1, duration: 0.8, ease: "power3.out", delay: 0.4 });
            gsap.from(".list-item", { x: -20, opacity: 0, duration: 0.5, stagger: 0.05, ease: "power2.out", delay: 0.6 });
        });

        // Filter / Axtarış funksiyası
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('.patient-row');
            
            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });

        // Redaktə Et (Edit) funksiyası - Datanı modala doldurur
        function openEditModal(patient) {
            document.getElementById('editForm').action = `/docly/patients/${patient.id}`;
            document.getElementById('editName').value = patient.name || '';
            document.getElementById('editPhone').value = patient.phone || '';
            document.getElementById('editEmail').value = patient.email || '';
            document.getElementById('editAge').value = patient.age || '';
            if(patient.gender) document.getElementById('editGender').value = patient.gender;
            document.getElementById('editDiaqnoz').value = patient.diaqnoz || '';
            
            new bootstrap.Modal(document.getElementById('editModal')).show();
        }

        // Silmə (Delete) funksiyası - Route-u URL-ə bağlayır
        function openDeleteModal(id) {
            document.getElementById('deleteForm').action = `/docly/patients/${id}`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }
    </script>
</body>
</html>