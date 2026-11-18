# Test Case Cascade Delete — Week 12

## Cascade Test A: Menghapus Course

**Tujuan:** Memastikan enrollment otomatis terhapus ketika course dihapus, sedangkan participant tetap tersimpan.

### Kondisi sebelum penghapusan

| Data | ID | Keterangan |
|---|---|---|
| Course | 11 | TEST-CASCADE-COURSE |
| Participant | 4 | cascade.course@example.test |
| Enrollment | 3 | participant_id = 4, course_id = 11 |

Jumlah enrollment yang terhubung: 1 record.

### Aksi pengujian

```php
App\Models\Course::find(11)->delete();
```

### Hasil setelah penghapusan

| Pemeriksaan | Hasil |
|---|---|
| Course ID 11 | Terhapus |
| Enrollment ID 3 | Terhapus otomatis |
| Participant ID 4 | Tetap ada |

### Output hasil pengujian

```json
{
    "test": "Cascade Test A: Menghapus Course Dummy",
    "course_id": 11,
    "participant_id": 4,
    "enrollment_id": 3,
    "initial_enrollment_count": 1,
    "course_deleted": true,
    "enrollment_deleted": true,
    "participant_retained_after_course_deletion": true,
    "pass": true
}
```

---

## Cascade Test B: Menghapus Participant

**Tujuan:** Memastikan enrollment otomatis terhapus ketika participant dihapus, sedangkan course tetap tersimpan.

### Kondisi sebelum penghapusan

| Data | ID | Keterangan |
|---|---|---|
| Course | 12 | TEST-CASCADE-PART |
| Participant | 5 | cascade.participant@example.test |
| Enrollment | 4 | participant_id = 5, course_id = 12 |

Jumlah enrollment yang terhubung: 1 record.

### Aksi pengujian

```php
App\Models\Participant::find(5)->delete();
```

### Hasil setelah penghapusan

| Pemeriksaan | Hasil |
|---|---|
| Participant ID 5 | Terhapus |
| Enrollment ID 4 | Terhapus otomatis |
| Course ID 12 | Tetap ada |

### Output hasil pengujian

```json
{
    "test": "Cascade Test B: Menghapus Participant Dummy",
    "course_id": 12,
    "participant_id": 5,
    "enrollment_id": 4,
    "initial_enrollment_count": 1,
    "participant_deleted": true,
    "enrollment_deleted": true,
    "course_retained_after_participant_deletion": true,
    "pass": true
}
```

## Kesimpulan

Foreign key `cascadeOnDelete()` pada tabel `enrollments` bekerja sesuai rancangan. Menghapus course atau participant otomatis menghapus enrollment terkait, tanpa menghapus entitas di sisi lain.